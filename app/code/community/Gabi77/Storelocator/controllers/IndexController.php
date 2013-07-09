<?php 

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */


class Gabi77_Storelocator_IndexController extends Mage_Core_Controller_Front_Action {
	
	public function indexAction()
	{
		$this->loadLayout();	//Va chercher les elements à afficher
		$this->renderLayout();  //Affiche les elements
	}
	
	/**
	 * Insert the store
	 */
	
	public function saveAction()
	{
		//on recuperes les donn�es envoy�es en POST
		$name = ''.$this->getRequest()->getPost('name');
		$address1 = ''.$this->getRequest()->getPost('dadress1');
		$address2 = ''.$this->getRequest()->getPost('dadress2');
		$codepostal = ''.$this->getRequest()->getPost('$codepostal');
		$city = ''.$this->getRequest()->getPost('city');
		$country = ''.$this->getRequest()->getPost('country');
		$phone = ''.$this->getRequest()->getPost('phone');
		$fax = ''.$this->getRequest()->getPost('fax');
		$status = ''.$this->getRequest()->getPost('status');
		$store_type = ''.$this->getRequest()->getPost('store_type');
		//on verifie que les champs ne sont pas vide
		if(isset($name)&&($name!='') && isset($address1)&&($address1!='')
				&& isset($phone)&&($phone!='') )
		{
			//on cree notre objet et on l'enregistre en base
			$contact = Mage::getModel('storelocator/storelocator');
			$contact->setData('name', $name);
			$contact->setData('address1', $address1);
			$contact->setData('address2', $address2);
			$contact->setData('codepostal', $codepostal);
			$contact->setData('city', $city);
			$contact->setData('country', $country);
			$contact->setData('phone', $phone);
			$contact->setData('fax', $fax);
			$contact->setData('status', $status);
			$contact->setData('store_type', $store_type);
			$contact->save();
		}
		//on redirige l�utilisateur vers la m�thode index du controller indexController
		//de notre module <strong>store</strong>
		$this->_redirect('storelocator/index/index');
	}
	
	/**
	 * Edit the store
	 */
	
	public function editAction()
	{
		if(isset($name)&&($name!='') && isset($address1)&&($address1!='')
				&& isset($phone)&&($phone!='') )
		{
			//on cree notre objet et on l'enregistre en base
			$contact = Mage::getModel('storelocator/storelocator');
			$contact->setData('name', $name);
			$contact->setData('address1', $address1);
			$contact->setData('address2', $address2);
			$contact->setData('codepostal', $codepostal);
			$contact->setData('city', $city);
			$contact->setData('country', $country);
			$contact->setData('phone', $phone);
			$contact->setData('fax', $fax);
			$contact->setData('status', $status);
			$contact->setData('store_type', $store_type);
			$contact->update();
		}
		//on redirige l�utilisateur vers la m�thode index du controller indexController
		//de notre module <strong>store</strong>
		$this->_redirect('storelocator/index/index');
	}
	
	/**
	 * Delete the store
	 */
	
	public function deleteAction()
	{
		
	}

}
