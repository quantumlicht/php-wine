function isSamePassword (form) {
   var bRes = false;
   if(form.typePass.value !=form.retypePass.value){
      $('#control-group-repass,#control-group-pass').addClass('error');
      $('form#subscription button[type=submit]').attr('disabled','disabled');
      $('<span/>',{
         id:'pass',
         class:'help-block',
         text:"Les mots de passes saisis ne sont pas identiques."    
      }).appendTo('#control-group-pass > div.controls');
   }
   else{
      bRes = true;
      $('#control-group-repass,#control-group-pass').removeClass('error');
      $('form#subscription button[type=submit]').removeAttr('disabled');
      $('span#pass').remove();
   }

   return bRes;
}

function isValidEmail (form){
   var bRes = false;
   var validEmail = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
   if (!validEmail.test(form.email.value)){
      $('#control-group-courriel').addClass('error');
      $('form#subscription button[type=submit]').attr('disabled','disabled');
      $('<span/>',{
         id:'courriel',
         class:'help-block',
         text:"Le courriel n'est pas valide."    
      }).appendTo('#control-group-courriel > div.controls');
   }
   else{
      bRes = true;
      $('#control-group-courriel').removeClass('error');
      $('form#subscription button[type=submit]').removeAttr('disabled');
      $('span#courriel').remove();
   }
   return bRes;

}

function isValidUsername (form){
   var bRes=false;
   var invalidName = /[\s]/;
   if (invalidName.test(form.username.value)){
      $('#control-group-username').addClass('error');
      $('form#subscription button[type=submit]').attr('disabled','disabled');
      $('<span/>',{
         id: 'username',
         class:'help-block',
         text:"Ce nom d'utilisateur n'est pas valide."    
      }).appendTo('#control-group-username > div.controls');
   }
   else{
      bRes = true;
      $('#control-group-username').removeClass('error');
      $('form#subscription button[type=submit]').removeAttr('disabled');
      $('span#username').remove();
   }
   return bRes;
}

function ScrollBottom (){
   var container = $('#scrollContainer');
   container.scrollTop(container.prop('scrollHeight')); 
}

function getTextWidth(text){
   var org = $(this)
   var html = $('<span style="postion:absolute;width:auto;left:-9999px">' + (text || org.html()) + '</span>');
   if (!text) {
      html.css("font-family", org.css("font-family"));
      html.css("font-size", org.css("font-size"));
   }
   $('body').append(html);
   var width = html.width();
   html.remove();
   return width;
}


