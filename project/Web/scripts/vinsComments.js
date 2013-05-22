$(function(){
   buttonText=['Afficher les commentaires','Masquer les commentaires']
   $.ajaxSetup({
      async:false
   });
   var url = window.location.href;
   source = url.match(/[0-9]+/);
   var objAjaxResponse =  $.getJSON("/ajax-comments-none-vinsComments-"+source);
   var json = $.parseJSON(objAjaxResponse.responseText.match(/\[.*\]/)[0]);

   var comments=''
   for (var i = 0; i < json.length; i++) {
      comments += "<div id='comment' class='row-fluid'><strong>"+
         json[i].auteur+"</strong> le "+
         json[i].date +
         "<p class='well well-small'>"+
         json[i].contenu+
         "</p></div>";
   }
   $('#comments').append(comments);
   $('button.ajaxCaller').click(function(){
      $('#comments').toggle(function(){
         Utils.ScrollBottom('body');
         $('button.ajaxCaller').text(function(i, text){
            return text === buttonText[0] ? buttonText[1] : buttonText[0];
         });
      });
   });
});
