$(function(){
   $("button#load-ajax").mouseover(function(){
      $.getJSON("http://philippeguay.com/indexvins.php",{id: String($(this).val()), ajax: 'true'},function(j){
         console.log(j);
      });
   });
});
