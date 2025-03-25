const lang = $('html').attr('lang');

var API = {
  getCurrentProducts: function(array){
    return new Promise(function(resolve, reject){
      const products = cartController.getCartItems();
      const cartItems = products.map((item) => item.id[lang]);
      const data = {
        action: 'get_cart_items',
        cartItems
      };

      $.ajax({
        type: "POST",
        url: '/wp-admin/admin-ajax.php',
        cache: false,
        dataType: 'json',
        data,
      }).done(function (response) {
        if (!response.status) {
          reject({
            title: response.error.title,
            text: response.error.message
          });
        }

        resolve(response.data);
      }).fail(function (err) {
        reject(err);
      });
    })
  },
  sendForm: function(){
    return new Promise(function(resolve, reject){
      const $cart = $('#popup-cart');
      const name = $cart.find('input[name=name]').val();
      const surname = $cart.find('input[name=surname]').val();
      const customer = surname + ' ' + name;
      const phone = $cart.find('input[name=phone]').val();
      const email = $cart.find('input[name=email]').val();
      const paymentType = $cart.find('input[name=payment-type]:checked').val();
      const deliveryType = $cart.find('input[name=delivery-type]:checked').val();
      const city = $cart.find('input[name=city]').val();
      const newPostOffice = $cart.find('input[name=new-post-office]').val();
      const deliveryAddress = $cart.find('textarea[name=delivery-address]').val();
      const deliveryLocalAddress = $cart.find('textarea[name=local-address]').val();
      const address = deliveryAddress ? deliveryAddress : deliveryLocalAddress;
      const comment = $cart.find('textarea[name=comment]').val();
      const cartItems = cartController.getCartItems();
      let products = [];

      if (cartItems.length > 0) {
        products = cartItems.map((item) => {
          return {
            id: item.id[lang],
            count: item.count
          };
        })
      }

      const data = {
        action: 'create_order',
        customer,
        phone,
        email,
        paymentType,
        deliveryType,
        city,
        newPostOffice,
        address,
        comment,
        products
      };

      $.ajax({
        type: "POST",
        url: '/wp-admin/admin-ajax.php',
        cache: false,
        dataType: 'json',
        data,
      }).done(function (response) {
        if (!response.status) {
          reject({
            title: response.error.title,
            text: response.error.message
          });
        } else {
          $(document).trigger('order_created', [getCartItems(products), response.data.orderId]);
          localStorage.setItem('products', JSON.stringify([]));
          UIController.setCartHeaderCount(0);

          resolve(response.data);
        }
      }).fail(function (err) {
        reject(err);
      });
    })
  }
}

const cartController = (function(){
  return {
    addProduct: function(product){
      var storageProducts = JSON.parse(localStorage.getItem('products'));
      var products = [];

      if(storageProducts && storageProducts.length > 0){
        products = storageProducts;
      }

      var index = products.findIndex(function(el){
        return el.id[lang] === product.id[lang];
      });

      if(index !== -1) {
        products[index].count = parseInt(products[index].count) + parseInt(product.count);
      } else {
        products.push(product);
      }

      localStorage.setItem('products', JSON.stringify(products));
    },
    deleteProduct:  function(id){
      if(!id) {
        return false;
      }

      var storageProducts = JSON.parse(localStorage.getItem('products'));
      var products = storageProducts.filter(product => product.id[lang] !== id );
      localStorage.setItem('products', JSON.stringify(products));
    },
    updateProduct: function(id, count){
      var products = JSON.parse(localStorage.getItem('products'));

      var index = products.findIndex(function(el){
        return el.id[lang] === id;
      });

      if(index !== -1) {
        products[index].count = parseInt(count);
        localStorage.setItem('products', JSON.stringify(products));
      }

    },
    clearCart: function(){

    },
    getCartItems: function(){
      return JSON.parse(localStorage.getItem('products')) || [];
    },
    getProductsCount: function(){
      var products = this.getCartItems();
      var totalCount = products.reduce(function(total, el){
        return parseInt(total) + parseInt(el.count);
      }, 0);
      return {
        count: parseInt(products.length),
        total: parseInt(totalCount),
      }
    }
  }
})();

