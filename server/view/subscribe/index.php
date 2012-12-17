<div class='container-fluid'>
<div class='row-fluid'>
  <div class='span2'></div>
  <div class='span4'>
      <form id='subscription' class='form-horizontal'  action="/model/subscribe/subscribe_user.php"  method='post'> 
         <fieldset>
            <legend> Formulaire d'inscription</legend> 
            <div id='control-group-username' class='control-group'>
               <label class='control-label' for='username'>Nom d'utilisateur</label>
               <div class='controls'>   
                  <input class='span8'id='username' type="text" onblur='isValidUsername(this.form)' placeholder='Usager' name="username" id='username' />
               </div>
            </div>

            <div id='control-group-courriel' class='control-group'>
               <label class='control-label' for='email'>Adresse Courriel</label>
               <div class='controls'>   
                  <input class='span8' id='email' type="text" onblur='isValidEmail(this.form)' placeholder='Adresse Courriel' name="email" id='email' />
               </div>
            </div>
            
             <div id='control-group-pass' class='control-group'>
               <label class='control-label' for='pass'>Mot de passe</label>
               <div class='controls'>   
                  <input class='span8' id='pass' type="password" onblur='isSamePassword(this.form)' placeholder='Saisir mot de passe' name="typePass" id='pass' />
               </div>
            </div>
            
            <div id='control-group-repass' class='control-group'>
               <label class='control-label' for='repass'>Resaisir le mot de passe</label>
               <div class='controls'>   
                  <input class='span8' id='repass' type="password" onblur='isSamePassword(this.form)' placeholder='Resaisir mot de passe' name="retypePass" id='repass' />
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
</div>
