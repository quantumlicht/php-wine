<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <div class='container-fluid'>
      <div class='row-fluid'>
        <div class='span5 offset2'>
           <?php if (isset($_GET['accountCreationStatus']) AND $_GET['accountCreationStatus']=='success') { ?>
            <p ><strong>Le compte a été crée avec succès !</strong></p><?php }
           ?>
           <p class='well well-small'>Bienvenue!</br> Vous pouvez vous inscrire afin de participer au forum et partager vos dégustations ou simplement consulter l'index des vins et voir ce que les utilisateurs ont dit sur ce vin.</p>
        </div>
         <div class='span4'>
         <?php
         foreach ($users as $user)
         {
         ?>
            <div class='well well-small'>
               <strong>usager</strong> : <?php echo $user['username']; ?><br />
               <strong>courriel</strong> : <?php echo $user['email']; ?> <br />
               <strong>mot de passe</strong>: <?php echo $user['password']; ?> <br />
               <strong>date de creation</strong>: <?php echo $user['lastLogin']; ?> <br/>
            </div>
         <?php
         }
         ?> 
         </div>
   </div>
</html>
