<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <div class='container-fluid'>
      
      <div class='row-fluid'>
         <div id='scrollContainer' class='span6 offset2' style='height:70%;max-height:70%;overflow-y:scroll;'>
           <?php foreach ($posts as $post){ ?>
              <div class='well well-small'>
                 <?php echo $post['time']. ': '.$post['username'] . ': '. $post['content'];?>
              </div>
           <?php } ?> 
         </div>
      </div>

      <div id='row-fluid'>
         <div class='span6 offset4'>
            <form id='addContentForm' action='http://localhost/server/controller/forum/addContent.php' method='post'>
               <?php echo $_SESSION['username'] .':';  ?>
               <input onmouseover='ScrollBottom()' type='text' id='commentBox' name='comment'/>
               <input type='submit' name='submit' id='navbutton' value='Post'>
	    </form>
        </div>
     </div>
   </div>	
</html>









