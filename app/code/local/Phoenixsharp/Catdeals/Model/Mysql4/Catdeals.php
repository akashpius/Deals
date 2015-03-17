<?php

class Phoenixsharp_Catdeals_Model_Mysql4_Catdeals extends Mage_Core_Model_Mysql4_Abstract
{
public function _construct()
{
$this->_init('catdeals/catdeals', 'deal_id');
}
}