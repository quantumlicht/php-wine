  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <script type='text/javascript' src='http://philippeguay.com/jquery/jquery.js'></script>
      <link href="http://philippeguay.com/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <script type='text/javascript' src='http://philippeguay.com/bootstrap/js/bootstrap.min.js'></script>
      <script type='text/javascript' src='http://philippeguay.com/controller/utils.js'> </script>-

      <title>VinsIndexWine</title>
  </head>

<div class='page-header'>
   <h1> QuantumLicht <small>Index des vins // Wine index </small> </h1>
</div>

<div class='row-fluid'>
   <div class='span8 offset2'>
   <div class='navbar navbar-inverse'>
      <div class='navbar-inner'>
         <a class='brand' href='#'>L'index des vins</a>
         <ul class='nav'>
            <li class='active'><a href="http://philippeguay.com/qlicht.php">Menu Principal</a></li>
         <?php if(isset($_SESSION['username'])){ ?>    
           <li><a href="http://philippeguay.com/forum.php">Forum</a></li>
         <?php }?>
           <li><a href="http://philippeguay.com/indexvins.php">Index des vins</a></li> 
            <?php if(!isset($_SESSION['username'])){ ?>    
            <li><a href="http://philippeguay.com/controller/qlicht/subscribe.php">Formulaire d'inscription</a></li>
         <?php } ?>
         <li><a href="http://philippeguay.com/controller/mail/mailto.php">Contact</a></li>
         <li><a href="http://ca.linkedin.com/pub/philippe-guay/3a/4a8/845">About</a></li>
         <li class='divider-vertical'></li>
         <li><?php include_once('/opt/lampp/htdocs/server/controller/login.php'); ?></li>
         </ul>
      </div>
   </div>
   </div>
</div>
