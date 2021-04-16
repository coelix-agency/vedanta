
if(jQuery('body').find('.headBackgroundRight')){

jQuery('.pricefind option').remove();
  jQuery('.pricefind')
  .append('<option value="от 8500$ до 11900$" selected>от 8500$ до 11900$</option>')
  .append('<option value="от 11900$ до 16500$">от 11900$ до 16500$</option>')
  .append('<option value="от 16500$ до 43000$">от 16500$ до 43000$</option>');






jQuery('.markfind').change(function () {
  switch (jQuery('.markfind').val()) {

    case 'Седан':
    jQuery('.pricefind option').remove();
    jQuery('.pricefind')
    .append('<option value="от 8500$ до 11900$" selected>от 8500$ до 11900$</option>')
    .append('<option value="от 11900$ до 16500$">от 11900$ до 16500$</option>')
    .append('<option value="от 16500$ до 43000$">от 16500$ до 43000$</option>');
    break;

    case 'Кроссовер':
    jQuery('.pricefind option').remove();
    jQuery('.pricefind')
    .append('<option value="от 15000$ до 17900$" selected>от 15000$ до 17900$</option>')
    .append('<option value="от 17900$ до 20500$">от 17900$ до 20500$</option>')
    .append('<option value="от 20500$ до 37500$">от 20500$ до 37500$</option>');
    break;

    case 'Минивэн':
    jQuery('.pricefind option').remove();
    jQuery('.pricefind')
    .append('<option value="от 19900$ до 23000$" selected>от 19900$ до 23000$</option>')
    .append('<option value="от 23000$ до 36000$">от 23000$ до 36000$</option>')
    .append('<option value="от 36000$ до 38500$">от 36000$ до 38500$</option>');
    break;

    default:
    jQuery('.pricefind option').remove();
    jQuery('.pricefind')
    .append('<option value="от 7000$ до 10000$" selected>от 7000$ до 10000$</option>')
    .append('<option value="от 10000$ до 13000$">от 10000$ до 13000$</option>')
    .append('<option value="от 13000$ до 15000$">от 13000$ до 15000$</option>')
    .append('<option value="от 15000$ до 17000$">от 15000$ до 17000$</option>')
    .append('<option value="от 17000$ до 20000$">от 17000$ до 20000$</option>')
    .append('<option value="от 20000$">от 20000$</option>');
  break;

  }

})
}



if(jQuery('.all_info').find('.price.sea').length > 1){

  jQuery('.all_info').find('.price.sea').eq(0).children('span').css({'text-decoration':'line-through','color':'#ccc'});
  jQuery('body.single.single-post header .cont h1 span').eq(1).css({'text-decoration':'line-through','color':'#ccc','margin-right':'5px'});
}


jQuery('.all-cars .item .price.price_us').each(function () {
  if(jQuery(this).children(' span').find('span').length > 1){

  jQuery(this).children(' span').find('span').eq(0).css({'text-decoration':'line-through','color':'#ccc','margin-right':'5px'});
    jQuery('.all_info').find('.price.sea').eq(0).children('span').css({'text-decoration':'line-through','color':'#ccc'});
  }
});


jQuery('.mobSort,.descSort').change(function(){






  if(jQuery(this).val() == 'nosort'){


    location.reload();


      }





if(jQuery(this).val() == 'alfSort'){


    var $elements = jQuery('.all-cars .item');
    var $target = jQuery('.all-cars ');

    $elements.sort(function (a, b) {
        var an = jQuery(a).find('.name').text(),
            bn = jQuery(b).find('.name').text();

        if (an && bn) {
            return an.toUpperCase().localeCompare(bn.toUpperCase());
        }

        return 0;
    });

    $elements.detach().appendTo($target);



    }






    if(jQuery(this).val() == 'priceSort'){


        var $elements = jQuery('.all-cars .item');
        var $target = jQuery('.all-cars ');
        console.log($elements);
        $elements.sort(function (a, b) {

            var an = jQuery(a).data('carsPrice'),
                bn = jQuery(b).data('carsPrice');

            if (an && bn) {
              console.log(bn);
                return an-bn;
            }

            return 0;
        });

        $elements.detach().prependTo($target);



        }





});



