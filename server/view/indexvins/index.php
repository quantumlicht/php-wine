<!-- top container -->
<div class='container-fluid '>
   <div class='row-fluid'>
      <div class='span2'></div>
      <div class='span8 well'>
<!-- top container -->

<div class='container-fluid'>
   <form id='index-vins' class='form-horizontal' action='http://philippeguay.com/controller/indexvins/add_vin.php' method='post'>
   <div id='section-row' class='row-fluid'>
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
   <div id='section-row' class='row-fluid'>
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
            <select id='annee' class='span3' name='annee' >
               <option></option>
               <?php for( $max=date("Y");$max>$i=1950; $max--){ ?>
               <option><?php echo $max; ?> </option>
               <?php } ?>
            </select>

         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='appelation'>Type (Appelation)</label>
         <div class='controls'>
            <input class='span8' type='text' name='appelation' id='appelation'/>
         </div>
      </div>
      
      <div class='control-group'>
         <label class='control-label' for='pays'>Pays</label>
         <div class='controls'>
            <select style='text-align:center' class='span8'  name='pays' id='pays' >
               <option></option>
               <?php foreach($pays as $country){ ?>
               <option><?php echo $country['pays']; ?> </option>
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
      <div id='control-group-encepagement' class='control-group'>
         <label class='control-label' for='encepagement'>Encépagement</label>
         <div class='controls'>
            <select id='encepagement' class='span8' name='encepagement[]' multiple='multiple' >
               <option></option>

               <?php foreach(get_encepagement($_REQUEST['id']) as $encepagement){ ?>
              <option><?php echo $encepagement['encepagement']  ?> </option>
               <?php } ?>         
            </select>
            <span class='help-block'><small>Selectionnez plusieurs cépages en maintenant Ctrl.</small></span>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='alcool'>Alcool</label>
         <div class='controls'>
            <div class='input-append'>
               <input class='span4' type='text' name='alcool' placeholder='13.5' id='alcool appendedInput'/>
               <span class='add-on'>%</span>
            </div>            
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='date'>Date de dégustation </label>
         <div class='controls'>
            <input class='span2' type='text' name='date_jour' id='date'/>
            
            <select id='date_mois' class='span4' name='date_mois' >
               <option></option>
               <?php foreach($date as $key=>$value){ 
                  echo '<option value=\''. $key . '\'>' . $value . '</option>';
               } ?>
            </select>         
      
            <select id='date_annee' class='span3' name='date_annee' >
               <option></option>
               <?php for( $max=date("Y");$max>$i=1950; $max--){ ?>
               <option><?php echo $max; ?> </option>
               <?php } ?>
            </select>         
          <span class='help-block'><small>jour-mois-année</small></span>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='code_saq'>Code SAQ</label>
         <div class='controls'>
            <input class='span8' type='text' name='code_saq' id='code_saq'/>
         </div>
      </div>

      <div class='control-group'>
      <label class='control-label' for='prix'>Prix</label>
         <div class='controls'>
            <div class='input-append'>
               <input class='span4' type='text' placeholder='19.99' name='prix' id='prix appendedInput'/>
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
         <select id='couleur' class='span6' name='teinte' > 
            <option></option>
            <?php foreach(get_couleur($_REQUEST['id']) as $key=>$value){ 
              echo '   <option value="'. $key.'">'. $value . "</option>\n";
            } ?>
         </select>         
      </div>
   </div>
</fieldset>

<fieldset>
<legend>Le nez</legend>
   <div class='control-group'>
   <label class='control-label' for='nez_intensite'>Intensité</label>
      <div class='controls'>
         <select id='nez_intensite' class='span6' name='nez_intensite' > 
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
   <label class='control-label' for='nez_impression'>Impression</label>
      <div class='controls'>
         <textarea rows='3' id='nez_impression' name='nez_impression' class='span6'></textarea>
      </div>
   </div>

</fieldset>
<fieldset>
<legend>La bouche</legend>
   <div class='control-group'>
   <label class='control-label' for='bouche_intensite'>Intensité</label>
      <div class='controls'>
         <select id='bouche_intensite' class='span6' name='bouche_intensite' >
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
   <label class='control-label' for='bouche_impression'>Impression</label>
      <div class='controls'>
         <textarea rows='3' id='bouche_impression' name='bouche_impression' class='span6'></textarea>
      </div>
   </div>

</fieldset>
</div>
<div class='row-fluid'>
   <div class='span8 offset2'>
      <fieldset>
      <legend>Impression d'ensemble</legend>
      <input type='text' autocomplete='off' id='inputtag'class='span3' data-provide="type-ahead">
      <button type='button' id='addtag' class='btn'>Ajouter un tag</button>
      <div id='tagcontainer' class='row-fluid'>
      </div>      
      </fieldset>
   </div>
</div>     
<!--  -->
   </div>
<div id='section-row' class='row-fluid'>
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



