<!DOCTYPE html>
<html>
<head>

   <meta http-equiv="Content-type" content="text/html; charset=utf8" />
   <script type='text/javascript' src='/scripts/jquery/jquery.js'></script>
   <link href="/scripts/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
   <script type='text/javascript' src='/scripts/bootstrap/js/bootstrap.min.js'></script>
   <!--<script type='text/javascript' src='/scripts/formload.js'></script>
   <script type='text/javascript' src='/scripts/utils.js'></script>-->

   <title>
      <?php if (!isset($title)) { ?>
      Philippe Guay.com
      <?php } else { echo $title; } ?>
   </title>
</head>

<body>
   <div class="row-fluid">
      <div class="span12" style="height:200px;border-color:black;border-style:solid">
         <div class="span4"></div>
         <div class="span4" style="text-align: center;">HEADER</div>
         <div class="span4"></div>
      </div>
   </div>

   <div class="row-fluid">
      <div class="span8">
         <div class="pagination">
          <ul >
           <li><a style="line-height:100px;width:200px"href="#">1</a></li>
           <li><a style="line-height:100px;width:200px" href="#">2</a></li>
           <li><a style="line-height:100px;width:200px" href="#">3</a></li>
           <li><a style="line-height:100px;width:200px" href="#">4</a></li>
        </ul>
     </div>

  </div>
</div>


<div class="container-fluid">
   <div class='row-fluid'>
      <div class="span8">
         <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

         <?php echo $content; ?>
      </div>
      <div class="span4"></div>
   </div>
</div>
</body>
</html>
