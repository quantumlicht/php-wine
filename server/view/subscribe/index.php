<div class='row-fluid'>
  <div class='span8 offset2'>
      <form class='form-horizontal'  action="/model/qlicht/subscribe_user.php"  method='post'> 
         <fieldset>
            <legend> Formulaire d'inscription</legend> 
            <div class='control-group'>
               <label class='control-label' for='username'>Nom d'utilisateur</label>
               <div class='controls'>   
                  <input class='span4' type="text" onblur='isValidUsername(this.form)' placeholder='Usager' name="username" id='username' />
               </div>
            </div>

            <div class='control-group'>
               <label class='control-label' for='email'>Addresse Courriel</label>
               <div class='controls'>   
                  <input class='span4' type="text" onblur='isValidEmail(this.form)' placeholder='Addresse Courriel' name="email" id='email' />
               </div>
            </div>
            
             <div class='control-group'>
               <label class='control-label' for='pass'>Mot de passe</label>
               <div class='controls'>   
                  <input class='span4' type="password" placeholder='Saisir mot de passe' name="typePass" id='pass' />
               </div>
            </div>
            
            <div class='control-group'>
               <label class='control-label' for='repass'>Resaisir le mot de passe</label>
               <div class='controls'>   
                  <input class='span4' type="password" onblur='isSamePassword(this.form)' placeholder='Resaisir mot de passe' name="retypePass" id='repass' />
               </div>
            </div>

            <div class='control-group'>
               <div class='controls'>   
                  <button type='submit' class='btn'>Soumettre</button>
               </div>
            </div>

         </fieldset>
      </form>
   </div>
</div>
