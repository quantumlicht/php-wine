<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <div>Site Pour apprendre le PHP ,MySQL et Apache</div>
   
   <?php if (isset($_GET['accountCreationStatus']) AND $_GET['accountCreationStatus']=='success') { ?>
      <p class='accountCreationSuccess'>Account was created successfully !</p><?php }
   //TODO : text to display when we get a invalidLogin response in the url
   
   ?>

   <div class='row-fluid' >
      <div class='span3 offset7'>
      <?php
      foreach ($users as $user)
      {
      ?>
         <div class='well well-small'>
            <strong>user</strong> : <?php echo $user['username']; ?><br />
            <strong> email</strong> : <?php echo $user['email']; ?> <br />
            <strong>password</strong>: <?php echo $user['password']; ?> <br />
            <strong>last login</strong>: <?php echo $user['lastLogin']; ?> <br/>
         </div>
      <?php
      }
      ?> 
      </div>
   </div>
</html>
