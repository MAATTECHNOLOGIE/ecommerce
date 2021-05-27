<?php 
 if (!empty($_SESSION["clients"])) {
   echo '<script type="text/javascript">
 window.location="compteLg";
</script>';
 }
 else{
   echo '<!-- Page Content-->  
    <div class="container py-4 py-lg-5 my-4">
      <div class="row">
        
        <div class="col-md-6">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-1">Se connecter</h2>
             
              <hr>
              <h3 class="font-size-base pt-4 pb-2"></h3>
              <form method="GET" class="needs-validation" action="loginCpte" validate>
                

                <label>E-mail</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text"><i class="czi-mail"></i></span>
                  </div>
                  <input 
                  id="email" 
                  type="email" 
                  class="form-control prepended-form-control"name="email"
                  autocomplete="email"
                  required 
                  autofocus>
                </div>

                <label>Mot de Passe</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text">
                      <i class="czi-locked"></i>
                    </span>
                  </div>
                  <input 
                  id="password" 
                  type="password" 
                  class="form-control prepended-form-control"name="password"
                  autocomplete="password"
                  required 
                  autofocus>
                </div>

                <hr class="mt-4">
                <div class="text-right pt-4">
                  <button class="btn" style="background-color: #ffcc51;color: black;" type="submit">
                    <i class="czi-sign-in mr-2 ml-n21"></i>Se connecter
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-1">S\'inscrire</h2>
             
              <hr>
              <h3 class="font-size-base pt-4 pb-2"></h3>
              <form method="GET" class="needs-validation" action="signup" validate>
                 

                <label>Nom</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text">
                      <i class="czi-add-user"></i></span>
                  </div>
                  <input 
                  id="nom" 
                  type="text" 
                  class="form-control prepended-form-control" name="nom"
                  autocomplete="nom"
                  required 
                  autofocus>
                </div>

                <label>Prénom</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text">
                      <i class="czi-add-user"></i></span>
                  </div>
                  <input 
                  id="prenom" 
                  type="text" 
                  class="form-control prepended-form-control" name="prenom"
                  autocomplete="prenom"
                  required 
                  autofocus>
                </div>

                <label>Téléphone</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text">
                      <i class="czi-phone"></i></span>
                  </div>
                  <input 
                  id="tel" 
                  type="number" 
                  class="form-control prepended-form-control" name="number"
                  autocomplete="number"
                  required 
                  autofocus>
                </div>

                <label>E-mail</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text"><i class="czi-mail"></i></span>
                  </div>
                  <input 
                  id="email" 
                  type="email" 
                  class="form-control prepended-form-control" name="email"
                  autocomplete="email"
                  required 
                  autofocus>
                </div>

                <label>Mot de Passe</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text">
                      <i class="czi-locked"></i>
                    </span>
                  </div>
                  <input 
                  id="password" 
                  type="password" 
                  class="form-control prepended-form-control" name="password"
                  autocomplete="password"
                  required 
                  autofocus>
                </div>




                <hr class="mt-4">
                <div class="text-right pt-4">
                  <button class="btn" style="background-color:#ffcc51;color: black;" type="submit">
                    <i class="czi-sign-in mr-2 ml-n21"></i>Valider
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
';
 }
?>
    
