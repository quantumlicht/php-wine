$(function(){

//-----------------------------------------------------------------------------------------------------------------
   $("button#load-ajax").click(function(){
      $.ajaxSetup({
         async:false}
        );
     var objAjaxResponse =  $.getJSON("http://philippeguay.com/indexvins.php",{id: $(this).val(), ajax: 'true'});
     var json = $.parseJSON(objAjaxResponse.responseText);
     var options = '<option></option>';
     for (var i = 0; i < json.couleur.length; i++) {
        options += '<option value="' + json.couleur[i].id + '">' + json.couleur[i].couleur + '</option>';
     }
     
     $("select#couleur").html(options);
     var options = '<option></option>';
     for (var i = 0; i < json.encepagement.length; i++) {
        options += '<option value="' + json.encepagement[i].id + '">' + json.encepagement[i].encepagement + '</option>';
     }
     $("select#encepagement").html(options);
     $('select#encepagement').scrollTop(0);
     
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
//----------------------------------------------------------------------------------------------------------------------
   
   inputs =  $('form#index-vins div#section-row:nth-child(2) :input:not(textarea)');
   $('form#index-vins div#section-row').eq(2).mouseover(function(){
      //TODO : ajouter le bouton pour type de vins dans la validation d'erreur. On peut mettre un plus beau message d'erreur ou barrer la suite du formulaire si on a pas choisi un type de vin.
      $('form#index-vins div.control-group').click(function(){
         $(this).removeClass('error');
      });

      $.each(inputs,function(){
         if( $(this).val()=='' && $(this).attr('id')!='tanin'){// || $(this).val()== null) ){
            $(this).closest('.control-group').addClass('error');
         }
      });
      if($('#encepagement').val()==null){
       $('#encepagement').closest('.control-group').addClass('error');
      }
        
      if($('.error').length!=0){
         $(' form#index-vins button[type=submit]').addClass('disabled');  
         $(' form#index-vins button[type=submit]').attr('disabled','');  
      }
      else{
         $(' form#index-vins button[type=submit]').removeClass('disabled');   
         $(' form#index-vins button[type=submit]').removeAttr('disabled');   
      }
   });
   
   $('form#index-vins div#section-row').eq(1).mouseover(function(){
      if($('form#index-vins input[type=hidden]').val()=='0'){
         inputs.addClass('disabled');
         inputs.attr('disabled','');
         $('form#index-vins div.control-group').eq(0).addClass('error');
         $('form#index-vins div.btn-group').eq(0).find('button').addClass('btn-danger');
         $(' form#index-vins button[type=submit]').addClass('disabled');  
         $(' form#index-vins button[type=submit]').attr('disabled','');  
      }else{
         inputs.removeClass('disabled');
         inputs.removeAttr('disabled');
         $('form#index-vins div.control-group').eq(0).removeClass('error');
         $('form#index-vins div.btn-group').eq(0).find('button').removeClass('btn-danger');
      }
      
   
   });
});
