$(function(){
//==========================================================================================================================
// // BUTTON CREATION
// $('form#fichevin').ready(function(){ 
//       $('<input/>',{
//          name:'couleur'  
//       }).appendTo('form');
//    });


//==========================================================================================================================
 // TAG TYPEAHEAD
   $.ajaxSetup({
      async:false
   });
   $('input#inputtag').typeahead({
      source: function(typeahead,query){
         arr=[];
         var obj =   $.getJSON("http://philippeguay.com/indexvins.php",{ajax: 'true',flag:'typeahead-tags'})
         var json = $.parseJSON(obj.responseText);
         for (var i = 0; i<json.length;i++ ){
            arr.push(json[i]);
         }
         return arr;
      },
      items:5
   });

//==========================================================================================================================
// ENCEPAGEMENT TYPEAHEAD
   $('input#inputencepagement').typeahead({
      source: function(typeahead,query){
         arr=[];
         var obj =   $.getJSON("http://philippeguay.com/indexvins.php",{ajax: 'true',id:$('button#load-ajax').val(),flag:'typeahead-encepagement'});
         var json = $.parseJSON(obj.responseText);
         for (var i = 0; i<json.length;i++ ){
            arr.push(json[i]);
         }
         return arr;
      },
      items:5
   });

//============================================================================================================================
// COULEUR VIN POPULATING
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
//=========================================================================================================================== 
// FORM LOCK
   reqinputs =  $('form#index-vins div#section-row:nth-child(2) :input:not(button,textarea, #appelation, #inputencepagement)');
   allinputs =  $('form#index-vins div#section-row:nth-child(2) :input');
   $('form#index-vins div#section-row').eq(2).mouseover(function(){
      $('form#index-vins div.control-group').focusin(function(){
         $(this).removeClass('error');
      });

      $.each(reqinputs,function(){
         if( $(this).val()=='' && $(this).attr('id')!='tanin'){// || $(this).val()== null) ){
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
   
   $('form#index-vins div#section-row').eq(1).mouseover(function(){
      if($('form#index-vins input[type=hidden]').val()=='0'){
         allinputs.addClass('disabled');
         allinputs.attr('disabled','');
         $('form#index-vins div.control-group').eq(0).addClass('error');
         $('form#index-vins div.btn-group').eq(0).find('button').addClass('btn-danger');
         $(' form#index-vins button[type=submit]').addClass('disabled');  
         $(' form#index-vins button[type=submit]').attr('disabled','');  
      }else{
         allinputs.removeClass('disabled');
         allinputs.removeAttr('disabled');
         $('form#index-vins div.control-group').eq(0).removeClass('error');
         $('form#index-vins div.btn-group').eq(0).find('button').removeClass('btn-danger');
      }
      
   });
//=================================================================================================
// ADD TAGS
   var tagId = 0;
   arrTags = [];
   $('form#index-vins').ready(function(){ 
      $('<input/>',{
         id:'tagscontainer',
         type:'hidden',
         readonly:'readonly',
         name:'tags'  
      }).appendTo('form#index-vins');
   });

   // Stringify the tags array and convert it back as an array in php to inject it into the db.
   $('form#index-vins').submit(function(){
      var strArrTags = arrTags.toString();
      $('#tagscontainer').val(strArrTags);
   });

   $('button#addtag').click(function(){
     var currentTag = String($('input#inputtag').val());
     currentTag = currentTag.replace(/\s/g,'');
     if(currentTag !='' && currentTag.length<20){
        $('<div/>',{
           id: 'tag'+tagId,
           class: 'well well-small span1',
           text: currentTag,
           css: {
              "margin-left": "0px",
              "margin-bottom": "10px"
           }
        }).appendTo('#tagcontainer');
 
        $('<button/>',{
           id: 'button'+tagId,
           type: 'button',
           class: 'close',
           html: '&times;',
           click: function(){
              $(this).parent().remove();
           }
        }).appendTo('#tag'+tagId);
        arrTags.push(currentTag);
        // width = largeur texte + 2*padding + spacer + largeur boutton + 2*margin boutton 
        var spacer = 10;
        var width = getTextWidth(currentTag) +
           2 * parseInt($('#tag'+tagId).css('padding')) + 
           $('#button'+tagId).width() +
           spacer;

        $('#tag'+tagId).css('width',width);  
        tagId ++;    
     }
    $('input#inputtag').val('');
    $('input#inputtag').trigger('focus');
     
   });


//=================================================================================================
// ADD ENCEPAGEMENTS
   var cepageId = 0;
   arrCepages = [];
   $('form#index-vins').ready(function(){ 
      $('<input/>',{
         id:'cepagescontainer',
         type:'hidden',
         readonly:'readonly',
         name:'encepagement'  
      }).appendTo('form#index-vins');
   });

   // Stringify the tags array and convert it back as an array in php to inject it into the db.
   $('form#index-vins').submit(function(){
      var strArrCepages = arrCepages.toString();
      $('#cepagescontainer').val(strArrCepages);
   });

   $('button#addencepagement').click(function(){
     var currentCepage = String($('input#inputencepagement').val());
     if(currentCepage !='' && currentCepage.length<25){
        $('<div/>',{
           id: 'cepage'+cepageId,
           class: 'well well-small span4',
           text:currentCepage,
           css: {
              "margin-left": "0px",
              "margin-bottom": "10px"
           }
        }).appendTo('#cepagecontainer');
 
        $('<button/>',{
           id: 'button'+cepageId,
           type: 'button',
           class: 'close',
           html: "&times;",
           click: function(){
              $(this).parent().remove();
           }
        }).appendTo('#cepage'+cepageId);
        arrCepages.push(currentCepage);
        // width = largeur texte + 2*padding + spacer + largeur boutton + 2*margin boutton 
        var spacer = 20;
        var width = getTextWidth(currentCepage) +
           2 * parseInt($('#cepage'+cepageId).css('padding')) + 
           $('#button'+cepageId).width() +
           spacer;

        $('#cepage'+cepageId).css('width',width);  
        cepageId ++;    
     }
    $('input#inputencepagement').val('');
    $('input#inputencepagement').trigger('focus');
     
   });





});
