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
        $('#tanin').hide();
     }
     else{
        $('#tanin').show();
     }
   });
});
