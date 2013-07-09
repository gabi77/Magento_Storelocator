<?php 

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Model_Storelocator extends Mage_Core_Model_Abstract
{
	/**
	 * unique internal name extension
	 *
	 * @var string _code
	 */
	
	protected $_code  = 'storelocator';
	protected $_folderImg  = 'storelocator/';
	 
	public function _construct()
	{
		parent::_construct();
		$this->_init('storelocator/storelocator');
	}
     
	/**
	 * Storelocator Title Configuration Admin
	 *
	 * @return string
	 */
          
     public function getTitle() {
     	return Mage::getStoreConfig($this->_code.'/storelocator_parameter/title');
     }
     
	/**
	 * Storelocator Description Configuration Admin
	 *
	 * @return string
	 */
     
     public function getDescription() {
     	return Mage::getStoreConfig('storelocator/storelocator_parameter/description');
     }
     
     /**
      * Storelocator Image Configuration Admin
      *
      * @return string
      */
     
     public function getImage() {
     	
     	$image = Mage::getStoreConfig($this->_code.'/storelocator_parameter/image');
     	$code = Mage::getBaseUrl (Mage_Core_Model_Store::URL_TYPE_MEDIA).$this->_folderImg.$image;
     	
     	return $code;
     }
     
	/**
	 * Storelocator Actif Configuration Admin
	 *
	 * @return boolean
	 */
	public function isVisible(){
		
		if(!Mage::getStoreConfig($this->_code.'/storelocator_parameter/active')){
			return false;
		}
		
		return true;
	}
}
