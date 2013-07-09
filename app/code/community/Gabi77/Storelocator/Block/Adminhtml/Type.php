<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Block_Adminhtml_Type extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
	     //on indique ou va se trouver le controller
	     $this->_controller = 'adminhtml_type';
	     $this->_blockGroup = 'storelocator';
	     //le texte du header qui s’affichera dans l’admin
	     $this->_headerText = Mage::helper('storelocator')->__('Store Type');
	     //le nom du bouton pour ajouter un nouveau type
	     $this->_addButtonLabel = Mage::helper('storelocator')->__('Add New Type');
	     parent::__construct();
     }
}
