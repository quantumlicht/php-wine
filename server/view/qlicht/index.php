<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <body>Site Pour apprendre le PHP ,MySQL et Apache
   
   <?php if (isset($_GET['accountCreationStatus']) AND $_GET['accountCreationStatus']=='success') { ?>
      <p class='accountCreationSuccess'>Account was created successfully !</p><?php }
   //TODO : text to display when we get a invalidLogin response in the url
   
   ?>

   </body>
   <aside>
      <div id='usercontainer'>
      <?php
      foreach ($users as $user)
      {
      ?>
         <div class='usertile'>
            <div id='userinfo'><strong>user</strong> : <?php echo $user['username']; ?><br /></div>
            <div id='userinfo'><strong> email</strong> : <?php echo $user['email']; ?> <br /></div>
            <div id='userinfo'><strong>password</strong>: <?php echo $user['password']; ?> <br /></div>
            <div id='userinfo'><strong>last login</strong>: <?php echo $user['lastLogin']; ?> <br /></div>
         </div>
      <?php
      }
      ?>
      </div>
   </aside>
</html>
