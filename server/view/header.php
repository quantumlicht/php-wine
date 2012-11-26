  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link href="http://localhost/server/boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />

      <script src="http://localhost/server/boot/js/bootstrap.min.js"></script>
  <!--    <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/header.css" media="screen" /> -->
  <!--    <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/homepage.css" media="screen" />-->
 <!--      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/logMenu.css" media="screen" />-->
 <!--     <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/forum.css" media="screen" /> -->
      <script type='text/javascript' src="http://localhost/server/jquery/jquery.js"></script>
<!--      <script type='text/javascript' src='http://localhost/server/controller/onload.js'> </script> -->
      <script type='text/javascript' src='http://localhost/server/controller/utils.js'> </script>

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
            <li class='active'><a href="http://localhost/server/qlicht.php">Menu Principal</a></li>
         <?php if(isset($_SESSION['username'])){ ?>    
           <li><a href="http://localhost/server/forum.php">Forum</a></li>
         <?php }?>
           <li><a href="http://localhost/server/indexvins.php">Index des vins</a></li> 
            <?php if(!isset($_SESSION['username'])){ ?>    
            <li><a href="http://localhost/server/controller/qlicht/subscribe.php">Formulaire d'inscription</a></li>
         <?php } ?>
         <li><a href="http://localhost/server/controller/mail/mailto.php">Contact</a></li>
         <li><a href="http://ca.linkedin.com/pub/philippe-guay/3a/4a8/845">About</a></li>
         <li class='divider-vertical'></li>
         <li><?php include_once('/opt/lampp/htdocs/server/controller/login.php'); ?></li>
         </ul>
      </div>
   </div>
   </div>
</div>
