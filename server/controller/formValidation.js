$(function(){

//========================
//LIMIT ENCEPAGEMNT TO 6

   $('select#encepagement').change(function(){
      selected = $('select#encepagement option:selected');
      self = $(this);
      $.each(selected,function(id,ele){
         if( $(this).val()==''){
            self.closest('.control-group').addClass('error');      
            $('<span/>',{
               id:'encepagement-blank-selected',
               class:'help-block',
               text:"Vous ne pouvez choisir un cepage vide."    
            }).appendTo('#control-group-encepagement > div.controls');
         }
      });
      if(selected.length >=7 ){
         self.closest('.control-group').addClass('error');      
      
         if($('#control-group-encepagement > div.controls > span').length<=1){    
            $('<span/>',{
               id:'encepagement',
               class:'help-block',
               text:"Vous ne pouvez choisir plus de 6 cépages."    
            }).appendTo('#control-group-encepagement > div.controls');
         }
      }
      else{
         $(this).closest('.control-group').removeClass('error');      
         $('span#encepagement').remove();
      }
      
   });

});

