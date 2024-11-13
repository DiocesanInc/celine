jQuery(document).ready(function ($) {
  $(".color-selector > div").on("click", function () {
    let root = document.documentElement;
    let body = document.body;

    let primary, primary_2, scrollbarClr_2, secondary, tertiary, quaternary;

    if ($(this).hasClass("default-scheme")) {
      console.log("default");
      primary = $(this).data("clr-primary");
      primary_2 = "#" + LightenDarkenColor(primary, 20);
      secondary = $(this).data("clr-secondary");
      tertiary = $(this).data("clr-tertiary");
      quaternary = $(this).data("clr-quaternary");
      scrollbarClr_2 = primary_2;
    } else {
      console.log("custom");
      primary = $("input[name=clr-primary-custom]").val();
      primary_2 = LightenDarkenColor(primary, 20);
      secondary = $("input[name=clr-secondary-custom]").val();
      tertiary = $("input[name=clr-tertiary-custom]").val();
      quaternary = $("input[name=clr-quaternary-custom]").val();
      scrollbarClr_2 = primary_2;
    }

    root.style.setProperty("--clr-primary", primary);
    root.style.setProperty("--clr-primary-2", primary_2);
    root.style.setProperty("--scrollbar-color-2", scrollbarClr_2);
    root.style.setProperty("--clr-secondary", secondary);
    root.style.setProperty("--clr-tertiary", tertiary);
    root.style.setProperty("--clr-quaternary", quaternary);

    body.style.setProperty("--wp--preset--color--primary", primary);
    body.style.setProperty("--wp--preset--color--secondary", secondary);
    body.style.setProperty("--wp--preset--color--tertiary", tertiary);
    body.style.setProperty("--wp--preset--color--quaternary", quaternary);
  });
});

function LightenDarkenColor(col, amt) {
  var usePound = false;

  if (col[0] == "#") {
    col = col.slice(1);
    usePound = true;
  }

  var num = parseInt(col, 16);

  var r = (num >> 16) + amt;

  if (r > 255) r = 255;
  else if (r < 0) r = 0;

  var b = ((num >> 8) & 0x00ff) + amt;

  if (b > 255) b = 255;
  else if (b < 0) b = 0;

  var g = (num & 0x0000ff) + amt;

  if (g > 255) g = 255;
  else if (g < 0) g = 0;

  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16);
}
