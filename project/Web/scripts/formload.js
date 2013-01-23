$(function(){
//============================================================================================================================
   arrSelects = ['pays','teinte','arome','saveur','acidite','tanin'];
   couleur= $('.btn-group#couleur > button').val();

   $('.btn-group#couleur > button').click(function(){
      $.ajaxSetup({
         async:false
      });

      couleur = $(this).val();

      // Select Fields filling
      $.each(arrSelects,function(id,value){
         var objAjaxResponse =  $.getJSON("/ajax-" + arrSelects[id] + "-" + couleur);
         var json = $.parseJSON(objAjaxResponse.responseText.match(/\[.*\]/)[0]);
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

      // Toggling couleur
      $('input[name=couleur]').val( $(this).val() );

   });
   //============================================================================================================
   // GENERAL PROCESSING
   var cepageId = 0;
   var tagId = 0;

   arrCepages = [];
   arrTags = [];

   $('form#indexvin').ready(function(){


      $('[name=encepagement]').closest('.control-group').after(function(){
         return $('<div/>',{id:'encepagementContainer',class:'span12 well well-small',style:'margin-left:0px'});
      })
      $('<input/>',{
         id:'cepagescontainer',
         type:'hidden',
         readonly:'readonly',
         name:'cepage'
      }).appendTo('form#indexvin');


      $('<input/>',{
         id:'tagscontainer',
         type:'hidden',
         readonly:'readonly',
         name:'tags'
      }).appendTo('form#indexvin');

      $('#inputtag').after(function(){
         return $('<div/>',{id:'tagscontainer'});
      })

      // TypeAheads
      $typeahead=$('[name=encepagement]').typeahead({
         source: function(typeahead,query){
            arr=[];
            var obj = $.getJSON("/ajax-encepagement-"+couleur);
            var json = $.parseJSON(obj.responseText.match(/\[.*\]/)[0]);
            for (var i = 0; i<json.length;i++ ){
              arr.push(json[i].content);
            }
            return arr;
         },
         updater: function(item){
            $input = $('<div/>',{
               class:'well well-small span4',
               text:item
             });

            var button=$('<button/>',{
               type: 'button',
               class: 'close',
               html: "&times;",

            });
            button.appendTo($input);
            var spacer = 20;
            var padding = getPadding($input);
            // width = largeur texte + 2*padding + spacer + largeur boutton + 2*margin boutton
            var width = getTextWidth(item) +
               button.width() + spacer +
               2 * parseInt(padding);

            $input.css('width',width);

            $('#encepagementContainer').append($input);
         },
         items:5

      });

      $('input#inputtag').typeahead({
         source: function(typeahead,query){
            arr=[];
            var obj = $.getJSON("/ajax-tag-"+couleur);
            var json = $.parseJSON(obj.responseText.match(/\[.*\]/)[0]);
            for (var i = 0; i<json.length;i++ ){
               arr.push(json[i].content);
            }
            return arr;
         },
         items:5,


      });

      // Creating appended inputs
      $('[name=prix]').wrap(function(){
         return $('<div/>',{class:'input-append'});
      }).after(function(){
         return $('<span/>',{class:'add-on',text:'$'});
      });

      $('[name=alcool]').wrap(function(){
         return $('<div/>',{class:'input-append'});
      }).after(function(){
         return $('<span/>',{class:'add-on',text:'%'});
      });

      // Create container for array
      $('[name=encepagement]').wrap(function(){
         return $('<div/>',{class:'input-append'});
      }).after(function(){
         return $('<button/>',{
            type:'button',
            class:'btn',
            html:'<i class="icon-plus"></i>',
            click: function(){
               alert('Ajouter le cepage dans le container');
            }
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


   });
   //===========================================================================================================================
   // FORM LOCK
   // reqinputs =  $('form#indexvin div#section-row:nth-child(2) :input:not(button,textarea, #appelation, #inputencepagement)');
   // allinputs =  $('form#indexvin div#section-row:nth-child(2) :input');

   // On debloque les erreurs si l'utilisateur semble vouloir corriger son erreur
   $('form#indexvin div.control-group').focusin(function(){
      if($(this).hasClass('error'))
      {
         $(this).find('span.help-inline').hide();
         $(this).removeClass('error');
      }
   });


   //Cepage close button
   var a=$('#encepagementContainer').find('button');
   $.each(a,function(){$(this).click(function(){alert('test');})});
   //===========================================================================================================================
   // ON SUBMIT ACTIONS
   $('form#indexvin').submit(function(){
      // Tags
      var strArrTags = arrTags.toString();
      $('#tagscontainer').val(strArrTags);

      //Cepage
      // Stringify encepagement array and convert it back as an array in php to inject it into the db.
      var strArrCepages = arrCepages.toString();
      $('#cepagescontainer').val(strArrCepages);

      // Format the date
      var jour = $('#date_jour option:selected').text();
      var mois = $('#date_mois option:selected').val();
      var annee = $('#date_annee option:selected').text();
      date = annee + '-' + String(parseInt(mois)+1)+'-'+ jour ;
      $('[name=date]').val(date);
   });
   //==============================================================================================================================

   // $('form#indexvin div#section-row').eq(2).mouseover(function(){

   //    $.each(reqinputs,function(){
   //       if( $(this).val()=='' && $(this).attr('id')!='tanin'){// || $(this).val()== null) ){
   //          $(this).closest('.control-group').addClass('error');
   //       }
   //    });

   //    if($('.error').length!=0){
   //       $(' form#indexvin button[type=submit]').addClass('disabled');
   //       $(' form#indexvin button[type=submit]').attr('disabled','');
   //    }
   //    else{
   //       $(' form#indexvin button[type=submit]').removeClass('disabled');
   //       $(' form#indexvin button[type=submit]').removeAttr('disabled');
   //    }
   // });
   // $('form#indexvin div#section-row').eq(1).mouseover(function(){
   //    if($('form#indexvin input[type=hidden]').val()=='0'){
   //       allinputs.addClass('disabled');
   //       allinputs.attr('disabled','');
   //       $('form#indexvin div.control-group').eq(0).addClass('error');
   //       $('form#indexvin div.btn-group').eq(0).find('button').addClass('btn-danger');
   //       $(' form#indexvin button[type=submit]').addClass('disabled');
   //       $(' form#indexvin button[type=submit]').attr('disabled','');
   //    }else{
   //       allinputs.removeClass('disabled');
   //       allinputs.removeAttr('disabled');
   //       $('form#indexvin div.control-group').eq(0).removeClass('error');
   //       $('form#indexvin div.btn-group').eq(0).find('button').removeClass('btn-danger');
   //===========================================================================================================================
   // ADD TAGS
   //S'inspirer de ce quil y a sur stackoverflow
   // Stringify the tags array and convert it back as an array in php to inject it into the db.

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
   //===========================================================================================================================
   // ADD ENCEPAGEMENTS

   //S'inspirer de ce quil y a sur stackoverflow

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
