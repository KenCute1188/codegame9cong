<?php
//TRONG QUÁ TRÌNH KẾT NỐI, NẾU CẦN HỖ TRỢ VUI LÒNG BÁO NGUYENTANDAT (BI NHỎ)
//CHẤP NHẬN CẢ GET VÀ POST KHI GỬI THẺ  
header('Content-Type: application/json');
// Khai báo các thông tin cần thiết
$partnet_key = "0172041500501252830cd9caffe4e9df"; // Key của đối tác
$partner_id = "9379892361";  // Partner ID

// Lấy dữ liệu từ POST request
$type = strtoupper($_POST['loaithe'] ?? '');
$pin = $_POST['mathe'] ?? ''; 
$serial = $_POST['seri'] ?? ''; 
$amount = $_POST['menhgia'] ?? ''; 
$idGame = $_POST['game_id'] ?? ''; 

if (empty($type) || empty($pin) || empty($serial) || empty($amount) || empty($idGame)) {
    $response = [
        'status' => 0,
        'msg' => 'Vui lòng điền đầy đủ thông tin.',
        'bicoder_server' => [
            'message' => 'MISSING_DATA'
        ]
    ];
    echo json_encode($response);
    exit;
}

// Tạo request_id ngẫu nhiên
$request_id = rand(100009, 999999);

// Tạo URL để gửi yêu cầu nạp thẻ
$url = 'https://thesieure.com/chargingws/v2?sign=' . md5($partnet_key . $pin . $serial) .
    '&telco=' . $type .
    '&code=' . $pin .
    '&serial=' . $serial .
    '&amount=' . $amount .
    '&request_id=' . $request_id .
    '&partner_id=' . $partner_id .
    '&command=charging';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$result = json_decode($data, true);
if ($result['status'] == 100) {
    $response = [
        'status' => 0, // Thất bại
        'msg' => $result['message'],
        'bicoder_server' => [
            'message' => $result['message']
        ]
    ];
} else {
    $response = [
        'status' => 1, // Thành công
        'msg' => 'Nạp thẻ thành công.',
        'bicoder_server' => [
            'message' => $result['message']
        ]
    ];
}

// Trả về phản hồi dưới dạng JSON
echo json_encode($response);
?>