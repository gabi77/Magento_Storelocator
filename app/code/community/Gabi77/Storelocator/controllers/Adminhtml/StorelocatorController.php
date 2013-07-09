<?php 

/**
 * Module de localistion des magasins physique
 *
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.5
 */

class Gabi77_Storelocator_Adminhtml_StorelocatorController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()->_setActiveMenu('storelocator/storelocatore')->_addBreadcrumb('store Manager','store Manager');
		return $this;
	}
	public function indexAction()
	{
        $this->_initAction();       
        $this->renderLayout();
	}
	
	public function editAction()
	{
		$storeId = $this->getRequest()->getParam('id');
		$storeModel = Mage::getModel('storelocator/storelocator')->load($storeId);
		if ($storeModel->getId() || $storeId == 0)
		{
			Mage::register('storelocator_data', $storeModel);
			$this->loadLayout();
			$this->_setActiveMenu('storelocator/storelocator');
			$this->_addBreadcrumb('store Manager', 'store Manager');
			$this->_initAction()
			->_addContent($this->getLayout()->createBlock('storelocator/adminhtml_storelocator_edit'))
			->_addLeft($this->getLayout()->createBlock('storelocator/adminhtml_storelocator_edit_tabs'))
			->renderLayout();
		}
		else
		{
			Mage::getSingleton('adminhtml/session')->addError('store does not exist');
			$this->_redirect('*/*/');
		}
	}
	public function newAction()
	{
		$this->_forward('edit');
	}
	public function saveAction()
	{
		if ($this->getRequest()->getPost())
		{
			try {
				$postData = $this->getRequest()->getPost();
				$storeModel = Mage::getModel('storelocator/storelocator');
				if( $this->getRequest()->getParam('id') <= 0 )
					$storeModel->setCreatedTime(
							Mage::getSingleton('core/date')->gmtDate()
					);
				$storeModel->addData($postData)->setUpdateTime(
						Mage::getSingleton('core/date')
						->gmtDate())
						->setId($this->getRequest()->getParam('id'))
						->save();
				Mage::getSingleton('adminhtml/session')->addSuccess('successfully saved');
				Mage::getSingleton('adminhtml/session')->settestData(false);
				$this->_redirect('*/*/');
				return;
			} catch (Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->settestData($this->getRequest()
						->getPost()
				);
				$this->_redirect('*/*/edit',
						array('id' => $this->getRequest()->getParam('id')));
				return;
			}
		}
		$this->_redirect('*/*/');
	}
	
	    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $storeModel = Mage::getModel('storelocator/storelocator');
               
                $storeModel->setId($this->getRequest()->getParam('id'))
                    ->delete();
                   
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    /**
     * Product grid for AJAX request.
     * Sort and filter result for example.
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
               $this->getLayout()->createBlock('storelocator/adminhtml_storelocator_grid')->toHtml()
        );
    }
	
	
	
	
	
	public function exportCsvAction()
	{
		$fileName   = 'store_export.csv';
		$content    = $this->getLayout()->createBlock('storelocator/adminhtml_storelocator_grid')->getCsvFile();
		$this->_prepareDownloadResponse($fileName, $content);
	}
	
	public function exportXmlAction()
	{
		$fileName   = 'store_export.xls';
		$content    = $this->getLayout()->createBlock('storelocator/adminhtml_storelocator_grid')->getExcelFile();
		$this->_prepareDownloadResponse($fileName, $content);
	}
}
