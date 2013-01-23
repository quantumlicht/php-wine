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
        PhilippeGuay.com
      <?php } else { echo $title; } ?>
    </title>
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
                        <li class='active'><a href="/"><i class="icon-home icon-white"></i></a></li>
                        <?php if ($user->isAdmin()) { ?>
                        <li><a href="/admin/"><i class="icon-pencil icon-white"></i> edit news</a></li>
                        <li><a href="/admin/news-insert.html"><i class="icon-plus icon-white"></i> add news</a></li>
                        <?php } ?>
                     </ul>
                     <?php if ($user->isAdmin()){ ?>
                      <form class='navbar-form pull-right' action="/admin/logout.html" method="post">
                        <input type='submit' value="Sortir"  class='btn btn-primary'/>
                      </form>
                    <?php } ?>
                  </div>
               </div>
            </div>
            <div class="span2"></div>
         </div>

         <div class='row-fluid'>
            <div class="span2"></div>
               <div class='span8'>
                  <div class="row-fluid">
                    <strong>En étant admin, vous pouvez aussi éditer ou supprimer les commentaires des posts qui sont affichés sur la page principale.
                    Pour y accéder, vous n'avez qu'à vous rendre sur la page principale en restant connecté à votre compte admin.
                    vous verrez alors que vous avez maintenant la possibilité d'éditer les commentaires.</strong>
                  </div>
                  <hr>
                  <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
                  <?php echo $content; ?>
               </div>
           <div class="span2"></div>
         </div>
      </div>

      <div id="footer"></div>
  </body>
</html>
