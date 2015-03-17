<?php

class Phoenixsharp_Catdeals_Block_Adminhtml_Catdeals_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareLayout() {
        $return = parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        return $return;
    }

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('catdeals_form', array('legend' => Mage::helper('catdeals')->__('Item information')));


        $fieldset->addField('type_id', 'select', array(
            'label' => Mage::helper('catdeals')->__('Category'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'type_id',
            'values' => Mage::helper('catdeals')->getAllCategories(),
        ));

        $fieldset->addField('deal_price', 'text', array(
            'label' => Mage::helper('catdeals')->__('Deal Price'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'deal_price',
        ));

        $fieldset->addField('deal_qty', 'text', array(
            'label' => Mage::helper('catdeals')->__('Deal Quantity'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'deal_qty',
        ));

        $fieldset->addField('date_from', 'date', array(
            'label' => Mage::helper('catdeals')->__('Date From'),
            'name' => 'date_from',
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT)
        ));

        $fieldset->addField('time_from', 'time', array(
            'label' => Mage::helper('catdeals')->__('Time From'),
            'name' => 'time_from'
        ));

        $fieldset->addField('date_to', 'date', array(
            'label' => Mage::helper('catdeals')->__('Date To'),
            'name' => 'date_to',
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT)
        ));

        $fieldset->addField('time_to', 'time', array(
            'label' => Mage::helper('catdeals')->__('Time To'),
            'name' => 'time_to'
        ));

        $fieldset->addField('banner_file', 'image', array(
            'name' => 'banner_file',
            'label' => Mage::helper('prdctdeals')->__('Banner Image'),
            'title' => Mage::helper('prdctdeals')->__('Banner Image'),
            'required' => false
        ));

        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('catdeals')->__('Status'),
            'name' => 'status',
            'values' => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('catdeals')->__('Active'),
                ),
                array(
                    'value' => 0,
                    'label' => Mage::helper('catdeals')->__('Inactive'),
                ),
            ),
        ));


        if (Mage::getSingleton('adminhtml/session')->getCatdealsData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getCatdealsData());
            Mage::getSingleton('adminhtml/session')->setCatdealsData(null);
        } elseif (Mage::registry('catdeals_data')) {
            $form->setValues(Mage::registry('catdeals_data')->getData());
        }
        return parent::_prepareForm();
    }

}
