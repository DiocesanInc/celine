jQuery(document).ready(function ($) {
  const phone = 576;
  const tablet = 768;
  const laptop = 1024;
  const desktop = 1200;

  //   /** Hero Slider */
  $(".page-template-homepage .hero-slider").slick({
    autoplay: false,
    arrows: true,
    autoplaySpeed: 5000,
    cssEase: "linear",
    dots: true,
    arrows: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  /** Featured Content & News Slider */
  $(
    ".featured-content-container .featured-content-slider, .news-container .news-slider"
  ).slick({
    autoplay: false,
    arrows: true,
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });

  /** Get Pagination Style (arrows or dots) for Image Slider */
  const paginationStyle = $(".image-slider-container").attr(
    "data-pagination-style"
  );

  /** set on slick init listener for Image Slider */
  $(".image-slider-container").on("init", function () {
    addAOS();

    /** Set Classes and data-attributes for Slides on sliding image */
    $(".image-slider-container").on("afterChange", function () {
      toggleAOS();
      AOS.refreshHard();
    });
  });

  function toggleAOS() {
    removeAOS();
    addAOS();
  }

  const $imageSliderQuote = $(
    ".page-template-homepage .image-slider-container[data-isanimated=true] .slick-slide.slick-current .teaser-content-wrapper"
  );

  function addAOS() {
    $imageSliderQuote.attr("data-aos", "fade-right");
  }

  function removeAOS() {
    $imageSliderQuote.removeAttr("data-aos");
  }

  /** Init Image Slider */
  $(".image-slider-container").slick({
    autoplay: false,
    arrows: paginationStyle === "arrows" ? true : false,
    dots: paginationStyle === "dots" ? true : false,
    infinite: paginationStyle === "arrows" ? true : false,
    slidesToScroll: 1,
    slidesToShow: 1,
  });

  const $sliderArrows = $(
    ".featured-content-container[data-isanimated=true] .slick-arrow, .image-slider-container[data-isanimated=true] .slick-arrow, .news-container[data-isanimated=true] .slick-arrow"
  );
  $sliderArrows.attr("data-aos", "fade-down");

  /** Ministry Slider */
  $(".ministries-container .ministry-slider .ministry-group").slick({
    autoplay: false,
    arrows: true,
    dots: false,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    slide: ".ministry-wrapper",
    responsive: [
      {
        breakpoint: tablet,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: laptop,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: desktop,
        settings: {
          slidesToShow: 4,
        },
      },
    ],
  });
});
