
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
  $.fn.sphpSimplePopup = function (content, options) {
    var opts = $.extend({}, $.fn.sphpSimplePopup.defaults, options);
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
  $.fn.sphpSimplePopup.defaults = {
    zIndex: 20000,
    delay: 500,
    show: 2000,
    content: 'This is the popper!'
  };
}(jQuery));

$(function () {
  var $form = $('#submit-form');
  //$submitter = $form.find('button[type=button]');
 $form.submit(function (e) {
    e.preventDefault();
    console.log("submiting: " + $form.id);
    $form.foundation('validateForm');
    $form.on("formvalid.zf.abide", function (ev, form) {
      //$form.find(":submit").prop('disabled', true);
      console.log("Form id " + form.attr('id') + " is valid");
      $.post($form.attr('action'), $form.serialize(), function (data) {
        console.table(data);
        console.log(data);
        if (data.submitted === true) {
          console.log('contact form submitted successfully');
          $form.trigger('reset');
          //grecaptcha.reset();
          $form.sphpSimplePopup({content: 'Thank you for contacting me'});
        } else if (data.submitted === false) {
          var $error = data.error;
          $form.sphpSimplePopup({content: 'Error:' + $error});
          //grecaptcha.reset();
        }
        //$form.find(":submit").prop('disabled', false);
        //alert(data);
        grecaptcha.reset();
      });
    });

    console.log("submitted: " + $form.id);
    //return false;
  });
  /*$(document)
          // field element is invalid
          .on("invalid.zf.abide", function (ev, elem) {
            //console.log("Field id " + elem.attr('name') + " is invalid");
          })
          // field element is valid
          .on("valid.zf.abide", function (ev, elem) {
            //console.log("Field name " + elem.attr('name') + " is valid");
          })
          // form validation failed
          .on("forminvalid.zf.abide", function (ev, frm) {
            //console.log("Form id " + frm.id + " is invalid");
            //$("[type=submit]", frm).prop('disable', true);
          })
          // form validation passed, form will submit if submit event not returned false
          .on("formvalid.zf.abide", function (ev, form) {
            // console.log("just checking that Form id " + form.id + " is valid");
            //console.log("enable submit");
            //form.find(":submit").prop('disabled', true);
            // ajax post form 
          });*/
});

(function (capV, $, undefined) {
  var $valid = false;
  capV.setValid = function (response) {
    console.log(response);
    console.log('set correctCaptcha valid');
    $valid = true;

  };
  capV.isValid = function () {
    return $valid;
  };
}(window.capV = window.capV || {}, jQuery));
var correctCaptcha = function (response) {
  //alert(response);
  capV.setValid(response);

};
