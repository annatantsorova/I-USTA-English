"use strict";

$(document).ready(function () {
  var menu = $(".header");
  $(window).scroll(function () {
    var top = $(this).scrollTop();

    if (top >= 150) {
      menu.css('background', '#212529');
    } else {
      menu.css("background", "");
    }
  }); // Modal
  // $('[data-modal=consultation]').on('click', function () {
  //     $('.overlay, #consultation').fadeIn('slow');
  // });
  // $('.modal__close').on('click', function () {
  //     $('.overlay, #consultation, #thanks').fadeOut('slow');
  // });

  function validateForms(form) {
    $(form).validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        phone: "required",
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        name: {
          required: "Please enter your name",
          minlength: jQuery.validator.format("Enter {0} symbols!")
        },
        phone: "Please enter your phone number",
        email: {
          required: "Please enter your e-mail",
          email: "Incorrect e-mail"
        }
      }
    });
  }

  ;
  validateForms('#consultation-form');
  validateForms('#consultation');
  validateForms('#thanks');
  $('input[name=phone]').mask("+7 (999) 999-99-99");
  $('#send_form').submit(function (e) {
    e.preventDefault();

    if (!$(this).valid()) {
      return;
    }

    $.ajax({
      type: "POST",
      url: "mailer/smart.php",
      data: $(this).serialize()
    }).done(function () {
      $(this).find("input").val("");
      $('#consultation').fadeOut();
      $('#thanks').fadeIn('slow');
      $('form').trigger('reset');
    });
    return false;
  });
  $('.navbar ul li a').click(function () {
    var $currLink = $(this);
    $('.navbar ul li a').each(function () {
      $(this).removeClass("menu__link__active");
    });
    $currLink.addClass("menu__link__active");
  });
});