const $ = jQuery
const $worksContainer = $('.js-works-container')
const $loadMore = $('.js-load-more')
let $ajaxIsActive = false

$(document).on('click', '.js-load-more', function () {
  if ($ajaxIsActive) {
    return
  }

  $.ajax({
    type: 'POST',
    dataType: 'json',
    async: true,
    url: '/wp-admin/admin-ajax.php',
    beforeSend: function () {
      $ajaxIsActive = true
    },
    data: {
      action: 'get_our_works',
      posts_per_page: $worksContainer.data('posts_per_page'),
      page: $worksContainer.data('page'),
      nonce: $worksContainer.data('nonce')
    },
    complete: function (response) {
      $ajaxIsActive = false

      if (!response.status) {
        console.error('Error of changing game starts counter')
        return
      }

      $worksContainer.data('page', response.responseJSON.page)
      $worksContainer.append(response.responseJSON.html)

      if (response.responseJSON.isLastPage) {
        $loadMore.hide(500)
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $ajaxIsActive = false
      console.error('Ajax request failed', jqXHR, textStatus, errorThrown)
    }
  })
})
