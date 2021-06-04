
    <div class="page-title-overlap bg-dark pt-4">
      
      @foreach ($prodSingle as $prodSg)

      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#" class="catgInd" id="{{$prodSg->categorie_id}}">{{$prodSg->categorie}}</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{$prodSg->nom}}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">{{$prodSg->nom}}</h1>
        </div>
      </div>
      @endforeach

    </div>
    <div class="container">
      <!-- Gallery + details-->
      <div class="bg-light box-shadow-lg rounded-lg px-4 py-3 mb-5">
        <div class="px-lg-3">
          <div class="row">
            <!-- Product gallery-->
            <div class="col-xl-7 px-2 mb-3">
              <div class="h-100 bg-light rounded-lg p-4">
                <div class="cz-product-gallery">
                  
                  <div class="cz-preview order-sm-2">
                   
                    @foreach($prodSingle as $prd)
                     <div 
                       class="cz-preview-item active" 
                       id="first">
                       <img class="cz-image-zoom" id="imgPrd" src="{{$prd->img}}"
                            alt="Product image" 
                            data-zoom="{{$prd->img}}">
                          <div class="cz-image-zoom-pane"></div>
                     </div>
                    @endforeach

                    @php $i=0 @endphp
                    @foreach($prodImg as $imgD)
                     @php $i++ @endphp
                      @if($i==1)
                       <div class="cz-preview-item" 
                       id="second">
                       <img src="{{$imgD->images}}"
                            data-zoom="{{$imgD->images}}" 
                            class="cz-image-zoom" 
                            alt="Product image">
                          <div class="cz-image-zoom-pane"></div>
                       </div>
                      @endif

                      @if($i==2)
                       <div class="cz-preview-item" 
                       id="third">
                       <img src="{{$imgD->images}}" 
                            data-zoom="{{$imgD->images}}"
                            class="cz-image-zoom"  
                            alt="Product image">
                          <div class="cz-image-zoom-pane"></div>
                       </div>
                      @endif
                      
                    @endforeach
                   

                  </div>

                  <div class="cz-thumblist order-sm-1">
                    @foreach($prodSingle as $prd)
                     <a 
                     class="cz-thumblist-item active"
                     href="#first">
                     <img src="{{$prd->img}}" 
                     alt="Product thumb">
                     </a>
                    @endforeach

                    @php $i=0 @endphp
                    @foreach($prodImg as $imgD)
                     @php $i++ @endphp
                     @if($i==1)
                       <a class="cz-thumblist-item" 
                       href="#second">
                       <img src="{{$imgD->images}}"
                       alt="Product thumb">
                       </a>
                     @endif

                     @if($i==2)
                       <a class="cz-thumblist-item" 
                       href="#third">
                       <img src="{{$imgD->images}}"
                       alt="Product thumb">
                       </a>
                     @endif

                    @endforeach

                  </div>
                  
                </div>

              </div>
            </div>
            <!-- Product details-->
            <div class="col-lg-5 pt-4 pt-lg-0">
              <div class="product-details ml-auto pb-3">
                @foreach ($prodSingle as $prodSg)
                 <div class="mb-3">
                  <span class="h3 font-weight-normal text-primary mr-1">{{$prodSg->prix}} {{getTDevise()}}</span>
                  <input type="hidden" id="myPrdId" value="{{ $prodSg->produitsID }}">
                 </div>
                @endforeach
                
                  @php
                     $coll = getProdAtrb($prodSg->produitsID);

                    if (!$coll->isEmpty())
                    {
                      $colEl =  $coll->where('type','couleur')->unique();
                      $type = 'couleur';
                    }
                    else{

                      $myStock = getStockByIdPrd($prodSg->produitsID)->first();
                      $type = 'Aucun';
                    }
                  @endphp

                  {{-- verifie si le produit a o moin 01 attribut --}}
                  @if($type != 'Aucun')                  
                      <div class="font-size-sm mb-4"><span class="text-heading font-weight-medium mr-1">Couleur:</span>
                       <span class="text-muted" id="colorOption"></span>
                      <div class="position-relative mr-n4 mb-3">
                        @foreach($colEl as $ele)
                          <div class="custom-control custom-option custom-control-inline mb-2">
                            <input class="custom-control-input choixColor" type="radio" name="color" 
                            idColor="{{$ele->id}}" id="{{'color'.$ele->id}}"
                                   data-label="colorOption" value="{{$ele->libelle}}" idPrd={{$prodSg->produitsID}}>
                                <label class="custom-option-label rounded-circle border border-dark" for="{{'color'.$ele->id}}">
                                  <span class="custom-option-color rounded-circle" 
                                      style="background-color: {{$ele->code}};">
                                  </span>
                                </label>
                          </div>
                        @endforeach
                      </div>
                    </div>

                    {{-- FORMULAIRE DES ATTRIBUTS POUR PRD AVEC OPTION --}}
                      <form class="mb-grid-gutter" method="post" >
                        <span id="formAttri"></span>

                      <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center pb-1" id="msgStock">
                         <!-- Primary alert -->
                         
                          @foreach ($prodSingle as $prodSg)
                           @if ($prodSg->quantite==0)
                              <div class="alert alert-warning" role="alert">
                               <b>STOCK<span class="alert-link"> : rupture</b>
                              </div>
                           @else
                            <div class="alert alert-success" role="alert">
                             <b>STOCK : <span class="qte" id="myQte" qte="{{$prodSg->quantite}}">
                               {{$prodSg->quantite}}</span>
                             </b> 
                            </div>
                           @endif
                           
                          @endforeach
                          
                        </div>
                        
                      </div>

                      <div class="form-group d-flex align-items-center">
     
                        <div class="form-group col-4">
                          {{-- <label for="number-input">Quantité</label> --}}
                          <input class="form-control" type="number" id="qteAchat" value="1">
                        </div>
                        <div class="form-group">
                          {{-- HIIDEN POUR LE ID DEU PRD EN STOCK --}}
                          <input type="hidden" id="idPrdStock" name="idPrdStock" value="">
                          <span class="btn btn-primary btn-shadow btn-block"  id="buy">
                            <i class="czi-cart font-size-lg mr-2"></i>Ajouter au panier
                          </span>
                        </div>

