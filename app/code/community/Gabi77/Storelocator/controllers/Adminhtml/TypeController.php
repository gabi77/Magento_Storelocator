<?php 

/**
 * Module de localistion des magasins physique
 *
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category type locator
 * @version 0.1
 */

class Gabi77_Storelocator_Adminhtml_TypeController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()->_setActiveMenu('storelocator/type')->_addBreadcrumb('type Manager','type Manager');
		return $this;
	}
	public function indexAction()
	{
		$this->_initAction();
		$this->renderLayout();
	}
	public function editAction()
	{
		$typeId = $this->getRequest()->getParam('id');
		$typeModel = Mage::getModel('storelocator/type')->load($typeId);
		if ($typeModel->getId() || $typeId == 0)
		{
			Mage::register('type_data', $typeModel);
			$this->loadLayout();
			$this->_setActiveMenu('storelocator/type');
			$this->_addBreadcrumb('type Manager', 'type Manager');
			$this->_initAction()
			->_addContent($this->getLayout()->createBlock('storelocator/adminhtml_type_edit'))
			->_addLeft($this->getLayout()->createBlock('storelocator/adminhtml_type_edit_tabs'))
			->renderLayout();
		}
		else
		{
			Mage::getSingleton('adminhtml/session')->addError('type does not exist');
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
				$typeModel = Mage::getModel('storelocator/type');
				if( $this->getRequest()->getParam('id') <= 0 )
					$typeModel->setCreatedTime(
							Mage::getSingleton('core/date')->gmtDate()
					);
				$typeModel->addData($postData)->setUpdateTime(
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
		if($this->getRequest()->getParam('id') > 0)
		{
			try
			{
				$typeModel = Mage::getModel('storelocator/type');
				$typeModel->setId($this->getRequest()
										->getParam('id'))
										->delete();
				Mage::getSingleton('adminhtml/session')
				->addSuccess('successfully deleted');
				$this->_redirect('*/*/');
			}
			catch (Exception $e)
			{
				Mage::getSingleton('adminhtml/session')
				->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
}
