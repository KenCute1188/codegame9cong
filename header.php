<?php
include_once 'setting.php';
$selectedGame = isset($_GET['game']) ? $_GET['game'] : null;
$games = [
    'FreeFire' => ['name' => 'Free Fire', 'icon' => 'freefire.png', 'banner' => '../cdn-gop.garenanow.com/gop/mshop/www/live/assets/FF-2cb78e7c.jpg'],
    'LienQuan' => ['name' => 'Liên Quân Mobile', 'icon' => 'lienquan.png', 'banner' => '../cdn-gop.garenanow.com/gop/mshop/www/live/assets/AOV-313c6659.jpg'],
    'PUBG' => ['name' => 'PUBG Mobile', 'icon' => 'pubg_m.png', 'banner' => 'images/banner_game/pubgm1.png'],
    'Valorant' => ['name' => 'Valorant', 'icon' => 'valorant.png', 'banner' => 'images/banner_game/valorant.png'],
    'FCOnline' => ['name' => 'FC Online (VN)', 'icon' => 'fco.png', 'banner' => 'images/banner_game/fc_pc.png'],
    'Roblox' => ['name' => 'Roblox', 'icon' => 'roblox.png', 'banner' => 'images/banner_game/roblox1.png'],
    'LMHT' => ['name' => 'Liên Minh Huyền Thoại', 'icon' => 'lmht.png', 'banner' => 'images/banner_game/lmht.png'],
    'TocChien' => ['name' => 'LMHT: Tốc Chiến', 'icon' => 'tocchien.png', 'banner' => 'images/banner_game/tocchien.png'],
    'FCOnlineM' => ['name' => 'FC Online M (VN)', 'icon' => 'fcm.png', 'banner' => 'images/banner_game/fcm2.png'],
];
?>

<!-- Header -->
<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.html">
                <img src="images/logo/logo.svg" alt="Trung tâm nạp thẻ Game" />
            </a>
        </div>
        <div class="divider"></div>
        <span class="text">Trung tâm nạp game thẻ cào</span>
    </div>
</header>

<main>
    <!-- Banner section -->
    <div class="banner">
        <div class="img-banner">
            <?php
            if ($selectedGame && array_key_exists($selectedGame, $games)) {
                $bannerPath = $games[$selectedGame]['banner'];
                echo "<img src='$bannerPath' alt='{$games[$selectedGame]['name']} Banner' />";
            } else {
                // banner mặc định nếu không có game nào được chọn
                echo "<img src='../cdn-gop.garenanow.com/gop/mshop/www/live/assets/FF-2cb78e7c.jpg' alt='Default Banner' />";
            }
            ?>
        </div>
    </div>

    <!-- Các Game -->
    <div class="game-selection">
        <div class="duong-ke-vang"></div>
        <div class="game-selection-container">
            <div class="title">Lựa chọn trò chơi</div>
            <div class="list-game-container">
                <div class="list-game">
                    <?php
                    foreach ($games as $id => $game) {
                        $isSelected = ($selectedGame === $id) ? 'selected' : '';
                        echo "
                        <div class='game-item' id='$id' onclick='window.location.href=\"/?game=$id\"'>
                            <div class='game-img $isSelected'>
                                <img src='images/icon_game/{$game['icon']}' alt='{$game['name']}' />
                            </div>
                            <div class='game-name $isSelected'>
                                {$game['name']}
                            </div>
                        </div>";
                    }
                    ?>
                </div>
                <div class="fade-bottom"></div>
            </div>
            <button id="viewMoreBtn">Xem thêm</button>
        </div>
    </div>
</main>