jQuery('.headFilter span').click(function () {

  if(jQuery('.filters_content .filters').hasClass('open')){
    jQuery('.filters_content .filters').removeClass('open');
    jQuery('#mobile-menu-btn').css({'display':'block'});
    jQuery('.headFilter').css({'background':'#71bf44f2'});
  } else {
    jQuery('.filters_content .filters').addClass('open');
    jQuery('#mobile-menu-btn').css({'display':'none'});
    jQuery('.headFilter').css({'background':'#000'});
  }

});

window.addEventListener('orientationchange', function () {
  // var originalBodyStyle = getComputedStyle(document.body).getPropertyValue('display');
  // document.body.style.display='none';
  // setTimeout(function () {
  //   document.body.style.display = originalBodyStyle;
  //   $('.slider, .mobile_slider').filter('.slick-initialized').slick('unslick');
  //   slickInit();
  // }, 100);
  window.location.reload()
});





document.addEventListener("DOMContentLoaded", onLoad);

function onLoad() {
  if ( $('#wpadminbar').length == 0) {
    vinCodeHide();
  }
  carSoldHandler();
  carsActionPriceHandler();

  // carsImageLazyLoad();
}

jQuery('.moreAuto').click(function () {
  jQuery('.all-cars').css({'max-height':'100%'});
  jQuery(this).css({'display':'none'});
});

function carsImageLazyLoad() {
  var imgs = document.querySelectorAll('.all-cars img');
  imgs.forEach(function(el) {
    console.log('x: ' + el.getBoundingClientRect().x);
    el.classList.add('test');
  })
}

function vinCodeHide() {
  var li = document.querySelector('#vin-code-line strong');
console.log('sdf');
  if (li) {
    var text = li.textContent;
    var arr = text.split('')
    var newArr = [];
    arr.forEach(function(item, i) {
      // if ( (i >=4 && i <=6) || (i >=9 && i <=12) ) {
      if (i <=11) {
        item = '';
      }
      newArr.push(item)
    })
    var newStr = newArr.join('');
    li.textContent = newStr;
  }
}

function slickInit() {
  if ( $(window).width() < 769 ) {
    $('.mobile_slider').slick({
      // adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
      dots: true,
      pauseOnFocus: false,
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: 1,
      slidesToScroll: 1
    });
  } else {
    $('.slider').slick({
      // adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
      dots: true,
      pauseOnFocus: false,
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: 1,
      slidesToScroll: 1
    });
  }
};

// Расскомитить для слайдера ОТ
slickInit();

// $(window).resize( myResize() );
// myResize();
// Расскомитить для слайдера ДО

if ( $( "#slider-range" ).length ) {
  sliderInit();
}


$( "#amount-min" ).on('input', function(){
  $( "#slider-range" ).slider({
    values: [ this.value, $( "#slider-range" ).slider( "values", 1 ) ]
  })
  this.value;
  carsHandler();
  carsFilterHandler()
})

$( "#amount-max" ).on('input', function(){
  $( "#slider-range" ).slider({
    values: [ $( "#slider-range" ).slider( "values", 0 ), this.value  ]
  })
  carsHandler();
  carsFilterHandler()
})
var counter = (function () {
  var count = 0;
  return function() {
    return count++;
  }
}());

$("body").on('click', '.anchor-link a', function(e) {
  var $this = $(this);
  var $elementClick = $this.attr("href")
  var $destination = $($elementClick).offset().top;
  $('#mobile-menu-btn').removeClass('open');
  $('#mobile-menu').removeClass('open');
  if ($elementClick === '#cars-available' && $('.cars-available:not(.animated)').length ) {
    $('.cars-available').addClass('animated');
    $("html,body").animate({
      scrollTop: $destination - 100
    }, 500);
    return false;
  }
  $("html,body").animate({
      scrollTop: $destination
  }, 500);
  return false;
});
$('.top').addClass('view');

function carsHandler() {
  if ($('.all-cars').length ) {

    if ( pageYOffset >= $('.all-cars')[0].offsetTop - window.innerHeight ) {
      $.each($('.all-cars .item'), function(i, el) {
        // $(el).removeClass("animate");
        setTimeout(function() {
          $(el).addClass("animate");
        }, 50 + (i * 50));

      });
    }

  }
}

