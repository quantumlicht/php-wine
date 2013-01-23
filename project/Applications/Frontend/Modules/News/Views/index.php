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
}?>

