<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-0 text-primary"> <i class="far fa-file-archive"></i> Produit >  Ajout d'option
                  </h4>
                </div>
              </div>
            </div>
</div>

<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card">
  </div>

</div>



          <div class="row d-flex justify-content-center">

            <div class="col-lg-5 col-xl-4 pl-lg-2 mb-3 ">
              <div class="card h-lg-100">
                <div class="card-header d-flex flex-between-center bg-light py-2">
                  <h6 class="mb-0">Liste des options</h6>
                </div>
                <div class="card-body pb-0">
                  <div class="form-group">
                   <label for="taille">Taille</label>
                   <select class="selectpicker" id="taille" 
                   name="taille" >
                     <option>Aucune </option>
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="color">Couleur</label>
                   <select class="selectpicker" id="color" 
                   name="color" >
                     <option>Aucune </option>
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="epaisseur">Epaisseur</label>
                   <select class="selectpicker" id="epaisseur" 
                   name="epaisseur" >
                     <option>Aucune </option>
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="Pointure">Pointure</label>
                   <select class="selectpicker" id="Pointure" 
                   name="Pointure" >
                     <option>Aucune </option>
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   {{-- <label for="prix">Prix</label> --}}
                   <input class="form-control" id="prix" type="number" min="1" placeholder="Prix produit" name="prix" required="required">
                  </div>
                  {{-- <hr class="border-200" /> --}}
                  <div class="form-group">
                   {{-- <label for="qte">Quantité</label> --}}
                   <input class="form-control" id="qte" type="number" min="1" placeholder="Stock disponible" name="prix" required="required">
                  </div>
                </div>
                <div class="d-flex justify-content-start ">
                  <div class="spinner-border load" role="status"><span class="sr-only">Loading...</span></div>
                  <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 valiProd">Valider</button>

                  <button class="ml-1 btn btn-outline-warning rounded-capsule mr-1 mb-1 empty"type="button">Annuler</button>
                </div>
              </div>
            </div>

            <div class="col-lg-7 col-xl-8 pr-lg-2 mb-3">
              <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                  <table class="table table-dashboard mb-0 table-borderless fs--1">
                    <thead class="bg-light">
                      <tr class="text-900">
                        <th class="" style="width: 15rem">Produit </th>
                        <th class="pr-card text-right" style="width: 4rem">Couleur</th>
                        <th class="pr-card text-right" style="width: 4rem">Taille</th>
                        <th class="pr-card text-right" style="width: 4rem">Epaisseur</th>
                        <th class="pr-card text-right" style="width: 4rem">Pointure</th>
                        <th class="pr-card text-right" style="width: 4rem">Quantité</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="border-bottom border-200">
                        <td>
                          <div class="media align-items-center position-relative"><img class="rounded border border-200" src="storage/imgProd/KtjjihzhWLkl4yP0A8Jt8JBsUYhMJceLcO5D8F1y.png" width="60" alt="" />
                            <div class="media-body ml-3">
                              <h6 class="mb-1 font-weight-semi-bold"><a class="text-dark stretched-link" href="#!">Chemise Raye Teinte</a></h6>
                              <p class="font-weight-semi-bold mb-0 text-500">1500 fcfa</p>
                              <span class="badge badge rounded-capsule badge-soft-danger">Suprimer
                                <span class="ml-1 fas fa-trash" data-fa-transform="shrink-2"></span>
                                  
                                </span>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-right font-weight-semi-bold">
                          <div class="avatar avatar-xl mr-3">
                            <div class="avatar-name rounded-circle bg-danger text-dark">
                              <span class="fs--1 text-primary">&nbsp;</span>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-right font-weight-semi-bold">taille</td>
                        <td class="align-middle text-right font-weight-semi-bold"> 45</td>
                        <td class="align-middle text-right font-weight-semi-bold"> 100</td>
                        <td class="align-middle text-right font-weight-semi-bold"> 100</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer bg-light py-2">
                  <div class="row flex-center">
                    <button class="btn btn-success mr-1 mb-1" type="button">Enregistrer les options</button>
                    <button class="btn btn-danger mr-1 mb-1" type="button">Annuler les options<span class="fas fa-trash ml-1" data-fa-transform="shrink-3"></span>
                    </button>

                  </div>
                </div>
              </div>
            </div>
          </div>



















<script src="{{ asset('admin/assets/js/theme.js') }}">
</script>


<script type="text/javascript">
  $(function()
  {
    //Loader btn
    $(".valiProd").click(function(){
      $(".load").show();
  });
  })
</script>








<script type="text/javascript">
  $(".load").hide();



  $(".empty").click(function(){
    $(".load").hide();
    $("#prod").val("");
    $("#prix").val("");
    $("#descrp").val("");
    console.log("vider le formulaire");
  });

  $(".valiProd").click(function(){
    $(".load").show();
    var catg  = $("#catg option:selected").val();
    var scatg = $("#scatg option:selected").val(); 
    console.log("catg:"+catg+" scatg:"+scatg);
    $.ajax({
      url:'addcatgScatg',
      method:'get',
      data:{catg:catg,scatg:scatg},
      dataType:'text',
      success:function(){
        $(".load").hide();
        $('#main_content').load("/CatgSCatg");
          Swal.fire(
             'Affectation catg-scatg',
             'Ajouté avec succès',
             'success'
            );

      },
      error:function(){
        console.log("error");
      }
    });
  });

  
  

</script>