// ========================
// Filter start
// ========================
function carsFilterHandler() {
  var minPrice = $( "#amount-min" ).val(),
      maxPrice = $( "#amount-max" ).val(),
      carsType = $('#car-type').val(),
      carsFuel = $('#car-fuel').val(),
      carsMark = $('#car-mark').val(),
      carsModel = $('#car-model').val(),
      carsManual = $('#car-manual').val(),
      carsStatus = $('#car-status').val();


  if ($('.filters_content .all-cars').length ) {
console.log(carsModel);
    if ( pageYOffset >= $('.all-cars')[0].offsetTop - window.innerHeight ) {
      $.each($('.all-cars .item'), function(i, el) {
        $(el).removeClass("animate");
        // var price = $(el)[0].dataset.carsPrice;
        // var carType = $(el)[0].dataset.carsType;
        // var carFuel = $(el)[0].dataset.carsFuel;
        // var carManual = $(el)[0].dataset.carsManual;
        // var carStatus = $(el)[0].dataset.carsStatus;

        var price = $(el).data('carsPrice');
        var carType = $(el).data('carsType');
        var carFuel = $(el).data('carsFuel');
        var carMark = $(el).data('carsMark');
        var carModel = $(el).data('carsModel');
        var carManual = $(el).data('carsManual');
        var carStatus = $(el).data('carsStatus');


        if ( +price >= +minPrice
          && +price <= +maxPrice
          && (!+carsType || +carType == +carsType)
          && (!+carsFuel || +carFuel == +carsFuel)
          && (!+carsMark || +carMark == +carsMark)
          && (!+carsModel || +carModel == +carsModel)
          && (!+carsStatus || +carStatus == +carsStatus)
          && (!+carsManual || +carManual == +carsManual) ) {

          $(el).show().css('display', 'flex');
          $(el).addClass("showed");

        } else {

          $(el).hide().css('display', 'none');
          $(el).removeClass("showed");

        }
        setTimeout(function() {
          $(el).addClass("animate");
        }, 50 + (i * 50));

      });
    }

  }
  setTimeout( function(params) {
    if ( $('.filters_content .all-cars .item.showed').length ) {
      $('.filters_content .all-cars .query').hide();
    } else {
      $('.filters_content .all-cars .query').show();
    }
  }, 500)

  filterScroll();

}


// ========================
// Filter end
// ========================


// ========================
// view_switcher
// ========================

if (!localStorage.view) {
  localStorage.setItem('view', '');
  $('.view_switcher .view_switch_btn.list').removeClass('active');
  $('.view_switcher .view_switch_btn.tile').addClass('active');
}

if (localStorage.view && localStorage.view == 'list') {
  $('.view_switcher .view_switch_btn.tile').removeClass('active');
  $('.view_switcher .view_switch_btn.list').addClass('active');
  $('.filters_content .all-cars').addClass('list');
} else {
  $('.filters_content .all-cars').removeClass('list');
  $('.view_switcher .view_switch_btn.list').removeClass('active');
  $('.view_switcher .view_switch_btn.tile').addClass('active');
}

$('.view_switcher .view_switch_btn').on('click', function() {
  $(this).toggleClass('active').siblings().toggleClass('active');
  if ( $('.view_switch_btn.list').hasClass('active') ) {
    $('.filters_content .all-cars').addClass('list');
    localStorage.setItem('view', 'list');
  } else {
    $('.filters_content .all-cars').removeClass('list');
    localStorage.setItem('view', '');
  }
})


// ========================
// view_switcher end
// ========================


function pageYOffsetHandler(el, latency) {
  if ( $(el).length && pageYOffset >= $(el)[0].clientHeight + latency ) {
    $(el).addClass('active');
  } else {
    $(el).removeClass('active');
  }
}

function multiLineParallaxHandler() {
  $('.multi_line_textarea').each( function() {
    // console.log(this.offsetTop)
    if (pageYOffset >= this.offsetTop - window.innerHeight + 100 ) {
      this.classList.add('animate');
    }
  })
}

