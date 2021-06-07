<?php

use App\Model\produits;
use App\Model\attributs;
use App\Model\imgPrdByColor;
use App\Model\produits_has_attributs;
use App\Model\stock_prd;


if(!function_exists('getAttriByType'))
{
	function getAttriByType($type)
	{
		$attributs = attributs::where('type','=',$type)->get();
      	
		return $attributs;
	}
}

if(!function_exists('getAttriById'))
{
	function getAttriById($id)
	{
		$attributs = attributs::find($id);
      	
		return $attributs;
	}
}
// Fonction du produit en fonction de l'attribut
if(!function_exists('getProdAtrb'))
{
	function getProdAtrb($idPrd)
	{
		$prodAttribut = DB::table('produits_has_attributs')
            ->join('attributs', 'produits_has_attributs.attributs_id', '=', 'attributs.id')
            ->select('attributs.*')
			->where('produits_has_attributs.produits_id','=', $idPrd)
            ->get();
         return $prodAttribut;
	}
}

// Qte en fonction de la taille
if(!function_exists('getQtebyTaille'))
{
	function getQtebyTaille($idprd,$idcolor,$taille)
	{
		$qteStock = DB::table('stock_prds')
			->where('stock_prds.produits_id','=', $idprd)
			->where('stock_prds.couleur','=', $idcolor)
			->where('stock_prds.taille','=', $taille)
			->select('stock_prds.qte')
            ->get();
         return $qteStock;
	}
}
// Qte en fonction de l'Epaisseur
if(!function_exists('getQtebyEpaisseur'))
{
	function getQtebyEpaisseur($idprd,$idcolor,$epaisseur)
	{
		$qteStock = DB::table('stock_prds')
			->where('stock_prds.produits_id','=', $idprd)
			->where('stock_prds.couleur','=', $idcolor)
			->where('stock_prds.epaisseur','=', $epaisseur)
			->select('stock_prds.qte')
            ->get();
         return $qteStock;
	}
}
// Qte en fonction de la pointure
if(!function_exists('getQtebyPointure'))
{
	function getQtebyPointure($idprd,$idcolor,$pointure)
	{
		$qteStock = DB::table('stock_prds')
			->where('stock_prds.produits_id','=', $idprd)
			->where('stock_prds.couleur','=', $idcolor)
			->where('stock_prds.pointure','=', $pointure)
			->select('stock_prds.qte')
            ->get();
         return $qteStock;
	}
}


// Obtenir Stock d'un Prd by idPrd
if(!function_exists('getStockByIdPrd'))
{
	function getStockByIdPrd($idprd)
	{
		$stockByIdPrd = DB::table('stock_prds')
			->where('stock_prds.produits_id','=', $idprd)
            ->get();
         return $stockByIdPrd;
	}
}

// Obtenir Stock d'un Prd by idPrd
if(!function_exists('getStockPrd'))
{
	function getStockPrd($idStck)
	{
		$stockPrd = stock_prd::find($idStck);
         return $stockPrd;
	}
}