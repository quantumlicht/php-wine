<div class='row-fluid'>
  <div class='span8 offset2'>
      <form class='form-horizontal'  action="/model/qlicht/subscribe_user.php"  method='post'> 
         <fieldset>
            <legend> Formulaire d'inscription</legend> 
            <div class='control-group'>
               <label class='control-label' for='username'>Username</label>
               <div class='controls'>   
                  <input type="text" onblur='isValidUsername(this.form)' placeholder='Username' name="username" id='username' />
               </div>
            </div>

            <div class='control-group'>
               <label class='control-label' for='email'>Email Address</label>
               <div class='controls'>   
                  <input type="text" onblur='isValidEmail(this.form)' placeholder='Email Address' name="email" id='email' />
               </div>
            </div>
            
             <div class='control-group'>
               <label class='control-label' for='pass'>Password</label>
               <div class='controls'>   
                  <input type="password" placeholder='Type Password' name="typePass" id='pass' />
               </div>
            </div>
            
            <div class='control-group'>
               <label class='control-label' for='repass'> Retype Password</label>
               <div class='controls'>   
                  <input type="password" onblur='isSamePassword(this.form)' placeholder='Retype Password' name="retypePass" id='repass' />
               </div>
            </div>

            <div class='control-group'>
               <div class='controls'>   
                  <button type='submit' class='btn'>Submit</button>
               </div>
            </div>

         </fieldset>
      </form>
   </div>
</div>
