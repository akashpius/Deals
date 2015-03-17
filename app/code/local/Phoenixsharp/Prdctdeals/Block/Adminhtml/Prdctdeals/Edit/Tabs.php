<?php
 
class Phoenixsharp_Prdctdeals_Block_Adminhtml_Prdctdeals_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
 
    public function __construct()
    {
        parent::__construct();
        $this->setId('prdctdeals_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('prdctdeals')->__('News Information'));
    }
 
    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('prdctdeals')->__('Item Information'),
            'title'     => Mage::helper('prdctdeals')->__('Item Information'),
            'content'   => $this->getLayout()->createBlock('prdctdeals/adminhtml_prdctdeals_edit_tab_form')->toHtml(),
        ));
       
        return parent::_beforeToHtml();
    }
}