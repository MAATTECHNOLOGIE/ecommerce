 <!-- Page Title (Light)-->
    <div class="bg-secondary py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Contacts</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0">Contacts</h1>
        </div>
      </div>
    </div>

        <!-- Contact detail cards-->
    <section class="container-fluid pt-grid-gutter">
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-grid-gutter"><a class="card" href="#map" data-scroll>
            <div class="card-body text-center"><i class="czi-location h3 mt-2 mb-4 text-primary"></i>
              <h3 class="h6 mb-2">Notre bureau</h3>
              <p class="font-size-sm text-muted">
                {{getLieu()}}
              </p>
            </div></a></div>
        <div class="col-xl-3 col-md-6 mb-grid-gutter">
          <div class="card">
            <div class="card-body text-center"><i class="czi-time h3 mt-2 mb-4 text-primary"></i>
              <h3 class="h6 mb-3">Horaire de travail</h3>
              <ul class="list-unstyled font-size-sm text-muted mb-0">
                <li>{{getHeur()}}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-grid-gutter">
          <div class="card">
            <div class="card-body text-center"><i class="czi-phone h3 mt-2 mb-4 text-primary"></i>
              <h3 class="h6 mb-3">Téléphone</h3>
              <ul class="list-unstyled font-size-sm mb-0">
                <li><span class="text-muted mr-1"></span>
                  <a class="nav-link-style" href="tel: +225 05 55 73 64 87">
                  {{getTel()}}
                </a></li>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-grid-gutter">
          <div class="card">
            <div class="card-body text-center"><i class="czi-mail h3 mt-2 mb-4 text-primary"></i>
              <h3 class="h6 mb-3">Addresses E-mail</h3>
              <ul class="list-unstyled font-size-sm mb-0">
                <li><a class="nav-link-style" 
                  href="mailto:info@amopot.org">
                {{ getTMail()}}</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

        <div class="container-fluid px-0" id="map">
      <div class="row no-gutters">
        <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
          <h2 class="h4 mb-4">Qui sommes-nous ?</h2>
            <div class="row">
              <div class="col-sm-8">
                {{getAbout()}}
              </div>


            </div>

        </div>
        <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
          <h2 class="h4 mb-4">Nous écrire</h2>
          <form class="needs-validation mb-3" id="form" novalidate>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-name">Votre nom:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control nom" type="text" id="cf-name" required>
                 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-email">Votre E-mail:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control mail" type="email" 
                  id="cf-email"required>
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-phone">Votre téléphone:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control tel" type="text" id="cf-phone" required>
                 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-subject">Sujet:</label>
                  <input class="form-control sujet" type="text" id="cf-subject">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="cf-message">Votre message:&nbsp;<span class="text-danger">*</span></label>
              <textarea class="form-control msg" id="cf-message" rows="6" 
              placeholder="Ecrivez votre message ici" required></textarea>
              <div class="invalid-feedback"></div>
            </div>
            <button class="btn sendMail" type="button" 
            style="background-color:#ffcc51;color: black;">Envoyez le message</button>
          </form>
        </div>
      </div>
    </div>

<script type="text/javascript">
 
 $(function(){
    $(".sendMail").click(function(){
      /*var form  =  $("#form").serialize();*/
      var nom   =  $(".nom").val();
      var mail  =  $(".mail").val();
      var tel   =  $(".tel").val();
      var sujet = $(".sujet").val();
      var msg   = $(".msg").val();
      $.ajax({
         url:'sendMail',
         method:'GET',
         data:{nom:nom,mail:mail,tel:tel,sujet:sujet,msg:msg},
         dataType:'text',
         success:function(){
           alert('Bien reçu, nous vous contacterons');
           $(".nom").val("");
           $(".mail").val("");
           $(".tel").val("");
           $(".sujet").val("");
           $(".msg").val("");
         },
         error:function(){console.log("Error");}
      });
    });
 });
  
</script>