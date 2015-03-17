<?php

class Phoenixsharp_Catdeals_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getAllCategories() {
        $category = Mage::getModel('catalog/category');
        $treeModel = $category->getTreeModel();
        $treeModel->load();

        $ids = $treeModel->getCollection()->getAllIds();

        $data = array();

        if (!empty($ids)) {
            foreach ($ids as $id) {
                $cat = Mage::getModel('catalog/category');
                $cat->load($id);
                $categoryData = array('value' => $cat->getId(), 'label' => $cat->getName());
                array_push($data, $categoryData);
            }
        }
        return $data;
    }

    public function getUrl($_id) {
        $_category = Mage::getModel('catalog/category')->load($_id);
        if ($_category):
            return $_category->getUrl();
        else:
            return "";
        endif;
    }

}
