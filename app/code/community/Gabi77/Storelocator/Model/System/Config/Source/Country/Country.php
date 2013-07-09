<?php

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * @category    Gabi77
 * @package     Gabi77_Storelocator
 * @copyright   Copyright (c) 2013 Gabi77 (http://www.gabi77.com)
 * @license     Open Gabi77
 **/



class Gabi77_Storelocator_Model_System_Config_Source_Country_Country
{
    protected $_options;

    public function toOptionArray()
    {

    	if (!$this->_options) {
    		$this->_options = Mage::getResourceModel('directory/country_collection')->loadData()->toOptionArray();
    		array_unshift($this->_options, array('value'=> '', 'label'=> Mage::helper('adminhtml')->__('-- Please Select --')));
    	}
    	

        return $options;
    }
    
    /**
     * Retrieve type store options
     *
     * @return array
     */
    public function getOptions()
    {
    	$storedArray = Mage::getResourceModel('directory/country_collection')->toArray();
    	if ($this->_options === null) {
    		$this->_options = array();
    		foreach ($storedArray['items'] as $country) {
    			$this->_options[$country['country_id']] = $country['country_id'];
    		}
    	}
    
    	return $this->_options;
    }
}