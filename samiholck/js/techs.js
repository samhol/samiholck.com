$(function () {
  //$('.sphp-tech-slick').children('svg').hide();


  $('#skill-info').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    adaptiveHeight: true,
    asNavFor: '#skill-icons'
  });

  var $slick = $('#skill-icons').slick({
    dots: true,
    infinite: true,
    speed: 5000,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '#skill-info',
    centerMode: true,
    focusOnSelect: true,
    centerPadding: '60px',
    //centerMode: true,
    //variableWidth: true,
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
          slidesToShow: 1,
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
  var $output = $("#explanation");
  $(".sphp-tech-slick .sphp-info-button").on("click", function () {
    var $this = $(this), $div,
            $obj = $this.attr("data-tech");
    $output.load("samiholck/templates/carousels/content/skills-parsed.php #" + $obj);
    $this.addClass('sphp-is-active');
    console.log('sphp-is-active : ' + $obj);
    $this.siblings().removeClass('sphp-is-active');
    //$div = $('#info-modal');
    //$div.centerTo($('body main'), true);
  });
});


$(window).bind("load", function () {
  "use strict";
  $('body').css('visibility', 'visible');
  console.table(["Audi", "Volvo", "Ford"]);
});
