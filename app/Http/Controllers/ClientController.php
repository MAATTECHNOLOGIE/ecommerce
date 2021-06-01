<?php

namespace App\Http\Controllers;

use App\Model\paiement;

use App\User;

use Validator;

use DB;

use Auth;

use Mail;

use Hash;

use App\Mail\AlertComdAdmin;
use App\Mail\AlertComdClt;




use App\Model\produits_has_client;
use App\Model\Commande;
use Schema;



use Illuminate\Http\Request;



class ClientController extends Controller
{

	public function produits()
	{
		return view('pages.client.produits');
	}


  public function about()
  {
    return view('pages.client.about');
  }

  public function cgu()
  {
    return view('pages.client.cgu');
  }

	public function fitness()
	{
		return view('pages.client.fitness');
	}

	public function contact()
	{
		return view('pages.client.contacts');
	}

	public function singleProdclient(Request $request)
	{
	  $idprd = $request->idPrd;
	  $prod  = DB::table('produits')
            ->join('categories','produits.categorie_id','=','categories.id')
            ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
            ->where("produits.id",'=',$idprd)
            ->orderBy('produits.id','desc')
            ->get();
     //dd($prod);

      $prodImg  = DB::table('produits')
            ->join('images', 'produits.id',
            	'=', 'images.produits_id')
            ->select('images.*','images.id as imagesID')
            ->where("images.produits_id",'=',$idprd)
            ->get();
      //dd($prodImg);

	  return view('pages.client.singleProduct')
	  			->with('prodSingle',$prod)
	  			->with('prodImg',$prodImg);
	}

	public function panier()
	{
            $pays = DB::table('pays')
                      ->select('pays.*')
                      ->get();
		return view('pages.client.panier')
                  ->with('pay',$pays);
	}

      public function ville(Request $request)
      {
         $payID = $request->pays;
         $ville  = DB::table('livraisons')
            ->join('pays','livraisons.ville_pays_id','=',
                  'pays.id')
             ->join('villes','livraisons.ville_id','=',
                  'villes.id')
            ->select('villes.*','villes.id as villesID',
                     'pays.*','pays.id as paysID',
                     'livraisons.*','livraisons.id as livID')
            ->where("livraisons.ville_pays_id",'=',$payID)
            ->get();
         /*dd($ville);*/
         $output = '';
         $output.="
            <select class='form-control custom-select villeC' required>
             <option value=''>Choisir ta ville/commune
             </option>";
             foreach ($ville as $dataV)
             {
              $output.="
              <option value=".$dataV->ville_id."
                liv=".$dataV->livraison.">
                ".$dataV->ville."
              </option>";
             }
         
         $output.="</select>";
      $output.='
      <script type="text/javascript">
       $(".villeC").click(function(){
        var liv=$(this).children("option:selected").attr("liv");
        $(".cout").text(liv);
       });

      </script>';
         return $output;
      }

      public function cartItemDel(Request $request)
      {
       $idPrd = $request->idPrd;
       $idQte = $request->idQte;
       foreach ($_SESSION["panier"] as $keys => $values)
       {
          if ($values["qte"] == $idQte AND 
              $values["idprd"] == $idPrd)
          {
              //Suppression du produit du panier
              unset($_SESSION["panier"][$keys]);
          }

       }
       $nbP = count($_SESSION["panier"]);
        return response()->json(['count'=>$nbP,'montant'=>getPrixPanier()]);

      }

