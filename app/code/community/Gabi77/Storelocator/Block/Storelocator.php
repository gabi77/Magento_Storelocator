<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.5
 */

class Gabi77_Storelocator_Block_Storelocator extends Mage_Core_Block_Template
{
     public function methodblock()
     {
		$collection = Mage::getModel('storelocator/storelocator')->getCollection()
						  ->join('storelocator/type','store_type=id_type',array('typename' => 'name'))	
						  ->addFilter('status','1')
						  ->setOrder('store_type', 'asc')
						  ->setOrder('codepostal', 'asc');
		return $collection;
     }
     
     
     public function getModel(){
     	return Mage::getModel('storelocator/storelocator');
     }
     /**
	 * Code d'ajout du fichier Js de l'Interakting Slider
	 *
	 * @return code HTML
	 */
	public function addJs(){
		return '<script type="text/javascript" src="'.Mage::getBaseUrl('js').'jquery/jquery.ui.dialog.js"></script>';

	}
	/**
	 * Code d'ajout du fichier Js de l'Interakting Slider
	 *
	 * @return code HTML
	 */
	public function addCss(){
		return '<link rel="stylesheet" type="text/css" href="'.Mage::getBaseUrl('js').'jquery/jquery.ui.dialog.css" media="all" />';
	
	}
}