<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Nouveau produit</h3>
        <p class="mt-2">Enregistrer un nouveau produit</p>
      </div>
    </div>
  </div>

</div>

<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card">
  </div>


  <div class="card-body">

    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Configuration</h3>
        <p class="mt-2">Remplir le formulaire ci-dessous</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
       <form enctype="multipart/form-data"
             action="{{route('AddProd')}}"
             method="POST">
             @csrf

        <div class="form-group">
         <label for="basic-example">Catégorie</label>
         <select class="selectpicker" id="basic-example" 
         name="catg" required="required">
           <option>catégorie</option>
            @foreach($catgL as $catg)
             <option value="{{$catg->id}}">
              {{$catg->categorie}}
             </option>
            @endforeach
         </select>
        </div>

        <div class="form-group">
         <label for="scatg">Sous-catégorie</label>
         <select class="selectpicker" id="scatg" 
         name="scatg" required="required">
           <option>Sous-catégorie</option>
            @foreach($scatgL as $scatgL)
             <option value="{{$scatgL->id}}">
              {{$scatgL->libele}}
             </option>
            @endforeach
         </select>
        </div>

        <div class="form-group">
          <label for="name">Nom du produit</label>
           <input class="form-control" id="prod" type="text" placeholder="Produit" name="produit" 
           required="required">
        </div>

        <div class="form-group">
          <label for="name">Prix(cfa)</label>
           <input class="form-control" id="prix" type="number" placeholder="Prix" name="prixProd" 
           required="required">
        </div>

        <div class="form-group">
          <label for="qte">Quantité du produit</label>
           <input class="form-control" id="qte" type="number" placeholder="Combien en avez vous ?" name="qte" 
           required="required">
        </div>
        <div class="form-group">
          <label for="name">Image principale</label>
          <div class="custom-file">
           <input class="custom-file-input" id="imageP" 
           type="file" name="imageP" required="required">
           <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

       <div class="form-group">
        <label for="exampleFormControlTextarea1">
          Description de votre produit
        </label>
        <textarea class="form-control" id="descrp" rows="3" 
        name="descrp"></textarea>
       </div>

        <div class="form-group">
          <label for="name">Image détaillés :: Image 1</label>
          <div class="custom-file">
           <input class="custom-file-input" id="image1" 
           type="file" name="image1">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name">Image détaillés :: Image 2</label>
          <div class="custom-file">
           <input class="custom-file-input" id="image2" 
           type="file" name="image2">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div>

        <!--  <div class="form-group">
          <label for="name">Image détaillés :: Image 3</label>
          <div class="custom-file">
           <input class="custom-file-input" id="image3" 
           type="file" name="image3">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name">Image détaillés :: Image 4</label>
          <div class="custom-file">
           <input class="custom-file-input" id="image4" 
           type="file" name="image4">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div> -->

        <div class="spinner-border load" role="status"><span class="sr-only">Loading...</span></div>
        <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 valiProd"type="submit">Valider</button>

        <button class="ml-1 btn btn-outline-danger rounded-capsule mr-1 mb-1 empty"type="button">Annuler</button>


       </form>
      </div>

    </div>

  </div>

</div>

<script src="{{ asset('admin/assets/js/theme.js') }}">
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
  });

  
  

</script>

