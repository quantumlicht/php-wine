<!-- top container -->
<div id='test'>aaaaaaaaa</div>
<div class='container-fluid '>
   <div class='row-fluid'>
      <div class='span2'></div>
      <div class='span8 well'>
<!-- top container -->

<div class='container-fluid'>
   <form class='form-horizontal' action='' method='post'>   
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
            <select class='span8' multiple='multiple' >
             <?php for( $i=0; $i<$max=10; $i++){ ?>
             <option><?php echo 'test'. $i; ?> </option>
             <?php } ?>         
            </select>
            <span class='help-block'>Selectionnez plusieurs cépages en maintenant Shift.</span>
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
               <?php foreach($date as $key=>$value){ ?>
                <option><?php echo $value; ?> </option>
               <?php } ?>
            </select>         
      
            <select class='span3' name='date-annee' >
             <?php for( $i=1920; $i<$max=2050; $i++){ ?>
             <option><?php echo $i; ?> </option>
             <?php } ?>
            </select>         
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
   <label class='control-label' for='type-couleur'>Couleur du vin</label>
      <div class='controls'>
         <div class='btn-group' id='type-couleur' data-toggle="buttons-radio">
            <button  name='rouge' id='load-ajax' value='1' type='button' class='btn'>Vin rouge</button>
            <button   name='blanc'id='load-ajax' value='2'type='button' class='btn'>Vin blanc</button>
         </div>
      </div>
   </div> 
   <noscript>
    <input type="submit" name="action" value="Chargez les couleurs" />
   </noscript>
   
   <div class='control-group'>
   <label class='control-label' for='couleur'>Teinte </label>
      <div class='controls'>
         <select id='couleur' class='span4' name='date-mois' >
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
         <select id='intensite-nez' class='span4' name='intensite-nez' >
            <?php for($i=1;$i<=5; $i++){ ?>
               <option><?php echo $i; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='arome'>Arôme</label>
      <div class='controls'>
         <select id='arome' class='span4' name='arome' >
            <?php foreach($arome_saveur as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='impression-nez'>Impression</label>
      <div class='controls'>
         <textarea rows='3' id='impression-nez' class='span4'></textarea>
      </div>
   </div>

</fieldset>
<fieldset>
<legend>La bouche</legend>
   <div class='control-group'>
   <label class='control-label' for='intensite-bouche'>Intensité</label>
      <div class='controls'>
         <select id='intensite-bouche' class='span4' name='intensite-bouche' >
            <?php for($i=1;$i<=5; $i++){ ?>
               <option><?php echo $i; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='persistance'>Persistance</label>
      <div class='controls'>
         <select id='persistance' class='span4' name='persistance' >
            <?php for($i=1;$i<=5; $i++){ ?>
               <option><?php echo $i; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='saveur'>Saveur</label>
      <div class='controls'>
         <select id='saveur' class='span4' name='saveur' >
            <?php foreach($arome_saveur as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>
  
   <div class='control-group'>
   <label class='control-label' for='acidite'>Acidité</label>
      <div class='controls'>
         <select id='acidite' class='span4' name='acidite' >
            <?php foreach($acidite as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='tanin'>Tanins</label>
      <div class='controls'>
         <select id='saveur' class='span4' name='tanin' >
            <?php foreach($tanin as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>
      </div>
   </div>

   <div class='control-group'>
   <label class='control-label' for='impression-nez'>Impression</label>
      <div class='controls'>
         <textarea rows='3' id='impression-nez' class='span4'></textarea>
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
<div class='span4 offset5'>
<button class='btn-large btn-primary'>Soumettre</button>
</div>
</div>
   </form> 
</div>

<!-- top container -->
      </div>
   </div> 
</div>



