/**
 * handleForms (hF) here
 */
(function($) {
  var clonedSection = "";
  var hF = {
    init: function() {
      hF.setup();
      hF.optionEvents();
      hF.choiceEvents();
    },

    setup: function() {},

    choiceEvents: function() {
      $("body").on("click", ".qus-choice", function(e) {
        e.preventDefault();
        let type = $(this).data("qus-type");
        switch (type) {
          case "user":
            hF.handleUserInput($(this));
            break;

          default:
            break;
        }
      });
    },

    handleUserInput: function(self) {
      let section = self.parents(".sections-block").data("section-id");
      let id = hF.getRandomId();
      let editor_id = "test-form-editor-" + section;
      let html =
        '<input type="text" class="qus-input" data-index="' + id + '"  >';
      tinymce.get(editor_id).insertContent(html);
    },

    getRandomId: function() {
      return btoa(Math.random()).substring(0, 12);
    },

    // addNewBlock: function() {
    //   clonedSection = $(".sections-block").clone();

    //   $("body").on("click", ".add-section", function(e) {
    //     e.preventDefault()
    //     console.log('clone')
    //     $(".sections-area .sections-block:last").after(clonedSection);
    //   });
    // },

    optionEvents: function() {
      // add more options
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

      // delete option
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
