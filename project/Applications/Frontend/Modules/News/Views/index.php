<!-- <div class="pagination pagination-centered">
  <ul>
   <?php
   if($activePage<=1)
   {
      echo '<li class="disabled"><a href="#"> << </a></li>';
   }
   else
   {
      echo '<li><a href="page-'.($activePage-1).'.html"> << </a></li>';
   }


   for($i=1; $i<=$nb_page;$i++)
   {
      if($i==$activePage)
      {
        echo '<li class="active"><a href="page-'.$i.'".html>'.$i.'</a></li>';
      }
      else
      {
        echo'<li><a href="page-'.$i.'.html">'.$i.'</a></li>';
      }
   }


   if($activePage>=$nb_page){
      echo'<li class="disabled"><a href="#"> >> </a></li>';
   }
   else
   {
      echo'<li><a href="page-'.($activePage+1).'.html"> >> </a></li>';
   }
   ?>
  </ul>
</div> -->
<?php if($activePage==1){ ?>

<div class="hero-unit">
  <h1>Bienvenue !</h1>
  <p>Créez un compte pour commencer à partager vos dégustations et en discuter avec les autres membres.</p>
  <p>
    <a class="btn btn-primary btn-large" href="/admin/">
      DEBUG--Section Admin
    </a>
  </p>
</div>


<?php }
foreach ($listeNews as $news)
{
?>
<div class="row-fluid">
   <div class="span12 well well-small">
      <p class='lead'><a href="news-<?php echo $news['id']; ?>.html"><?php echo $news['titre']; ?></a> <small><?php echo $news['dateAjout']->format('d-m-Y'); ?></small></p>
      <p><?php echo nl2br($news['contenu']); ?></p>
   </div>
</div>
<?php
} ?>

<div class="pagination pagination-centered">
  <ul>
   <?php
   if($activePage<=1)
   {
      echo '<li class="disabled"><a href="#"> << </a></li>';
   }
   else
   {
      echo '<li><a href="page-'.($activePage-1).'.html"> << </a></li>';
   }


   for($i=1; $i<=$nb_page;$i++)
   {
      if($i==$activePage)
      {
        echo '<li class="active"><a href="page-'.$i.'".html>'.$i.'</a></li>';
      }
      else
      {
        echo'<li><a href="page-'.$i.'.html">'.$i.'</a></li>';
      }
   }


   if($activePage>=$nb_page){
      echo'<li class="disabled"><a href="#"> >> </a></li>';
   }
   else
   {
      echo'<li><a href="page-'.($activePage+1).'.html"> >> </a></li>';
   }
   ?>
  </ul>
</div>
