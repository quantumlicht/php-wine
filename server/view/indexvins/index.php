<!-- top container -->
<div class='container-fluid '>
   <div class='row-fluid'>
      <div class='span2'></div>
      <div class='span8 well'>
<!-- top container -->

<div class='container-fluid'>
   <form class='form-horizontal' action='http://philippeguay.com/controller/indexvins/add_vin.php' method='post'>
   <div class='row-fluid'>
      <div class='span4'></div>
      <div class='span4'>
         <div class='offset3 control-group'>
            <span class='help-block'><h3>Sélectionnez un vin</h3></span>
               <input type='hidden' name='couleur' value='0' id=btn-input'/>
               <div class='btn-group' id='type-couleur' data-toggle="buttons-radio">
                 <button id='load-ajax' value='1' type='button' class=' btn btn-large btn-primary'>Vin rouge</button>
                 <button id='load-ajax' value='2'type='button' class='btn btn-large btn-primary'>Vin blanc</button>
              </div>
         </div> 
      </div>
      <div class='span4'></div>
      <noscript>
         <input type="submit" name="action" value="Chargez les couleurs" />
      </noscript>
   </div>   
   <div class='row-fluid'>
<!-- contenu 1ere colonne -->     
<div class='span6'>        
   <fieldset>
   <legend> Caractéristiques </legend>

      <div class='control-group'>
         <label class='control-label' for='nom'>Nom</label>
         <div class='controls'>
            <input class='span8' type='text' name='nom' id='nom'/>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='producteur'>Producteur</label>
         <div class='controls'>
            <input class='span8' type='text' name='producteur' id='producteur'/>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='annee'>Année</label>
         <div class='controls'>
            <input class='span8' type='text' name='annee' id='annee'/>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='type'>Type (Appelation)</label>
         <div class='controls'>
            <input class='span8' type='text' name='type' id='type'/>
         </div>
      </div>
      
      <div class='control-group'>
         <label class='control-label' for='pays'>Pays</label>
         <div class='controls'>
            <select style='text-align:center' class='span8'  name='pays' id='pays' >
               <option></option>
               <?php foreach($pays as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
               <?php } ?>         
            </select>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='region'>Région</label>
         <div class='controls'>
            <input class='span8' type='text' name='region' id='region'/>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='encepagement'>Encépagement</label>
         <div class='controls'>
            <select class='span8' name='encepagement[]' multiple='multiple' >
               <option></option>
               <?php for( $i=0; $i<$max=10; $i++){ ?>
               <option><?php echo 'test'. $i; ?> </option>
               <?php } ?>         
            </select>
            <span class='help-block'><small>Selectionnez plusieurs cépages en maintenant Ctrl.</small></span>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='alcool'>Alcool</label>
         <div class='controls'>
            <div class='input-append'>
               <input class='span4' type='text' name='alcool' placeholder='13,5' id='alcool appendedInput'/>
               <span class='add-on'>%</span>
            </div>            
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='date'>Date de dégustation </label>
         <div class='controls'>
            <input class='span2' type='text' name='date-jour' id='date'/>
            
            <select class='span4' name='date-mois' >
               <option></option>
               <?php foreach($date as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
               <?php } ?>
            </select>         
      
            <select class='span3' name='date-annee' >
               <option></option>
               <?php for( $i=1920; $i<$max=2050; $i++){ ?>
               <option><?php echo $i; ?> </option>
               <?php } ?>
            </select>         
          <span class='help-block'><small>jour-mois-année</small></span>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='code'>Code SAQ</label>
         <div class='controls'>
            <input class='span8' type='text' name='code' id='code'/>
         </div>
      </div>

      <div class='control-group'>
      <label class='control-label' for='prix'>Prix</label>
         <div class='controls'>
            <div class='input-append'>
               <input class='span4' type='text' placeholder='19,99' name='prix' id='prix appendedInput'/>
               <span class='add-on'>$</span>
            </div>            
         </div>
      </div>

   </fieldset>
</div>
<!-- contenu deuxieme colonne -->      
<div class='span6'>
   <fieldset>
   <legend>L'oeil</legend>
   
   <div class='control-group'>
   <label class='control-label' for='couleur'>Teinte </label>
      <div class='controls'>
         <select id='couleur' class='span6' name='date-mois' > 
            <option></option>
            <?php foreach(getCouleur($_REQUEST['id']) as $key=>$value){ 
              echo '   <option value="'. $key.'">'. $value . "</option>\n";
            } ?>
         </select>         
      </div>
   </div>
</fieldset>

<fieldset>
<legend>Le nez</legend>
   <div class='control-group'>
   <label class='control-label' for='intensite-nez'>Intensité</label>
      <div class='controls'>
         <select id='intensite-nez' class='span6' name='intensite-nez' > 
            <option></option>
            <?php for($i=1;$i<=5; $i++){ ?>
               <option><?php echo $i; ?> </option>
            <?php } ?>
         </select>
         <span class='help-block'><small>1 étant peu intense et 5 très intense.</small></span>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='arome'>Arôme</label>
      <div class='controls'>
         <select id='arome' class='span6' name='arome' >
            <option></option>
            <?php foreach($arome_saveur as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='impression-nez'>Impression</label>
      <div class='controls'>
         <textarea rows='3' id='impression-nez' name='impression-nez' class='span6'></textarea>
      </div>
   </div>

</fieldset>
<fieldset>
<legend>La bouche</legend>
   <div class='control-group'>
   <label class='control-label' for='intensite-bouche'>Intensité</label>
      <div class='controls'>
         <select id='intensite-bouche' class='span6' name='intensite-bouche' >
            <option></option>
            <?php for($i=1;$i<=5; $i++){ ?>
               <option><?php echo $i; ?> </option>
            <?php } ?>
         </select>
         <span class='help-block'><small>1 étant peu intense et 5 très intense.</small></span>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='persistance'>Persistance</label>
      <div class='controls'>
         <select id='persistance' class='span6' name='persistance' >
            <option></option>
            <?php for($i=1;$i<=5; $i++){ ?>
               <option><?php echo $i; ?> </option>
            <?php } ?>
         </select>
         <span class='help-block'><small>1 étant peu intense et 5 très intense.</small></span>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='saveur'>Saveur</label>
      <div class='controls'>
         <select id='saveur' class='span6' name='saveur' >
            <option></option>
            <?php foreach($arome_saveur as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>
  
   <div class='control-group'>
   <label class='control-label' for='acidite'>Acidité</label>
      <div class='controls'>
         <select id='acidite' class='span6' name='acidite' >
            <option></option>
            <?php foreach($acidite as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div id='tanin-group' class='control-group'>
   <label class='control-label' for='tanin'>Tanins</label>
      <div class='controls'>
         <select id='tanin' class='span6' name='tanin' >
            <option></option>
            <?php foreach($tanin as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='impression-bouche'>Impression</label>
      <div class='controls'>
         <textarea rows='3' id='impression-bouche' name='impression-bouche' class='span6'></textarea>
      </div>
   </div>

</fieldset>
</div>
<div class='row-fluid'>
   <div class='span8 offset2'>
      <fieldset>
      <legend>Impression d'ensemble</legend>


       jsdhsjkdhsdkjshdksjdhsdkjshd
      </fieldset>
   </div>
</div>     
<!--  -->
   </div>
<div class='row-fluid'>
   <div class='span4'></div>
   <div class='span4'>
      <button type='submit' class='offset4 btn btn-large btn-primary'>Soumettre</button>
   </div>
   <div class='span4'></div>
</div>
   </form> 
</div>

<!-- top container -->
      </div>
   </div> 
</div>



