<div class="container-fluid">
   <form id='subscription' class='well form-horizontal'  action=""  method='post'>

      <div id='section-row' class='row-fluid'>
         <div class='span4'></div>
         <div class='span4'>
            <div class='offset2 control-group'>
               <span class='help-block'><h3>Sélectionnez un vin</h3></span>
               <input type='hidden' name='couleur' value='0' id='btn-input'/>
               <div class='btn-group' id='couleur' data-toggle="buttons-radio">
                  <button id='load-ajax' value='rouge' type='button' class=' btn btn-large btn-primary'>Vin rouge</button>
                  <button id='load-ajax' value='blanc'type='button' class='btn btn-large btn-primary'>Vin blanc</button>
               </div>
            </div> 
         </div>
         <div class='span4'></div>
      </div>  

      <div class="row-fluid">
         <?php echo $form ?>  
      </div>

      <div class="row-fluid">
         <div class="span2"></div>
         <div class="span8">
            <fieldset>
               <legend>Impression d'ensemble</legend>
               <div class='row-fluid'>
                  <p class='muted'><small>Ajouter une charactéristique à ce vin. Vous pourrez ensuite rechercher des vins selon ces tags.</small></p>
                  <p class='muted'><small>Ex: Charnu,Capiteux,Vif,Cuir,etc.</small></p>
                  <p class='text-warning'><small><strong>Inserez un seul tag par case</strong></small></p>     
               </div>
               <input type='text' autocomplete='off' id='inputtag'class='span4' data-provide="type-ahead">
               <button type='button' id='addtag' class='btn'>Ajouter un Tag</button>
               <div class='row-fluid'>   
               </div>
               <div id='tagcontainer' class='row-fluid'> </div>      
            </fieldset>
         </div>
      </div>
      <div class="row-fluid" style="padding-top:4%">
         <div class="span4"></div>
         <div class="span4">
            <input class='offset3 btn btn-large btn-primary' type="submit" value="Soumettre" />
         </div>
         <div class="span4"></div>  
      </div>
   </form>
</div>
