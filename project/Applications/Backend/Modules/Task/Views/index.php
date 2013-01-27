<div class='row-fluid'>
   <div class='span4 offset4'>
      <table class='table table-hover'>
         <caption>Cepages en attente d'approbation </caption>
         <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Status</th>
            <th>Action</th>
         </thead>
         <tbody>
         <?php foreach ($cepages as $cepage){
          echo '<tr><td>'. $cepage['id']. '</td><td>' .$cepage['encepagement']. '</td><td> ' . $cepage['status'].'</td><td><a href="task-delete-encepagements-'.$cepage['id'].'.html">Effacer</a> | <a href="task-approve-encepagements-'.$cepage['id'].'.html">Approuver</a></td></tr>';
          } ?>
         </tbody>
      </table>
   </div>
</div>

<hr>

<div class='row-fluid'>
   <div class='span4 offset4'>
      <table class='table table-hover'>
         <caption>Tags en attente d'approbation</caption>
         <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Status</th>
            <th>Action</th>
         </thead>
         <tbody>
         <?php foreach ($tags as $tag){
            echo '<tr><td>'. $tag['id']. '</td><td>' .$tag['tag']. '</td><td> ' . $tag['status'].'</td><td><a href="task-delete-tags-'.$tag['id'].'.html">Effacer</a> | <a href="task-approve-tags-'.$tag['id'].'.html">Approuver</a></td></tr>';
          } ?>
         </tbody>
      </table>
   </div>
</div>

