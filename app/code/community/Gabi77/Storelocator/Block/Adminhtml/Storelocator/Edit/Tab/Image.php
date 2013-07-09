<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Block_Adminhtml_Storelocator_Edit_Tab_Image extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('Storelocator_form', array('legend'=>'Information Image'));
		$fieldset->addField('file', 'file', array(
				'label'     => Mage::helper('form')->__('Upload'),
				'value'  => 'Uplaod'
		));
		/*
		if ( Mage::registry('store_data') )
		{
			$form->setValues(Mage::registry('store_data')->getData());
		}*/
		return parent::_prepareForm();
	}
}
