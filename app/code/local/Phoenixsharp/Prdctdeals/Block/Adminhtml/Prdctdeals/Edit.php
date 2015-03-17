<?php

class Phoenixsharp_Prdctdeals_Block_Adminhtml_Prdctdeals_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'prdctdeals';
        $this->_controller = 'adminhtml_prdctdeals';

        $this->_updateButton('save', 'label', Mage::helper('prdctdeals')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('prdctdeals')->__('Delete Item'));

    }

    public function getHeaderText() {
        if (Mage::registry('prdctdeals_data') && Mage::registry('prdctdeals_data')->getId()) {
            return Mage::helper('prdctdeals')->__("Edit Item");
        } else {
            return Mage::helper('prdctdeals')->__('Add Item');
        }
    }

}
