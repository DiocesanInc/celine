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
  if (document.body.classList.contains("page-template-page-no-header")) {
    const content = document.getElementById("primary");
    if (content) {
      const updateHeaderSpacing = function () {
        content.style.setProperty("--masthead-height", header.getBoundingClientRect().height + "px");
      };
      updateHeaderSpacing();
      if ("ResizeObserver" in window) {
        const headerObserver = new ResizeObserver(updateHeaderSpacing);
        headerObserver.observe(header);
      } else {
        window.addEventListener("resize", updateHeaderSpacing);
        window.addEventListener("load", updateHeaderSpacing);
      }
    }
  }
  function stickyHeader() {
    if (hcl.contains("always-sticky") || window.pageYOffset > sticky) {
      hcl.add("sticky");
    } else {
      hcl.remove("sticky");
    }
  }
})();
