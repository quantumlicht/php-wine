<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<div class='row-fluid'>
<div class='span8 offset2'>
   <form class='form-horizontal' action='' method='post'>   
      <fieldset>
         <legend> Fiche de degustation</legend>
         <div class='control-group'>
            <label class='control-label' for='region'>Region</label>
            <div class='controls'>
               <select id='scrollContainer' >
                  <?php for( $i=0; $i<$max=100; $i++){ ?>
                  <option><?php echo 'test'. $i; ?> </option>
                  <?php } ?>
               </select>
           </div>
         </div>
      </fieldset>
   </form>
</div>
</div>
</html>









