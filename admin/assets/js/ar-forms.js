/**
 * handleForms (hF) here
 */
(function($) {
  var hF = {
    init: function() {
      hF.setup();
    },

    setup: function() {}
  };

  $(document).ready(function() {
    if ($(".ielts-test").length) {
      hF.init();
    }
  });
})(jQuery);
