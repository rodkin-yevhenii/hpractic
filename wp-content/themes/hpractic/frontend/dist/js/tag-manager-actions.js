const $ = jQuery

$(document).on('callback_sent_successfully', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'callback'
  })
})

$(document).on('contacts_sent_successfully', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'contact'
  })
})

$(document).on('view_product', function (event, product) {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({ ecommerce: null })
  window.dataLayer.push({
    'event': 'view_item',
    'ecommerce': {
      currency: "UAH",
      value: product.price,
      items: [
        {
          item_id: product.sku,
          item_name: product.title,
          price: product.price,
        },
      ],
    }
  })
})

$(document).on('add2cart', function (event, product) {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({ ecommerce: null })
  window.dataLayer.push({
    'event': 'add_to_cart',
    'ecommerce': {
      currency: "UAH",
      value: product.price * product.count,
      items: [
        {
          item_id: product.sku,
          item_name: product.title,
          price: product.price,
          quantity: product.count,
        },
      ],
    }
  })
})

$(document).on('go2cart', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'go2cart'
  })
})

$(document).on('order_created', function (event, cartItems, orderId) {
  console.log(cartItems, orderId)

  let totalPrice = 0;
  cartItems.forEach(cartItem => {
    totalPrice += cartItem.price * cartItem.count
  });

  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({ ecommerce: null })
  window.dataLayer.push({
    'event': 'purchase',
    'ecommerce': {
      'transaction_id': orderId,
      currency: "UAH",
      value: totalPrice,
      items: cartItems.map(cartItem => {
        return {
          item_id: cartItem.sku,
          item_name: cartItem.title,
          price: cartItem.price,
          quantity: cartItem.count,
        }
      })
    }
  })
})
