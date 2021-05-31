
<!DOCTYPE html>

<html lang="en-US" dir="ltr">

<head>
    
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=603d59d0f6067000116b02ef&product=inline-share-buttons" async="async"></script>
    <meta charset="utf-8">

    <title>{{getSite()}} |{{getabout()}}</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags-->

    <meta name="description" content="petites annnonces africaine- Au coeur de la diaspora africaine">

    <meta name="keywords" content="bussiness, diaspora africaine, entrepreneur africain , vêtement africain, produit africain, Aliment africain,Coiffure africaine, Décoration, Culture , Beauté africaine, cuisine, transport, service, Mode, Habillement, creativité afriaine, plateforme digitale">

    <meta name="author" content="Olimargo">

    <!-- Viewport-->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons-->

    <link rel="apple-touch-icon" sizes="180x180" 
    href="client/img/olimargo/icon.png">

    <link rel="icon" type="image/png" sizes="32x32" 
    href="client/img/olimargo/icon.png">

    <link rel="icon" type="image/png" sizes="16x16" 
    href="client/img/olimargo/icon.png">

    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">

    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->

    <link rel="stylesheet" media="screen" href="{{ asset('client/css/vendor.min.css') }}">

    <!-- Main Theme Styles + Bootstrap-->

    <link rel="stylesheet" media="screen" id="main-styles" href="{{ asset('client/css/theme.min.css') }}">



    <!-- Code Highlighting-->

    <link rel="stylesheet" media="screen" href="{{ asset('client/css/prism.min.css') }}">

    <link href="{{ asset('admin/assets/lib/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/sweetalert2.min.css')}}" rel="stylesheet">


    <!-- Google Tag Manager-->

    <script>

      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

      '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);

      })(window,document,'script','dataLayer','GTM-WKV3GT5');

    </script>


</head>

<body>



      <!-- Google Tag Manager (noscript)-->

    <noscript>

      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>

    </noscript>

    

    <!-- Navbar 3 Level (Light)-->

    <header class="box-shadow-sm">

      <!-- Topbar-->

      <div class="topbar topbar-dark" 
      style="background-color:#373f50">

        <div class="container">

          <div class="topbar-text dropdown d-md-none">
            <a class="topbar-link dropdown-toggle" 
            href="#" data-toggle="dropdown"><b style="color:white;" >Appelez-nous</b></a>

            <ul class="dropdown-menu">

              <li><a class="dropdown-item" href="tel:+225 07 88 48 18 72" 
                style="color:#d59f1c;">
                <i class="czi-support text-muted mr-2"></i><b>{{getTel()}}</b>
              </a></li>

             

            </ul>

          </div>

          <div class="topbar-text text-nowrap d-none d-md-inline-block">
            <i class="czi-support text-primary"></i>
            <span class=" mr-1" 
            style="color:white;">Appelez-nous</span>
            <a class="topbar-link" href="tel:+225 07 88 48 18 72" 
            style="color:#d59f1c;">{{getTel()}}</a></div>
        </div>

      </div>

      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

      <div class="navbar-sticky bg-light">

        <div class="navbar navbar-expand-lg navbar-light">

          <div class="container">
            <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="/" style="min-width: 7rem;">
          <img src="{{ getTLogo() }}" alt="{{ getSite() }}" style="width:142px;"></a><a class="navbar-brand d-sm-none mr-2" href="/" style="min-width: 4.625rem;"><img width="74" src="{{ getTLogo() }}" alt="{{ getSite() }}"></a>
            <div class="input-group-overlay d-none d-lg-block mx-4">
{{--               <div class="input-group-prepend-overlay">
                <span class="input-group-text">
                <i class="czi-search"></i></span>
              </div> --}}
{{--   <select class="selectpicker" id="recherche1">
    <option>Afghanistan</option>
    <option>Albania</option>
    <option>Algeria</option>
    <option>American Samoa</option>
    <option>Antigua and Barbuda</option>
  </select> --}}
  <select class="form-control custom-select" id="recherche">

  </select>

            {{--   <input class="form-control prepended-form-control appended-form-control" type="text" placeholder="Rechercher des produits (min: 03 caractères)"> --}}
            </div>
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center" 
            id="panierSg">

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
              <a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Voir menu</span>

                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-menu"></i></div>
              </a>

                 

                <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" 
                   id="annCompte" href="#" data-toggle="modal">

                    <div class="navbar-tool-icon-box compte"><i class="navbar-tool-icon czi-user"></i></div>
                      <div class="navbar-tool-text ml-n3 compte"><small>client</small>
                       @php
                         if (!empty($_SESSION["clients"])) 
                         {
                           echo $_SESSION["clients"]['nom']."  ".$_SESSION["clients"]['prenom'];
                            
                          }
                          else{
                            echo "Mon compte";
                          }
                       @endphp
                      </div>

                      <div class="navbar-tool dropdown ml-3 panier">
                        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="#main_content">
                          <span class="navbar-tool-label nbCart" style="background-color: #FFC750">
                            {{getNbProd()}}
                          </span>
                          <i class="navbar-tool-icon czi-cart" ></i>
                        </a>
                          <a class="navbar-tool-text" href="#main_content">
                            <small>Mon panier</small>
                            <strong class="text-primary" > <span id="valPanier"> {{ formatPrice(getPrixPanier()) }} &nbsp;</span>{{ getTDevise() }}</strong>
                          </a>
                      </div>
                </a>

              <div class="navbar-tool dropdown ml-3">

              </div>

            </div>

          </div>

        </div>

        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">

          <div class="container">

            <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Departments menu-->

              <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">

                <a class="nav-link  pl-0" href="/">

                  <li class="nav-item" id="moreAnnc">

                    <i class="text-primary czi-view-grid mr-2"></i>
                    <b class="text-primary">{{getSite()}}</b>  
                  </li>

                </a>

              </ul>

              <!-- Primary menu-->

              <ul class="navbar-nav">
                <li class="nav-item text-black" id="payAnnc">
                  <a class="nav-link menuL" 
                  href="/"><b>Acceuil</b></a>
                </li>


                @foreach(getCatgAl() as $catg)



                  @if( getSCatgAl($catg->id)->isEmpty())
                <li class="nav-item text-black">
                  <a class="nav-link catgInd" 
                  href="#"id="{{$catg->id}}" ><b>{{$catg->categorie}}</b></a>
                </li>
                  @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle catgInd" href="#" 
                   data-toggle="dropdown" id="{{$catg->id}}" ><b>{{$catg->categorie}}</b>
                  </a>
                    <ul class="dropdown-menu">
                     @foreach(getSCatgAl($catg->id) as $scatg)
                     <li class="dropdown prodSctg" 
                         catg="{{$catg->id}}"
                         sctg="{{$scatg->SctgID}}">
                      <a class="dropdown-item" href="#">
                       {{$scatg->libele}}
                      </a>
                     </li>
                     @endforeach
                    </ul>
                  @endif
                </li>
                 @endforeach


                <!--
                <li class="nav-item about"><a class="nav-link" 

                  href="#payAnnc"><b>Notre histoire</b></a>

                </li> -->

                <li class="nav-item contact"><a class="nav-link" 

                  href="#main_content"><b>Contact</b></a>

                </li>   

                <li class="nav-item cgu"><a class="nav-link" 

                  href="#main_content"><b>CGU</b></a>

                </li>               

              </ul>

            </div>

          </div>

        </div>

      </div>

    </header>



    {{-- Mis à jour des annonces --}}
