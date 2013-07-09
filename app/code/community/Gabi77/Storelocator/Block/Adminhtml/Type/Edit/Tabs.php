<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */


class Gabi77_Storelocator_Block_Adminhtml_Type_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('type_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle('Information sur la boutique');
	}
	protected function _beforeToHtml()
	{
		$this->addTab('form_section', array(
				'label' => 'Type Information',
				'title' => 'Type Information',
				'content' => $this->getLayout()
				->createBlock('storelocator/adminhtml_type_edit_tab_form')
				->toHtml()
		));
	return parent::_beforeToHtml();
	}
}
