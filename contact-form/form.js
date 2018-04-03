
(function ($) {
  'use strict';
  /**
   * The jQuery plugin namespace.
   * @external "jQuery.fn"
   * @see {@link http://learn.jquery.com/plugins/|jQuery Plugins}
   */
  /**
   * Loads the data from the server pointed on the data attribute 'data-sph-load' using 
   * jQuery's Ajax capabilities and places the returned HTML into the object.
   * 
   * @function external:"jQuery.fn".sphpAjaxPrepend
   * @returns  {jQuery.fn} object for method chaining
   */
  $.fn.sphpPopup = function (content, options) {
    var opts = $.extend({}, $.fn.sphpPopup.defaults, options);
    return this.each(function () {
      var $this = $(this), $o, $popper;
      $o = $.meta ? $.extend({}, opts, $this.data()) : opts;
      $popper = $('<div class="simple-popup">');
      console.log("initializing simple popup");
      $popper.html("<p>" + content + "</p>");
      //$this.append($popper);
      $popper.appendTo($this)
              .css({
                zIndex: $o.zIndex,
                //visibility: "visible"
              })
              .hide()
              .fadeIn($o.delay, "linear", function () {
                setTimeout(function () {
                  $popper.fadeOut($o.delay, "linear", function () {
                    $popper.remove();
                  });
                }, $o.show);
              });
    });
  };
  $.fn.sphpPopup.defaults = {
    zIndex: 20000,
    delay: 500,
    show: 2000,
    content: 'This is the popper!'
  };
}(jQuery));

(function (sphp, $, undefined) {
  var $cont = $('#form-container'), abideForm, $form;


  //$cont.foundation();
  loadForm = function () {
    console.log("Loading contact form....");
    $cont.load('http://www.samiholck.com/contact-form/form-html.php', function () {
      $form = $cont.find('form');
      abideForm = new Foundation.Abide($form);

      trapSubmit($form);
    });
  };
  loadCaptcha = function () {
    grecaptcha.render('example3', {
      'sitekey': 'your_site_key',
      'callback': verifyCallback,
      'theme': 'dark'
    });
  };

  function trapSubmit($form) {
    $form = $cont.find('form');
    $form.submit(function (e) {
      e.preventDefault();
      $form.foundation('validateForm');
      console.log('trapping contact form submission...');
      postData($form);
    });
  }
  function postData($form) {
    $.post($form.attr('action'), $form.serialize(), function (data) {
      console.log('posting contact form data to server...:');
      console.table(data);
      console.log(data);
      if (data.submitted === true) {
        console.log('contact form data submitted successfully');
        $form.trigger('reset');
        //grecaptcha.reset();
        $cont.sphpPopup('Thank you for contacting me');
      } else if (data.submitted === false) {
        errorHanding(data);
      }
      //$form.find(":submit").prop('disabled', false);
      //alert(data);
      grecaptcha.reset();
    });
  }
  function errorHanding($data) {
    var $message = 'Unspecified error';
    console.log('contact form submission failed');
    if ($data.error === 'CRSF') {
      console.log('Session expired');
      $message = 'Session expired';
    }
    if ($data.error === 'ROBOT') {
      console.log('reCAPTCHA failure');
      $message = 'Please Check reCAPTCHA';
    }
    $cont.sphpPopup($message);
  }
  sphp.initContactForm = function ($url) {
    console.log("Loading contact form....");
    $cont.load($url, function () {
      $form = $cont.find('form');
      abideForm = new Foundation.Abide($form);

      trapSubmit($form);
    });
  };
  sphp.initContactForm('http://www.samiholck.com/contact-form/form-html.php');
}(window.sphp = window.sphp || {}, jQuery));

