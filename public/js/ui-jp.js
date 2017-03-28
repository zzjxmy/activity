+function ($) {

  $(function(){
      $("[ui-jq]").each(function(){
        var self = $(this);
        var options = self.attr('ui-config');
        var config = eval('activity_config.'+options);
        uiLoad.load(jp_config[self.attr('ui-jq')]).then( function(){
           self[self.attr('ui-jq')].call(self, config);
        });
      });

  });
}(jQuery);