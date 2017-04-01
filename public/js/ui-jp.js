+function ($) {

  $(function(){
      $("[ui-jq]").each(function(){
        var self = $(this);
        var options = self.attr('ui-config');
        var type = self.attr('ui-type');
        var config;
        if(type == 'chat'){
            config = eval('activity_chat.'+options);
        }else if(type == 'datatable'){
            config = eval('activity_datatable.'+options);
        }else {
            config = eval('activity_config.'+options);
        }
        uiLoad.load(jp_config[self.attr('ui-jq')]).then( function(){
            if(type == 'chat'){
                self[self.attr('ui-jq')].call(self, config.datas,config.row);
            }else if(type == 'datatable'){
                self[self.attr('ui-jq')].call(self, config.datas);
            }else{
                self[self.attr('ui-jq')].call(self, config);
            }
        });
      });

  });
}(jQuery);