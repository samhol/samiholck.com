$(function () {
  var $cont = $('#form-container'), abideForm;


  //$cont.foundation();
  loadAbide = function () {
    console.log("Loading....");
    $cont.load('http://www.samiholck.com/contact-form/form-html.php', function () {
      abideForm = new Foundation.Abide($cont.find('form'));

    });
  };
  loadCaptcha = function () {
    grecaptcha.render('example3', {
      'sitekey': 'your_site_key',
      'callback': verifyCallback,
      'theme': 'dark'
    });
  };
  loadAbide();
});
