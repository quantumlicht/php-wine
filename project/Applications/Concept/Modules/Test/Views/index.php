<div id="myCarousel" class="carousel slide">
 <!-- Carousel items -->
 <div class="carousel-inner">
  <div class="active item" style="height:800px">
   <img width="800" height="400" src="/images/random1.jpg" alt="some_text">
</div>
<div class="item">
   <img width="800" height="400" src="/images/random2.jpg" alt="some_text">
</div>
<div class="item">
   <img width="800" height="400" src="/images/random3.jpg" alt="some_text">
</div>
<div class="item">
   <img width="800" height="400" src="/images/random4.jpg" alt="some_text">
</div>
</div>
<!-- Carousel nav -->
<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>


<?php
//Get the contents of the Facebook page
$FBpage = file_get_contents('https://graph.facebook.com/christel.contant/feed?access_token=152350528247754|EqL-K9JMPaculqSnLTqLZ607Wrk');
echo $FBpage;
//Interpret data with JSON
$FBdata = json_decode($FBpage);
//Loop through data for each news item
foreach ($FBdata->data as $news ) {
//Explode News and Page ID's into 2 values
$StatusID = explode("_", $news->id);
echo '<li>';
//Check for empty status (for example on shared link only)
if (!empty($news->message)) { echo $news->message; }
echo '</li>';
}
?>
   <!-- access_token=152350528247754|EqL-K9JMPaculqSnLTqLZ607Wrk -->

