$(document).ready(function() {
    // Xử lý sự kiện click cho "Xem hướng dẫn" được thêm động
    $(document).on('click', '.showGetUID', function() {
        $('#popup-thongbao').hide(); // Ẩn popup thông báo
        $('#popup-get-uid').fadeIn(); // Hiển thị popup hướng dẫn lấy UID
        $('.custom-popup-bottom').fadeOut();
    });

    // Đóng popup hướng dẫn lấy UID khi bấm nút đóng
    function closeShowGetUID() {
        $('#popup-get-uid').fadeOut();
    }

    // Đăng ký sự kiện cho nút đóng trong popup hướng dẫn lấy UID
    $('#popup-get-uid .custom-close-button').off('click').on('click', function() {
        closeShowGetUID();
    });


    const $listGameContainer = $('.list-game-container');
    const $fadeBottom = $('.fade-bottom');
    const $viewMoreBtn = $('#viewMoreBtn');

    $viewMoreBtn.on('click', function() {
        $listGameContainer.css('height', 'auto'); // Mở rộng chiều cao để hiển thị toàn bộ game
        $fadeBottom.hide(); // Ẩn hiệu ứng mờ
        $viewMoreBtn.hide(); // Ẩn nút "Xem thêm"
    });

    $('.paste-icon').on('click', function() {
        var inputId = $(this).data('input'); // Lấy ID của ô nhập liệu từ thuộc tính data-input
        navigator.clipboard.readText().then(function(text) {
            $('#' + inputId).val(text); // Dán văn bản vào ô nhập liệu tương ứng
        }).catch(function(err) {
            console.error('Failed to read clipboard contents: ', err);
        });
    });
});

function openPopup() {
    document.getElementById("popup-thongbao").style.display = "flex";
}

function closePopup() {
    document.getElementById("popup-thongbao").style.display = "none";
}

