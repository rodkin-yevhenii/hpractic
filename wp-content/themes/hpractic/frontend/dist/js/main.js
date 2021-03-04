jQuery(document).ready(function($){
  var header = $('.header');
  var sectionSlider = $('.section__slider .slider');
  var countersDOM = $('.counter');
  var reviewsSliderDOM = $('.reviews-slider');
  var mobileGridSliderDOM = $('.grid-container--slider');
  var article = $(".article");
  var btnToTop = $(".btn-to-top");

  if(article.length > 0) {
    article.fitVids();
  }

  if(countersDOM.length > 0) {
    initCounters(document.querySelectorAll('.counter'));
  }

  if(sectionSlider.length > 0) {
    sectionSlider.each(function (i, slider){

      const sliderDOM =  $(slider)
      const sliderDOMPrevBtn = sliderDOM.closest('.section').find('.btn-arrow--left');
      const sliderDOMNextBtn = sliderDOM.closest('.section').find('.btn-arrow--right');

      sliderDOMPrevBtn.on('click', function(){
        sliderDOM.slick('slickPrev');
      });

      sliderDOMNextBtn.on('click', function(){
        sliderDOM.slick('slickNext');
      });

      sliderDOM.slick({
        rows: 0,
        slidesToShow: 4,
        arrows: false,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        speed: 300,
        adaptiveHeight: false,
        autoplay: false,
        responsive: [
          {
            breakpoint: 1366,
            settings: {
              slidesToShow: 4
            }
          },
          {
            breakpoint: 1023,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 699,
            settings: {
              slidesToShow: 2
            }
          }
        ]
      });
    });
  }

  if(reviewsSliderDOM.length > 0) {

    reviewsSliderDOM.on('init', function(event, slick){
      toggleActiveItem(slick.currentSlide)
    });

    var reviewSlider = reviewsSliderDOM.slick({
      rows: 0,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      infinite: false,
      arrows: false,
      adaptiveHeight: false,
      autoplay: false,
      speed: 500,
      // fade: true,
      cssEase: 'linear',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            fade: false,
            arrows: false,
          }
        }
      ]
    });

    reviewsSliderDOM.on('beforeChange', function(event, slick, currentSlide, nextSlide){
      toggleActiveItem(nextSlide)
    });

    reviewsSliderDOM
      .closest('.reviews')
      .find('[data-review-id]')
      .on('click', function(e){
        e.preventDefault();
        var index = parseInt($(this).attr('data-review-id'));
        reviewSlider.slick('slickGoTo', index);
    });

    function toggleActiveItem(index){
      $('.reviews__list li[data-review-id]').removeClass('active')
      $('.reviews__list li[data-review-id="'+ index +'"]').addClass('active')
    }
  }

  header.on('click', '.btn-menu', function(){
    $('.menu-mobile').fadeIn(function(){
      $(this).addClass('open');
    });
    $(document.body).addClass('not-scrolling');
  });

  $('.menu-mobile').on('click', '.btn-close', function(e){
    e.preventDefault();
    e.stopPropagation();
    closeMobileMenu();
  });

  $(window).on('load resize', function() {
    var wWidth = $(window).width();

    if (wWidth > 991) {
      closeMobileMenu();
    }

    if(wWidth < 600){
      if(mobileGridSliderDOM.length && !mobileGridSliderDOM.hasClass('slick-initialized') ){
        mobileGridSliderDOM.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          rows: 0,
          autoplay: false,
          dots: false,
          draggable: true,
          infinite: true,
          touchThreshold: 100
        });
      }
    } else {
      destroySlider(mobileGridSliderDOM);
    }

  });

  $(window).on('scroll', function(e){
    if(window.scrollY > 0) {
      header.addClass('sticky');
    } else {
      header.removeClass('sticky');
    }

    if(window.scrollY > window.innerHeight) {
      btnToTop.addClass('visible');
    } else {
      btnToTop.removeClass('visible');
    }

  });


  function closeMobileMenu(){
    $('.menu-mobile').removeClass('open');
    setTimeout(function(){
      $('.menu-mobile').fadeOut();
    }, 300);
    $(document.body).removeClass('not-scrolling');
  }

  $('.screen__tooltip').on('click', '.screen__tooltip-head', function (e){
    var tooltip = $(this).closest('.screen__tooltip');
    if(tooltip.length > 0) {
      tooltip.toggleClass('active');
    }
  });

  $('.questions__item').on('click', '.question', function (e){
    e.preventDefault();
    var quiestionItem = $(this).closest('.questions__item');

    if(!quiestionItem.hasClass('opened')){
      quiestionItem.addClass('opened');
      quiestionItem.find('.question__answer').slideDown(function(){
      })
    } else {
      quiestionItem.removeClass('opened');
      quiestionItem.find('.question__answer').slideUp(function(){
      })
    }
  });

  $('[data-popup]').on('click', function (e) {
    e.preventDefault();

    var popupId = $(e.target).data('popup');
    var title = $(e.target).data('popup-title');
    title = title ? title : null
    showPopup(popupId, title)
  });

  $('.nav a').on('click', function(e) {
    var $this = $(this);
    var element = $($this.attr('href'));

    if(element.length > 0){
      var topOffset = element.offset().top - $('.header').height();
      var menu = $this.closest('.menu-mobile');
      if(menu.length) {
        if(menu.hasClass('open')){
          closeMobileMenu();
        }
        setTimeout(function(){
          scrollToAnchor(topOffset);
        },600);

      } else {
        scrollToAnchor(topOffset);
      }
      return false;
    } else {
      return false;
    }

  });

  var phoneInputDOM = $('input[name="phone"]')
  initInputMask(phoneInputDOM);

  btnToTop.on('click', function(e) {
    e.preventDefault();
    scrollToAnchor(0)
  });

  // var forms = $('.form form, .popup form')
  //
  // forms.each(function(i, form){
  //   $(form).validate({
  //     ignore: [],
  //     focusInvalid: false,
  //     rules: {
  //       "phone": {
  //         required: true,
  //         minlength: 16
  //       },
  //       "user-name": {
  //         required: true,
  //         minlength: 2,
  //         maxlength: 30
  //       },
  //       "email": {
  //         required: false,
  //         minlength: 6,
  //         email: true
  //       },
  //     },
  //     messages: {
  //       "phone": {
  //         required: "Заполните поле",
  //         minlength: "Мобильный слишком короткий",
  //       },
  //       "user-name": {
  //         required: 'Заполните поле',
  //         minlength: 'Слишком короткое имя, мин. 2 символа',
  //         maxlength: 'Слишкол длинное имя, макс. 30 символов'
  //       },
  //       "email": {
  //         required: "Заполните поле",
  //         minlength: "Слишком короткие email, мин. 6 символов",
  //         email: "Введенный email не корректный"
  //       },
  //     },
  //     submitHandler: function() {
  //
  //     }
  //   });
  // });

  var forms7El = $('.wpcf7');

  forms7El.on( 'wpcf7mailsent', function( event ) {
    showPopup('#popup-thank')
  }, false );

});

