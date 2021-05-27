<!-- Footer-->


    <footer class=""  style="background-color: #373f50 ">
     
      <div class="pt-5">
        <div class="container">
          <div class="row pb-3">

            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class=" czi-bag text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">PRUNEK</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Plus qu'une marque, un état d'esprit.<br>On avait envie de créer une marque qui a du sens, en laquelle les gens pourraient croire et qui pourrait représenter nos valeurs et nos origines.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-support text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">CONTACT</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Tel: +225 01 01 08 43 57 </p>
                  <p class="mb-0 font-size-ms text-light opacity-50">Mail:  contact@prunekcreation.com</p>
                  <p class="mb-0 font-size-ms text-light opacity-50">Adresse: Marcory (Stade Champroux)</p>

                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-card text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Légales</h6>
                  <p class="mb-0 "><a class="font-size-ms text-light opacity-50" href="#">Mentions Légales </a></p>
                  <p class="mb-0 "><a class="font-size-ms text-light opacity-50" href="#">Politique de confidentialité </a></p>
                  <p class="mb-0 "><a class="font-size-ms text-light opacity-50" href="#">Condition Générale d'utilisation </a></p>
                  <p class="mb-0 "><a class="font-size-ms text-light opacity-50" href="#">Livraison et retour </a></p>
                  <p class="mb-0 "><a class="font-size-ms text-light opacity-50" href="#"> FAQ </a></p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
              <div class="media"><i class="czi-clip text-primary" style="font-size: 2.25rem;"></i>
                <div class="media-body pl-3">
                  <h6 class="font-size-base text-light mb-1">Liens importants</h6>
                  <p class="mb-0 font-size-ms text-light opacity-50">Facebook</p>
                  <p class="mb-0 font-size-ms text-light opacity-50">Instagram</p>
                  <p class="mb-0 font-size-ms text-light opacity-50 produits">Nos produits</p>
                  <p class="mb-0 font-size-ms text-light opacity-50 produits"><a class="font-size-ms text-light opacity-50" href="/">Home</a></p>
                </div>
              </div>
            </div>

          </div>


          </div>
          <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">© 
         copyright - {{getYear()}} <a class="text-light" href="#!" target="_blank" rel="noopener">{{getSite()}}</a></div>
        </div>
      </div>
    </footer>
    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
      <div class="d-table table-fixed w-100 mob-menu">
          <a class="d-table-cell cz-handheld-toolbar-item" href="/">
            <span class="cz-handheld-toolbar-icon">
              <i class="czi-home"></i>
            <span class="cz-handheld-toolbar-label"><b>
            Acceuil</b></span>
          </a>

          <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse"
           data-toggle="collapse" onclick="window.scrollTo(0, 0)">
           <span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span>
           <span class="cz-handheld-toolbar-label"><b>Menu</b></span>
          </a>

          <a class="d-table-cell cz-handheld-toolbar-item" href="index.php">
            <span class="cz-handheld-toolbar-icon"><i class="czi-loudspeaker"></i>
            <span class="cz-handheld-toolbar-label"><b>Produits</b></span>
          </a>
      </div>
    </div>
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
      <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">
        Top
      </span><i class="btn-scroll-top-icon czi-arrow-up"></i>
    </a>
    @csrf
    <!-- JavaScript libraries, plugins and custom scripts-->
    <script type="text/javascript" 
    src="{{ asset('client/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/js/vendor.min.js') }}">
    </script>
    <script src="{{ asset('client/js/theme.min.js') }}">
    </script>
    <script src="{{ asset('client/js/prism.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/lib/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sweetalert2.min.js')}}"></script>


<!--Script de paiement cinetpay -->
  <script charset="utf-8" src="https://www.cinetpay.com/cdn/seamless_sdk/latest/cinetpay.prod.min.js" type="text/javascript"></script>

     
    <!-- Apps JS -->
    <script type="text/javascript"
     src="{{ asset('client/js/client.js') }}">
    </script>

    <script type="text/javascript">
      // Single product
       $('.singleIndProd').click(function(){
         var idProd = $(this).attr("id");
         var token = $('input[name=_token]').val();
         $("#main_content").load("singleProdclient",
          {idPrd:idProd,_token:token});
       });  

      // Compte client:: Nouvelle commande
       $(".newwComd").click(function(){
         $(".countMain").load("newwComd");
       });

      // Compte client:: Commandes livrées
       $(".livvComd").click(function(){
         $(".countMain").load("livvComd");
       });

      // Compte client:: Infos client
       $(".infos").click(function(){
         $(".countMain").load("infos");
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

      // Chargement des produits lié à une sous-catégorie et à une catégorie
      $(".prodSctg").click(function(){
         var catg = $(this).attr("catg");
         var scatg = $(this).attr("sctg");
         console.log("catg:"+catg+"scatg:"+scatg);
         $.ajax({
           url:'prodSctg',
           method:'GET',
           data:{catg:catg,scatg:scatg},
           dataType:'text',
           success:function(data){
             $("#main_content").html(data);
           },
           error:function(data){
             console.log("data");
           }
         });
      });

      // Compte client:: Update infos client

    </script>




<script type="text/javascript">
$("#recherche").select2({
  ajax: {
    // url: "https://api.github.com/search/repositories",
    url: "ajaxPrdAll",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
      params.page = params.page || 1;

      return {
        results: data.items,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  placeholder: 'Recherhe de produits (03 caractères minimum)',
  minimumInputLength: 3,
  templateResult: formatRepo,
  templateSelection: formatState
});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }
  var $container = $(
                      '<li class="media mb-1 singleIndProd" id="'+repo.id+'"><img src="'+repo.image+'" class="rounded mr-3" width="64" alt="Media"><div class="media-body"><h6 class="mb-1">'+repo.libelle+'<strong> ('+repo.prixPrdFormat+')</strong></h6><span class="font-size-sm text-muted"><span> Catégorie : '+repo.categorie+'</span></span></div><a href="#panierSg"><button class="btn btn-primary  mr-3 mb-1" ><i class="czi-eye font-size-lg mr-2"></i>Voir</button></a></li>'
  );

  return $container;
}

function formatState(repo) {

  //Met l'option selectionner dans le select
  var $state = $('<span> <span></span></span>');
  $state.find("span").text(repo.text);
  var token = $('input[name=_token]').val();
  if (repo.id != 0) 
  {
    $("#main_content").load("singleProdclient",{idPrd:repo.id,_token:token});
  }
  return $state;
};
</script>

<style type="text/css">
  .menuL : hover{
    color: blue;
  }
</style>
  </body>

</html>