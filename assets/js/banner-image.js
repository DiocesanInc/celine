jQuery(document).ready(function ($) {
  // Uploading files
  var file_frame;

  jQuery.fn.upload_page_header_image = function (button) {
    var button_id = button.attr("id");
    var field_id = button_id.replace("_button", "");

    // If the media frame already exists, reopen it.
    if (file_frame) {
      file_frame.open();
      return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery(this).data("uploader_title"),
      button: {
        text: jQuery(this).data("uploader_button_text"),
      },
      multiple: false,
    });

    // When an image is selected, run a callback.
    file_frame.on("select", function () {
      var attachment = file_frame.state().get("selection").first().toJSON();
      jQuery("#" + field_id).val(attachment.id);
      jQuery("#page_headerimagediv img").attr("src", attachment.url);
      jQuery("#page_headerimagediv img").show();
      jQuery("#" + button_id).attr("id", "remove_page_header_image_button");
      jQuery("#remove_page_header_image_button").text(
        "Remove Page Header image"
      );
    });

    // Finally, open the modal
    file_frame.open();
  };

  jQuery("#page_headerimagediv").on(
    "click",
    "#upload_page_header_image_button",
    function (event) {
      event.preventDefault();
      jQuery.fn.upload_page_header_image(jQuery(this));
    }
  );

  jQuery("#page_headerimagediv").on(
    "click",
    "#remove_page_header_image_button",
    function (event) {
      event.preventDefault();
      jQuery("#upload_page_header_image").val("");
      jQuery("#page_headerimagediv img").attr("src", "");
      jQuery("#page_headerimagediv img").hide();
      jQuery(this).attr("id", "upload_page_header_image_button");
      jQuery("#upload_page_header_image_button").text("Set Page Header image");
    }
  );
});
