const $ = jQuery

$(document).on('callback_sent_successfully', function () {
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
    'event': 'callback'
  })
})

$(document).on('contact_sent_successfully', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'contact'
  })
})

$(document).on('add2cart', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'add2cart'
  })
})

$(document).on('go2cart', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'go2cart'
  })
})

$(document).on('order_created', function () {
  window.dataLayer = window.dataLayer || []
  window.dataLayer.push({
    'event': 'order'
  })
})