function filterScroll() {
  if ( $('.filters_content').length) {

    const filterContTop = $('.filters_content').offset().top;
    const filterContHeight = $('.filters_content').height();
    const customGap = 40;
    // $('.filters').height()
    if (window.innerWidth > 1000) {
      if ( pageYOffset < filterContTop ) {
        $('.filters_content').removeClass('scrolled');
      } else  {
        $('.filters_content').addClass('scrolled');
        const myTop = pageYOffset - (filterContTop + filterContHeight);
        if (myTop < filterContHeight) {
          // $('.filters').css({top: myTop + 80 + 'px'});
          $('.filters').css({top: customGap +'px'});
        } else {
          $('.filters').css({top: filterContHeight + 'px'});
        }
      }
    } else {
      $('.filters').css({top: 0});
      $('.filters_content').removeClass('scrolled');

      const btnStart = $('.filters_content').offset().top;
      if (pageYOffset > btnStart - 150 && pageYOffset < btnStart + filterContHeight - 300) {
        $('.filters_mob_btn').css({position: 'fixed', top: '127px', right: '10px', display: 'block'});
        $('.headFilter').css({position: 'fixed', top: '0px', right: '0px', display: 'flex'});
      } else {
        $('.filters_mob_btn').css({position: 'absolute', top: 0, right: '-46px',display: 'none'});
        $('.headFilter').css({position: 'absolute', top: 0, right: '-46px',display: 'none'});
      }

     }

    //  exit from scroll
    if ( pageYOffset > filterContTop + filterContHeight - $('.filters').height() - customGap * 1.5) {
      $('.filters_content').removeClass('scrolled');
    }

  }
}

// ========================
// All scroll effect
// ========================
function scrollHandler() {

  pageYOffsetHandler('.top', -30);
  multiLineParallaxHandler();
  carsHandler();
  filterScroll();

  // if ( $('#contacts').length && (pageYOffset >= $('#contacts')[0].offsetTop - window.innerHeight + 100 ) ) {
  //   $('#contacts').addClass('active');
  // }

  // if ( pageYOffset >= $('.container')[0].offsetTop - window.innerHeight - 200 ) {
  //   $('.container').addClass('animated');
  // }

  if ( $('.cars-available').length && ( pageYOffset >= $('.cars-available')[0].offsetTop - window.innerHeight + 120 ) ) {
    $('.cars-available').addClass('animated');
  } else {
    $('.cars-available').removeClass('animated');
  }

}
window.addEventListener('scroll', scrollHandler);
scrollHandler();


// ========================
// custom select
// ========================
var x, i, j, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");

  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;

  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
      carsFilterHandler();
    });

}
function closeAllSelect(elmnt) {
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
  carsHandler();
  // carsFilterHandler();
}
document.addEventListener("click", closeAllSelect);

// ========================
// custom select end
// ========================

// ========================
// custom input type=number
// ========================

$('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
$('.quantity').each(function() {
  var spinner = $(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 500;
    }
    if (newVal > max) {
      newVal = max;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("input");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 500;
    }
    if (newVal < min) {
      newVal = min;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("input");
  });

});

// ========================
// custom input type=number end
// ========================

$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  asNavFor: '.slider-nav',
  appendArrows: '#slider-buttons',
  prevArrow: '<div class="left"></div>',
  nextArrow: '<div class="right"></div>',
  adaptiveHeight: true,
  Infinite: false
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  arrows: false,
  // centerMode: true,
  focusOnSelect: true,
  Infinite: false
});


// ========================
// mobile menu btn
// ========================

$('#mobile-menu-btn').on('click', function() {
  $(this).toggleClass('open');
  $('#mobile-menu').toggleClass('open');
})

$('.filters_mob_btn, .filters_mob_btn_close').on('click', function() {
  $('.filters_content .filters').toggleClass('open');
})

// ========================
// validation forms
// ========================

function validateForm(form) {
  $('span.error').remove();
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  [...form[0].elements].map( function(i){
      if( i.tagName === "INPUT" && i.type !== "submit") {

          if ( i.type === "text" && i.value.length < 3) { // text fields
              var span = $('<span class="error">Нужно указать больше символов</span>');
              span.appendTo(i.parentElement);
              i.classList.add('error');

          } else if ( i.name === "phone" && i.value.replace(/[^+\d]/g, '').length < 10) { // phone-number fields
              var span = $('<span class="error">Нужно указать больше символов</span>');
              span.appendTo(i.parentElement);
              i.classList.add('error');
          } else if ( i.name === "email" && !re.test(i.value)) {
              var span = $('<span class="error">E-mail введён не корректно</span>');
              span.appendTo(i.parentElement);
              i.classList.add('error');
          } else {
              if (i.nextElementSibling) {
                  i.nextElementSibling.remove();
              }
              i.classList.remove('error');
          }
      }
  });

  return $('span.error');
}

