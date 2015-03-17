<?php

class Phoenixsharp_Prdctdeals_Helper_Data extends Mage_Core_Helper_Abstract {

    public function skuCheck($_sku) {
        $_product = Mage::getModel('catalog/product')->loadByAttribute('sku', $_sku);
        if ($_product):
            return 1;
        else:
            return 0;
        endif;
    }

    public function getUrl($_sku) {
        $_product = Mage::getModel('catalog/product')->loadByAttribute('sku', $_sku);
        if ($_product):
            return $_product->getProductUrl();
        else:
            return "";
        endif;
    }

}
