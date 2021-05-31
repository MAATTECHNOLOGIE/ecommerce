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
	function getProdAtrb($id)
	{
		$attributs = attributs::find($id);
      	
		return $attributs;
	}
}

