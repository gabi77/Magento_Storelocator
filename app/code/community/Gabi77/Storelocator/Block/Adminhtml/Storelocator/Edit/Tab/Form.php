<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.5
 */

class Gabi77_Storelocator_Block_Adminhtml_Storelocator_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('storelocator_form', array('legend'=>Mage::helper('storelocator')->__('Store information')));
        
		
		$fieldset->addField('name', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('Name'),
						'class' => 'required-entry',
						'required' => true,
						'name' => 'name',
				));
		$fieldset->addField('address1', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('Address'),
						'class' => 'required-entry',
						'required' => true,
						'name' => 'address1',
				));
		$fieldset->addField('address2', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('Address2'),
						'name' => 'address2',
				));
		$fieldset->addField('codepostal', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('Zip/Postal Code'),
						'class' => 'required-entry',
						'required' => true,
						'name' => 'codepostal',
				));
		$fieldset->addField('city', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('City'),
						'class' => 'required-entry',
						'required' => true,
						'name' => 'city',
				));
		$fieldset->addField('country', 'select', array(
				'name'  => 'country',
				'label'     => Mage::helper('storelocator')->__('Country'),
				'values'    => Mage::getModel('adminhtml/system_config_source_country')->toOptionArray()
		));
		$fieldset->addField('phone', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('Phone'),
						'class' => 'required-entry',
						'required' => true,
						'name' => 'phone',
				));
		$fieldset->addField('fax', 'text',
				array(
						'label' => Mage::helper('storelocator')->__('Fax'),
						'class' => 'required-entry',
						'required' => true,
						'name' => 'fax',
				));
		$fieldset->addField('store_type', 'select', array(
				'name'  => 'store_type',
				'label'     => Mage::helper('storelocator')->__('Store Type'),
				'required' => true,
				'values'    => Mage::getModel('storelocator/system_config_source_type_customselect')->toOptionArray(),
		));
		$fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('storelocator')->__('Status'),
            'name'      => 'status',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('storelocator')->__('Active'),
                ),
 
                array(
                    'value'     => 0,
                    'label'     => Mage::helper('storelocator')->__('Inactive'),
                ),
            ),
        ));
		
		$fieldset->addField('information', 'editor', array(
				'name'      => 'information',
				'label'     => Mage::helper('storelocator')->__('Content'),
				'title'     => Mage::helper('storelocator')->__('Content'),
				'style'     => 'width:98%; height:400px;',
				'wysiwyg'   => false,
				'required'  => false,
				'after_element_html' => '<small>Information compl&eacute;mentaire relatif aux heures d\'ouverture</small>'
		));
			
		if ( Mage::getSingleton('adminhtml/session')->getStorelocatorData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getStorelocatorData());
            Mage::getSingleton('adminhtml/session')->setStorelocatorData(null);
        } elseif ( Mage::registry('storelocator_data') ) {
            $form->setValues(Mage::registry('storelocator_data')->getData());
        }
		
		return parent::_prepareForm();
	}
}