<script type="text/javascript">
$(function()
{
$("#buy").click(function(){
  if( !$('input[name=color]').is(':checked') )
  {
Swal.fire({
  icon: 'error',
  title: 'Ooups...',
  text: 'Veuillez choisir la couleur!',
})
} 
});
})
</script>
                      </div>
                    </form>
                    {{-- FIN FORMULAIRE DES ATTRIBUTS POUR PRD AVEC OPTION --}}
                  @else
                    {{-- AFFICHAGE DES ELEMENT PRD SANS OPTIONS --}}
                      <input type="hidden" name="" value="1" id="aucun">
                      <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center pb-1" id="msgStock">
                         <!-- Primary alert -->
                         
                          @foreach ($prodSingle as $prodSg)
                           @if ($prodSg->quantite==0)
                              <div class="alert alert-warning" role="alert">
                               <b>STOCK<span class="alert-link"> : rupture</b>
                              </div>
                           @else
                            <div class="alert alert-success" role="alert">
                             <b>STOCK : <span class="qte" id="myQte" qte="{{$prodSg->quantite}}">
                               {{$prodSg->quantite}}</span>
                             </b> 
                            </div>
                           @endif
                           
                          @endforeach
                          
                        </div>
                      </div>
                      <div class="form-group d-flex align-items-center">
     
                        <div class="form-group col-4">
                          {{-- <label for="number-input">Quantité</label> --}}
                          <input class="form-control" type="number" id="qteAchat" value="1">
                        </div>
                        <div class="form-group">
                          {{-- HIIDEN POUR LE ID DEU PRD EN STOCK --}}
                          <input type="hidden" id="idPrdStock" name="idPrdStock" value="{{ $myStock->id }}">
                          <span class="btn btn-primary btn-shadow btn-block"  id="buy">
                            <i class="czi-cart font-size-lg mr-2"></i>Ajouter au panier
                          </span>
                        </div>
                      </div>
                    {{-- FIN AFFICHAGE DES ELEMENT PRD SANS OPTIONS --}}
                  @endif




                <!-- Product panels-->
                @foreach ($prodSingle as $prodSg)
                 <div class="accordion mb-4" id="productPanels">
                 
                  <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">
                    Commander via whatsApp
                    <a class="share-btn  my-2" target="_blank" href="http://wa.me/2250544450567?text=*je suis interressé(e) par l'article  {{$prodSg->nom}} sur votre site* {{env('APP_URL')}}/viewPrd?id={{$prodSg->produitsID}}">
                      <span class="text-success"><i class="czi-message"></i> WhatsApp</span> 
                    </a>
                  </h6>
                  

                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading">
                        <a href="#productInfo" role="button" data-toggle="collapse" aria-expanded="true" 
                        aria-controls="productInfo">
                        <i class="czi-announcement text-muted font-size-lg align-middle mt-n1 mr-2"></i>
                        Description du produit<span class="accordion-indicator"><i data-feather="chevron-up"></i></span>
                        </a></h3>
                    </div>
                    <div class="collapse show" id="productInfo" data-parent="#productPanels">
                      <div class="card-body">
                        <h6 class="font-size-sm mb-2"></h6>
                        <ul class="font-size-sm pl-4">
                          {{$prodSg->description}}
                        </ul>
                      </div>
                    </div>
                  </div>



                 </div>
                 @endforeach
                 
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

