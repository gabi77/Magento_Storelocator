<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_storelocator';
		$this->_blockGroup = 'storelocator';
		$this->_headerText = Mage::helper('storelocator')->__('Store Manager');
		$this->_addButtonLabel = Mage::helper('storelocator')->__('Add New Store');
		parent::__construct();
	}
}
