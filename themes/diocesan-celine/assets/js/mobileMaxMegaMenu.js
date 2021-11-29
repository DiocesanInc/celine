jQuery(document).ready(function ($) {
  $(".mega-menu").on("after_mega_menu_init", function () {
    /**
     * Remove on click listener of a tags
     * so click on the link redirects to page
     * and click on arrow opens submenu
     */
    $(".main-navigation .mega-menu-wrap .mega-menu-item-has-children a").off(
      "click"
    );

    /**
     * hide mobile menu on click on search
     */
    $("li.mega-menu-item .header-search").on("click", function () {
      $(".mega-menu").data("maxmegamenu").hideMobileMenu();
    });
  });
});
