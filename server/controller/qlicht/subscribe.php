<?php 

include_once('/opt/lampp/htdocs/server/view/header.php');
include_once('/opt/lampp/htdocs/server/view/qlicht/subscribe.php');
if(isset($_GET['subscribestatus']) AND $_GET['subscribestatus']=='invalid'){
?>

<p class='invalidForm'> There is an error in your subscription. Please correct your form. </p>

<?php
}

?>