// ========================
// form
// ========================
$('#phone_request_car,.wpcf7 input[type="tel"]').mask('+3 8(099) 999-99-99');

$('#phone_request').mask('+3 8(099) 999-99-99');
$('#car_request_data_phone').mask('+3 8(099) 999-99-99');

$('#buy_btn').on('click', function() {
  $('#overlay').addClass('show');
  $('#popups').addClass('show');
  $('#popup_leave_request_car').addClass('show');
  $('.mobile_menu').fadeOut();
  popupsSize($('#popup_leave_request_car')[0]);
})

$('#buy_btn_drive').on('click', function() {
  $('#overlay').addClass('show');
  $('#popups').addClass('show');
  $('#popup_leave_request_drive').addClass('show');
  $('.mobile_menu').fadeOut();
  popupsSize($('#popup_leave_request_drive')[0]);
})

$('.callback_btn').on('click', function() {
  $('#overlay').addClass('show');
  $('#popups').addClass('show');
  $('#popup_leave_request').addClass('show');
  $('.mobile_menu').fadeOut();
  popupsSize($('#popup_leave_request')[0]);
});


jQuery('.freeDriveAuto,.getAdviceAuto').click(function (e) {
  e.preventDefault();
});

$('.freeDriveAuto').click(function () {
  $('#overlay').addClass('show');
  $('#popups').addClass('show');
  $('#popup_freeDriveAuto').addClass('show');
  $('.mobile_menu').fadeOut();
  popupsSize($('#popup_freeDriveAuto')[0]);
  jQuery('#popup_freeDriveAuto #link_freeDriveAuto').val(jQuery(this).parent().parent().children('div.name').text());
});
// $('.freeDriveAuto').on('click', function() {
//
// });

$('.getAdviceAuto').on('click', function() {
  $('#overlay').addClass('show');
  $('#popups').addClass('show');
  $('#popup_getAdviceAuto').addClass('show');
  $('.mobile_menu').fadeOut();
  popupsSize($('#popup_getAdviceAuto')[0]);
  jQuery('#popup_getAdviceAuto #link_getAdviceAuto').val(jQuery(this).parent().parent().children('div.name').text());
});



// cars
// $("#form_leave_request_car").submit(function(e) {
//   e.preventDefault();
//   var form_data = $(this).serialize();
//   // validate
//   if ( validateForm($(this)).length ) {
//       return false
//   }
//   $.ajax({
//   type: 'POST',
//   url: '/wp-content/themes/vedanta-auto/send.php',
//   data: form_data,
//           success: function(data){
//               $('#overlay').addClass('show');
//               $('#popups').addClass('show');
//               $('#popup_request').addClass('show');
//               popupsSize($('#popup_request')[0]);
//               $('#form_leave_request_car').find("input[type=text], input[type=email], input[type=number], textarea").val("");
//               $('#popup_leave_request_car').removeClass('show');
//           },
//           error: function(data) {
//               console.error('Ошибка, что-то пошло не так...', data);
//           }
//   });
// });
// callback
// $("#form_leave_request").submit(function(e) {
//   e.preventDefault();
//   var form_data = $(this).serialize();
//   // validate
//   if ( validateForm($(this)).length ) {
//       return false
//   }
//   $.ajax({
//   type: 'POST',
//   url: '/wp-content/themes/vedanta-auto/send-callback.php',
//   // url: '/wp-content/themes/vedanta-auto/send-amocrm.php',
//   data: form_data,
//           success: function(data){
//               $('#overlay').addClass('show');
//               $('#popups').addClass('show');
//               $('#popup_request').addClass('show');
//               popupsSize($('#popup_request')[0]);
//               $('#form_leave_request').find("input[type=text], input[type=email], input[type=number], textarea").val("");
//               $('#popup_leave_request').removeClass('show');
//           },
//           error: function(data) {
//               console.error('Ошибка, что-то пошло не так...', data);
//           }
//   });
// });











