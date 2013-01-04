<p><a href="#">Deconnexion</a></p>
<p style="text-align: center">Il y a actuellement <?php echo $nombreNews; ?> news. En voici la liste :</p>

<table class='table table-hover'>
	<thead>
		<tr>
			<th>Auteur</th>
			<th>Titre</th>
			<th>Date d'ajout</th>
			<th>Dernière modification</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($listeNews as $news)
		{
	  		echo '<tr><td>', $news['auteur'], '</td><td>', $news['titre'], '</td><td>le ', $news['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', ($news['dateAjout'] == $news['dateModif'] ? '-' : 'le '.$news['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="news-update-', $news['id'], '.html">Modifier</a> <a href="news-delete-', $news['id'], '.html">Supprimer</a></td></tr>', "\n";
		}
		?>
	</tbody>
</table>
