  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <link href="boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
   <script src="boot/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/header.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/homepage.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/logMenu.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="http://localhost/server/stylesheet/forum.css" media="screen" />
      <link href='http://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
      <script type='text/javascript' src="http://code.jquery.com/jquery-latest.pack.js"></script>
      <script type='text/javascript' src='http://localhost/server/controller/onload.js'> </script>
      <script type='text/javascript' src='http://localhost/server/controller/formValidation.js'> </script>

      <title>DandBos</title>
  </head>


<header>
   <div class= 'navbar'> </div>
   <div id='navTitle'>QuantumLicht</div>
   <div id='navContainer'>
      <button type='button' id='navbutton' class='navbuttonPos' onclick='window.location.href="http://localhost/server/qlicht.php"'>Menu Principal</button>
  <?php if(isset($_SESSION['username'])){ ?>    
     <button type='button' id='navbutton' class='navbuttonPos' onclick='window.location.href="http://localhost/server/forum.php"'>Forum</button>
   <?php } ?> 
   <?php if(!isset($_SESSION['username'])){ ?>    
      <button type='button' id='navbutton' class='navbuttonPos' onclick="window.location.href='http://localhost/server/controller/qlicht/subscribe.php'">Formulaire d'inscription</button>
   <?php } ?>
      <button type='button' id='navbutton' class='navbuttonPos' onclick='window.location.href="http://localhost/server/controller/mail/mailto.php"'>Contact</button>
      <button type='button' id='navbutton' class='navbuttonPos' onclick='window.location ="http://ca.linkedin.com/pub/philippe-guay/3a/4a8/845"'>About</button>
      </div>

</header>