	public function AddCart(Request $request)
	{
    //recup les variables
  	  $idProd = $request->idProd;
      $nbQt   = $request->nbQt;
    //   $taille = $request->taille;
    //   $pointure = $request->pointure;
    //   $epaisseur = $request->epaisseur;

    // //Recup le produit dans le stock
    //   $prdEle =stock_prd::where('taille','=',$taille)
    //               ->where('couleur','=',$couleur)
    //               ->where('pointure','=',$pointure)
    //               ->where('epaisseur','=',$epaisseur)
    //               ->where('produits_id','=',$idProd)
    //               ->first();
     
      if (isset($_SESSION['panier']))
      {
      	foreach (getTProdId($idProd) as $prod)
      	{
      	 $produit = $prod->nom;
      	 $image = $prod->img;
      	 $prix = $prod->prix;
      	 $idPrd = $prod->id;
         $idCatg = $prod->categorie_id;
      	}
      	$panier = array(
      	 'produit'=>$produit,
      	 'image'=>$image,
      	 'prix'=>$prix,
      	 'qte'=>$nbQt,
      	 'idprd'=>$idPrd,
         'catg'=>$idCatg);
      	$_SESSION["panier"][] = $panier;
      	$nbCart = count($_SESSION["panier"]);

        return response()->json(['count'=>$nbCart,'montant'=>getPrixPanier()]);
      }
      else
      {
      	foreach (getTProdId($idProd) as $prod)
      	{
      	 $produit = $prod->nom;
      	 $image = $prod->img;
      	 $prix = $prod->prix;
      	 $idPrd = $prod->id;
         $idCatg = $prod->categorie_id;
      	}
      	 $panier = array(
      	 'produit'=>$produit,
      	 'image'=>$image,
      	 'prix'=>$prix,
      	 'qte'=>$nbQt,
         'catg'=>$idCatg,
      	 'idprd'=>$idPrd);
      	//création de session
		      $_SESSION["panier"][] = $panier;
		      $nbCart = count($_SESSION["panier"]);
        return response()->json(['count'=>$nbCart,'montant'=>getPrixPanier()]);
      }
	}



	public function checkout(Request $request)
	{

    $_SESSION["cmd"]["pays"] = $request->pays;
    $_SESSION["cmd"]["vile"] = $request->vile;
    $_SESSION["cmd"]["liv"] = $request->liv;
		return view('pages.client.checkout');
	}

	public function compte()
	{
	   return view('pages.client.compte');
	}


   // ****************************************
    //   RECHERCHE ET REUCPERATION IN SELECT2
    // ****************************************
  public function ajaxPrdAll(Request $request)
          {
            $search = htmlentities($request->q);
            $search = htmlspecialchars($search);
            $produits = DB::table('produits')
                ->select('produits.*')
                ->where('produits.nom','LIKE','%'.$search.'%')
                ->get();
                $data = array();
                foreach ($produits as  $produit) 
                {
                  if ($produit->img =="") 
                  {
                    $produit->img = "assets/img/illustrations/falcon.png";
                  }
                  $data[] = array(
                          "id" => $produit->id,
                          "libelle" => $produit->nom,
                          "text" => $produit->nom,
                          "categorie" =>getThisCatg($produit->categorie_id)->categorie,
                          "idCatg" =>getThisCatg($produit->categorie_id)->id,
                        "prixPrdFormat" =>formatPrice($produit->prix).' '.getTDevise(),
                        'image' =>$produit->img,
                      );

                }

                $tab = ["total_count" => 1,"incomplete_results" => false,'items'=>$data];


             echo json_encode($tab);
             exit();
          }




