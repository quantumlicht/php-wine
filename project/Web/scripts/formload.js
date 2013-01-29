$(function(){
//============================================================================================================
   // ON FORM READY

   $('form#indexvin').ready(function(){

      $('[name=cepage]').closest('.control-group').after(function(){
         return $('<div/>',{id:'cepageContainer',class:'span12 well well-small',style:'margin-left:2px'});
      });

      $('<input/>',{
         id:'encepagement',
         type:'hidden',
         readonly:'readonly',
         name:'encepagement'
      }).appendTo('form#indexvin');

      $('<input/>',{
         id:'tags',
         type:'hidden',
         readonly:'readonly',
         name:'tag'
      }).appendTo('form#indexvin');

      $('[name=mot-cle]').closest('.control-group').after(function(){
         return $('<div/>',{id:'tagContainer',class:'span12 well well-small',style:'margin-left:2px'});
      });


      // TypeAheads
      cepageTypeahead=$('[name=cepage]');
      cepageTypeahead.typeahead({

         items:5,
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
            Utils.appendToContainer(item,'cepage',5);
            cepageTypeahead.trigger('focus');
         }
      });

      tagTypeahead=$('[name=mot-cle]');
      tagTypeahead.typeahead({
         items:5,
         source: function(typeahead,query){
            arr=[];
            var obj = $.getJSON("/ajax-tag-"+couleur);
            var json = $.parseJSON(obj.responseText.match(/\[.*\]/)[0]);
            for (var i = 0; i<json.length;i++ ){
               arr.push(json[i].content);
            }
            return arr;
         },
         updater: function(item){
            Utils.appendToContainer(item,'tag',10);
            tagTypeahead.trigger('focus');
         }

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
      $('[name=cepage]').wrap(function(){
         return $('<div/>',{class:'input-append'});
      }).after(function(){
         return $('<button/>',{
            type:'button',
            class:'btn',
            html:'<i class="icon-plus"></i>',
            click: function(){
               $cepageInput=$('[name=cepage]');
               var currentCepage = String($cepageInput.val());
               currentCepage = currentCepage.replace(/\s/g,'');
               Utils.appendToContainer(currentCepage,'cepage',5);
               $cepageInput.val('');
               $cepageInput.trigger('focus');
            }
         });
      });

      $('[name=mot-cle]').wrap(function(){
         return $('<div/>',{class:'input-append'});
      }).after(function(){
         return $('<button/>',{
            type:'button',
            class:'btn',
            html:'<i class="icon-plus"></i>',
            click: function(){
               $tagInput=$('[name=mot-cle]');
               var currentTag = String($tagInput.val());
               currentTag = currentTag.replace(/\s/g,'');
               Utils.appendToContainer(currentTag,'tag',10);
               $tagInput.val('');
               $tagInput.trigger('focus');
            }
         });
      });




      // $('[name=fichier]').closest('.control-group').after(function(){
      //    return $('<div/>',{id:'test',class:'span8 well well-small',style:'margin-left:2px'});
      // });
      $('#uploadHiddenDiv').after(function(){
         return $('<div/>',{
            id:'divUpload',
            class:'input-append span6'
         });
      });
      $('#divUpload').append(function(){
         return $('<input/>',{
            type:'text',
            id:'uploadContainer',
            class:'span12 well well-small'
         }).attr('disabled','').css('background','white');
      });

      $('#divUpload').append(function(){
         return $('<button/>',{
            type:'button',
            class:'btn',
            html:'<i class="icon-plus"></i>',
            click: function(){
               $('[name=fichier]').click();
            }
         });
      });

      $('[name=fichier]').change(function(){
         filename= $(this).val().split('\\')[2];
         $('#uploadContainer').val(filename);
      });



      // // Adding Click function to add new tags
      // $('button#addtag').click(function(){
      //    $tagInput=$('#inputtag');
      //    var currentTag = String($tagInput.val());
      //    currentTag = currentTag.replace(/\s/g,'');
      //    Utils.appendToContainer(currentTag,'tag',10);
      //    $tagInput.val('');
      //    $tagInput.trigger('focus');
      // });

      // Adding Help blocks
         //ajouter cepage maximum
         //ajouter tag maximum
         //expliquer lintensite
         //expliquer cepage

   });
//============================================================================================================================
   // GENERAL PROCESSING

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

//===========================================================================================================================

   // On debloque les erreurs si l'utilisateur semble vouloir corriger son erreur
   Utils.removeErrorOnFocus();

//===========================================================================================================================
   // ON SUBMIT ACTIONS
   arrCepages = [];
   arrTags = [];

   $('form#indexvin').submit(function(){
      // Cepages
      cepages=$('#cepageContainer').find('span');
      $.each(cepages,function(){
         arrCepages.push($(this).text().slice(0,-1));
      });

      var strArrCepages = arrCepages.toString();
      $('[name=encepagement]').val(strArrCepages);
      $('[name=cepage]').attr('disabled','');

      // Tags
      tags=$('#tagContainer').find('span');
      $.each(tags,function(){
         arrTags.push($(this).text().slice(0,-1));
      });

      var strArrTags = arrTags.toString();
      $('[name=tag]').val(strArrTags);

      // Format the date
      var jour = $('#date_jour option:selected').text();
      var mois = $('#date_mois option:selected').val();
      var annee = $('#date_annee option:selected').text();
      date = annee + '-' + String(parseInt(mois)+1)+'-'+ jour ;
      $('[name=date]').val(date);
   });
//==============================================================================================================================
   // FORM VALIDATION UX
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

});
