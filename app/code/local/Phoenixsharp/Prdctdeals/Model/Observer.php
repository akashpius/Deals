<?php

class Phoenixsharp_Prdctdeals_Model_Observer extends Mage_Core_Model_Abstract {

    public function setStatus() {
        $t = time();
        $currentdatetime = date("Y-m-d H:i", $t);
        $current_timestamp = strtotime($currentdatetime);
        $prdctdealsModel = Mage::getModel('prdctdeals/prdctdeals')->getCollection()->addFieldToFilter('deal_type', 2)->getData();
        foreach ($prdctdealsModel as $prdctdeal):
            $date = explode("/", $prdctdeal['date_from']);
            $time = explode(",", $prdctdeal['time_from']);
            $dateto = explode("/", $prdctdeal['date_to']);
            $timeto = explode(",", $prdctdeal['time_to']);
            if ($date[0] < 10):
                $month = '0' . $date[0];
            else:
                $month = $date[0];
            endif;
            if ($dateto[0] < 10):
                $monthto = '0' . $dateto[0];
            else:
                $monthto = $dateto[0];
            endif;
            $dealtime = $date[2] . '-' . $month . '-' . $date[1] . ' ' . $time[0] . ':' . $time[1];
            $dealofftime = $dateto[2] . '-' . $monthto . '-' . $dateto[1] . ' ' . $timeto[0] . ':' . $timeto[1];
            $dealtime_timestamp = strtotime($dealtime);
            $dealofftime_timestamp = strtotime($dealofftime);
            if ($dealtime_timestamp <= $current_timestamp):           
                $model = Mage::getModel('prdctdeals/prdctdeals')->load($prdctdeal['deal_id']);
                $model->setStatus(1);
                $model->save();
            endif;
            if ($dealofftime_timestamp <= $current_timestamp):              
                $model = Mage::getModel('prdctdeals/prdctdeals')->load($prdctdeal['deal_id']);
                $model->setStatus(0);
                $model->save();
            endif;
        endforeach;
    }

}
