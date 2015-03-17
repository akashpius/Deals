<?php
 
class Phoenixsharp_Prdctdeals_Block_Adminhtml_Prdctdeals extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_prdctdeals';
        $this->_blockGroup = 'prdctdeals';
        $this->_headerText = Mage::helper('prdctdeals')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('prdctdeals')->__('Add Item');
        parent::__construct();
    }
}