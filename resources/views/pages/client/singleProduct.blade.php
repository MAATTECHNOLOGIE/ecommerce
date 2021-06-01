
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
                 <div class="mb-3"><span class="h3 font-weight-normal text-primary mr-1">{{$prodSg->prix}} {{getTDevise()}}</span>
                 </div>
                @endforeach
                <div class="font-size-sm mb-4"><span class="text-heading font-weight-medium mr-1">Color:</span>
                 <span class="text-muted" id="colorOption"></span>
                </div>

                <div class="position-relative mr-n4 mb-3">
                  
                  @php
                     $coll = getProdAtrb($prodSg->produitsID);
                     $colEl =  $coll->where('type','couleur')->unique();
                     $epaisseurEl =  $coll->where('type','epaisseur')->unique();
                     $pointureEl =  $coll->where('type','pointure')->unique();
                     $tailleEl =  $coll->where('type','taille')->unique();

                     // dd($colEl);
                  @endphp
                  
                  @if(!($colEl->isEmpty()))
                  @foreach ($colEl as $ele)
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
                  @endif

                  
                </div>
                <form class="mb-grid-gutter" method="post" id="formAttri">
                  <!-- Taille -->
                  <input type="hidden" value="{{ $prodSg->produitsID }}" id="myPrdId" name="myPrdId">
                  <input type="hidden" name="couleur" id="colorChoix" value="1">
                  @if(!($tailleEl->isEmpty()))
                    <div class="form-group">
                      <div class="d-flex justify-content-between align-items-center pb-1">
                        <label class="font-weight-medium" for="product-size">Taille:</label><a class="nav-link-style font-size-sm" href="#size-chart" data-toggle="modal"><i class="czi-ruler lead align-middle mr-1 mt-n1"></i></a>
                      </div>
                      <select class="custom-select" required id="tailleListe" name="taille" >
                        <option value="">choisir la taille</option>
                        @foreach ($tailleEl as $ele)
                        <option value="{{$ele->id}}">{{$ele->libelle}}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif
                  <!-- Pointure -->
                  @if(!($pointureEl->isEmpty()))
                    <div class="form-group">
                      <div class="d-flex justify-content-between align-items-center pb-1">
                        <label class="font-weight-medium" for="product-size">Pointure:</label><a class="nav-link-style font-size-sm" href="#size-chart" data-toggle="modal"><i class="czi-ruler lead align-middle mr-1 mt-n1"></i></a>
                      </div>
                      <select class="custom-select" required id="pointureListe" name="pointure" >
                        <option value="">choisir la pointure</option>
                        @foreach ($pointureEl as $ele)
                        <option value="{{$ele->id}}">{{$ele->libelle}}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif
                  <!-- Epaisseur -->
                  @if(!($epaisseurEl->isEmpty()))
                    <div class="form-group">
                      <div class="d-flex justify-content-between align-items-center pb-1">
                        <label class="font-weight-medium" for="product-size">Epaisseur:</label><a class="nav-link-style font-size-sm" href="#size-chart" data-toggle="modal"><i class="czi-ruler lead align-middle mr-1 mt-n1"></i></a>
                      </div>
                      <select class="custom-select" required id="epaisseurListe" name="epaisseur" >
                        <option value="">Choisir l'Epaisseur</option>
                        @foreach ($epaisseurEl as $ele)
                        <option value="{{$ele->id}}">{{$ele->libelle}}</option>
                        @endforeach
                      </select>
                    </div>
                  @endif
                  <!-- Alert -->
                  <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center pb-1" id="msgStock">
                     <!-- Primary alert -->
                     
                      @foreach ($prodSingle as $prodSg)
                       @if ($prodSg->quantite==0)
                          <div class="alert alert-warning" role="alert">
                           <b>STOCK<span class="alert-link"> : rupture</a></b>
                          </div>
                       @else
                        <div class="alert alert-success" role="alert">
                         <b>STOCK<span class="alert-link"> : {{$prodSg->quantite}}</a></b> 
                        </div>
                       @endif
                       
                      @endforeach
                      
                    </div>
                    
                  </div>

                  <div class="form-group d-flex align-items-center">
                    <select class="custom-select mr-3" style="width: 5rem;">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">13</option>
                      <option value="12">14</option>
                      <option value="12">15</option>
                      <option value="12">16</option>
                      <option value="12">17</option>
                      <option value="12">18</option>
                      <option value="12">19</option>
                      <option value="12">20</option>
                    </select>

                    <button class="btn btn-primary btn-shadow btn-block" type="submit">
                      <i class="czi-cart font-size-lg mr-2"></i>Ajouter au panier
                    </button>
                  </div>
                </form>
                <!-- Product panels-->
                @foreach ($prodSingle as $prodSg)
                 <div class="accordion mb-4" id="productPanels">
                 
                  <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">
                    Commander via whatsApp
                    <a class="share-btn  my-2" href="http://wa.me/2250544450567?text=*je suis interressé(e) par le produit: {{$prodSg->nom}}. {{env('APP_URL')}}/viewPrd?id={{$prodSg->produitsID}}">
                      <span class="text-success"><i class="czi-message"></i> WahtsApp</span> 
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
  
  $(".produit").click(function(){
    $("#main_content").load("/produits");
  });

 // Ajouter de produit au panier
    $(".buy").click(function(){
     var idProd = $(this).attr("id");
     var nbQt = $(".nbqte").children(
                "option:selected").val();
     $.ajax({
       url:'AddCart',
       method:'get',
       data:{idProd:idProd,nbQt:nbQt},
       dataType:'json',
       success:function(data){
         $(".nbCart").text(data.count);
         $("#valPanier").text(data.montant);
         console.log(data);
       },
       error:function(data){
         console.log("erreur");
       }
     });


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

</script>
<script type='text/javascript'>
  $(function()
  {
    $('.choixColor').click(function()
    {
      var idColor = $(this).attr('idColor');
      var idPrd = $(this).attr('idPrd');
      $('#colorChoix').val(idColor);
      $.ajax({
        url:'choixColor',
        method:'GET',
        data:{idColor:idColor,idPrd:idPrd},
        dataType:'json',
        success:function(data){
          var imgPrd=$('#imgPrd');
          var msgStock = $('#msgStock');
          imgPrd.attr('src',data.lien);
          imgPrd.attr('data-zoom',data.lien);
          msgStock.html(data.stock);


        },
        error:function(data){
           console.log("data");
        }
      });

    })


    //Evenement choix taille
    $('#tailleListe').change(function()
    {
      var idColor = $('.choixColor').attr('idColor');

      var idPrd = $('#myPrdId').val();+
      $.ajax({
        url:'geToption',
        method:'GET',
        data:$('#formAttri').serialize(),
        dataType:'json',
        success:function(data){
          console.log(data);
        },
        error:function(data){
           console.log("data");
        }
      });

    })
    //Evenement choix epaizseur
    //Evenement choix pointure
  })
</script>