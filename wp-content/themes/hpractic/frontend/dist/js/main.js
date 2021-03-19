jQuery(document).ready(function($){
  const header = $('.header');
  const sectionSlider = $('.section__slider .slider');
  const countersDOM = $('.counter');
  const mobileGridSliderDOM = $('.grid-container--slider');
  const article = $(".article");
  const btnToTop = $(".btn-to-top");
  const btnMenu = $(".btn-menu");
  const mobileMenu = $('.menu-mobile');
  const productTabs = $('.product .tabs');
  const adminBar = $('#wpadminbar');

  const productPreview = $('.product__preview');

  const prevBtnTemplate = `<span class="btn btn--secondary btn--square btn-arrow btn-arrow--left">
                          <svg class="icon">
                              <use xlink:href="/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-arrow-left"></use>
                          </svg>
                      </span>`;
  const nextBtnTemplate = `<span class="btn btn--secondary btn--square btn-arrow btn-arrow--right">
                          <svg class="icon">
                              <use xlink:href="/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-arrow-right"></use>
                          </svg>
                      </span>`;

  if(sectionSlider.length > 0) {
    sectionSlider.each(function (i, slider){

      const sliderDOM =  $(slider);
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
        speed: 200,
        adaptiveHeight: false,
        autoplay: false,
        cssEase: 'linear',
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
              slidesToShow: 2,
              swipeToSlide: true,
            }
          }
        ]
      });
    });
  }

  if(productPreview.length > 0) {

    const productMainSliderDOM = productPreview.find('.product__preview-top .slider');
    const productThumbsSliderDOM = productPreview.find('.product__preview-thumbs .slider');

    const sliderPreviewDOMPrevBtn = productMainSliderDOM.closest('.product__preview').find('.btn-arrow--left');
    const sliderPreviewDOMNextBtn = productMainSliderDOM.closest('.product__preview').find('.btn-arrow--right');

    sliderPreviewDOMPrevBtn.on('click', function(){
      productThumbsSliderDOM.slick('slickPrev');
    });

    sliderPreviewDOMNextBtn.on('click', function(){
      productThumbsSliderDOM.slick('slickNext');
    });

    const reviewSlider = productMainSliderDOM.slick({
      rows: 0,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      infinite: false,
      arrows: false,
      adaptiveHeight: false,
      autoplay: false,
      speed: 300,
      fade: true,
      cssEase: 'linear',
      asNavFor: productThumbsSliderDOM,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            fade: false,
            swipeToSlide: true,
            arrows: true,
            prevArrow: prevBtnTemplate,
            nextArrow: nextBtnTemplate,
          }
        }
      ]
    });

    const productThumbsSlider = productThumbsSliderDOM.slick({
      rows: 0,
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      infinite: false,
      arrows: false,
      adaptiveHeight: false,
      autoplay: false,
      speed: 300,
      cssEase: 'linear',
      asNavFor: productMainSliderDOM,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1023,
          settings: {
            fade: false,
            arrows: false,
          }
        }
      ]
    });
  }

  if(article.length > 0) {
    article.fitVids();
  }

  if(countersDOM.length > 0) {
    initCounters(document.querySelectorAll('.counter'));
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

  initQuantity();

  initTabs(productTabs);

  if (adminBar.length) {
    $('header.header').css('top', adminBar.height());
  }
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

  if(!(items.length > 0)) {
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

function initQuantity(){
  const quantity = $('.quantity');

  if(quantity.length > 0) {
    quantity.on('click', 'button' ,function(e) {
      e.preventDefault();
      let input = $(this).closest('div').find('input[name="number"]'),
        value = +input.val();
      const min = +input.attr('min');
      const max = +input.attr('max');
      const type = $(this).data('type');

      if (type === 'minus'){
        if (value > min ) {
          value = value - 1;
        } else {
          value = min;
        }

      } else {
        if (value < max) {
          value = value + 1;
        } else {
          value = max;
        }
      }

      input.val(value);
    });
  }

  quantity.on('change', 'input', function(e){
    const input = $(e.currentTarget);
    const min = +input.attr('min');
    const max = +input.attr('max');

    if(input.val() > max){
      input.val(max);
    }

    if(input.val() < min){
      input.val(min);
    }
  });

}

function initTabs(tabs, index = 0){
  if(!(tabs.length > 0)) {
    return false;
  }

  toggleTab(tabs, index);

  tabs.on('click', '.tabs__nav-item', function(e){
    e.preventDefault();
    const currentTab = $(e.currentTarget);
    if(!currentTab.hasClass('active')) {
      const currentTabName = currentTab.attr('data-tab');
      const index = tabs.find('.tabs__items-tab[data-tab="' + currentTabName + '"]').index();
      toggleTab(tabs, index);
    }
  });

  function toggleTab(tabs, index){
    const tabsNav = tabs.find('.tabs__nav-item');
    const currentTab = $(tabsNav.get(index)).attr('data-tab');
    tabsNav.removeClass('active');
    console.log('currentTab', currentTab);

    tabs.find('.tabs__items-tab').fadeOut(function (){
      tabs.find('.tabs__nav-item[data-tab="' + currentTab + '"]').addClass('active');
      tabs.find('.tabs__items-tab[data-tab="' + currentTab + '"]').fadeIn();
    });
  }
}
