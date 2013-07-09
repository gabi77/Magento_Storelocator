<?php 

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */


class Gabi77_Storelocator_TypeController extends Mage_Core_Controller_Front_Action {
	
	
	public function indexAction()
	{
		$this->loadLayout();	//Va chercher les elements � afficher
		$this->renderLayout();  //Affiche les elements
	}
		
	/**
	 * Insert the store
	 */
	
	public function saveAction()
	{
		//on recuperes les donn�es envoy�es en POST
		$name = $this->getRequest()->getPost('name');
		//on verifie que les champs ne sont pas vide
		if(isset($name)&&($name!=''))
		{
			//on cree notre objet et on l'enregistre en base
			$type = Mage::getModel('storelocator/type');
			$type->setData('name', $name);
			$type->save();
		}
		//on redirige l�utilisateur vers la m�thode index du controller indexController
		//de notre module <strong>store</strong>
		$this->_redirect('storelocator/type/index');
	}
	
	/**
	 * Edit the store
	 */
	
	public function editAction()
	{
		//on recuperes les donn�es envoy�es en POST
		$name = ''.$this->getRequest()->getPost('name');
		if(isset($name)&&($name!=''))
		{
			//on cree notre objet et on l'enregistre en base
			$type = Mage::getModel('storelocator/type');
			$type->setData('name', $name);
			$type->update();
		}
		//on redirige l�utilisateur vers la m�thode index du controller indexController
		//de notre module <strong>store</strong>
		$this->_redirect('storelocator/type/index');
	}
	
	/**
	 * Delete the store
	 */
	
	public function deleteAction()
	{
		
	}
		
}
