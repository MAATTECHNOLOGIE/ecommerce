<section class="col-lg-12">
<form>
 <!-- Nom -->
 <div class="form-group">
   <label for="text-input">Nom</label>
   <input class="form-control" 
   type="text" id="nom" value="{{$user->nom}}">
 </div>

 <!-- Prénom -->
 <div class="form-group">
   <label for="search-input">Prénom</label>
   <input class="form-control"
    type="text" id="prenom" value="{{$user->prenom}}">
 </div>

 <!-- Téléphone -->
 <div class="form-group">
   <label for="email-input">telephone</label>
   <input class="form-control" type="text" 
   id="tel" value="{{$user->numero_telephone}}">
 </div>

 <!-- Email -->
 <div class="form-group">
   <label for="email-input">Email</label>
   <input class="form-control" type="email" 
   id="email" value="{{$user->mail}}">
 </div>

 <!-- Password -->
 <div class="form-group">
  <label for="url-input">Mot de passe</label>
  <input class="form-control" 
   type="text" id="pass" value="{{$user->pass}}">
 </div>

 <!-- Domicile -->
 <div class="form-group">
  <label for="tel-input">Domicile</label>
  <input class="form-control"
  type="text" id="domicile" value="{{$user->domicile}}">
 </div>

  <!-- Ville -->
  <div class="form-group">
   <label for="tel-input">Ville</label>
   <input class="form-control"
    type="text" id="ville" value="{{$user->ville}}">
  </div>

  <!-- Pays -->
  <div class="form-group">
   <label for="tel-input">Pays</label>
   <input class="form-control" 
    type="text" id="pays" value="{{$user->pays}}">
  </div>

  <!-- Pill outline button -->
  <div class="form-group">
  	 <button type="button" class="btn btn-outline-success btn-pill updBtn">Modifier</button>
  </div>

</form>

	
</section>

<script type="text/javascript">
	    $(".updBtn").click(function(){
         var nom      = $("#nom").val();
         var prenom   = $("#prenom").val();
         var tel      = $("#tel").val();
         var email    = $("#email").val();
         var pass     = $("#pass").val();
         var domicile = $("#domicile").val();
         var ville    = $("#ville").val();
         var pays     = $("#pays").val();
          $.ajax({
           url:'updClint',
           method:'get',
           data:{nom:nom,prenom:prenom,tel:tel,
            email:email,pass:pass,domicile:domicile,
            ville:ville,pays:pays},
           dataType:'text',
           success:function(){
           	 alert("Modifier avec succès");
              $(".countMain").load("infos");
           },
           error:function(){
             console.log("Erreur d'envoie");
           }
          });
        });

</script>