<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2"></div>
		<div class="span8">
			<?php
			foreach ($listeNews as $news)
			{
			?>
				<div class="row-fluid">
					<div class="span8 well well-small">
				  		<h4><a href="news-<?php echo $news['id']; ?>.html"><?php echo $news['titre']; ?></a></h4>
				  		<p><?php echo nl2br($news['contenu']); ?></p>
					</div>
				</div>
			<?php
			}?>

		</div>
		<div class="span2"></div>
	</div>
</div>
