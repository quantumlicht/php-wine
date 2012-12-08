function isSamePassword (form) {
   var bRes = false;
   if(form.typePass.value !=form.retypePass.value){
      $('#errorPass').text("mot de passe n''est pas le même").show();
     document.getElementById('invalidPass').style.display='block'; 
   }
   else{
      bRes = true;
       $('#errorPass').hide();
      document.getElementById('invalidPass').style.display='none'; 
   }

   return bRes;
}

function isValidEmail (form){
   var bRes = false;
   var validEmail = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
   if (!validEmail.test(form.email.value)){
      $('#errorEmail').text("Format d'adresse invalide.").show();
      document.getElementById('invalidEmail').style.display='block'; 
   }
   else{
      bRes = true;
      $('#errorEmail').hide();
      document.getElementById('invalidEmail').style.display='none'; 
   }
   return bRes;

}

function isValidUsername (form){
   var bRes=false;
   var invalidName = /[\s]/;
   if (invalidName.test(form.username.value)){
      $('#errorUser').text("Pas d'espace permis.").show();
      document.getElementById('invalidUsername').style.display='block'; 
   }
   else{
      bRes = true;
      $('#errorUser').hide();
      document.getElementById('invalidUsername').style.display='none';   
   }
   return bRes;
}

function ScrollBottom (){
   var container = $('#scrollContainer');
   container.scrollTop(container.prop('scrollHeight')); 
}


