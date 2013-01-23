<html>
<body>
   <div class="row-fluid">
      <div class="span4"></div>
      <div class="span4">

         <form action="" method="post"
         enctype="multipart/form-data">
         <legend>Upload d'un fichier</legend>
         <div class="row-fluid">
            <strong>max file size : <?php echo $maxfilesize; ?></strong>
         </div>
         <div class="control-group">
         <div class="controls">
            <input type="file" name="file" id="file" value='Choisir fichier'/><br>
            <input  class='btn btn-primary' type="submit" name="submit" value="Soumettre">
         </div>
         </div>
      </form>
      <?php echo $content;?>
     <img src=<?php echo '"/media/'. $photo['fullname'].'"';?>>
   </div>
</div>
</body>
</html>
