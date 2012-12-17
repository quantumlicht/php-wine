$(function(){

//========================
//LIMIT ENCEPAGEMNT TO 6
   $('#control-group-encepagement').mouseover(function(){     
      self = $(this);
      if($('#cepagecontainer > div').length==0){
       $('#control-group-encepagement').addClass('error');
      }

      if($('#cepagecontainer > div').length>=7 ){
         self.closest('.control-group').addClass('error');      
      
         if($('span#encepagement-error').length<=1){    
            $('<span/>',{
               id:'encepagement-error',
               class:'help-block',
               text:"Vous ne pouvez choisir plus de 6 cépages."    
            }).appendTo('span.help-block');
         }
      }
      else{
         self.closest('.control-group').removeClass('error');      
         $('span#encepagement-error').remove();
      }
      
   });

});

