<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<!-- top container -->
<div class='container-fluid'>
   <div class='row-fluid'>
      <div class='span2'></div>
      <div class='span8'>
<!-- top container -->

<div class='container-fluid'>
   <form class='form-horizontal' action='' method='post'>   
   <div class='row-fluid'>
<!-- contenu 1ere colonne -->     
<div class='span6'>        
   <fieldset>
   <legend> Caracteristiques </legend>

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
         <label class='control-label' for='annee'>Annee</label>
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
            <select class='span8'  name='pays' id='pays' >
             <?php foreach($pays as $key=>$value){ ?>
             <option><?php echo $value; ?> </option>
             <?php } ?>         
            </select>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='region'>Region</label>
         <div class='controls'>
            <input class='span8' type='text' name='region' id='region'/>
         </div>
      </div>

      <div class='control-group'>
         <label class='control-label' for='encepagement'>Encepagement</label>
         <div class='controls'>
            <select class='span8' multiple='multiple' >
             <?php for( $i=0; $i<$max=10; $i++){ ?>
             <option><?php echo 'test'. $i; ?> </option>
             <?php } ?>         
            </select>
            <span class='help-block'>Selectionnez plusieurs cepages en maintenant Shift.</span>
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
         <label class='control-label' for='date'>Date de degustation </label>
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
         <div class='btn-group' data-toggle="buttons-radio">
            <button  name='rouge'  type='button' class='btn'>Vin rouge</button>
            <button   name='blanc'  type='button' class='btn'>Vin blanc</button>
         </div>
      </div>
   </div> 
   <div class='control-group'>
   <label class='control-label' for='couleur'>Teinte </label>
      <div class='controls'>
         <select id='couleur' class='span4' name='date-mois' >
            <?php foreach($blanc as $key=>$value){ ?>
               <option><?php echo $value; ?> </option>
            <?php } ?>
         </select>         
      </div>
   <div>
</fieldset>

<fieldset>
<legend>Le nez</legend>
</fieldset>

<fieldset>
<legend>La bouche</legend>
</fieldset>

<fieldset>
<legend>Impression d'ensemble</legend>
</fieldset>
</div>     
<!--  -->
   </div>
<button class='btn btn-primary'>Soumettre</button>
   </form> 
</div>

<!-- top container -->
      </div>
   </div> 
</div>
</html>