// car request form mainpage
// $("#car_form_request_data").submit(function(e) {
//   e.preventDefault();
//   var form_data = $(this).serialize();
//   // validate
//   if ( validateForm($(this)).length ) {
//       return false
//   }
//   $.ajax({
//     type: 'POST',
//     url: '/wp-content/themes/vedanta-auto/send-car-request.php',
//     data: form_data,
//           success: function(data){
//               $('#overlay').addClass('show');
//               $('#popups').addClass('show');
//               $('#popup_request').addClass('show');
//               popupsSize($('#popup_request')[0]);
//               $('#car_form_request_data').find("input[type=text], input[type=email], input[type=number], textarea").val("");
//           },
//           error: function(data) {
//               console.error('Ошибка, что-то пошло не так...', data);
//           }
//   });
// });

$('#popups .close_button').on('click', function() {
  $('#popups .close_button').parent().removeClass('show').parent().removeClass('show');
  $('#overlay').removeClass('show');
})

$('#overlay').on('click', function() {
  $('#overlay').removeClass('show');
  $('#popups').removeClass('show').children().removeClass('show');
})

function popupsSize(popup) {
  $('#popups').css({
      top: 'calc( 50%' + ' - ' + popup.clientHeight / 2 + 'px )'
  });
}


function carSoldHandler() {
  var arr = document.querySelectorAll('.all-cars a.item');
  arr.forEach( function(el) {
    var carStatus = $(el).data('carsStatus');
    if (carStatus === 208) {
      $(el).find('.item_img_cont').addClass('sold');
    }
  })

  if ( $('#slider').data('carsStatus') === 208 ) {
    $('#slider').addClass('sold');
  }

}


// if cars have action price

function carsActionPriceHandler() {
  var carActionPrice = $('.cont#action_price').data('carsActionPrice');
  var oldPrice = $('.cont#action_price > h1 > span').text();
  var priceHTML = $('.cont#action_price > h1');
  priceHTML.find('span').remove();
  if (carActionPrice) {
    // head price
    var carName = priceHTML.text();
    var html = `${carName} <div><span>${oldPrice}</span> <span class="action">${carActionPrice}</span></div>`;
    priceHTML.html(html);
    // sidebar price
    $('.price.sea').html(`Цена: <span>${carActionPrice}</span>`);
  }
}














jQuery('body').on('click' , '#style-8 input' , function () {
jQuery(this).mask('+3 8(099) 999-99-99');
});

jQuery('#buy_btn_drive').click(function () {
  jQuery('#popup_leave_request_drive .markAutoDrive').val(jQuery('h1 > p').text().replace(/\s+/g, ' '));
});

  jQuery('.singleForm .markAutoDrive').val(jQuery('h1 > p').text().replace(/\s+/g, ' '));

jQuery('#buy_btn').click(function () {

  jQuery('#popup_leave_request_car .markAutoDrive').val(jQuery('h1 > p').text().replace(/\s+/g, ' '));
});

jQuery('.all_info #buy_btn').click(function () {
  jQuery('#popup_leave_request_car #style-9 input').val(jQuery('h1 > p').text().replace(/\s+/g, ' '));
});

jQuery('.all-cars .item .freeDriveAuto').click(function () {
  jQuery('#popup_freeDriveAuto .markAutoDrive').val(jQuery(this).parent().parent().children('.name').text().replace(/\s+/g, ' '));
});

jQuery('.all-cars .item .getAdviceAuto').click(function () {
  jQuery('#popup_getAdviceAuto .markAutoDrive').val(jQuery(this).parent().parent().children('.name').text().replace(/\s+/g, ' '));
});

let basConst;
jQuery('.vinCheck').keyup(function(){
  if(jQuery(this).val().length == 4){
    basConst = jQuery(this).val();
    jQuery('.all-cars .item').each(function () {
      if( jQuery(this).data('cars-vincode') == basConst){
        jQuery('.all-cars .item').css({'display':'none'});
        jQuery(this).css({'display':'flex'});
        if(jQuery(document).width() < 1000){
          jQuery('.filters').removeClass('open');
        }
      }
    });

  }else {
    jQuery('.all-cars .item').css({'display':'flex'});
  }
});






  jQuery('body').on('click','#calculator .mark div',function () {
    console.log('sdf');
  });
  jQuery('#calculator .mark div').bind('touchstart click', function () {
    console.log('sdf');jQuery('.modHide').css({'display':'none'});
  });
  // jQuery('#calculator .mark .select-items div').addEventListener('click',function () {
  //   jQuery('.modHide').css({'display':'none'});
  // })


