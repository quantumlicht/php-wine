
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type='text/javascript' src='http://philippeguay.com/jquery/jquery.js'></script>
      <link href="http://philippeguay.com/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <script type='text/javascript' src='http://philippeguay.com/bootstrap/js/bootstrap.min.js'></script>
      <script type='text/javascript' src='http://philippeguay.com/controller/utils.js'> </script>
      <?php if (basename($_SERVER['REQUEST_URI'],".php")=='indexvins'){ ?>
        <script type='text/javascript' src='http://philippeguay.com/controller/formload.js'></script>
        <script type='text/javascript' src='http://philippeguay.com/controller/formValidation.js'></script>         
      <?php } ?>

    <title>VinsIndexWine</title>
  </head>

<div class='page-header'>
  <div class='row-fluid'> 
     <div class='span6 offset5'>
        <h1> QuantumLicht <small>Index des vins // Wine index </small> </h1>
     </div>
  </div>
</div>

<div class='container-fluid'>
   <div class='row-fluid'>
   <div class='span2'></div>
   <div class='span8'> 
   <div class='navbar navbar-inverse'>
      <div class='navbar-inner'>
         <a class='brand' href='#'>L'index des vins</a>
         <ul class='nav'>
            <li <?php echo "class='". getActiveTab('qlicht')."'"; ?>>
               <a href="http://philippeguay.com/qlicht.php">Menu Principal</a></li>

            <?php if(isset($_SESSION['username'])){ ?>    
            <li <?php echo "class='". getActiveTab('forum')."'";?>>
               <a href="http://philippeguay.com/forum.php">Forum</a></li>
            <?php }?>

            <li <?php echo "class='dropdown ". getActiveTab('indexvins,search')."'"?> >
               <a class='dropdown-toggle' data-toggle='dropdown' href='#'> Les vins
                  <b class='caret'></b>
               </a>
               <ul class='dropdown-menu' role='menu'> 
                  <li><a href="http://philippeguay.com/indexvins.php">Base de données</a></li>
                  <li><a href="http://philippeguay.com/search.php">Recherche de Vins</a></li>
               </ul>
      
            </li> 

            <?php if(!isset($_SESSION['username'])){ ?>    
            <li <?php echo "class='". getActiveTab('subscribe')."'"; ?>>
               <a href="http://philippeguay.com/subscribe.php">Inscription</a></li>
            <?php } ?>

            <li <?php echo "class='". getActiveTab('mailto')."'";?>>
               <a href="http://philippeguay.com/controller/mail/mailto.php">Contact</a></li>

            <li>
               <a href="http://ca.linkedin.com/pub/philippe-guay/3a/4a8/845">À propos</a></li>

            <li class='divider-vertical'></li>
         </ul>
         <?php include_once('/opt/lampp/htdocs/server/controller/login.php'); ?>
      </div>
   </div>
   </div>
   </div>
</div>
