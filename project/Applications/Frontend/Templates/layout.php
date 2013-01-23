<!DOCTYPE html>
<html>
<head>

   <meta http-equiv="Content-type" content="text/html; charset=utf8" />
   <script type='text/javascript' src='/scripts/jquery/jquery.js'></script>
   <link href="/scripts/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
   <script type='text/javascript' src='/scripts/bootstrap/js/bootstrap.min.js'></script>
   <script type='text/javascript' src='/scripts/formload.js'></script>
   <script type='text/javascript' src='/scripts/utils.js'></script>

   <title>
      <?php if (!isset($title)) { ?>
      Philippe Guay.com
      <?php } else { echo $title; } ?>
   </title>
</head>

<body>
   <div class='page-header'>
      <div class='row-fluid'>
         <div class="span4"></div>
         <div class='span4' style="text-align:center">
            <h1> QuantumLicht <small>Répertoire des vins</small> </h1>
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
                     <li class='active'><a href="/"> <i class="icon-home"></i> Accueil</a></li>
                     <?php if ($user->isAuthenticated()){?>
                        <li class='dropdown'>

                           <a class='dropdown-toggle' data-toggle='dropdown' href='#'><img style="position:relative;top:-2px" src="/media/bottle-white.png" heigth="14" width="18"/> Les vins
                              <b class='caret'></b>
                           </a>

                           <ul class='dropdown-menu' role='menu' data-target="#" arial-labelledby="dropdownMenu">
                              <li><a href="/indexvins.html"><i class="icon-share-alt"></i> Partagez une dégustation</a></li>
                              <li><a href="/indexvins/search.html"><i class="icon-search"></i> Recherchez des vins</a></li>
                              <li><a href="/indexvins/comment.html"><i class="icon-comment"></i> Commentez les vins</a></li>
                           </ul>
                        </li>

                     <?php } if (!$user->isAuthenticated() && !$user->isAdmin()){?>
                        <li><a href="/inscription.html"><i class="icon-pencil icon-white"></i> Inscription</a></li>
                     <?php }?>
                     <li><a href="/courriel.html"><i class="icon-envelope icon-white"></i> Contact</a></li>

                     <li><a href="/lien-externe-apropos.html"> <i class="icon-question-sign icon-white"></i> À propos</a></li>
                     <li><a href="/lien-externe-github.html"> <img style="position:relative;top:-2px" src="/media/github-white.png" heigth="19" width="19"/> Github</a></li>
                     <li class='divider-vertical'></li>
                     <?php  if ($user->isAdmin()) { ?>
                        <li><a href="/admin/"><i class="icon-th-large icon-white"></i> Admin</a></li>
                        <li><a href="/admin/news-insert.html"><i class="icon-plus icon-white"></i> add news</a></li>
                     <?php } ?>
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
                  <?php } if ($user->isAuthenticated()){ ?>
                     <ul class='nav pull-right'>
                        <li>
                           <a href='#'><i class="icon-user icon-white"></i>
                              <?php echo $user->getAttribute('username');} ?>
                           </a>
                        </li>
                     </ul>

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
