 $(function () {
    var $cont = $('#form-container');
      console.log("Loading....");
    $cont.load('http://www.samiholck.com/contact-form/form-html.php', function () {
      console.log("Load was performed.");
    });
    $cont.foundation();
  });