  public function buyComd(Request $request)
  {
    $numCmd = date("YmdHis");
    $dateCmd   = date("d-m-Y H:i:s");
    $total = 0;
    Schema::disableForeignKeyConstraints();
    foreach ($_SESSION['panier'] as $keys => $values)
    {
      // Infos images
        $infos=['produits_id'=>$values["idprd"],
         'produits_categorie_id'=>$values["catg"],
         'client_id'=>$_SESSION['clients']['idClint'],
         'qte'=>$values["qte"],
         'montant'=>$values["prix"]*$values["qte"],
         'datecomd'=>$dateCmd,
         'numComd'=>$numCmd,
        ];
        $cmPrd = produits_has_client::create($infos);
        $total = $total+($values['qte']*$values['prix']);

    }

         $livr  = DB::table('livraisons')
            ->join('pays','livraisons.ville_pays_id','=',
                  'pays.id')
             ->join('villes','livraisons.ville_id','=',
                  'villes.id')
            ->select('villes.*','villes.id as villesID',
                     'pays.*','pays.id as paysID',
                     'livraisons.*','livraisons.id as livID')
            ->where("livraisons.ville_pays_id",
                    '=',$_SESSION["liv"]['pays'])
            ->where("livraisons.ville_id",
                    '=',$_SESSION["liv"]['vile'])
            ->first();
    $cmdD=[
         'client_id'=>$_SESSION['clients']['idClint'],
         'montant'=>$total+$_SESSION["liv"]['livcout'],
         'dateComd'=>$dateCmd,
         'numComd'=>$numCmd,
         'Statut'=>0,
         'paiement'=>1,
         'solde'=>0,
         'client_id'=>$_SESSION['clients']['idClint'],
         'lieuLivraison'=>$livr->pays.'-'.$livr->ville.' : '.$_SESSION['liv']['livcout'].' '.getTDevise()
        ];


    $to =getTMail();
    $cltMail =  $_SESSION['clients']['mail'];
    $subject = "DIANYS COMMANDES";
    $cltNom= $_SESSION['clients']["nom"];
    $cltTel= $_SESSION['clients']["numero_telephone"];
    $montant = $total+$_SESSION["liv"]['livcout'];


     Mail::to($to)->send(new AlertComdAdmin($subject,$cltNom,$cltTel,$montant,$numCmd));
     Mail::to($cltMail)->send(new AlertComdClt($subject,$montant,$numCmd));

    // mail($to,$subject,$message, $headers);
    $cmPrd = commande::create($cmdD);
    EmpyCart();
    return redirect("/compteLg");
  }


  //Pay before livraison
      //Enregistrement transac before
       public function saveTrans()
       {
          $code = date('dmYHis');
          $montant = $_SESSION["liv"]['livcout'] + getPrixPanier();
          $valeur = ['codepaiement' =>$code,'statuPaiement' => 0,'amount'=>$montant];
          paiement::create($valeur);
          return response()->json($valeur);
       }



      // Notification cinetpay de paiement
       public function cinetpay_notify(Request $request)
       {
          // Réception des données
         $id_transaction = $request->get("cpm_trans_id");
         if ($id_transaction!=null) 
         {
            $apiKey  = '6820562105ffc56b7257464.26123769';
            $site_id = '814773';
            $plateform = 'PROD';
            // Création de l'objet cinetpay
             $CinetPay = new CinetPay($site_id, $apiKey, $plateform);
            // Reprise exacte des bonnes données chez CinetPay
            $CinetPay->setTransId($id_transaction)->getPayStatus();
            $cpm_site_id = $CinetPay->_cpm_site_id;
            $signature = $CinetPay->_signature;
            $cpm_amount = $CinetPay->_cpm_amount;
            $cpm_trans_id = $CinetPay->_cpm_trans_id;
            $cpm_custom = $CinetPay->_cpm_custom;
            $cpm_currency = $CinetPay->_cpm_currency;
            $cpm_payid = $CinetPay->_cpm_payid;
            $cpm_payment_date = $CinetPay->_cpm_payment_date;
            $cpm_payment_time = $CinetPay->_cpm_payment_time;
            $cpm_error_message = $CinetPay->_cpm_error_message;
            $payment_method = $CinetPay->_payment_method;
            $cpm_phone_prefixe = $CinetPay->_cpm_phone_prefixe;
            $cel_phone_num = $CinetPay->_cel_phone_num;
            $cpm_ipn_ack = $CinetPay->_cpm_ipn_ack;
            $created_at = $CinetPay->_created_at;
            $updated_at = $CinetPay->_updated_at;
            $cpm_result = $CinetPay->_cpm_result;
            $cpm_trans_status = $CinetPay->_cpm_trans_status;
            $cpm_designation = $CinetPay->_cpm_designation;
            $buyer_name = $CinetPay->_buyer_name;

            // Vérification de la transaction
              $paiement = DB::table('paiements')
                         ->where('codepaiement','=',$id_transaction)
                         ->first();
               if($paiement)
               {
                
                  // Paiement validé
                   if ($cpm_result=='00')
                   {
                      DB::table('paiements')->where('codepaiement','=',
                         $id_transaction)->update(['statuPaiement'=>1]);

                      // Triatement du paiement
                        $this->buyCmdPay();
                      

                   }  
               }
               else
               {

               }

         }
       }



