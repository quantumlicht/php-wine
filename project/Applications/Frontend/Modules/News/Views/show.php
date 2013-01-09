<p><strong><?php echo $news['auteur']; ?></strong>, le <?php echo $news['dateAjout']->format('d/m/Y à H\hi'); ?></p>
<h4><?php echo $news['titre']; ?></h4>
<p><?php echo nl2br($news['contenu']); ?></p>

<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?php echo $news['dateModif']->format('d/m/Y à H\hi'); ?></em></small></p>
<?php } ?>

<hr>
<p><a href="commenter-<?php echo $news['id']; ?>.html">Ajouter un commentaire</a></p>
<?php
if (empty($comments))
{
?>
  <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
?>
  <fieldset>
    <div class="row-fluid">
      
      <strong> <?php echo htmlspecialchars($comment['auteur']); ?></strong> le <?php echo $comment['date']->format('d/m/Y à H\hi'); ?>
      <?php if ($user->isAdmin()) { ?> -
        <a href="admin/comment-update-<?php echo $comment['id']; ?>.html">Modifier</a> |
        <a href="admin/comment-delete-<?php echo $comment['id']; ?>.html">Supprimer</a>
      <?php } ?>
    <p class='well well-small'><?php echo nl2br(htmlspecialchars($comment['contenu'])); ?></p>
    </div>
  </fieldset>
<?php
}
?>

<!-- <p><a href="commenter-<?php echo $news['id']; ?>.html">Ajouter un commentaire</a></p> -->
