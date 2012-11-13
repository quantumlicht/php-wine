<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <body>
	<div id='container'>
        <?php foreach ($posts as $post){ ?>
           <p>
              <?php echo $post['time']. ': '.$post['username'] . ': '. $post['content'];?>
           </p>
        <?php } ?> 
        </div>
        <div id='forumForm'>
        <form id='addContentForm' action='http://localhost/server/controller/forum/addContent.php' method='post'>
           <table>
              <tr>
                 <td><?php echo $_SESSION['username'] .':';  ?> </td>
                 <td><input type='text' id='commentBox' name='comment'/></td>
                 <td><input type='submit' name='submit' id='navbutton' value='Post'></td>
              </tr>
           </table>
	</form>
        </div>	
   </body>
</html>









