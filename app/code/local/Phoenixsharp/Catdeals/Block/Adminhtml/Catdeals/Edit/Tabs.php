<?php
 
class Phoenixsharp_Catdeals_Block_Adminhtml_Catdeals_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
 
    public function __construct()
    {
        parent::__construct();
        $this->setId('catdeals_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('catdeals')->__('News Information'));
    }
 
    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('catdeals')->__('Item Information'),
            'title'     => Mage::helper('catdeals')->__('Item Information'),
            'content'   => $this->getLayout()->createBlock('catdeals/adminhtml_catdeals_edit_tab_form')->toHtml(),
        ));
       
        return parent::_beforeToHtml();
    }
}