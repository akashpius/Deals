<?php

class Phoenixsharp_Prdctdeals_Model_Mysql4_Prdctdeals extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct() {
        $this->_init('prdctdeals/prdctdeals', 'deal_id');
    }

}
