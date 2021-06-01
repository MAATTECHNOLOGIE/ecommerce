<?php

use App\Model\produits;
use App\Model\attributs;
use App\Model\imgPrdByColor;
use App\Model\produits_has_attributs;


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

