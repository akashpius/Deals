<?php
 
class Phoenixsharp_Catdeals_Block_Adminhtml_Catdeals_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
               
        $this->_objectId = 'id';
        $this->_blockGroup = 'catdeals';
        $this->_controller = 'adminhtml_catdeals';
 
        $this->_updateButton('save', 'label', Mage::helper('catdeals')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('catdeals')->__('Delete Item'));
    }
 
    public function getHeaderText()
    {
        if( Mage::registry('catdeals_data') && Mage::registry('catdeals_data')->getId() ) {
            return Mage::helper('catdeals')->__("Edit Item");
        } else {
            return Mage::helper('catdeals')->__('Add Item');
        }
    }
}