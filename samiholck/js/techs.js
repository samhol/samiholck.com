$(function () {
  //$('.sphp-tech-slick').children('svg').hide();

  $('.sphp-tech-slick').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    //autoplay: true,
    //autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          dots: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          dots: false,
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  var $output = $("#ooo");
  $(".sphp-tech-slick .sphp-info-button svg").on("click", function () {
    var $this = $(this),
            $obj = $this.attr("data-tech");
    $output.load("samiholck/snippets/techs.php #" + $obj);
    $this.addClass('sphp-is-active');
    console.log('sphp-is-active : ' + $obj);
    $this.siblings().removeClass('sphp-is-active');
  });
});


