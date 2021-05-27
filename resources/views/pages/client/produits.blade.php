 <div class="pt-4 pb-5" style="background-color:#ffcc51;">

      <div class="container pt-2 pb-3 pt-lg-3 pb-lg-4">

        <div class="d-lg-flex justify-content-between pb-3">

          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">

            <nav aria-label="breadcrumb">

              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">

                <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="czi-home"></i>Acceuil</a></li>

                <li class="breadcrumb-item text-nowrap"><a href="#products">
                  Nos produits
                </a>

                </li>

                <li class="breadcrumb-item text-nowrap active" aria-current="page"> Tous</li>

              </ol>

            </nav>

          </div>

          <div class="order-lg-1 pr-lg-4 text-center text-lg-left">

            <h1 class="h3 text-light mb-0">Nos produits</h1>

          </div>

        </div>

      </div>

 </div>


    <div class="container pb-5 mb-2 mb-md-4" id="allP">

      <!-- Toolbar-->

      <div class="bg-light box-shadow-lg rounded-lg mt-n5 mb-4">

        <div class="d-flex align-items-center pl-2">

          <!-- Search-->

          <div class="input-group-overlay">

            <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>

            <input class="form-control prepended-form-control border-0 box-shadow-0 searchAnnc" 

             type="text" placeholder="Rechercher...">

          </div>

          <!-- Sort-->

          <div class="d-flex align-items-center">

            <div class="dropdown py-4 border-left">
              <a class="nav-link-style font-size-md font-weight-medium dropdown-toggle p-4" 
              href="#" data-toggle="dropdown">
               <span class="d-inline-block py-1">
               <i class="czi-view-grid align-middle opacity-60 mt-n1 mr-2"></i>
               <span class="categ">Catégorie</span>
               </span></a>

              <ul class="dropdown-menu dropdown-menu-right">

                <li id="0" class="catg" catg="tous">
                  <a class="dropdown-item" href="#products" >    Tous
                  </a>
                </li>
                @foreach(getCatgAl() as $catg)
                 <li 
                   id="{{$catg->id}}"
                   catg = "{{$catg->categorie}}"
                   class="catg">
                   <a class="dropdown-item" href="#products" >
                    <b>{{$catg->categorie}}</b>
                   </a>
                 </li>
                @endforeach

              </ul>

            </div>

          </div>

          <!-- Pagination-->

          <div class="d-none d-md-flex align-items-center border-left pl-4"><span class="font-size-md text-nowrap mr-4"><b>{{getSite()}}</b></span></div>

        </div>

      </div>

      <!-- Products grid-->
      <section class="px-lg-3 pt-4">
        <div class="px-3 pt-2">
          <!-- Page title + breadcrumb-->
          @csrf
          <!-- Content-->
  
          <!-- Product grid-->
      <div class="row pt-3 mx-n2 prodts">
      	@foreach(getPudProd() as $prd)
        <!-- Product-->
         <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <a class="card-img-top d-block 
            overflow-hidden singleIndProd" 
            id="{{$prd->produitsID}}" 
            href="#main_content">
              <img src="{{$prd->img}}" alt="Product">
            </a>
           
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
              
              {{-- <div class="d-flex mb-2">
                <a href="#main_content">
                  <button 
                   class="btn btn-primary btn-sm
                   singleIndProd" 
                   type="button" 
                   id="{{$prd->produitsID}}">
                   <i class="czi-eye font-size-sm mr-1">
                   </i>Détails
                  </button>
                </a>
              </div> --}}
            
            </div>
          </div>
          <hr class="d-sm-none">
         </div>
       @endforeach
      </div>

        </div>
         
        
        </div>
      </section>
     

    </div> 

<script type="text/javascript">
  
      /* ----------------------------
        Script de gestion de la page
      ------------------------------*/
      // Single product
       $('.singleIndProd').click(function(){
         var idProd = $(this).attr("id");
         var token = $('input[name=_token]').val();
         $("#main_content").load("singleProdclient",
          {idPrd:idProd,_token:token});
       });

      // Recherche du produit en fonction du nom
       $(".searchAnnc").keyup(function(){
         var search = $(this).val();
         if (search!='') 
         {
            $.ajax({
             url:'searchPrd',
             method:'get',
             data:{search:search},
             dataType:'text',
             success:function(data){
               /*console.log(data);*/
               $(".prodts").html(data);
             },
             error:function(data){
             console.log(data);
             }
            });
         }
         else{
           $("#main_content").load('produits');
         }

         
       });


      // Filtrage des produit par catégorie
       $(".catg").click(function(){
         var id = $(this).attr("id");
         var catg = $(this).attr("catg");
         console.log("id:"+id+" catg:"+catg);
         $(".categ").text(catg);
         if (catg=="tous") 
         {
           $("#main_content").load('produits');
         }
         else
         {
           $.ajax({
            url:'prodCatg',
            method:'GET',
            data:{catgID:id},
            dataType:'text',
            success:function(data){
               $(".prodts").html(data);
            },
            error:function(data){
               console.log("data");
            }
           });
         }

       });



</script>