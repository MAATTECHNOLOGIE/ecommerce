<div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container"><a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="/" style="min-width: 7rem;">
          <img src="http://127.0.0.1:5000/storage/imgLogo/Hsto2eyxGqZGfRwpe2OWxB6pipCsoD7oD0E0Dsbc.png" alt="logo microfertile" style="width:142px;">         </a><a class="navbar-brand d-sm-none mr-2" href="index.html" style="min-width: 4.625rem;"><img width="74" src="img/logo-microfertile.png" alt="logo-microfertile"></a>
            <!-- Search-->
            <div class="input-group-overlay d-none d-lg-block mx-4">
              <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
              <input class="form-control prepended-form-control appended-form-control" type="text" placeholder="Rechercher des produits">
              <div class="input-group-append-overlay">
                <select class="custom-select">
                  <option>Toutes catégories</option>
                  <option>Cacao</option>
                  <option>Cajour</option>
                  <option>Chocolat</option>
                  <option>Savon</option>
                  <option>Engrais</option>
                  
                </select>
              </div>
            </div>
            <!-- Toolbar-->
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-menu"></i></div></a><a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="#signin-modal" data-toggle="modal">
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-user"></i></div>
                <div class="navbar-tool-text ml-n3"><small>connectez-vous</small>Mon compte</div></a>
              <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="#"><span class="navbar-tool-label">0</span><i class="navbar-tool-icon czi-cart"></i></a><a class="navbar-tool-text" href="#"><small>Mon panier</small>0 FCFA</a>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2 show">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Search-->
              <div class="input-group-overlay d-lg-none my-3">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                <input class="form-control prepended-form-control" type="text" placeholder="Search for products">
              </div>
              <!-- Departments menu-->
              <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">

                <a class="nav-link  pl-0" href="/">

                  <li class="nav-item" id="moreAnnc">

                    <i class="text-primary czi-view-grid mr-2"></i><b class="text-primary">{{getSite()}}</b></a>    

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
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle catgInd" href="#" 
                   data-toggle="dropdown" id="{{$catg->id}}" ><b>{{$catg->categorie}}</b>
                  </a>

                  @if(getSCatgAl($catg->id)=='')
                   <span></span>
                  @else
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
                <li class="nav-item contact"><a class="nav-link" 

                  href="#main_content"><b>Contact</b></a>
                </li>        
              </ul>
            </div>
          </div>
        </div>
      </div>