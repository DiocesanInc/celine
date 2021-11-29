/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  window.onscroll = function () {
    stickyHeader();
  };
  let header = document.getElementById("masthead");
  let sticky = header.offsetTop;
  let hcl = header.classList;
  let onScrollBgColor = header.dataset.onScrollColor;
  function stickyHeader() {
    if (window.pageYOffset > sticky) {
      hcl.add("sticky", onScrollBgColor);
      hcl.remove("has-transparent-background-color");
    } else {
      hcl.remove("sticky", onScrollBgColor);
      hcl.add("has-transparent-background-color");
    }
  }
})();
