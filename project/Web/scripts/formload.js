$(function(){
//============================================================================================================================
   arrSelects = ['pays','teinte','arome','saveur','acidite','tanin'];

   $('.btn-group#couleur > button').click(function(){
      $.ajaxSetup({
         async:false,
         scriptCharset: "utf8",
         contentType:"application/json; charset=utf8"
      });

      couleur = $(this).val();
      
      // Select Fields filling  
      $.each(arrSelects,function(id,value){         
         var objAjaxResponse =  $.getJSON("/ajax-" + arrSelects[id] + "-" + couleur);
         var json = $.parseJSON(objAjaxResponse.responseText);
         var options = '<option></option>';
         for (var i = 0; i < json.length; i++) {
           options += '<option value="' + json[i].id + '">' + json[i].content + '</option>';
         }
         $('[name='+arrSelects[id]+']').html(options);
      });

      // Toggling tanin
      if($(this).val()=='blanc'){
         $('[name=tanin]').attr('disabled','');
         $('[name=tanin]').closest('.control-group').hide();
      }
      else if($(this).val()=='rouge'){
         $('[name=tanin]').removeAttr('disabled');
         $('[name=tanin]').closest('.control-group').show();
      }

      // TypeAhead encepagement
      $('[name=encepagement]').typeahead({

         source: function(typeahead,query){
            arr=[];
            var obj = $.getJSON("/ajax-encepagement-"+couleur);
            var json = $.parseJSON(obj.responseText);
            for (var i = 0; i<json.length;i++ ){
              arr.push(json[i].content);
            }
            return arr;
         },
         items:5
      });
   });
   // Adding Help blocks

     // $("select#couleur").html(options);
     // var options = '<option></option>';
     // for (var i = 0; i < json.encepagement.length; i++) {
     //    options += '<option value="' + json.encepagement[i].id + '">' + json.encepagement[i].encepagement + '</option>';
     // }
     // $("select#encepagement").html(options);
     // $('select#encepagement').scrollTop(0);

   // Building Date picker

   // Toggling couleur
   $('.btn-group#couleur > button').each(function(){
      $(this).click(function(){
         $('input[name=couleur]').val( $(this).val() );
      });
   });

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
