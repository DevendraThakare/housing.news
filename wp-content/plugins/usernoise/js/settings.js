// Generated by CoffeeScript 1.6.3
(function() {
  jQuery(function($) {
    $("a#button").click(function() {
      setTimeout((function() {
        $("#usernoise__feedback_button_icon").chosen({
          template: function(text, templateData) {
            return "<i class='" + templateData.icon + "'></i>" + text;
          }
        });
      }), 300);
    });
  });

}).call(this);

/*
//@ sourceMappingURL=settings.map
*/