      //Fonction de validation de la comande payer
       public function buyCmdPay()
        {
            $numCmd = date("YmdHis");
            $dateCmd   = date("d-m-Y H:i:s");
            $total = 0;
            Schema::disableForeignKeyConstraints();
            foreach ($_SESSION['panier'] as $keys => $values)
            {
              // Infos images
                $infos=['produits_id'=>$values["idprd"],
                 'produits_categorie_id'=>$values["catg"],
                 'client_id'=>$_SESSION['clients']['idClint'],
                 'qte'=>$values["qte"],
                 'montant'=>$values["prix"]*$values["qte"],
                 'datecomd'=>$dateCmd,
                 'numComd'=>$numCmd,
                ];
                $cmPrd = produits_has_client::create($infos);
                $total = $total+($values['qte']*$values['prix']);

            }

                 $livr  = DB::table('livraisons')
                    ->join('pays','livraisons.ville_pays_id','=',
                          'pays.id')
                     ->join('villes','livraisons.ville_id','=',
                          'villes.id')
                    ->select('villes.*','villes.id as villesID',
                             'pays.*','pays.id as paysID',
                             'livraisons.*','livraisons.id as livID')
                    ->where("livraisons.ville_pays_id",
                            '=',$_SESSION["liv"]['pays'])
                    ->where("livraisons.ville_id",
                            '=',$_SESSION["liv"]['vile'])
                    ->first();
            $cmdD=[
                 'client_id'=>$_SESSION['clients']['idClint'],
                 'montant'=>$total+$_SESSION["liv"]['livcout'],
                 'dateComd'=>$dateCmd,
                 'numComd'=>$numCmd,
                 'Statut'=>0,
                 'paiement'=>2,
                 'solde'=>0,
                 'client_id'=>$_SESSION['clients']['idClint'],
                 'lieuLivraison'=>$livr->pays.'-'.$livr->ville.' : '.$_SESSION['liv']['livcout'].' '.getTDevise()
                ];


            $to =getTMail();
            $cltMail =  $_SESSION['clients']['mail'];
            $subject = "DIANYS COMMANDES";
            $cltNom= $_SESSION['clients']["nom"];
            $cltTel= $_SESSION['clients']["numero_telephone"];
            $montant = $total+$_SESSION["liv"]['livcout'];


             Mail::to($to)->send(new AlertComdAdmin($subject,$cltNom,$cltTel,$montant,$numCmd));
             Mail::to($cltMail)->send(new AlertComdClt($subject,$montant,$numCmd));

            // mail($to,$subject,$message, $headers);
            $cmPrd = commande::create($cmdD);
            EmpyCart();
            //return redirect("/compteLg");

        }




  //Suprimer panier
  public function delPanier()
  {
    EmpyCart();
    return response()->json();
  }

  public function searchPrd(Request $request)
  {
     $nomProd = $request->search;
/*     $prod = DB::table('produits')
                ->where('nom', 'LIKE', "%{$nomProd}%")
                ->where('statut', '=', 1)
                ->get();*/
      $prod = DB::table('produits')
            ->join('categories', 'produits.categorie_id',
              '=', 'categories.id')
            ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
            ->where('produits.nom', 'LIKE', "%{$nomProd}%")
            ->where("produits.statut",'=',1)
            ->orderBy('produits.id','desc')
            ->get();
     
     $output='';

     foreach ($prod as $prd) {
       $output.='
          <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <a class="card-img-top d-block 
            overflow-hidden singleIndProd" 
            id="'.$prd->produitsID.'" 
            href="#main_content">
              <img src="'.$prd->img.'" alt="Product">
            </a>
            <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
              href="#">'.$prd->categorie.'</a>
              <h3 class="product-title font-size-sm">
                <a href="#">'.$prd->nom.'</a>
              </h3>
              <div class="d-flex justify-content-between">
                <div class="product-price">
                  <span class="text-primary"><b>
                    '.$prd->prix.' '.getTDevise().'</b>
                  </span>
                </div>
              </div>
            </div>
            <div class="card-body card-body">
              
              <div class="d-flex mb-2">
                <a href="#main_content">
                  <button 
                   class="btn btn-primry btn-sm
                   singleIndProd" 
                   type="button" 
                   id="'.$prd->produitsID.'">
                   <i class="czi-eye font-size-sm mr-1">
                   </i>Détails
                  </button>
                </a>
              </div>
            
            </div>
          </div>
          <hr class="d-sm-none">
         </div>
       ';
     }

     $output.='
      <script type="text/javascript">
        $(".singleIndProd").click(function(){
         var idProd = $(this).attr("id");
         var token = $("input[name=_token]").val();
         $("#main_content").load("singleProdclient",
          {idPrd:idProd,_token:token});
       });
      </script>
     ';


     return $output;   
  }

