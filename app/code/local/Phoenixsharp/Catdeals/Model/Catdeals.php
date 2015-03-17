<?php

class Phoenixsharp_Catdeals_Model_Catdeals extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('catdeals/catdeals');
    }

}
