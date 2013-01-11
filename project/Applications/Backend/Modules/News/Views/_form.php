<form class='form-horizontal' action="" method="post">
   <?php 
   echo $form;
   ?>
   
   <div class="control-group">
      <div class="controls">
         <?php if(isset($news) && !$news->isNew()){ ?>

            <input type="hidden" name="id" value="<?php echo $news['id']; ?>" />
            <input class='btn btn-primary' type="submit" value="Modifier" name="modifier" />
         <?php
         }
         else
         { ?>

            <input class='btn btn-primary' type="submit" value="Ajouter" />
         <?php
         } ?>
          
      </div>
   </div>
</form>