function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}
let basValname;
let newId;
let arrNew=[];

jQuery('.carMarkBlock .select-items div').click(function(){

  if(jQuery('.carMarkBlock .select-selected').text() !='Все виды авто'){
jQuery('.carModelSelect').css({'display':'block'});
jQuery('.carModelSelect .select-items div').eq(0).click();
  arrNew=[];
    basValname = jQuery(this).text();

    jQuery('#car-mark option').each(function () {

      if(jQuery(this).text() == basValname){
        newId = jQuery(this).val();

        jQuery('.all-cars .item').each(function () {
          if(jQuery(this).data('carsMark') == newId){
            arrNew[arrNew.length] = jQuery(this).data('carsModelname');
          }
        })
      }
    });

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

arrNew = arrNew.filter( onlyUnique );
jQuery('.carModelSelect .select-items div').css({'display':'none'});

for (var j = 0; j < jQuery('.carModelSelect .select-items').find('div').length; j++) {
  for (var i = 0; i < arrNew.length; i++) {

    if( jQuery('.carModelSelect .select-items div').eq(j).text() == arrNew[i]  || jQuery('.carModelSelect .select-items div').eq(j).text() == 'Все модели авто'){
      jQuery('.carModelSelect .select-items div').eq(j).css({'display':'block'});
    }
  }
}

} else {
jQuery('.carModelSelect').css({'display':'none'});
jQuery('.carModelSelect .select-items div').eq(0).click();
}
});







jQuery(document).ready(function(){


  if(jQuery('body').hasClass('page-template-pagecategory')){

    // $('body').animate({ scrollTop: $('#cars-available').offset().top }, 1100);
    // $('#cars-available').scrollIntoView()
    $('html, body').animate({
          scrollTop: $("#cars-available").offset().top  // класс объекта к которому приезжаем
      }, 1000); // Скорость прокрутки
  }


 
	$('.wpcf7').on('wpcf7mailsent ', function(event){
		
		var data = {
			name:'',
			phone:'',
			email:'',
			formComment:''
		};
		var form= jQuery(this).find('.wpcf7-form');
		form.find('input, select, textarea').filter(':not([type="hidden"], [type="submit"])').each(function(){
			
			var el = jQuery(this);
			console.log(el);
			switch(el.attr('name')){
				case 'tel-452':
					case 'tel-your' :
						data.phone = el.val();
						break;
				case 'your-name':
					data.name = el.val();
					break;
				case 'email-182':
					data.email = el.val();
					break;
				case 'menu-230':
					data.formComment += 'Тип Авто: '+ el.val() + "\r\n";
					break;
				case 'mark-273':
					data.formComment +=' Марка машины: '+ el.val() +"\r\n";
					break;
				case 'menu-666':
					data.formComment += 'Диапазон Цен: ' + el.val()+ "\r\n";
					break;
				default:
					data.formComment += el.attr('placeholder') +': '+ el.val()+ "\r\n"; 
					break;
			}
		});
		
		data.formId = wpcf7.getId(form);
		
		jQuery.ajax({
			type: 'POST',
			url: '/wp-content/themes/vedanta-auto/php/sendFormToDb.php',
			data: data,
			success: function(data){console.log('success')},
			error: function(data) {
				console.error('Ошибка, что-то пошло не так...', data);
			}
		});
	})


  var fired = false;

  window.addEventListener('scroll', () => {
    if (fired === false) {
        fired = true;

        setTimeout(() => {

          jQuery('iframe#iframe_id').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1123.4077053050162!2d30.70118342295208!3d46.42447235748212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c6334489ceac29%3A0xca230a927f922e63!2sVedanta%20Auto!5e0!3m2!1sru!2sua!4v1572344819505!5m2!1sru!2sua');
            jQuery('iframe#iframe_id2').attr('src', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d686.7059739466534!2d30.7137011!3d46.4917994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c63127d728a57f%3A0x25d3efaf043c5c91!2sVedanta%20Auto!5e0!3m2!1sru!2sua!4v1592242602762!5m2!1sru!2sua');



        }, 1000)
    }
  });













});