const getCartItems = function (products) {
  return products.map(product => {
    const cartProduct = $('#cart-form').find(`.cart__product[data-id="${product.id}"]`);

    product.id = parseInt(product.id);
    product.sku = cartProduct.data('sku');
    product.title = cartProduct.find('.cart__product-name h4').text();
    product.price = cartProduct.find('.cart__product-price .value').text();
    product.price = parseInt(product.price.match(/\d+/)[0]);

    return product;
  })
}

const UIController = (function(){
  const DOMElements = {
    cart: '#cart-form',
    productList: '.cart__products',
    product: '.cart__product',
    addButton: '.btn-add-product-js',
    deleteButton: '.btn-remove-product-js',
    cartOpenBtn: '[data-popup-open="#popup-cart"]',
    countBtn: '.cart__product .quantity__btn',
    countInput: '.cart__product .quantity__input',
    cartHeaderCount: '.header .product-count-js'
  }

  const getProductTemplate = function(obj){
    if($.isEmptyObject(obj)){
      return '';
    }

    return '<div class="cart__product" data-id="'+ obj.id +'"  data-sku="'+ obj.sku +'">\n' +
        '    <div class="cart__product-image">\n' +
        '        <img src="'+ obj.img +'" alt="">\n' +
        '    </div>\n' +
        '    <div class="cart__product-content">\n' +
        '        <div class="cart__product-name">\n' +
        '            <h4>'+ obj.name +'</h4>\n' +
        '        </div>\n' +
        '        <div class="cart__product-quantity">\n' +
        '            <div class="quantity">\n' +
        '                <button class="quantity__btn quantity__btn--minus" type="button" data-type="minus"></button>\n' +
        '                <button class="quantity__btn quantity__btn--plus" type="button" data-type="plus"></button>\n' +
        '                <input class="quantity__input not-validate" type="text" value="'+ parseInt(obj.count) +'" name="count" min="1" max="999">\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="cart__product-price">\n' +
        '            <strong class="value">'+ obj.price +'</strong>\n' +
        '        </div>\n' +
        '        <div class="cart__product-action">\n' +
        '            <span class="btn-icon btn-remove-product-js">\n' +
        '                <svg class="icon">\n' +
        '                    <use xlink:href="/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-close"></use>\n' +
        '                </svg>\n' +
        '            </span>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '</div>';
  }

  const getEmptyTemplate = function(){
    return '<div class="cart__products-empty">\n' +
          '    <svg class="icon icon--extra-lg">\n' +
          '        <use xlink:href="/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-shopping-cart"></use>\n' +
          '    </svg>\n' +
          '    <p class="text">' + (lang === 'ru' ? 'Ваша корзина пуста' : 'Ваша корзина порожня') + '</p>\n' +
          '    <div class="popup__actions">\n' +
          '        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">' +
          '            ' + (lang === 'ru' ? 'Продолжить покупки' : 'Продовжити покупки') +
          '        </button>\n' +
          '    </div>\n' +
          '</div>';
  }

  return {
    getDOMElements: function () {
      return DOMElements;
    },
    getProduct: function(id){
      var product = $('.product[data-id-' + lang + '="'+ id[lang] +'"]');
      if(product.length <= 0) {
        return null
      } else {
        return {
          id: id,
          count: parseInt(product.find('input[name="count"]').val()),
          title: product.data('title'),
          sku: product.data('sku'),
          price: product.data('price'),
        }
      }

    },
    getProductDOM: function(id){
      var product = $(DOMElements.cart).find('.cart__product[data-id="'+ id +'"]');
      if(product.length <= 0) {
        return null;
      }
      return product;
    },
    deleteProduct: function(id){
      var product = this.getProductDOM(id);

      if(product.length <= 0) {
        return false;
      }
      product.remove();
    },
    renderEmptyCart: function (){
      var emptyCartTemplate = getEmptyTemplate();
      $(DOMElements.cart).find(DOMElements.productList).empty().append(emptyCartTemplate);
    },
    setCartHeaderCount: function(count){
      var value = count > 0 ? count : '';
      $(DOMElements.cartHeaderCount).html(value);
    },
    renderItems: function (items){
      var html = '';

      items.map(function(item){
        html+= getProductTemplate(item)
      });

      $(DOMElements.productList).empty().append(html);
      $(DOMElements.productList).find('.quantity input:not(.number)').inputNumber(function(value) {
        return /^\d*$/.test(value);
      });
    },
    setLoading: function(loading){
      setLoader($(DOMElements.cart).find(DOMElements.productList), loading);
    },
    disableCartForm: function(){
      $(DOMElements.cart).find('button[type="submit"]').addClass('btn--disabled').attr('disabled', 'disabled');
    },
    enableCartForm: function(){
      $(DOMElements.cart).find('button[type="submit"]').removeClass('btn--disabled').removeAttr('disabled');
    },
  }
})();