<!-- Produit de la meme catégorie  -->
<div class="container pt-3">
  <h2 class="h3 text-center pb-2">Produits de la même catégorie</h2>
  <div class="cz-carousel cz-controls-static cz-controls-outside">
    <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
             @foreach(getPudProdCatg($prodSingle->first()->categorie) as $prd)
               <!-- Product-->
               <div class="col-lg-6 col-6 px-0 px-sm-2 mb-sm-4">
                <div class="card product-card">
                  <a class="card-img-top d-block 
                  overflow-hidden singleIndProd" 
                  id="{{$prd->produitsID}}" 
                  href="#main_content">
                    <img src="{{$prd->img}}" alt="Product">
                  </a>
                  @csrf
                  <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
                    href="#">{{$prd->categorie}}</a>
                    <h3 class="product-title font-size-sm">
                      <a href="#">{{$prd->nom}}</a>
                    </h3>
                    <div class="d-flex justify-content-between">
                      <div class="product-price">
                        <span class="text-primary"><b>
                          {{$prd->prix}} {{getTDevise()}}</b>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="card-body card-body">
          

                  </div>
                </div>
                {{-- <hr class="d-sm-none"> --}}
               </div>
             @endforeach
    </div>
  </div>
</div>



<script src="{{asset('client/js/theme.min.js')}}"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script type="text/javascript">
  $(function()
  {
     

    $(".produit").click(function(){
      $("#main_content").load("/produits");
    });

 // Ajouter de produit au panier
    $("#buy").click(function(event){
      // event.preventDefault();
      var qtStock = parseInt($('#myQte').text());
      // var qtStock = $("myQte").attr("qte");
      var nbQt = $("#qteAchat").val();
      //console.log(qtStock);
      if (qtStock >= nbQt) 
      {
         $.ajax({
           url:'AddCart',
           method:'get',
           data:{idProdStock:$('#idPrdStock').val(),nbQt:nbQt},
           dataType:'json',
           success:function(data){
             $(".nbCart").text(data.count);
             $("#valPanier").text(data.montant);
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Ajouté au panier avec succès',
                  showConfirmButton: false,
                  timer: 1000
                })
             //console.log(data);
           },
           error:function(data){
             console.log("erreur");
           }
         });
      }
      else
      {
          Swal.fire({
                  position: 'top-end',
                  icon: 'error',
                  title: 'Quantite insuffisante en stock',
                  showConfirmButton: false,
                  timer: 1000
                })

      }

    })


 // Single product
    $('.singleIndProd').click(function(){
      var idProd = $(this).attr("id");
      var token = $('input[name=_token]').val();
      $("#main_content").load("singleProdclient",
      {idPrd:idProd,_token:token});
    });  
  
    // Chargement des catégories depuis le front
    $(".catgInd").click(function(){
     var id = $(this).attr("id");
     var catg = $(this).attr("catg");
     console.log("id:"+id+" catg:"+catg);
      $.ajax({
        url:'prodCatgF',
        method:'GET',
        data:{catgID:id},
        dataType:'text',
        success:function(data){
           $("#main_content").html(data);
        },
        error:function(data){
           console.log("data");
        }
      });
  });


    $('.choixColor').click(function()
    {
      var idColor = $(this).attr('idColor');
      var idPrd = $(this).attr('idPrd');
      $.ajax({
        url:'choixColor',
        method:'GET',
        data:{idColor:idColor,idPrd:idPrd},
        dataType:'json',
        success:function(data){
          var imgPrd=$('#imgPrd');
          var msgStock = $('#msgStock');
          var formAttri = $('#formAttri');
          imgPrd.attr('src',data.lien);
          imgPrd.attr('data-zoom',data.lien);
          msgStock.html(data.stock);
          formAttri.html(data.nextOpt);
          console.log(data.nextOpt)
         },
        error:function(data){
           console.log("data");
        }
      });

    })

    //Code jquery actionnant le select de l'attribut
    //Voir AdminController => function choixColor
      // EXTRAIT $('#nexAttr').change(function()...

  })
</script>