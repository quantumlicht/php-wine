<div class='loginMenu'>
      <form id="logForm" action='http://localhost/server/controller/login-action.php' method='post'>
         <table>
            <tr>
               <td id='inputField'>Username:</td>
               <td id='inputField'>Password:</td>
               <td></td>
            </tr>   
            <tr>
               <td><input type='text' id='login' name='username' /></td>
               <td><input type='password' id='login' name='password' /></td>
               <td>
                  <input type='submit' name='submit' id='navbutton' class='logbutton' value ='login'/>
               </td>
            </tr>
            <tr>
               <td style='color:#DDD7D7'><input type='checkbox' name='rememberMe' value='yes' /> Remember Me</td>
            </tr>
            

         </table>
      </form>
   </div>