  // Gestion de produit
   public function prodCatg(Request $request)
   {
      $catg = $request->catgID;
      /*dd($catg);*/
      $prod = DB::table('produits')
            ->join('categories', 'produits.categorie_id',
              '=', 'categories.id')
            ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
            ->where("produits.statut",'=',1)
            ->where('categories.id', '=', $catg)
            ->orderBy('produits.id','desc')
            ->get();
      $nbPrd = count($prod);
      $output='';
      if ($nbPrd!=0)
      {
        foreach ($prod as $prd) {
         $output.='
          <!-- Product-->
          <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
              <a class="card-img-top d-block 
               overflow-hidden singleIndProd" 
               id="'.$prd->produitsID.'" 
               href="#main_content">
               <img src="'.$prd->img.'" alt="Product">
              </a>
           
              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
                href="#">'.$prd->categorie.'</a>
                <h3 class="product-title font-size-sm">
                 <a href="#">'.$prd->nom.'</a>
                </h3>
                <div class="d-flex justify-content-between">
                 <div class="product-price">
                  <span class="text-primary"><b>
                    '.$prd->prix.' '.getTDevise().'</b>
                  </span>
                </div>
              </div>
            </div>

            <div class="card-body card-body">
              <div class="d-flex mb-2">
                <!--<a href="#main_content">
                  <button 
                   class="btn btn-danger btn-sm
                   singleIndProd" 
                   type="button" 
                   id="'.$prd->produitsID.'">
                   <i class="czi-eye font-size-sm mr-1">
                   </i>Détails
                  </button>
                </a>-->
              </div>
            </div>
          </div>
          </div>
          <hr class="d-sm-none">
         ';
        }
      }
      else
      {
        $output.='
         <div class="col-lg-12 alert alert-primary" role="alert">
           Aucun produit dans cette catégorie
         </div>
        ';
      }

      $output.='
        <script type="text/javascript">
          // Single product
            $(".singleIndProd").click(function(){
             var idProd = $(this).attr("id");
             var token = $("input[name=_token]").val();
             $("#main_content").load("singleProdclient",
             {idPrd:idProd,_token:token});
            });
        </script>
      ';

      return $output;

   }

