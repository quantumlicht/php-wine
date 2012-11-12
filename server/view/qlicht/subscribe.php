<html>
 <head>
   <body>
      <form id='inputForm' action="/server/model/qlicht/subscribe_user.php"  method='post'> 
        <table >
          <tr>
            <td>Votre Nom d'utilisateur:</td>
            <td><input type="text" onblur='isValidUsername(this.form)' name="username" id='user' /></td>
            <td> <img src='http://localhost/server/stylesheet/invalid_pass.png'  width="25" height="25" style='display:none' id='invalidUsername'> </td>
            <td class='error' id ='errorUser'></td>
          </tr>

          <tr>
            <td> Votre Adresse Email:</td>
            <td> <input type="text" onblur='isValidEmail(this.form)' name="email" id='email' /> </td>
            <td> <img src='http://localhost/server/stylesheet/invalid_pass.png'  width="25"  height="25" style='display:none' id='invalidEmail'> </td>
            <td class='error' id='errorEmail'></td>
          </tr>

          <tr>
            <td>Définir un mot de passe:</td>
            <td><input  type="password" name="typePass" id='pass'/></td>
          </tr>
          <tr>
            <td> Réécrire votre mot de passe:</td>
            <td> <input  type='password' onblur='isSamePassword(this.form)' name='retypePass' id='repass' /> </td>
            <td> <img src='http://localhost/server/stylesheet/invalid_pass.png'  width="25" height="25" style='display:none' id='invalidPass'> </td>
            <td class ='error' id='errorPass'></td>
          </tr>
          <tr>
            <td><span id='formNotValid'></span></td><td><input id='submitButton' type='submit' value='soumettre'></td><td></td>
          </tr>

        </table>
      </form>


   </body>
</html>
