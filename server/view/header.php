  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link href="http://localhost/server/boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <script src="http://localhost/server/boot/js/bootstrap.min.js"></script>
  <!--    <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/header.css" media="screen" /> -->
  <!--    <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/homepage.css" media="screen" />-->
 <!--      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/logMenu.css" media="screen" />-->
      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/forum.css" media="screen" />
      <link href='http://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
      <script type='text/javascript' src="http://code.jquery.com/jquery-latest.pack.js"></script>
<!--      <script type='text/javascript' src='http://localhost/server/controller/onload.js'> </script> -->
      <script type='text/javascript' src='http://localhost/server/controller/formValidation.js'> </script>

      <title>DandBos</title>
  </head>

<div class='page-header'>
   <h1> QuantumLicht <small>Learning something here.. </small> </h1>
</div>

<div class='container'>
   <div class='navbar'>
      <div class='navbar-inner'>
         <a class='brand' href='#'>Qlicht</a>
         <ul class='nav'>
            <li class='active'><a href="http://localhost/server/qlicht.php">Menu Principal</a></li>
         <?php if(isset($_SESSION['username'])){ ?>    
           <li><a href="http://localhost/server/forum.php">Forum</a></li>
         <?php } 
            if(!isset($_SESSION['username'])){ ?>    
            <li><a href="http://localhost/server/controller/qlicht/subscribe.php">Formulaire d'inscription</a></li>
         <?php } ?>
         <li><a href="http://localhost/server/controller/mail/mailto.php">Contact</a></li>
         <li><a href="http://ca.linkedin.com/pub/philippe-guay/3a/4a8/845">About</a></li>
         </ul>
      </div>
   </div>
</div>
