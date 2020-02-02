/**
 * handleForms (hF) here
 */
(function($) {
  var clonedSection = "";
  var hF = {
    init: function() {
      hF.setup();
    },

    setup: function() {
      hF.resetModal();
      hF.optionEvents();
      hF.choiceEvents();
      hF.ansEvents();
    },

    resetModal: function() {
      $(".modal").on("hidden.bs.modal", function() {
        $(".input-ele").each(function() {
          $(this).val("");
        });
        // do something…
      });
    },

    choiceEvents: function() {
      $("body").on("click", ".qus-choice", function(e) {
        e.preventDefault();
        let type = $(this).data("qus-type");
        console.log(type);
        switch (type) {
          case "user":
            hF.handleUserInput($(this));
            break;
          case "mcq":
            hF.handleMcqInput($(this));
            break;
          case "mcq-multi":
            hF.handleMcqInput($(this), "checkbox");
            break;
          case "yesno":
            hF.handleYesNoInput($(this));
            break;

          default:
            break;
        }
      });
    },
    handleYesNoInput: function(self) {
      let id = hF.getRandomId();

      let html =
        '<input type="radio" name="vehicle' +
        id +
        '" value="yes" class="qus-input" data-index="' +
        id +
        '">Yes<br/>';
      html +=
        '<input type="radio" name="vehicle' +
        id +
        '" value="no" class="qus-input" data-index="' +
        id +
        '">No<br/>';
      html +=
        '<input type="radio" name="vehicle' +
        id +
        '" value="not given" class="qus-input" data-index="' +
        id +
        '">Not Given<br/>';
      hF.setChoice(self, html);
    },
    handleUserInput: function(self) {
      let id = hF.getRandomId();
      let html =
        '<input  type="text" class="qus-input" data-index="' + id + '"  >';
      hF.setChoice(self, html);
    },

    handleMcqInput: function(self, type = "radio") {
      let html = "<p>";
      let id = hF.getRandomId();
      self
        .parents(".modal")
        .find("input[type=text]")
        .each(function(index) {
          let val = $(this).val();
          if (val)
            html +=
              '<input type="' +
              type +
              '" name="vehicle' +
              id +
              '" value="' +
              (index + 1) +
              '" class="qus-input" data-index="' +
              id +
              "-" +
              index +
              '">' +
              val +
              "<br/>";
        });
      html += "</p>";
      hF.setChoice(self, html);
      self.parents(".modal").modal("hide");
    },

    setChoice: function(self, html) {
      let section = self.parents(".sections-block").data("section-id");
      let editor_id = "test-form-editor-" + section;
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
      $(".mcq-add-more").click(function(e) {
        e.preventDefault();
        let id = Math.random();
        console.log("called");
        let row =
          '<tr> <td><input class="input-ele" type="text" name="option" data-id="' +
          id +
          '"></td><td>' +
          '<span class="dashicons dashicons-no"></span>' +
          "</td></tr>";
        console.log();
        $(this)
          .siblings(".options-table")
          .find("tr:last")
          .after(row);
      });

      // delete option
      $("body").on("click", ".dashicons-no", function() {
        $(this)
          .parents("tr")
          .remove();
      });
    },

    ansEvents: function() {
      $(".add-more-ans").click(function(e) {
        e.preventDefault();
        let ans_no = $(".ans-block")
          .last()
          .find("label")
          .text();
        ans_no = parseInt(ans_no) + 1;
        let html =
          '<div class="col-md-4 ans-block"><div class="row ">' +
          '<label for="" class="col-sm-2">' +
          ans_no +
          "</label>" +
          '<input type="text" name="ans[]" class="form-control col-sm-10">' +
          "</div></div>";
        $(".ans-block")
          .last()
          .after(html);
      });
    }
  };

  $(document).ready(function() {
    if ($(".ielts-test").length) {
      hF.init();
    }
  });
})(jQuery);
