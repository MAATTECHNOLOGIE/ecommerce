{{-- {{EmpyCart()}} --}}
<!-- Page Title (Shop)-->

    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap">
                <a href="#">produits</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Panier</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Votre Panier</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- List of items-->
        <section class="col-lg-8">
          <div class="d-flex justify-content-between align-items-center pt-3 pb-2 pb-sm-5 mt-1">
            <h2 class="h6 text-light mb-0">Produits
            </h2>
            <a class="btn btn-primary btn-sm pl-2 produitsI" href="#">
              <i class="czi-arrow-left mr-2"></i>Continuer l'achat
            </a>

            <a class="btn btn-danger btn-sm pl-2 delPanier" href="#">
              <i class="czi-trash mr-2"></i>Vider le panier
            </a>
          </div>
          <!-- Item-->
          @php $total=0; @endphp
          @if(!empty($_SESSION["panier"]))
           @foreach($_SESSION['panier'] as $keys => $values)
             <div class="d-sm-flex justify-content-between align-items-center my-4 pb-3 
             border-bottom">
            <div class="media media-ie-fix d-block d-sm-flex align-items-center text-center text-sm-left"><a class="d-inline-block mx-auto mr-sm-4" href="shop-single-v1.html" style="width: 10rem;">
              <img src="{{$values["image"]}}" alt="Product"></a>
              <div class="media-body pt-2">
                <h3 class="product-title font-size-base mb-2"><a href="#">
               
                 @php
                  $prdStock = getStockPrd($values["idStock"]);
                 @endphp
                </a></h3>
                <div class="font-size-sm">
                  <span class="text-muted mr-2">Prix unitaire:</span>
                 <span class="text-primary">
                   {{$values["prix"]}} {{getTDevise()}}
                 </span>
                </div>
                <div class="font-size-sm"><span class="text-muted mr-2">Qte:</span>
                {{$values["qte"]}}</div>
                <hr>

                @if($prdStock->couleur != 1)
                <div class="font-size-sm"><span class="text-muted mr-2">Couleur:</span>
                {{ getAttriById($prdStock->couleur)->libelle }}</div>
                <hr>
                @endif
                @if($prdStock->taille != 1)
                <div class="font-size-sm"><span class="text-muted mr-2">Taille:</span>
                {{ getAttriById($prdStock->taille)->libelle }}</div>
                <hr>
                @endif
                @if($prdStock->epaisseur != 1)
                <div class="font-size-sm"><span class="text-muted mr-2">Epaisseur:</span>
                {{ getAttriById($prdStock->epaisseur)->libelle }}</div>
                <hr>
                @endif
                @if($prdStock->epaisseur != 1)
                <div class="font-size-sm">
                  <span class="text-muted mr-2">Pointure:</span>
                {{ getAttriById($prdStock->pointure)->libelle }}</div>
                @endif
                <div class="font-size-lg text-accent pt-2"></div>
              </div>
            </div>
            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 9rem;">
              <div class="form-group mb-0">
                <label class="font-weight-medium" for="quantity1">Sous-Total( {{getTDevise()}} )</label>
                <input 
                disabled 
                class="form-control" 
                type="number" 
                id="quantity1" 
                value="{{$values["qte"]*$values["prix"]}}">
              </div>
              <button 
               class="btn btn-link px-0 text-primary del" 
               type="button" 
               qte = "{{$values["qte"]}}"
               id="{{$values["idprd"]}}">
                <i class="czi-close-circle mr-2"></i>
                <span class="font-size-sm">Supprimer</span>
              </button>
            </div>
             </div>
             @php 
              $total = $total+($values['qte']*$values['prix']);
             @endphp
            @endforeach
             <div class="text-center">
              <p class="fs-ms">
                <small>
                  <em>Les retours d'articles ne sont pas autorisés sur notre plateforme 10 jour après livraison.</em>
                </small>     
              </p> 
            </div>
          @else
           <!-- Primary alert -->
           <div class="alert alert-primary" 
             role="alert">
             Aucun produit n'existe dans votre panier, Veuillez ajouter un produit dans votre panier.
           </div>
          @endif
        </section>

        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            <div class="text-center mb-4 pb-3 border-bottom">
              <h2 class="h6 mb-3 pb-1">Total</h2>
              <h3 class="font-weight-normal">{{$total}}
                <small>{{getTDevise()}}</small>
              </h3>
            </div>
           
            <div class="accordion" id="order-options">

              <div class="card">
                <div class="card-header active">
                  <h3 class="accordion-heading">
                    <a class="collapsed" 
                     href="#shipping-estimates" 
                     role="button" 
                     data-toggle="collapse" 
                     aria-expanded="true" 
                     aria-controls="shipping-estimates">Lieu de livraison
                     <span class="accordion-indicator">
                     </span>
                   </a>
                 </h3>
                </div>
                <div class="collapse" id="shipping-estimates" data-parent="#order-options">
                  <div class="card-body">
                    <form class="needs-validation" 
                    novalidate>
                      <div class="form-group">
                        <select class="form-control custom-select payCart" required>
                          <option value="">Choisir ton pays</option>
                           @foreach($pay as $pays)
                           <option value="{{$pays->id}}">
                             {{$pays->pays}}
                           </option>
                          @endforeach
                          
                        </select>
                        
                      </div>
                      <div class="form-group ville">
                        
                      </div>
                        <div class="alert alert-warning infoPlus" 
                         role="alert">  Livraison : <span class="cout">00</span>  {{getTDevise()}}
                         <p class="alert-danger">Délais de livraison : <span id="delais"> 24 </span> H</p>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div><a class="btn  btn-shadow btn-block mt-4 checkout" 
            href="#main_content" style="background-color:#ffcc51;color:black;"><i class="czi-card font-size-lg mr-2"></i>Finaliser votre commande </a>
          </div>
        </aside>

      </div>
    </div>
