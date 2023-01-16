jQuery(document).ready(function($){
  var cartForm = $('#cart-form form');
  var contactsForm = $('#contacts-form form');
  const radioElements = $('.form__radio input[type=radio]')

  cartForm.on('submit', function(e){
    e.preventDefault();
  });

  radioElements.on('change', function(e) {
    const input = $( this )
    const formItem = input.closest('.form__item')
    const collapsedItems = formItem.find('.js-radio-collapsed-item')
    collapsedItems.each((key, el) => {
      $(el).hide()
    })

    const collapsedItem = $('#' + input.val());

    if (collapsedItem) {
      collapsedItem.show()
    }
  })

  function handleCartFormSubmit(form){
    var formEl = $(form);
    setLoader(formEl, true);
    API.sendForm().then(function(resp){
      setLoader(formEl, false);
      showPopup('#popup-success', {
        message: resp.orderId,
      }, false);
    }).catch(function(err){
      setLoader(formEl, false);
      showPopup('#popup-error', {
        title: err.title,
        message: err.text,
      }, false);
    });
  }

  cartForm.validate({
    ignore: '.not-validate',
    focusInvalid: false,
    submitHandler: handleCartFormSubmit,
    invalidHandler: function(form, validator) {
    },
    highlight: function(element, errorClass, validClass) {

      if ($(element).is(":checkbox")){
        var agreementDOM = $(element).closest('.form__agreement');
        if(agreementDOM.length <= 0) {
          return false;
        }
        agreementDOM.addClass(errorClass).removeClass(validClass);
      }

      $(element).addClass(errorClass).removeClass(validClass);
      $(element).closest(".form__field")
        .addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      if ($(element).is(":checkbox")){
        var agreementDOM = $(element).closest('.form__agreement');
        if(agreementDOM.length <= 0) {
          return false;
        }
        agreementDOM.removeClass(errorClass).addClass(validClass);
      }
      $(element).removeClass(errorClass).addClass(validClass);
      $(element).closest(".form__field")
        .removeClass(errorClass);
    },
    rules: {
      "name": {
        required: true,
        minlength: 2,
        maxlength: 48,
      },
      "surname": {
        required: true,
        minlength: 2,
        maxlength: 48,
      },
      "email": {
        minlength: 6,
        email: true
      },
      "phone": {
        required: true,
        minlength: 18
      },
      "comment": {
        minlength: 6,
      },
      agreement: {
        required: true,
      }
    },
    messages: {
      "name": {
        required: "Заполните поле",
        minlength: "Слишком короткое имя",
        maxlength: "Слишком длинное имя, макс. 48 символов",
      },
      "surname": {
        required: "Заполните поле",
        minlength: "Слишком короткое имя",
        maxlength: "Слишком длинное имя, макс. 48 символов",
      },
      "phone": {
        required: "Заполните поле",
        minlength: "Мобильный телефон слишком короткий",
      },
      "email": {
        minlength: "Слишком короткие email, мин. 6 символов",
        email: "Введенный email не корректный"
      },
      "comment": {
        minlength: "Слишком короткое сообщение, мин. 5 символов",
      },
      agreement: 'Необходимо согласиться с политикой конфиденциальности'
    }
  });

  contactsForm.validate({
    ignore: '.not-validate',
    focusInvalid: false,
    invalidHandler: function(form, validator) {
    },
    highlight: function(element, errorClass, validClass) {
      $(element).addClass(errorClass).removeClass(validClass);
      $(element).closest(".form__field")
        .addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass(errorClass).addClass(validClass);
      $(element).closest(".form__field")
        .removeClass(errorClass);
    },
    rules: {
      "name": {
        required: true,
        minlength: 2,
        maxlength: 48,
      },
      "email": {
        minlength: 6,
        email: true
      },
      "phone": {
        required: true,
        minlength: 18
      },
      "comment": {
        minlength: 6,
      },
    },
    messages: {
      "name": {
        required: "Заполните поле",
        minlength: "Слишком короткое имя",
        maxlength: "Слишком длинное имя, макс. 48 символов",
      },
      "phone": {
        required: "Заполните поле",
        minlength: "Мобильный телефон слишком короткий",
      },
      "email": {
        minlength: "Слишком короткие email, мин. 6 символов",
        email: "Введенный email не корректный"
      },
      "comment": {
        minlength: "Слишком короткое сообщение, мин. 5 символов",
      }
    }
  });
});
