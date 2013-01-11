<div class="container-fluid">
   <form id='subscription' class='well form-horizontal'  action=""  method='post'>
      
      <div id='section-row' class='row-fluid'>
         <div class='span4'></div>
         <div class='span4'>
            <div class='offset2 control-group'>
               <span class='help-block'><h3>Sélectionnez un vin</h3></span>
               <input type='hidden' name='couleur' value='0' id='btn-input'/>
               <div class='btn-group' id='type-couleur' data-toggle="buttons-radio">
                  <button id='load-ajax' value='1' type='button' class=' btn btn-large btn-primary'>Vin rouge</button>
                  <button id='load-ajax' value='2'type='button' class='btn btn-large btn-primary'>Vin blanc</button>
               </div>
            </div> 
         </div>
         <div class='span4'></div>
      </div>  

      <div class="row-fluid">
         <?php echo $form ?>  
      </div>
      <div class="row-fluid">
         <div class="span4"></div>
         <div class="span4">
            <input class='offset3 btn btn-large btn-primary' type="submit" value="Soumettre" />
         </div>
         <div class="span4"></div>  
      </div>
   </form>
</div>