@csrf
<script type="text/javascript">
  


// Liste des produit
 $(".produitsI").click(function(){
  $("#main_content").load("/produits");
 });

// Supprimer le produit
 $(".del").click(function(){
   var idPrd = $(this).attr("id");
   var idQte = $(this).attr("qte");
   $.ajax({
     url:'cartItemDel',
     method:'get',
     data:{idPrd:idPrd,idQte:idQte},
     dataType:'json',
     success:function(data){
      console.log(data)
         $(".nbCart").text(data.count);
         $("#valPanier").text(data.montant);
        $("#main_content").load("/panier");
     },
     error:function(data){
       console.log(data);
     }
   });
 });

 //Vider le panier
 
 $(".delPanier").click(function(){

                Swal.fire({
                  title: 'Vidage du panier',
                  text: "Voulez vous vider le panier d'achat",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#FFC750',
                  cancelButtonColor: '#3085d6',
                  cancelButtonText: 'Annuler',
                  confirmButtonText: 'oui , Valider!',
                   backdrop: `rgba(240,15,83,0.4)`
                }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url:'delPanier',
                        method:'get',
                        data:{action:'delete all'},
                        dataType:'json',
                        success:function(){
                           $(".nbCart").text("0");
                           $("#valPanier").text(" 0 ");
                          $("#main_content").load("/panier");

                        },
                        error:function(){
                          Swal.fire('Problème de connexion internet');
                        }
                      });
                    }
                })


   // $.ajax({
   //   url:'delPanier',
   //   method:'get',
   //   data:{action:'delete all'},
   //   dataType:'json',
   //   success:function(data){
   //       $(".nbCart").text("0");
   //       $("#valPanier").text(" 0 ");
   //      $("#main_content").load("/panier");
   //   },
   //   error:function(data){
   //     console.log(data);
   //   }
   // });
 });





// Lieu de livraison
$(".payCart").click(function(){
 var pays = $(this).children("option:selected").val();
 $.ajax({
   url:'ville',
   method:'get',
   data:{pays:pays},
   dataType:'text',
   success:function(data){
     $(".ville").html(data);
   },
   error:function(data){
     console.log(data);
   }
 });
});

// Validation de la commande
$(".checkout").click(function(){
   var liv  = parseInt($(".cout").text());
   var vile = $(".villeC").children("option:selected").val();
   var pays = $(".payCart").children("option:selected").val();
   var cart = parseInt($(".nbCart").text());
   var token = $('input[name=_token]').val();
   console.log("liv: "+liv+" pays:"+pays+" cart:"+cart+
    "vile:"+vile);
   if (pays!=''&vile!='')
   {
     
     if(cart!='')
     {
       $("#main_content").load("checkout",
        {pays:pays,_token:token,vile:vile,liv:liv});
     }
     else{
             Swal.fire({
                  'title': 'Panier vide!',
                  'icon': 'error',
                  'text': ' Votre panier est vide Veuillez sélectionner un produit'
                });
     }
   }
   else
   {
             Swal.fire({
                  'title': 'Lieu de livraison !',
                  'icon': 'error',
                  'text': ' Veuillez indiquer le lieu de livraison'
                });
   }

});




</script>