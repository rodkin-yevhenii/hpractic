jQuery(document).ready(function($){

  $('#cart-form form').validate({
    ignore: [],
    focusInvalid: false,
    invalidHandler: function(form, validator) {

      // if (!validator.numberOfInvalids()) {
      //   return;
      // }

      // $('html, body').animate({
      //   scrollTop: $(validator.errorList[0].element).offset().top - 60
      // }, 1000);

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
        email: true
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
        comment: "Введенный email не корректный"
      }
    }
  });
  $('#contacts-form form').validate({
    ignore: [],
    focusInvalid: false,
    invalidHandler: function(form, validator) {

      // if (!validator.numberOfInvalids()) {
      //   return;
      // }

      // $('html, body').animate({
      //   scrollTop: $(validator.errorList[0].element).offset().top - 60
      // }, 1000);

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
        email: true
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
        comment: "Введенный email не корректный"
      }
    }
  });
});
