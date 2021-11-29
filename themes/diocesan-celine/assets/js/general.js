jQuery(document).ready(($) => {
  // style input fields on forms
  $(".gform_body input, .gform_body textarea").addClass("font-main");

  // style submit button on forms
  $('.gform_footer input[type="submit"]').addClass("button-primary");
});

jQuery(document).ready(function ($) {
  document.addEventListener("click", function (e) {
    if (
      e.target.matches(".ministry-wrapper.slick-active") ||
      e.target.matches(".staff-single button")
    ) {
      document.querySelector(".lightbox").classList.add("open");
      document.querySelector(".lightbox-overlay").style.display = "block";

      $("html, body").toggleClass("no-scroll");
      let title = e.target.dataset.title;
      let excerpt = e.target.dataset.excerpt;
      let image = e.target.dataset.image;
      let link = e.target.dataset.link;

      document
        .querySelector(".lightbox")
        .querySelector(".lightbox-title").innerHTML = title;
      document
        .querySelector(".lightbox")
        .querySelector(".lightbox-excerpt").innerHTML = excerpt;
      document
        .querySelector(".lightbox")
        .querySelector(".lightbox-image").style.backgroundImage =
        "url(" + image + ")";
      document
        .querySelector(".lightbox")
        .querySelector(".lightbox-link").innerHTML =
        "<a class='read-more-link has-underline-hover has-primary-color-after' href=" +
        link +
        " title='read more'>Learn more ></a>";
      return;
    }
    if (
      e.target.matches(".lightbox-overlay") ||
      e.target.matches(".lightbox-close")
    ) {
      $(".lightbox").removeClass("open");
      $("html, body").toggleClass("no-scroll");
      document.querySelector(".lightbox-overlay").style.display = "none";

      return;
    }
  });
});
