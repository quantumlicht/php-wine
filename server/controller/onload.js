$(function(){
   $("button#load-ajax").click(function(){
      $.ajaxSetup({
         async:false}
        );
     var objAjaxResponse =  $.getJSON("http://philippeguay.com/indexvins.php",{id: $(this).val(), ajax: 'true'});
     var jsonCouleur = $.parseJSON(objAjaxResponse.responseText);
     var options = '';
     for (var i = 0; i < jsonCouleur.length; i++) {
        options += '<option value="' + jsonCouleur[i].id + '">' + jsonCouleur[i].couleur + '</option>';
     }
     $("select#couleur").html(options);
     
     if($(this).val()==2){
        $('#tanin-group').hide();
        $('#tanin').attr('disabled','');
     }
     else{
        $('#tanin').removeAttr('disabled');
        $('#tanin-group').show();
     }
   });

   $('.btn#load-ajax').each(function(){
      $(this).click(function(){
         $('input[name=couleur]').val( $(this).val() );
      });
   });

   $('form#index-vins div#section-row').eq(2).mouseover(function(){
      inputs =  $('form#index-vins div#section-row:nth-child(2) :input:not(input[type=textarea])');

      $('form#index-vins div.control-group').click(function(){
         $(this).removeClass('error');
      });

      $.each(inputs,function(){
         if( $(this).val()==''){// || $(this).val()== null) ){
            $(this).closest('.control-group').addClass('error');
         }
      });
        
      if($('.error').length!=0){
         $(' form#index-vins button[type=submit]').addClass('disabled');  
         $(' form#index-vins button[type=submit]').attr('disabled','');  
      }
      else{
         $(' form#index-vins button[type=submit]').removeClass('disabled');   
         $(' form#index-vins button[type=submit]').removeAttr('disabled');   
      }   
});
});
