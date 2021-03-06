
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" ><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="{{ route('dashboard') }}">
              <div class="d-flex align-items-center py-3">
                <img class="mr-2" src="assets/img/illustrations/falcon.png" 
                  alt="" width="40" />
                  <span class="text-sans-serif" 
                  style="color:#D83C02;">
                   {{ getSite() }}
                  </span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar">
              <ul class="navbar-nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text"> Tableau de bord</span>
                    </div>
                  </a>
                </li>

              </ul>

              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>

                            <ul class="navbar-nav flex-column">

                {{-- Zone livraison --}}

                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#operateur" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="operateur">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="far fa-map"></i></span><span class="nav-link-text">Zone livraison</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="operateur" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed" id="newZone"
                     data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">Nouveau </a>
                    </li>

                    <li class="nav-item collapsed" id="listeZone"
                     data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">Zone </a>
                    </li>

                  </ul>
                </li>
             

                {{-- FOURNISSEURS --}}
                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#fournisseur" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="fournisseur">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="fas fa-clipboard-list"></i>
                    </span><span class="nav-link-text">Cat??gorie</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="fournisseur" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed" id="newCatg"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Nouvelle Catg
                      </a>
                    </li>
                    

                    <li class="nav-item collapsed" id="listeCatg"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Cat??gorie
                      </a>
                    </li>
                    
                  </ul>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#souscatge" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="fournisseur">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="fas fa-clipboard-list"></i>
                    </span><span class="nav-link-text">Sous-Cat??gorie</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="souscatge" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed" id="newsCatg"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Nouvelle Sous-Catg
                      </a>
                    </li>
                    
                    
                    <li class="nav-item collapsed" id="listesSCatg"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Sous-Cat??gorie
                      </a>
                    </li>

                    <li class="nav-item collapsed" id="CatgSCatg"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Affectation
                      </a>
                    </li>
                    
                  </ul>
                </li>

              </ul>
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>


               {{-- G??rer mes produits --}}
              <ul class="navbar-nav flex-column">

                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#arriv" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="arriv">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fab fa-product-hunt"></i></span>
                      <span class="nav-link-text">G??rer mes produits</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="arriv" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="newProd">
                      <a class="nav-link" href="#top">Nouveau produit</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="pubProd">
                      <a class="nav-link" href="#top">Produit publi??</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="lockProd">
                      <a class="nav-link" href="#top">Produit block??</a>
                    </li>



                  </ul>
                </li>
                

                {{-- G??rer clients --}}

                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#principal" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="principal">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fas fa-users"></i></span>
                      <span class="nav-link-text">G??rer mes clients</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="principal" data-parent="#navbarVerticalCollapse">
                   
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="listClient"><a class="nav-link" href="#top">Mes clients</a>
                    </li>

                  </ul>
                </li>


                {{-- G??rer mes commandes --}}

                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#Succursale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Succursale">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fas fa-cart-plus"></i></span>
                      <span class="nav-link-text">Mes Commandes</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="Succursale" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="newComd">
                      <a class="nav-link" href="#top">Nouvelle</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="noComd">
                      <a class="nav-link" href="#top">Refus??es</a>
                    </li>

                    <li class="nav-item" id="livComd"
                      data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">livr??es</a>
                    </li>
                    
                  </ul>
                </li>

              </ul>
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>

              


              <ul class="navbar-nav flex-column">

                {{-- PROSPECT --}}
                
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#Prospects" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Prospects">
                      <div class="d-flex align-items-center"><span class="nav-link-icon">
                        <i class="far fa-file-image"></i> </span><span class="nav-link-text">Slides</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="Prospects" data-parent="#navbarVerticalCollapse">

                      <li class="nav-item collapsed"
                        data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                        aria-label="Toggle Navigation" id="newSlide">
                        <a class="nav-link"  href="#main_content">Nouveau</a>
                      </li>
                      <li class="nav-item collapsed"
                        data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                        aria-label="Toggle Navigation" id="pubSlide">
                        <a class="nav-link"  href="#main_content">Publi??</a>
                      </li>

    

                    </ul>
                </li>


              </ul>


              {{-- MENU SUCCURSAES --}}
              {{-- VERIF SI LE GESTIONNAIRE A UNE SUCC --}}
             
                <ul class="navbar-nav flex-column">
                <li class="nav-item" id="config">
                  <a class="nav-link" href="#main_content">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                      </span>
                      <span class="nav-link-text">Param??tres</span>
                    </div>
                  </a>

                </li>
               
               </ul>
            

               {{-- MENU SUCCURSALES --}}
          {{-- MENU VALABLE POUR PRINCIPLAES ET SUCCURSALES --}}


          {{-- MENU VALABLE POUR PRINCIPLAES ET SUCCURSALES --}}

            </div>
          </div>