  // Gestion de produit par catégorie depuis la page d'acceuil
   // Produit par catégorie
   public function prodCatgF(Request $request)
   {
     $output='';
        $catg = $request->catgID;
        $prod = DB::table('produits')
            ->join('categories', 'produits.categorie_id',
              '=', 'categories.id')
            ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
            ->where("produits.statut",'=',1)
            ->where('categorie_id', '=', $catg)
            ->orderBy('produits.id','desc')
            ->get();
        $nbPrd = count($prod);

      if ($nbPrd!=0)
      {
      $output.='
       <section class="px-lg-3 pt-4">
        <div class="px-3 pt-2">
          <div class="row pt-3 mx-n2">';
        foreach ($prod as $prd) 
        {
         $output.='        <div class="col-lg-3 col-6 px-0 px-sm-2 mb-sm-4">
            <div class="card product-card">
              <a class="card-img-top d-block 
               overflow-hidden singleIndProd" 
               id="'.$prd->produitsID.'" 
               href="#main_content">
               <img src="'.$prd->img.'" alt="Product">
              </a>
           
              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
                href="#">'.$prd->categorie.'</a>
                <h3 class="product-title font-size-sm">
                 <a href="#">'.$prd->nom.'</a>
                </h3>
                <div class="d-flex justify-content-between">
                 <div class="product-price">
                  <span class="text-primary"><b>
                    '.$prd->prix.' '.getTDevise().'</b>
                  </span>
                </div>
              </div>
            </div>

            <!--<div class="card-body card-body">
              <div class="d-flex mb-2">
                <a href="#main_content">
                  <button 
                   class="btn btn-danger btn-sm
                   singleIndProd" 
                   type="button" 
                   id="'.$prd->produitsID.'">
                   <i class="czi-eye font-size-sm mr-1">
                   </i>Détails
                  </button>
                </a>
              </div>
            </div>-->
          </div>
        </div>
          <hr class="d-sm-none">';
        }
       $output.='</div></div></section>';
      }
      else
      {
        $output.='
         <div class="col-lg-12 alert alert-primary" role="alert">
           Aucun produit dans cette catégorie
         </div>
        ';
      }

      $output.='
        <script type="text/javascript">
          // Single product
            $(".singleIndProd").click(function(){
             var idProd = $(this).attr("id");
             var token = $("input[name=_token]").val();
             $("#main_content").load("singleProdclient",
             {idPrd:idProd,_token:token});
            });
        </script>
      ';
      return $output;
      
   }

   // Produit par catégorie et sous-catégorie
   public function prodSctg(Request $request)
   {
     $output='';
        $catg  = $request->catg;
        $scatg = $request->scatg;
        $prod = DB::table('produits')
                ->join('categories', 'produits.categorie_id','=', 'categories.id')
                ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
                ->where("produits.statut",'=',1)
                ->where('categorie_id', '=', $catg)
                ->where('produits.idsctg', '=', $scatg)
                ->orderBy('produits.id','desc')
                ->get();
        /*dd($prod);*/
        $nbPrd = count($prod);

      if ($nbPrd!=0)
      {
      $output.='
       <section class="px-lg-3 pt-4">
        <div class="px-3 pt-2">
          <div class="row pt-3 mx-n2">';
        foreach ($prod as $prd) 
        {
         $output.='        <div class="col-lg-3 col-6 px-0 px-sm-2 mb-sm-4">
            <div class="card product-card">
              <a class="card-img-top d-block 
               overflow-hidden singleIndProd" 
               id="'.$prd->produitsID.'" 
               href="#main_content">
               <img src="'.$prd->img.'" alt="Product">
              </a>
           
              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1"
                href="#">'.$prd->categorie.'</a>
                <h3 class="product-title font-size-sm">
                 <a href="#">'.$prd->nom.'</a>
                </h3>
                <div class="d-flex justify-content-between">
                 <div class="product-price">
                  <span class="text-primary"><b>
                    '.$prd->prix.' '.getTDevise().'</b>
                  </span>
                </div>
              </div>
            </div>

            <!--<div class="card-body card-body">
              <div class="d-flex mb-2">
                <a href="#main_content">
                  <button 
                   class="btn btn-danger btn-sm
                   singleIndProd" 
                   type="button" 
                   id="'.$prd->produitsID.'">
                   <i class="czi-eye font-size-sm mr-1">
                   </i>Détails
                  </button>
                </a>
              </div>
            </div>-->
          </div>
        </div>
          <hr class="d-sm-none">';
        }
       $output.='</div></div></section>';
      }
      else
      {
        $output.='
         <div class="col-lg-12 alert alert-primary" role="alert">
           Aucun produit dans cette catégorie
         </div>
        ';
      }

      $output.='
        <script type="text/javascript">
          // Single product
            $(".singleIndProd").click(function(){
             var idProd = $(this).attr("id");
             var token = $("input[name=_token]").val();
             $("#main_content").load("singleProdclient",
             {idPrd:idProd,_token:token});
            });
        </script>
      ';
      return $output;
      
   }

   //TEST DE PARTAGE
   public function viewPrd(Request $request)
   { 
     //dd($request->id);
     $idPrd = $request->id;
     return view('amopot')->with('idPrd',$idPrd);
   }


}

?>