<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */


class Gabi77_Storelocator_Model_System_Config_Source_Type_CustomSelect 
{
	
	/**
	 * Page layout options
	 *
	 * @var array
	 */
	protected $_options = null;
	
	/**
	 * Retrieve type store OptionArray
	 *
	 * @return array
	 */

    public function toOptionArray()
    {
        $storedArray = Mage::getModel('storelocator/type')->getCollection()->toArray();
        $options = array();
        $options[] = array(
                    'value' => '',
                    'label' => Mage::helper('storelocator')->__('Type Store'));
        
        if ($storedArray['totalRecords'] > 0) {
            foreach ($storedArray['items'] as $type) {
                $options[] = array(
                    'value' => $type['id_type'],
                    'label' => $type['name']
                );
            }
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
    	$storedArray = Mage::getModel('storelocator/type')->getCollection()->toArray();
    	if ($this->_options === null) {
    		$this->_options = array();
    		foreach ($storedArray['items'] as $type) {
    			$this->_options[$type['id_type']] = $type['name'];
    		}
    	}
    
    	return $this->_options;
    }
    

}