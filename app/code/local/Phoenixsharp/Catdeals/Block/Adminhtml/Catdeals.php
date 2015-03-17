<?php

class Phoenixsharp_Catdeals_Block_Adminhtml_Catdeals extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
        $this->_controller = 'adminhtml_catdeals';
        $this->_blockGroup = 'catdeals';
        $this->_headerText = Mage::helper('catdeals')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('catdeals')->__('Add Item');
        parent::__construct();
    }

}
