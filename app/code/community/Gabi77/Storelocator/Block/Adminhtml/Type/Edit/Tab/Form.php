<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Block_Adminhtml_Type_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('type_form', array('legend'=>'Information Type'));
		$fieldset->addField('name', 'text',
				array(
						'label' => 'name',
						'class' => 'required-entry',
						'required' => true,
						'name' => 'name',
				));
		
		if ( Mage::registry('type_data') )
		{
			$form->setValues(Mage::registry('type_data')->getData());
		}
		return parent::_prepareForm();
	}
}
