<?php

class Phoenixsharp_Catdeals_Block_Adminhtml_Catdeals_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('catdealsGrid');
        // This is the primary key of the database
        $this->setDefaultSort('catdeals_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('catdeals/catdeals')->getCollection()->addFieldToFilter('deal_type',1);
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('deal_id', array(
            'header' => Mage::helper('catdeals')->__('ID'),
            'align' => 'right',
            'width' => '10px',
            'index' => 'deal_id',
        ));
        $this->addColumn('category_id', array(
            'header' => Mage::helper('catdeals')->__('Category'),
            'align' => 'left',
            'index' => 'category_id',
            'width' => '50px',
        ));


        $this->addColumn('deal_price', array(
            'header' => Mage::helper('catdeals')->__('Deal Price'),
            'width' => '150px',
            'index' => 'deal_price',
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('catdeals')->__('Status'),
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
