var PRODUCTS__ARRAY = [
  {
    "id": '0',
    "name": "sint cupidatat duis",
    "img": "./img/product-polimer-5.png",
    "price": 'от 12 236 грн/шт'
  },
  {
    "id": '1',
    "name": "consectetur fugiat aliquip",
    "img": "./img/product-polimer-1.png",
    "price": 'от 12 236 грн/шт'
  },
  {
    "id": '2',
    "name": "irure ex culpa",
    "img": "./img/product-polimer-2.png",
    "price": 'от 12 236 грн/шт'
  },
  {
    "id": '3',
    "name": "ex enim in",
    "img": "./img/product-polimer-4.png",
    "price": 'от 12 236 грн/шт'
  },
  {
    "id": '4',
    "name": "cupidatat eiusmod mollit",
    "img": "./img/product-polimer-4.png",
    "price": 'от 12 236 грн/шт'
  },
  {
    "id": '5',
    "name": "officia mollit fugiat",
    "img": "./img/product-polimer-5.png",
    "price": 'от 12 236 грн/шт'
  },
  {
    "id": '6',
    "name": "deserunt dolor fugiat",
    "img": "./img/product-polimer-6.png",
    "price": '236 грн/шт'
  },
  {
    "id": '7',
    "name": "ut nisi dolore",
    "img": "./img/product-polimer-2.png",
    "price": 'от 236 грн/шт'
  },
  {
    "id": '8',
    "name": "enim laborum in",
    "img": "./img/product-polimer-8.png",
    "price": 'от 22 236 грн/шт'
  },
  {
    "id": '9',
    "name": "adipisicing enim magna",
    "img": "./img/product-polimer-1.png",
    "price": '1 236 грн/шт'
  }
];

var API = {
  getCurrentProducts: function(array){
    return new Promise(function(resolve, reject){
      const products = cartController.getCartItems();
      const cartItems = products.map((item) => item.id);
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
      }).fail(function () {

      });
    })
  },
  sendForm: function(){
    return new Promise(function(resolve, reject){
      setTimeout(function(){
        var random = Math.round(Math.random());
        console.log(random, random === 0);
        if(random === 0) {
          reject({
            title: 'Упс... Что-то пошло не так =(',
            text: 'Возникла ошибка, попробуйте формить заказ еще раз ...'
          });
        } else {
          resolve('666999');
        }
      }, 1200);
    })
  }
}

var cartController = (function(){
  return {
    addProduct: function(product){
      var storageProducts = JSON.parse(localStorage.getItem('products'));
      var products = [];

      if(storageProducts && storageProducts.length > 0){
        products = storageProducts;
      }

      var index = products.findIndex(function(el){
        return el.id === product.id;
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
      var products = storageProducts.filter(product => product.id !== id );
      localStorage.setItem('products', JSON.stringify(products));
    },
    updateProduct: function(id, count){
      var products = JSON.parse(localStorage.getItem('products'));

      var index = products.findIndex(function(el){
        return el.id === id;
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
        return total + el.count;
      }, 0);
      return {
        count: parseInt(products.length),
        total: parseInt(totalCount),
      }
    }
  }
})();

var UIController = (function(){
  var DOMElements = {
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

  var getProductTemplate = function(obj){
    if($.isEmptyObject(obj)){
      return '';
    }

    return '<div class="cart__product" data-id="'+ obj.id +'">\n' +
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
        '                    <use xlink:href="./img/icons-sprite.svg#icon-close"></use>\n' +
        '                </svg>\n' +
        '            </span>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '</div>';
  }

  var getEmptyTemplate = function(){
    return '<div class="cart__products-empty">\n' +
          '    <svg class="icon icon--extra-lg">\n' +
          '        <use xlink:href="./img/icons-sprite.svg#icon-shopping-cart"></use>\n' +
          '    </svg>\n' +
          '    <p class="text">Ваша корзина пустая</p>\n' +
          '    <div class="popup__actions">\n' +
          '        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">Продолжить покупки</button>\n' +
          '    </div>\n' +
          '</div>';
  }

  return {
    getDOMElements: function () {
      return DOMElements;
    },
    getProduct: function(id){
      var product = $('.product[data-id="'+ id +'"]');
      if(product.length <= 0) {
        return null
      } else {
        return {
          id: id,
          count: product.find('input[name="count"]').val()
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
      $(DOMElements.cartHeaderCount).text(value);
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

var controller = (function(cartCtrl, UICtrl){

  var setupHandlers = function(){
    var DOM = UICtrl.getDOMElements();

    $(document).on('click', DOM.addButton, ctrlAddToCart);
    $(document).on('click', DOM.deleteButton, ctrlDeleteProduct);
    $(document).on('click', DOM.cartOpenBtn, ctrlRenderCartItems);
    $(document).on('click', DOM.countBtn, ctrlUpdateProductCount);
    $(document).on('keyup', DOM.countInput, ctrlUpdateProductCount);
  }

  var ctrlRenderCartItems = function(){
    var products = cartCtrl.getCartItems();

    if(products.length > 0) {
      UICtrl.setLoading(true);
      API.getCurrentProducts(products).then(function(resp){
        var currentItems;

        currentItems = products.map(function(item){
          var current = resp.find(function(el){
            return el.id === parseInt(item.id)
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

  var ctrlAddToCart = function(e){
    e.preventDefault();
    var id = $(e.target).closest('.product').attr('data-id');
    var product = UICtrl.getProduct(id);
    if(product) {
      cartCtrl.addProduct(product);
      setHeaderCartCount();
    }
  }

  var ctrlDeleteProduct = function(e){
    e.preventDefault();
    e.stopPropagation();

    var productID = $(e.target).closest('.cart__product').attr('data-id');
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

  var ctrlUpdateProductCount = function(e){
    e.preventDefault();
    var el = $(e.currentTarget);
    var productID = el.closest('.cart__product').attr('data-id');
    var product = UICtrl.getProductDOM(productID);
    var input = product.find('input[name="count"]'),
      value = +input.val();

    if (el.is('button')){
      var min = +input.attr('min');
      var max = +input.attr('max');
      var type = el.data('type');

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
