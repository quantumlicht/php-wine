<?php
foreach ($listeNews as $news)
{
?>
<div class="row-fluid">
	<div class="span6 well well-small">
  		<h4><a href="news-<?php echo $news['id']; ?>.html"><?php echo $news['titre']; ?></a></h4>
  		<p><?php echo nl2br($news['contenu']); ?></p>
	</div>
</div>
<?php
}?>

