    {{-- {{dd(getPudProdCatg())}} --}}
    <!-- Hero slider-->
    <section class="cz-carousel cz-controls-lg mb-4 mb-lg-5">
      <div class="cz-carousel-inner" data-carousel-options="{&quot;autoplay&quot;:&quot;false&quot;,&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
        <!-- Item-->
        <div class="px-lg-5" style="background-color: rgb(93, 126, 109,1);">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="client/img/home/slide/slide1.png" alt="Men Accessories">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-center text-lg-left text-lg-nowrap">
                <h2 class=" font-weight-light pb-1 from-top" style="color: black">Habillez vous en pagne</h2>
                <h1 class=" display-4 from-top delay-1" style="color: #de9862">Vêtements en pagne</h1>
                <p class="font-size-lg  pb-3 from-top delay-2" style="color: black">Des vêtements pour tous au modèle particulier</p>

                <a class="btn  scale-up btn-shadow delay-4 catgInd"
                   id="16"
                   catg="vêtement"
                   href="#"
                   style="border-color: black; background-color: #373f50; color: white">
                   Voir plus<i class="czi-arrow-right ml-2 mr-n1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Item-->
        <div class="px-lg-5" style="background-color: #fddadf; " >
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="client/img/home/slide/slide2.png" alt="Men Accessories">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-center text-lg-left text-lg-nowrap">
                <h2 class=" font-weight-light pb-1 from-top" style="color: black">Relooking de vos accessoires</h2>
                <h1 class="text-danger display-4 from-top delay-1">Sacs Chics et Stylés</h1>
                <p class="font-size-lg  pb-3 from-top delay-2" style="color: black">Revivez le style de vos accessoires autrement</p>
                 <a class="btn btn-danger scale-up delay-4 catgInd"
                    id="15"
                    catg="Accessoires"
                    href="#"> Voir plus
                  <i class="czi-arrow-right ml-2 mr-n1"></i>
                 </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Item-->
        <div class="px-lg-5" style="background-color: #d67e5a; ">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="client/img/home/slide/slide3.png" alt="Men Accessories">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-center text-lg-left text-lg-nowrap">
                <h2 class=" font-weight-light pb-1 from-top" style="color: black">Une concentration d’authenticité</h2>
                <h1 class="display-4 from-top delay-1">Chaussures personnalisées</h1>
                <p class="font-size-lg  pb-3 from-top delay-2" style="color: black">Chaussure pour femmes, hommes &amp; enfants...</p>
                 <a class="btn btn-primary scale-up delay-4 catgInd"
                   href="#"
                    id="14"
                    catg="Accessoires">
                  Voir plus<i class="czi-arrow-right ml-2 mr-n1"></i>
                 </a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </section>

    <section class="container mb-lg-3">
      
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-1 mb-2">
        <h3 class="h3 mb-0 mr-2">
        Achetez vos robes, sacs et objets en pagne
        </h3>
      </div>

    </section>

    <!-- Category (Women)-->
    <section class="container pt-lg-3 mb-4 mb-sm-5">
      <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg" style="background-color: #f6f8fb;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div>
                <h3 class="mb-1">Vêtement</h3>
                <a class="font-size-md text-primary catgInd" 
                href="#" id="21" catg="vêtement">Voir plus
                <i class="czi-arrow-right font-size-xs align-middle ml-1"></i></a>
              </div>
              <div class="cz-custom-controls" id="for-women">
                <button type="button"><i class="czi-arrow-left"></i></button>
                <button type="button"><i class="czi-arrow-right"></i></button>
              </div>
            </div><a class="d-none d-md-block mt-auto" href="#">
              <img class="d-block w-100" src="client/img/home/categories/cat-lg02.jpg" alt="For Women"></a>
          </div>
        </div>
        <!-- Product grid (carousel)-->
        <div class="col-md-7 pt-4 pt-md-0">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women&quot;}">
              <!-- Carousel item-->
             <div>
                <div class="row mx-n2">
                  @php
                    $nb = 0;
                  @endphp
                 @foreach(getPudProdCatg('vêtements') as $prd)
                   @php $nb = $nb+1; @endphp
                   @if($nb<7)
                   <!-- Product-->
                   <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
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
                  @endif
                 @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Category (Men)-->
    <section class="container pt-lg-4 mb-4 mb-sm-5">
      <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5 order-md-2">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg" style="background-color: #ebe4d8;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div class="order-md-2">
                <h3 class="mb-1">Chaussure</h3>
                <a class="font-size-md text-primary catgInd" href="#" id="22" catg="Chaussure">Voir plus
                  <i class="czi-arrow-right font-size-xs align-middle ml-1"></i></a>
              </div>
              <div class="cz-custom-controls order-md-1" id="for-men">
                <button type="button"><i class="czi-arrow-left"></i></button>
                <button type="button"><i class="czi-arrow-right"></i></button>
              </div>
            </div><a class="d-none d-md-block mt-auto" href="#"><img class="d-block w-100" src="client/img/home/categories/chaussures.png" alt="For Men"></a>
          </div>
        </div>
        <!-- Product grid (carousel)-->
        <div class="col-md-7 pt-4 pt-md-0 order-md-1">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-men&quot;}">
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  @php
                    $nb = 0;
                  @endphp
                  @foreach(getPudProdCatg('chaussures') as $prd)

                   @php $nb = $nb+1; @endphp
                   @if($nb<7)
                   <!-- Product-->
                   <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
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
                   @endif
                 @endforeach
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Category (Women)-->
    <section class="container pt-lg-3 mb-4 mb-sm-5">
      <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg" style="background-color: #f6f8fb;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div>
                <h3 class="mb-1">Accessoires</h3>
                <a class="font-size-md text-primary catgInd" 
                href="#" id="24" catg="accessoire">Voir plus
                <i class="czi-arrow-right font-size-xs align-middle ml-1"></i></a>
              </div>
              <div class="cz-custom-controls" id="for-women">
                <button type="button"><i class="czi-arrow-left"></i></button>
                <button type="button"><i class="czi-arrow-right"></i></button>
              </div>
            </div><a class="d-none d-md-block mt-auto" href="#">
              <img class="d-block w-100" src="client/img/home/categories/sac 1.png" alt="For Women"></a>
          </div>
        </div>
        <!-- Product grid (carousel)-->
        <div class="col-md-7 pt-4 pt-md-0">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women&quot;}">
              <!-- Carousel item-->
              <div>
               <div class="row mx-n2">
                  @php
                    $nb = 0;
                  @endphp
                  @foreach(getPudProdCatg('accessoires') as $prd)

                   @php $nb = $nb+1; @endphp
                   @if($nb<7)
                   <!-- Product-->
                   <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
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
                   @endif
                 @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
