<?php 
include_once('/opt/lampp/htdocs/server/controller/header.php');
include_once('/opt/lampp/htdocs/server/view/subscribe/index.php');
if(isset($_GET['subscribestatus']) AND $_GET['subscribestatus']=='invalid'){
?>

<p class='invalidForm'> There is an error in your subscription. Please correct your form. </p>

<?php
}

?>
