<?php

class Phoenixsharp_Catdeals_Adminhtml_CatdealsController extends Mage_Adminhtml_Controller_Action {

    protected function _initAction() {
        $this->loadLayout()
                ->_setActiveMenu('catdeals/items')
                ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
        return $this;
    }

    public function indexAction() {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('catdeals/adminhtml_catdeals'));
        $this->renderLayout();
    }

    public function editAction() {
        $catdealsId = $this->getRequest()->getParam('id');
        $catdealsModel = Mage::getModel('catdeals/catdeals')->load($catdealsId);

        if ($catdealsModel->getId() || $catdealsId == 0) {

            Mage::register('catdeals_data', $catdealsModel);

            $this->loadLayout();
            $this->_setActiveMenu('catdeals/items');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('catdeals/adminhtml_catdeals_edit'))
                    ->_addLeft($this->getLayout()->createBlock('catdeals/adminhtml_catdeals_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('catdeals')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function saveAction() {
        if ($this->getRequest()->getPost()) {
            try {
                $postData = $this->getRequest()->getPost();
                $timefrom = $postData['time_from'][0] . "," . $postData['time_from'][1] . "," . $postData['time_from'][2];
                $timeto = $postData['time_to'][0] . "," . $postData['time_to'][1] . "," . $postData['time_to'][2];
                $catdealsModel = Mage::getModel('catdeals/catdeals');

                $catdealsModel->setDealId($this->getRequest()->getParam('id'))
                        ->setDealType(1)
                        ->setTypeId($postData['type_id'])
                        ->setDealPrice($postData['deal_price'])
                        ->setDealQty($postData['deal_qty'])
                        ->setDateFrom($postData['date_from'])
                        ->setTimeFrom($timefrom)
                        ->setDateTo($postData['date_to'])
                        ->setTimeTo($timeto)
                        ->setStatus($postData['status']);

                if ($_FILES) {
                    $uploads_dir = Mage::getBaseDir() . '/media/deals/category/';
                    $ext = pathinfo($_FILES['banner_file']['name'], PATHINFO_EXTENSION);
                    $name = 'cat_' . $postData['type_id'] . '_deal_' . $this->getRequest()->getParam('id') . '.' . $ext;
                    $catdealsModel->setBannerFile($name);
                    move_uploaded_file($_FILES['banner_file']['tmp_name'], $uploads_dir . $name);
                }
                $catdealsModel->save();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setCatdealsData(false);

                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setCatdealsData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction() {
        if ($this->getRequest()->getParam('id') > 0) {
            try {
                $catdealsModel = Mage::getModel('catdeals/catdeals');

                $catdealsModel->setId($this->getRequest()->getParam('id'))
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
    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody(
                $this->getLayout()->createBlock('catdeals/adminhtml_catdeals_grid')->toHtml()
        );
    }

}
