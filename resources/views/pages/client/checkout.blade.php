@php
 $liv = array('pays'=>$_POST['pays'],
              'vile'=>$_POST['vile'],
              'livcout'=>$_POST['liv']);
 $_SESSION["liv"] = $liv;
/* dd($_SESSION["liv"]);*/
@endphp

<!-- Page Title (Shop)-->
    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" 
              	href="#"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Boutique</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Vérification</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <section class="col-lg-12">
          <?php if (empty($_SESSION["clients"])) { ?>
          <!-- Steps-->
          <div class="steps steps-light pt-2 pb-3 mb-5">
            <a class="step-item panier active" href="#">
              <div class="step-progress">
                <span class="step-count">1</span>
              </div>
              <div class="step-label"><i class="czi-cart"></i>Panier</div></a><a class="step-item active current" href="#">
              <div class="step-progress"><span class="step-count">2</span></div>
              <div class="step-label"><i class="czi-user-circle"></i>Vos coordonnés</div></a>
              <a class="step-item" href="#">
              <div class="step-progress"><span class="step-count">4</span></div>
              <div class="step-label"><i class="czi-card"></i>Paiement</div></a>
              <a class="step-item" href="#">
              <div class="step-progress">
                <span class="step-count">5</span>
              </div>
              <div class="step-label">
                <i class="czi-check-circle"></i>Resumé
              </div></a>
          </div>
          <!-- Autor info-->
        
         <!-- Page Content-->  
       <div class="container py-4 py-lg-5 my-4">
       <div class="row">
        
        <div class="col-md-6">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-1">Se connecter</h2>
             
              <hr>
              <h3 class="font-size-base pt-4 pb-2"></h3>
              <form method="get" class="needs-validation" action="loginCpte" validate>
                 @csrf

                <label>E-mail</label>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay">
                    <span class="input-group-text"><i class="czi-mail"></i></span>
                  </div>
                  <input 
                  id="email" 
                  type="email" 
                  class="form-control prepended-form-control" name="email"
                  value="" 
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
                  value="" 
                  autocomplete="password"
                  required 
                  autofocus>
                </div>

                <hr class="mt-4">
                <div class="text-right pt-4">
                  <input type="hidden" name="achat" value="1">
                  <button class="btn btn-primary"{{--  style="background-color: #b72d2b;color: white;" --}} type="submit">
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
              <h2 class="h4 mb-1">S'inscrire</h2>
             
              <hr>
              <h3 class="font-size-base pt-4 pb-2"></h3>
              <form method="GET" class="needs-validation" action="signup" validate>
                 @csrf

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
                  value="" 
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
                  value="" 
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
                  value="" 
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
                  value="" 
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
                  value="" 
                  autocomplete="password"
                  required 
                  autofocus>
                </div>




                <hr class="mt-4">
                <div class="text-right pt-4">
                  <input type="hidden" name="achat" value="1">
                  <button class="btn btn-primary" {{-- style="background-color: #b72d2b;color: white;" --}} type="submit">

                    <i class="czi-sign-in mr-2 ml-n21"></i>Valider
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

       </div>
       </div>
        <?php } else{?>
           <!-- Steps-->
          <div class="steps steps-light pt-2 pb-3 mb-5">
            
            <a class="step-item active" href="#">
              <div class="step-progress">
                <span class="step-count">1</span>
              </div>
              <div class="step-label"><i class="czi-cart"></i>Panier</div>
            </a>
              
            <a class="step-item active current" href="#">
              <div class="step-progress"><span class="step-count">2</span></div>
              <div class="step-label">
                <i class="czi-user-circle"></i>
              Vos coordonnés</div>
            </a>

            <a class="step-item active" href="#">
              <div class="step-progress"><span class="step-count">4</span></div>
              <div class="step-label"><i class="czi-card"></i>Paiement</div></a>
              <a class="step-item" href="#">
              <div class="step-progress">
                <span class="step-count">5</span>
              </div>
              <div class="step-label">
                <i class="czi-check-circle"></i>Validé
              </div>
            </a>

          </div>
          <div class="row">
                <!-- Page Content-->
    <div class="container mb-sm-4">
      <div class="pt-4">
        <div class="card py-3 mt-sm-3">
          <div class="card-body text-center" id="payCmnd">
            <h2 class="h4 pb-3">
              Paiement de la commande
            </h2>

            <img src="{{asset('client/img/about/OIP.jpg')}}" 
            alt="Moyen de Paiement">
            <a class="btn btn-success mt-3 mr-3 bfLiv"
               href="buyComd">
               <i class="czi-euro-circle"></i>&nbsp;Payer à la livraison
            </a>

          <button type="button" class="btn btn-success d-none btnLoad">
            <span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
              En cours ...
          </button>
         

            <a class="btn btn-primary mt-3 buybefore" href="#payCmnd">
              <i class="czi-euro-circle"></i>&nbsp;
              Payer maintenant
            </a>

              <button id="bt_get_signature" style="display: none;"></button>

          </div>
        </div>
      </div>
    </div>


          </div>
      <div class="pt-4 bg-darker">
        <div class="container">
          <div class="row pb-3">
            <div class="col-md-3 col-sm-6 mb-2">
              <div class="media"><i class="czi-rocket text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Livraison rapide</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Délais de livraison respectés</p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-2">
              <div class="media"><i class="czi-card text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Paiement sécurisé</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Certificat SSL / Fiabilité Attesté</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-2">
              <div class="media"><i class="czi-support text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Service client {{ getSite() }}</h6>
                  <p class="mb-0 font-size-ms text-light ">24 H/24 au <span class="text-primary">{{ '+'.getTel() }}</span> </p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-2">
              <div class="media"><i class="czi-currency-exchange text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Remboursement fond</h6>
                  <p class="mb-0 font-size-ms text-light ">Consulter l'article 13 du 
                    <a href="#cgu" class="cgu">CGU</a></p>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
        <?php }?>
        </section>

      </div>
    </div>

{{-- MODAL D'INFO DE PAIEMENT  --}}
<!-- Modal markup -->

{{-- MODAL D'INFO DE PAIEMENT  --}}

<script src="{{ asset('js/abonnement.js') }}"></script>

<script type="text/javascript">
  $(".bfLiv").click(function()
  {
     $(".btnLoad").attr('class','btn btn-success mt-3 mr-3 btnLoad');

     $(".bfLiv").hide();

  });


  $(".buybefore").click(function()
  {
     $(".buybefore").hide();

  });

  

  // Achat de la commande
   init();



</script>

