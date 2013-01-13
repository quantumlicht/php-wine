<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
   <title>
      <?php if (!isset($title)) { ?>
      Philippe Guay.com
      <?php } else { echo $title; } ?>
   </title>

   <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
   <script type='text/javascript' src='/scripts/jquery/jquery.js'></script>
   <link href="/scripts/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
   <script type='text/javascript' src='/scripts/bootstrap/js/bootstrap.min.js'></script>
   <script type='text/javascript' src='/scripts/formload.js'></script>
   <script type='text/javascript' src='/scripts/utils.js'></script>

</head>

<body>

   <div class='page-header'>
      <div class='row-fluid'>
         <div class='span6 offset5'>
            <h1> QuantumLicht <small>Système de News</small> </h1>
         </div>
      </div>
   </div>

   <div class="container-fluid">
      <div class="row-fluid">
         <div class="span2"></div>
         <div class="span8">
            <div class='navbar navbar-inverse'>
               <div class="navbar-inner">
                  <a class='brand' href="#">Qlicht</a>
                  <ul class='nav'>
                     <li class='active'><a href="/">Accueil</a></li>
                     <li class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'> Les vins
                           <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu' role='menu' data-target="#" arial-labelledby="dropdownMenu">
                           <li><a href="/indexvins.html">Base de données</a></li>
                           <li><a href="/indexvins/search.html">Recherche de Vins</a></li>
                        </ul>
                     </li>
                     <?php if ($user->isAdmin()) { ?>
                     <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
                     <li><a href="/admin/">Admin</a></li>
                     <?php }

                     if (!$user->isAuthenticated() && !$user->isAdmin()){?>
                     <li><a href="/inscription.html">Inscription</a></li>
                     <?php }?>

                     <li><a href="/a-propos.html">A propos</a></li>
                  </ul>

                  <?php if (!$user->isAdmin() && !$user->isAuthenticated()){?>
                  <form class='navbar-form pull-right' action="/login.html" method="post">
                     <?php
                     echo $login;
                     ?>  
                     <button type='submit' name='submit' class='btn btn-primary'/>Entrer</button>
                  </form>
                  <?php }

                  if ($user->isAuthenticated()|| $user->isAdmin()){ ?>
                  <form class='navbar-form pull-right' action="/logout.html" method="post">
                     <input type='submit' value="Sortir"  class='btn btn-primary'/>
                  </form>
                  <?php } ?>

               </div>
            </div>
         </div>
      </div>

      <div class='row-fluid'>
         <div class="span2"></div>
         <div class="span8">
            <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

            <?php echo $content; ?>
         </div>
      </div>
   </div>  
</body>
</html>