const controller = (function(cartCtrl, UICtrl){

  const setupHandlers = function(){
    var DOM = UICtrl.getDOMElements();

    $(document).on('click', DOM.addButton, ctrlAddToCart);
    $(document).on('click', DOM.deleteButton, ctrlDeleteProduct);
    $(document).on('click', DOM.cartOpenBtn, ctrlRenderCartItems);
    $(document).on('click', DOM.countBtn, ctrlUpdateProductCount);
    $(document).on('keyup', DOM.countInput, ctrlUpdateProductCount);
    $(window).on('load', ctrlOpenProductPage);
  }

  const ctrlRenderCartItems = function(){
    var products = cartCtrl.getCartItems();

    if(products.length > 0) {
      $(document).trigger('go2cart')
      UICtrl.setLoading(true);
      API.getCurrentProducts(products).then(function(resp){
        var currentItems;

        currentItems = products.map(function(item){
          var current = resp.find(function(el){
            return el.id === parseInt(item.id[lang])
          });
          return Object.assign(item, current);
        });

        UICtrl.setLoading(false);
        UICtrl.renderItems(currentItems);
        UICtrl.enableCartForm();
      }).catch(function (err){
        console.log('error', err)
        UICtrl.setLoading(false);
        UICtrl.renderEmptyCart();
        UICtrl.enableCartForm();
      });

    } else {
      UICtrl.renderEmptyCart();
      UICtrl.disableCartForm();
    }
  }

  const ctrlAddToCart = function(e){
    e.preventDefault();
    const id = {
      ru: $(e.target).closest('.product').attr('data-id-ru'),
      uk: $(e.target).closest('.product').attr('data-id-uk')
    };
    const product = UICtrl.getProduct(id);
    if(product) {
      cartCtrl.addProduct(product);
      $(document).trigger('add2cart', [product]);
      setHeaderCartCount();
    }
  }

  const ctrlOpenProductPage = function(){
    const id = {
      ru: $(document).find('.product').attr('data-id-ru'),
      uk: $(document).find('.product').attr('data-id-uk')
    };
    const product = UICtrl.getProduct(id);

    if(product) {
      $(document).trigger('view_product', [product]);
    }
  }

  const ctrlDeleteProduct = function(e){
    e.preventDefault();
    e.stopPropagation();

    const productID = $(e.target).closest('.cart__product').attr('data-id');
    if(productID) {
      // 1. delete the product from the data structure (store)
      cartCtrl.deleteProduct(productID);
      // 2. delete the product from the ui
      UICtrl.deleteProduct(productID);


      var productsCount = cartCtrl.getProductsCount();
      setHeaderCartCount();

      if(productsCount.count <= 0) {
        UICtrl.renderEmptyCart();
        UICtrl.disableCartForm();
      }
    }
  }

  const ctrlUpdateProductCount = function(e){
    e.preventDefault();
    const el = $(e.currentTarget);
    const productID = el.closest('.cart__product').attr('data-id');
    const product = UICtrl.getProductDOM(productID);
    const input = product.find('input[name="count"]');
    let value = +input.val();

    if (el.is('button')){
      const min = +input.attr('min');
      const max = +input.attr('max');
      const type = el.data('type');

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
    }
    // update product in local storage
    cartCtrl.updateProduct(productID, value);

    setHeaderCartCount();
  }

  var setHeaderCartCount = function(){
    var productsCount = cartCtrl.getProductsCount();
    UICtrl.setCartHeaderCount(productsCount.total);

  }
  return {
    init: function(){
      setupHandlers();
      setHeaderCartCount();
    }
  }
})(cartController, UIController);

controller.init();
