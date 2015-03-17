<?php

class Phoenixsharp_Prdctdeals_Block_Adminhtml_Prdctdeals_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('prdctdealsGrid');
        // This is the primary key of the database
        $this->setDefaultSort('prdctdeals_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('prdctdeals/prdctdeals')->getCollection()->addFieldToFilter('deal_type',2);
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('deal_id', array(
            'header' => Mage::helper('prdctdeals')->__('ID'),
            'align' => 'right',
            'width' => '10px',
            'index' => 'deal_id',
        ));

        
        $this->addColumn('type_id', array(
            'header' => Mage::helper('prdctdeals')->__('Product SKU'),
            'align' => 'left',
            'index' => 'type_id',
            'width' => '50px',
        ));


        $this->addColumn('deal_price', array(
            'header' => Mage::helper('prdctdeals')->__('Deal Price'),
            'width' => '150px',
            'index' => 'deal_price',
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('prdctdeals')->__('Status'),
            'width' => '150px',
            'index' => 'status',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }


}