function callbackBeforeOpen(popup, id, title) {
  popup.st.mainClass = 'mfp-zoom-in';
  document.body.classList.add('fixed');

  if(title && title.length > 0){
    $(id +'.popup').find('.popup-title-js').text(title);
  }
}

function callbackOpen(e) {
  document.body.insertAdjacentHTML(
    'beforeend',
    '<div class="mfp-overlay"></div>'
  );
}

function callbackClose(e) {
  var el = document.querySelector('.mfp-overlay');
  document.body.removeChild(el)
  document.body.classList.remove('fixed');
}

function showPopup(id, title, disabledClose) {
  $.magnificPopup.open({
    items: {
      src: id
    },
    type: 'inline',
    removalDelay: 500,
    closeOnBgClick: !disabledClose && true,
    showCloseBtn: !disabledClose && true,
    enableEscapeKey: !disabledClose && true,
    midClick: !disabledClose && true,
    callbacks: {
      beforeOpen: function (){
        return callbackBeforeOpen(this, id, title)
      },
      open: callbackOpen,
      close: callbackClose,
    }
  });
}

function scrollToAnchor(offset){
  $('html, body').stop().animate({
    scrollTop: offset
  }, 1000, 'linear');
}

function initInputMask(inputPhone) {
  if (inputPhone.length) {

    $.each(inputPhone, function (index, input) {
      if (!$(input).inputmask("hasMaskedValue")) {
        $(input).inputmask(
          '+38 (999) 999-99-99',
          {placeholder: '_'}
        );
      }
    });


  } else {
    return false;
  }
}

function destroySlider(slider){
  if(slider.length && slider.hasClass('slick-initialized')) {
    slider.slick('unslick');
  }
}

function initCounters(items){

  if(!items.length > 0) {
    return false;
  }

  items.forEach(function(element){
    const value = element.dataset.count;
    let counter = new countUp.CountUp(element, value, {
      startVal: 0,
      duration: 2,
      useGrouping: false,
      separator: '',
      decimal: '.',
    });
    if (!counter.error) {
      counter.start();
    } else {
      console.error(counter.error);
    }
  })
}