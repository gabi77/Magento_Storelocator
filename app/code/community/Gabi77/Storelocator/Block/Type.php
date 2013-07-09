<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Block_Type extends Mage_Core_Block_Template
{
     public function TypeBlock()
     {
        //on initialize la variable
		$retour='';
		/**
		 * on fait une requette : aller chercher Tous les elements de la table Gabi77_Store
		 * (grace à notre model type/type et les trier par id_type
		 *
		 **/
		
		$collection = Mage::getModel('storelocator/type')->getCollection();
		/* ensuite on parcours le resultat de la requette et
		 avec la fonction getData(), on stocke dans la variable retour
		(pour l’affichage dans le template) les données voulues */
		foreach($collection as $data)
		{
			$retour .= $data->getData('name');
		}
		//je renvoi un message de succes a l'utilisateur (juste pour que vous sachiez utiliser la fonction)
		Mage::getSingleton('adminhtml/session')->addSuccess('Cool Ca marche !!');
		return $retour;
     }
}