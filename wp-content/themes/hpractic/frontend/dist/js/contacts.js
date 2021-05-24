const form = $('#contacts-form')

form.on('click', '.js-send-mail', function (e) {
  e.preventDefault()

  const data = {
    action: 'send_contact_form',
    name: form.find('input[name=name]').val(),
    phone: form.find('input[name=phone]').val(),
    email: form.find('input[name=email]').val(),
    comment: form.find('textarea[name=comment]').val()
  }

  $.ajax({
    type: "POST",
    url: '/wp-admin/admin-ajax.php',
    cache: false,
    dataType: 'json',
    data,
  }).done(function (response) {
    if (!response.status) {
      showPopup(
        '#popup-error',
        {
          title: response.error.title,
          message: response.error.message,
        },
        false
      );
      return;
    }

    $(document).trigger('contacts_sent_successfully', [response]);

    showPopup(
      '#popup-info',
      {
        title: response.data.title,
        message: response.data.message,
      },
      false
    );

    form.find('textarea[name=comment]').val('')
  }).fail(function (err) {
    console.log(err);
  });
})
