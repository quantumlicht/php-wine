<div class='row-fluid'>
   <div class='span8' >
      <table class='table table-hover'>
         <caption>Liste des vins </caption>
         <thead>
            <th>Nom</th>
            <th>Producteur</th>
            <th>Année</th>
            <th>Appelation</th>
         </thead>
         <tbody>
         <?php foreach ($listeVins as $vin){
          echo '<tr><td><a href="/indexvins/fiche-'.$vin->id().'.html">'. $vin->nom(). '</a></td><td>' .$vin->producteur(). '</td><td> ' . $vin->annee().'<td>'. $vin->appelation(). '</tr>';
          } ?>
         </tbody>
      </table>
   </div>
</div>
