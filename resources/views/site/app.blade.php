<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') - {{ config('app.name') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css ') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('site/css/slick.css ') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('site/css/slick-theme.css ') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('site/css/select2.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('site/css/style.css ') }}">
  <style type="text/css">
    .map-top{
      margin-top: 50px;
    }
  </style>
  @yield('styles')
  @stack('styles')
</head>
<body>
	@include('site.partials.header')
	@yield('content')
	@include('site.partials.footer')
<script src="{{ asset('site/js/jquery.min.js')}}"></script>
@stack('scripts')
<script src="{{ asset('site/js/popper.min.js')}}"></script>
<script src="{{ asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('site/js/select2.min.js')}}"></script>
<script src="{{ asset('site/js/jquery-equal-height.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('site/js/slick.min.js')}}"></script>


<script type="text/javascript">

// $('.home-directory--slider').on('afterChange', function(event, slick, currentSlide) {
//   if (slick.$slides.length+1 == currentSlide) {
//     alert();
//   }
// });
$('.home-directory--slider').on('beforeChange', function(event, slick, currentSlide) {
  console.log('test1'+currentSlide);
  if (currentSlide == 0) {
    $('.directory-bar').addClass('active');
  }
});

$('.home-directory--slider').on('afterChange', function(event, slick, currentSlide) {
  console.log('test2'+currentSlide);
  if (currentSlide == 0) {
    $('.directory-bar').removeClass('active');
  }
});

// var slideIndex = 1;
// var translateX = -177.264;
// var translateY = 0;
// var translateZ = -511.273;
// var rotate = -100.003;

// $(document).on('click', '.slick-arrow.right-arrow', function(){
//   slideIndex--;
//   translateX--;
//   translateY--;
//   translateZ--;
//   rotate--;
//   $('.directory-bar').css("transform","translate3d("+ translateX +"px, 0px, "+ translateZ +"px) rotateY("+ rotate +"deg)");
//   //$('.directory-bar').css({'transform':'translate3d(-50px, 0px, -511.273px) rotateY(-100.003deg)'});
// });

// $(document).on('click', '.slick-arrow.left-arrow', function(){
//   slideIndex++;
//   $('.directory-bar').css({'opacity':slideIndex});
//   //$('.directory-bar').css({'transform':'translate3d(-177.264px, 0px, -511.273px) rotateY(-100.003deg)'});
// });

// $(document).on('click', '.slick-arrow.left-arrow.slick-disabled', function(){
//   return false;
//   //$('.directory-bar').css({'transform':'translate3d(-177.264px, 0px, -511.273px) rotateY(-100.003deg)'});
// });


// $('.home-directory--slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
//   $(".slick-slide").removeClass('works');
//   $('.slick-current').addClass('works');
// });

//community slider
$('.community-list').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 481,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});

//business slider
$('.business-list').slick({
  dots: true,
  //infinite: false,
  speed: 300,
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 481,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});


$('.home-banner--slider').slick({
  dots: false,
  arrows: false,
  infinite: false,
  speed: 600,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  cssEase: 'linear',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 481,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});

$('.home-about--slider').slick({
  dots: false,
  arrows: false,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 481,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});

$('.home-directory--slider').slick({
  dots: false,
  arrows: true,
  infinite: false,
  speed: 600,
  variableWidth: true,
  slidesToScroll: 1,
  cssEase: 'linear',
  prevArrow: $('.left-arrow'),
  nextArrow: $('.right-arrow'),
});

$('.event-block:first').addClass('active');
$('.event-block').hover(function(){
    if($(this).hasClass('active')){
        //$(this).removeClass('active');
    }else{
        $('.event-block.active').removeClass('active');
        $(this).addClass('active');
    }
    //$(this).next().slideToggle();
    //$('.site_accordian_details').not($(this).next()).slideUp();
});

// counter
// var a = 0;
// $(window).scroll(function() {

//   var oTop = $('.counter-list').offset().top - window.innerHeight;
//   if (a == 0 && $(window).scrollTop() > oTop) {
//     $('.counter-list li figure').each(function() {
//       var $this = $(this),
//         countTo = $this.attr('data-count');
//       $({
//         countNum: $this.text()
//       }).animate({
//           countNum: countTo
//         },

//         {

//           duration: 1000,
//           easing: 'swing',
//           step: function() {
//             $this.text(Math.floor(this.countNum));
//           },
//           complete: function() {
//             $this.text(this.countNum);
//             //alert('finished');
//           }

//         });
//     });
//     a = 1;
//   }

// });



$(document).ready(function(){
	$('.ham').click(function(e){
		e.stopPropagation();
		$('.navigation').toggleClass('slide');
	});

	$(document).click(function(){
		$('.navigation').removeClass('slide');
	});

	$('.navigation').click(function(e){
		e.stopPropagation();
	});
  $('.filter_btn').click(function(e){
    e.stopPropagation();
  $('.filter_wrap').slideToggle();
  $('.page-search-block').toggleClass('filter-open');
});
  $('.filter_wrap').click(function(e){
    e.stopPropagation();
  });

  $(document).click(function(){
    $('.filter_wrap').slideUp();
  $('.page-search-block').removeClass('filter-open');
  });

});


    $('.filter_select').select2({
        width:"100%",
    });
    $(document).on('.filter_selectWrap select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $(".questionSetItemButton").click(function(){
        $(this).parents(".questionSetItem").hide();
        $(this).parents(".questionSetItem").next().show();
    });

    $(".questionSetItemButtonPrev").click(function(){
        $(this).parents(".questionSetItem").hide();
        $(this).parents(".questionSetItem").prev().show();
    });

    $("#questionModal").modal({
        show:false,
        backdrop:'static'
    });

    $(".openAlertModal").click(function(){
        $("#questionModal").addClass("questionModalHide");
    })
    $(".closeAlertThis, .leaveBtn, .stayBtn").click(function(){
        $("#questionModal").removeClass("questionModalHide");
    })

    $(".seeMore").click(function(){
      $(".quotesService_bottom").slideToggle();
      var text = 'See Less';
      var $this = $('.seeMore');
      if ($this.text() === text) {
        $(this).text('See More');
      } else {
        $this.text(text);
      }
    });

    $('#activate').click(function () { 
    var text = 'Activate';
    // save $(this) so jQuery doesn't have to execute again
    var $this = $('#activate');
    if ($this.text() === text) {
        $(this).text('Deactivate').toggleClass("label-warning label-danger");
    } else {
        $this.text(text).toggleClass("label-danger label-warning");;
    }
});

    $(window).on('load', function(event) {
        $('.jQueryEqualHeight').jQueryEqualHeight('.quotes__card');
        $('.jQueryEqualHeight').jQueryEqualHeight('.card-title');
    });

</script>



</body>
</html>
