@php 
 if(isset($_SESSION['clients'])){
@endphp
<!-- Page Title (Dark)-->
    <div class="bg-dark py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">

        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Compte client : 
            <span class="h4 font-weight-normal text-light">
          	{{$_SESSION["clients"]['nom']." ".$_SESSION["clients"]['prenom']}}
          </span></h1>
        </div>

        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <a href="logoutCli">
             <button type="button" class="btn btn-outline-primary btn-pill">
              <i class="czi-add-user"></i> 
              Sé deconnecter
             </button>
            </a>
          </nav>
        </div>


      </div>

    </div>
    <!-- Page Content-->
    <div class="container py-5 mb-2 mb-md-3">
      <!-- Details-->
      <div class="row mb-4">
        <div class="col-sm-4 mb-2">
          <a href="#countMainA">
           <div class="bg-secondary p-4 text-center rounded-lg newwComd"><span class="font-weight-medium text-dark mr-2">Mes nouvelles commande</span>
           </div>
          </a>
        </div>
        <div class="col-sm-4 mb-2">
          <a href="#countMainA">
          <div class="bg-secondary p-4 text-center rounded-lg livvComd"><span class="font-weight-medium text-dark mr-2">Mes commandes livrées</span></div>
          </a>
        </div>
        <div class="col-sm-4 mb-2">
          <a href="#countMainA">
          <div class="infos bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Mes infos</span></div>
          </a>
        </div>
      </div>
      <!-- Progress-->
      <div class="card border-0 box-shadow-lg countMain" 
       id="countMainA">
          {{-- NOUVELLE COMMANDE --}}
          <!-- Orders list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Code comd.</th>
                  <th>Date Commande</th>
                  <th>Total( {{getTDevise()}} )</th>
                  <th>Statut</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               @foreach(getComnd() as $cmd)
                 @if($cmd->Statut==0)
                    <tr>
                     <td class="py-3"><a class="nav-link-style font-weight-medium font-size-sm" href="#order-details" data-toggle="modal">
                      {{$cmd->numComd}}
                      </a>
                     </td>
                     <td class="py-3">{{$cmd->dateComd}}
                     </td>
                     
                     <td class="py-3">{{$cmd->montant}}
                       {{getTDevise()}}
                     </td>
                     <td class="py-3">
                      <span class="badge badge-info m-0">
                        Nouvelle
                      </span>
                     </td>
                     <td>
                      <button type="button" 
                       numcomd="{{$cmd->numComd}}"
                       class="btn btn-outline-success 
                       btn-pill more">
                        Détails
                      </button>
                     </td>
                    </tr>
                 @endif
               
               @endforeach
              </tbody>
            </table>
          </div>
          <hr class="pb-4">

          <!-- Large modal-->
          <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h4 class="modal-title">Détails</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
               
                <div class="modal-body">
                  <section class="col-lg-12 pt-lg-4 pb-4 mb-3">
                   <div class="pt-2 px-4 pl-lg-0 pr-xl-5 prodD">

                    
                  
                   </div>
                  </section>
                </div>
                         
                <div class="modal-footer">
                  <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">
                    OK
                  </button>
                </div>
              
              </div>
            </div>
          </div>  

          {{-- NOUVELLE COMMANDE --}}
        <div class="card-body pb-2">
          <ul class="nav nav-tabs media-tabs nav-justified">
            <li class="nav-item">
              <div class="nav-link completed">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-bag"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">
                      Prémière etape
                    </div>
                    <h6 class="media-tab-title text-nowrap mb-0">choisir un produit</h6>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link ">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-settings"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">Deuxième étape</div>
                    <h6 class="media-tab-title text-nowrap mb-0">L'ajouter dans le panier</h6>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-star"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-muted font-size-xs mb-1">Troisième étape</div>
                    <h6 class="media-tab-title text-nowrap mb-0">Lancer la commande</h6>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-link active">
                <div class="media align-items-center">
                  <div class="media-tab-media mr-3"><i class="czi-package"></i></div>
                  <div class="media-body">
                    <div class="media-tab-subtitle text-primary font-size-xs mb-1">Finalisation</div>
                    <h6 class="media-tab-title text-nowrap mb-0">Recevoir la commande à domicile</h6>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      
    </div>

@php 
 }else{@endphp
 <!-- Page Content-->
    <div class="container pb-5 mb-sm-4">
      <div class="pt-5">
        <div class="card py-3 mt-sm-3">
          <div class="card-body text-center">
            <h2 class="h4 pb-3">Veuillez vous connecter ou inscrire</h2>
            <p class="font-size-sm mb-2">
              
            </p>
            
            <a class="btn mt-3 mr-3 compte" 
            href="#" style="background-color:#ffcc51;">Se connecter</a>
          </div>
        </div>
      </div>
    </div>
@php
 }
@endphp


