/**
 * handleForms (hF) here
 */
(function($) {
  var hF = {
    init: function() {
      hF.setup();
      hF.mcqEvents();
    },

    setup: function() {},
    mcqEvents: function() {
      console.log("reached");
      $("#mcq-add-more").click(function(e) {
        e.preventDefault();
        let id = Math.random();
        let row =
          '<tr> <td><input type="text" name="option" data-id="' +
          id +
          '"></td><td><input type="radio" name="answer" id="" data-id="' +
          id +
          '"> </td> <td>' +
          '<span class="dashicons dashicons-no"></span>' +
          "</td></tr>";
        $(".options-table tr:last").after(row);
      });

      $("body").on("click", ".dashicons-no", function() {
        $(this)
          .parents("tr")
          .remove();
      });
    }
  };

  $(document).ready(function() {
    if ($(".ielts-test").length) {
      hF.init();
    }
  });
})(jQuery);
