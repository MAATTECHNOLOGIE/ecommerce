<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('amopot');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Vue Notre  histoire 
Route::get('/about', 'ClientController@about')->name('about');

//Vue Notre  histoire 
Route::get('/cgu', 'ClientController@cgu')->name('cgu');

// Page produits
 Route::get('produits','ClientController@produits')->name('produits');

// Page fitness
 Route::get('fitness','ClientController@fitness')->name('fitness');

// Page contact
 Route::get('contact','ClientController@contact')->name('contact');

// Page produit particulier
 Route::post('singleProdclient',
     'ClientController@singleProdclient')
     ->name('singleProdclient');

// Page panier
 Route::get('panier','ClientController@panier')
  ->name('panier');

//VIDER LE PANIER 
  Route::get('delPanier', 'ClientController@delPanier');

//Panier mis a jour
 Route::get('updPanier','ClientController@updPanier')
  ->name('updPanier');
  
//Recherche intelligente de produit
  Route::get('ajaxPrdAll','ClientController@ajaxPrdAll')->name('ajaxPrdAll');

// Supprimer un item du panier
 Route::get('cartItemDel','ClientController@cartItemDel')
  ->name('cartItemDel');

// selection de ville ou commune en fonction du pays
 Route::get('ville','ClientController@ville')
  ->name('ville');
  
  

// Page checkout
 Route::post('checkout','ClientController@checkout')->name('checkout');

// Page compte_client
 Route::get('compte','ClientController@compte')->name('compte');

/*
|--------------------------------------------------------------------------
| Web Routes :: Back-End
|--------------------------------------------------------------------------
| Interface Administrateur
| 
*/

// Page administrateur
 Route::get('dashboard','AdminController@dashboard')->name('dashboard');



// Gestion de produit
 Route::get('newProd','AdminController@newProd')
      ->name('newProd');
 Route::get('pubProd','AdminController@pubProd')
      ->name('pubProd');
 Route::get('lockProd','AdminController@lockProd')
      ->name('lockProd');
 Route::post('AddProd','AdminController@AddProd')
     ->name('AddProd');
 Route::get('delProd','AdminController@delProd')
    ->name('delProd');
 Route::get('bloqueProd','AdminController@bloqueProd')
    ->name('bloqueProd');
 Route::get('updProd','AdminController@updProd')
    ->name('updProd');
 Route::get('catgProd','AdminController@catgProd')
    ->name('catgProd');
 Route::get('SingleProd','AdminController@SingleProd')
    ->name('SingleProd');
 Route::get('lockcatgProd','AdminController@lockcatgProd')
 	  ->name('lockcatgProd');
 Route::get('SingleProdlock','AdminController@SingleProdlock')
      ->name('SingleProdlock');
 Route::get('bloqueProdunlock','AdminController@bloqueProdunlock')
      ->name('bloqueProdunlock');

 Route::get('searchPrd','ClientController@searchPrd')
      ->name('searchPrd');

 Route::get('prodCatg','ClientController@prodCatg')
      ->name('prodCatg');
      
  Route::get('prodCatgF','ClientController@prodCatgF')
      ->name('prodCatgF');

  Route::get('prodSctg','ClientController@prodSctg')
      ->name('prodSctg');

 //Ajout d'option a un prouit
  Route::get('optPrd', 'AdminController@optPrd')->name('optPrd');


      

  
 
// Gestion de clients
 Route::get('nwClient','AdminController@nwClient')->name('nwClient');
 Route::get('listClient','AdminController@listClient')
      ->name('listClient');
 Route::get('delClient','AdminController@delClient')->name('delClient');
 Route::get('updClient','AdminController@updClient')->name('updClient');

 
 
// Gestion de commandes
 Route::get('newComd','AdminController@newComd')->name('newComd');
 Route::get('noComd','AdminController@noComd')->name('noComd');
 Route::get('okComd','AdminController@okComd')->name('okComd');
 Route::get('livComd','AdminController@livComd')->name('livComd');
 Route::get('comdListe','AdminController@comdListe')
      ->name('comdListe');
 Route::get('delComd','AdminController@delComd')->name('delComd');
 Route::get('refusComd','AdminController@refusComd')
      ->name('refusComd');
 Route::get('shipComd','AdminController@shipComd')
      ->name('shipComd');

// Gestion de zone
 Route::get('newZone','AdminController@newZone')->name('newZone');
 Route::get('listeZone','AdminController@listeZone')
      ->name('listeZone');
 Route::get('AddZone','AdminController@AddZone')->name('AddZone');
 Route::get('delZn','AdminController@delZn')->name('delZn');
 

// Gestion de catégorie
 Route::get('newCatg','AdminController@newCatg')->name('newCatg');
 Route::get('listeCatg','AdminController@listeCatg')
      ->name('listeCatg');
 Route::get('listeSCatg','AdminController@listeSCatg')
      ->name('listeSCatg');
 Route::get('AddCatg','AdminController@AddCatg')->name('AddCatg');
 Route::get('delCatg','AdminController@delCatg')->name('delCatg');
 Route::get('delSCatg','AdminController@delSCatg')->name('delSCatg');
 Route::get('newSCatg','AdminController@newSCatg')->name('newSCatg');
 Route::get('AddSCatg','AdminController@AddSCatg')->name('AddSCatg');
 Route::get('CatgSCatg','AdminController@CatgSCatg')->name('CatgSCatg');
 Route::get('addcatgScatg','AdminController@addcatgScatg')->name('addcatgScatg');
 
 


// Gestion de slide
 Route::get('newSlide','AdminController@newSlide')
      ->name('newSlide');
 Route::get('pubSlide','AdminController@pubSlide')
      ->name('pubSlide');
 Route::post('AddSlide','AdminController@AddSlide')
      ->name('AddSlide');
 Route::get('delSlide','AdminController@delSlide')
      ->name('delSlide');
  

// Paramétrage
 Route::get('setting','AdminController@setting')
     ->name('setting');
 Route::post('UpdParam','AdminController@UpdParam')
     ->name('UpdParam');
 Route::get('facebook','AdminController@facebook')
     ->name('facebook');

 Route::get('facebook','AdminController@facebook')
     ->name('facebook');

 Route::get('playst','AdminController@playst')
     ->name('playst');
     
// Gestion de panier client
  Route::get('AddCart','ClientController@AddCart')
     ->name('AddCart');

  Route::get('buyComd','ClientController@buyComd')
     ->name('buyComd');
  

// Gestion du compte client
 Route::get('signup','compteController@signup')
     ->name('signup');
 
 Route::get('compteLg','compteController@compteLg')
     ->name('compteLg');
 
 Route::get('loginCpte','compteController@loginCpte')
     ->name('loginCpte');
 
 Route::get('logoutCli','compteController@logoutCli')
     ->name('logoutCli');
 
 Route::get('newwComd','compteController@newwComd')
     ->name('newwComd');
 
 Route::get('livvComd','compteController@livvComd')
     ->name('livvComd');
 
 Route::get('detailComd','compteController@detailComd')
     ->name('detailComd');
  
 
 Route::get('infos','compteController@infos')
     ->name('infos');
 
 Route::get('updClint','compteController@updClint')
     ->name('updClint');
 
 Route::get('sendMail','compteController@sendMail')
     ->name('sendMail');

 
// Paiement cinetpay
  Route::get('cinetpay_notify','ClientController@cinetpay_notify')
     ->name('cinetpay_notify');


//enregistrement transaction
  Route::get('saveTrans', 'ClientController@saveTrans' );
 
 




 
 
 
 




 

 









 



 
 
 