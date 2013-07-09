<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */

class Gabi77_Storelocator_Block_Adminhtml_Storelocator_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
   public function __construct()
   {
		parent::__construct();
		$this->setId('storelocatorGrid');
		// This is the primary key of the database
		$this->setDefaultSort('id_store');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
   }   
   
   protected function _prepareCollection()
	{
		$collection = Mage::getModel('storelocator/storelocator')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
   protected function _prepareColumns()
   {
       $this->addColumn('id_store',
             array(
                    'header' => Mage::helper('storelocator')->__('ID'),
                    'align' =>'right',
                    'width' => '50px',
                    'index' => 'id_store',
               ));
       $this->addColumn('name',
               array(
                    'header' => Mage::helper('storelocator')->__('Name Store'),
            		'width'     => '150',
                    'align' =>'left',
                    'index' => 'name',
              ));
       $this->addColumn('address1', array(
                    'header' => Mage::helper('storelocator')->__('Address'),
            		'width'     => '150',
                    'align' =>'left',
                    'index' => 'address1',
             ));
       $this->addColumn('address2', array(
                    'header' => Mage::helper('storelocator')->__('Address 2'),
            		'width'     => '150',
                    'align' =>'left',
                    'index' => 'address2',
             ));
       $this->addColumn('codepostal', array(
                    'header' => Mage::helper('storelocator')->__('Code Postal'),
            		'width'     => '80',
                    'align' =>'left',
                    'index' => 'codepostal',
             ));
       $this->addColumn('city', array(
                    'header' => Mage::helper('storelocator')->__('City'),
            		'width'     => '100',
                    'align' =>'left',
                    'index' => 'city',
             ));
       
       $this->addColumn('country', array(
       		'header' => Mage::helper('storelocator')->__('Country'),
       		'align' =>'left',
       		'index' => 'country',
       		'type'	=> 'options',
       		'options' => Mage::getSingleton('storelocator/system_config_source_country_country')->getOptions(),
       ));
       $this->addColumn('store_type', array(
       		'header' => Mage::helper('storelocator')->__('Type Store'),
       		'align' =>'left',
       		'index' => 'store_type',
            'type'      =>  'options',       	
       		'options'   => Mage::getSingleton('storelocator/system_config_source_type_customselect')->getOptions(),
       ));
       
       
        $this->addColumn('phone', array(
                     'header' => Mage::helper('storelocator')->__('Phone'),
            		 'width'     => '100',
                     'align' =>'left',
                     'index' => 'phone',
          ));
       $this->addColumn('fax', array(
                    'header' => Mage::helper('storelocator')->__('Fax'),
            		'width'     => '100',
                    'align' =>'left',
                    'index' => 'fax',
             ));
       $this->addColumn('information', array(
       		'header' => Mage::helper('storelocator')->__('Information'),
       		'width'     => '200',
       		'align' =>'left',
       		'index' => 'information',
       ));
        
       $this->addColumn('status', array( 
            'header'    => Mage::helper('storelocator')->__('Status'),
            'align'     => 'left',
            'width'     => '80px',
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
                1 => 'Active',
                0 => 'Inactive',
            ),
        ));
       
       
       $this->addExportType('*/*/exportCsv', Mage::helper('storelocator')->__('CSV'));
       $this->addExportType('*/*/exportXml', Mage::helper('storelocator')->__('Excel XML'));
       
         return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
 
//    public function getGridUrl()
//    {
//      return $this->getUrl('*/*/grid', array('_current'=>true));
//    }
}

