jQuery(document).ready(function($){
  const header = $('.header');
  const sectionSlider = $('.section__slider .slider');
  const countersDOM = $('.counter');
  const reviewsSliderDOM = $('.reviews-slider');
  const mobileGridSliderDOM = $('.grid-container--slider');
  const article = $(".article");
  const btnToTop = $(".btn-to-top");
  const btnMenu = $(".btn-menu");
  const mobileMenu = $('.menu-mobile');

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

    const reviewSlider = reviewsSliderDOM.slick({
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
        const index = parseInt($(this).attr('data-review-id'));
        reviewSlider.slick('slickGoTo', index);
    });

    function toggleActiveItem(index){
      $('.reviews__list li[data-review-id]').removeClass('active')
      $('.reviews__list li[data-review-id="'+ index +'"]').addClass('active')
    }
  }

  header.on('click', '.btn-menu', function(){
    if(!mobileMenu.hasClass('open')){
      openMobileMenu()
    } else {
      closeMobileMenu()
    }
  });

  header.on('click', '.btn-search', function(e){
    e.stopPropagation();
    $('.header__search .form').toggleClass('visible');
  });

  header.on('click', '.menu-mobile__content', function(e){
    e.stopPropagation();
  });

  $(document).on('click', function(e){
    const target = $(e.target);

    const isCloseSearch = !(target.closest('.header__search').length || target.hasClass('.btn-search'));

    const isCloseMenu =
      (!(target.hasClass('.btn-menu') || target.closest('.btn-menu').length) ||
      (target.hasClass('.btn-close') || target.closest('.btn-close').length)) &&
      !(target.hasClass('.menu-mobile__content') || target.closest('.menu-mobile__content').length)

    if(!!isCloseSearch) {
      e.stopPropagation();
      closeSearch();
    }

    if(!!isCloseMenu) {
      e.stopPropagation();
      closeMobileMenu();
    }

  });

  $(window).on('load resize', function() {
    const wWidth = $(window).width();

    if (wWidth > 1024) {
      closeMobileMenu();
      closeSearch();
    }

    if(wWidth < 699){
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

  function openMobileMenu(){
    btnMenu.addClass('active');
    header.addClass('active');
    mobileMenu.fadeIn(function(){
      $(this).addClass('open');
    });
    $(document.body).addClass('not-scrolling');
  }

  function closeMobileMenu(){
    btnMenu.removeClass('active');
    header.removeClass('active');
    mobileMenu.removeClass('open');
    setTimeout(function(){
      mobileMenu.fadeOut();
    }, 300);
    $(document.body).removeClass('not-scrolling');
  }

  function closeSearch() {
    $('.header__search .form').removeClass('visible');
  }

  $('.screen__tooltip').on('click', '.screen__tooltip-head', function (e){
    const tooltip = $(this).closest('.screen__tooltip');
    if(tooltip.length > 0) {
      tooltip.toggleClass('active');
    }
  });

  $('.questions__item').on('click', '.question', function (e){
    e.preventDefault();
    const quiestionItem = $(this).closest('.questions__item');

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

    const popupId = $(e.target).data('popup');
    let title = $(e.target).data('popup-title');
    title = title ? title : null
    showPopup(popupId, title)
  });

  mobileMenu.on('click', '.nav > ul > li', function(e){
    const target = $(e.target);
    const submenu = target.closest('li').find('.nav__sub');

    if(!target.is('a')) {
      e.preventDefault();
      const item =  submenu.closest('li');
      target.closest('.nav').find('li').not(item[0]).removeClass('visible-submenu');

      if(submenu.length > 0){
        if(!item.hasClass('visible-submenu')) {
          item.addClass('visible-submenu');
        } else {
          item.removeClass('visible-submenu');
        }
      }
    }
  });

  mobileMenu.on('click','.nav__sub', function(e){
    e.stopPropagation();
  })

  const phoneInputDOM = $('input[name="phone"]')
  initInputMask(phoneInputDOM);

  btnToTop.on('click', function(e) {
    e.preventDefault();
    scrollToAnchor(0)
  });

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
  const el = document.querySelector('.mfp-overlay');
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