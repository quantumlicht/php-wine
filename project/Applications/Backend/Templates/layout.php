<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>
      <?php if (!isset($title)) { ?>
        Mon super site
      <?php } else { echo $title; } ?>
    </title>
    
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <script type='text/javascript' src='/jquery/jquery.js'></script>
    <link href="/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
    <script type='text/javascript' src='/bootstrap/js/bootstrap.min.js'></script>
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
                        <?php if ($user->isAdmin()) { ?>
                        <li><a href="/admin/">Admin</a></li>
                        <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
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
                  <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
             
                  <?php echo $content; ?>
               </div>
           <div class="span2"></div>
         </div>
      </div>  
    
      <div id="footer"></div>
  </body>
</html>
