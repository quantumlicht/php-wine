<div id="commentWell" class="well">
   <img src="/media/<?php echo $fichevin->fichier();?>" style="width:128px;height:128px" >
   <?php echo '<b>'. $fichevin->nom(). '</b>'.
      '<p> <b>Producteur: </b>'.$fichevin->producteur().'</p>'.
      '<p> <b>Année: </b>'.$fichevin->annee().'</p>'.
      '<p> <b>Région: </b>'.$fichevin->region().'</p>'.
      '<p> <b>Date: </b>'.$fichevin->date().'</p>'.
      '<p> <b>Code SAQ: </b>'.$fichevin->code_saq().'</p>'.
      '<p> <b>Prix: </b>'.$fichevin->prix().' $</p>'.
      '<p> <b>Pays: </b>'.$fichevin->pays().'</p>';

   ?>

<form class='form-horizontal' action="" method="post">
   <?php
   echo $commentForm;
   ?>

   <div class="control-group">
      <div class="controls">
         <?php if(isset($comment) && !$comment->isNew()){ ?>

            <input type="hidden" name="id" value="<?php echo $news['id']; ?>" />
            <input class='btn btn-primary' type="submit" value="Modifier" name="modifier" />
         <?php
         }
         else
         { ?>

            <input class='btn btn-primary' type="submit" value="Commenter" />
         <?php
         } ?>

      </div>
   </div>
</form>
   <button class="btn btn-primary ajaxCaller" >Masquer les commentaires</button>
</div>
<div id="comments" style="display:block;">

</div>


