<?php 

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Model_Type extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('storelocator/type');
	}
}
