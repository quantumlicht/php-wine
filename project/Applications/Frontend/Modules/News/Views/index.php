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
<div class="hero-unit">
  <h1>Bienvenue !</h1>
  <p>Tagline</p>
  <!-- <p>
    <a class="btn btn-primary btn-large">
      Learn more
    </a>
  </p> -->
</div>

<?php
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
