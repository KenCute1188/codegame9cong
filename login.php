<?php
session_start();

// Lấy dữ liệu từ yêu cầu POST
$player_id = $_POST['player_id'];
$game_id = $_POST['game_id'];

// Kiểm tra xem các trường có được điền đầy đủ hay không
if (!empty($player_id) && !empty($game_id)) {
    // Tạo session
    $_SESSION['player_id'] = $player_id;
    $_SESSION['game_id'] = $game_id;

    // Đăng nhập thành công
    $response = array(
        'status' => 1,
        'msg' => 'Đăng nhập thành công!',
        'isLogin' => true // Thêm trường isLogin vào response
    );
} else {
    // Đăng nhập thất bại
    $response = array(
        'status' => 0,
        'msg' => 'Vui lòng điền đầy đủ thông tin.',
        'isLogin' => false // Thêm trường isLogin vào response
    );
}

// Trả về kết quả dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($response);
?>