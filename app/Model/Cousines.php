<?php

class Cousines extends AppModel {

    public $name = 'Cousines';
    public $validate = array();

   public function getPrinterId($id) {
        $cashier_detail = $this->find("first", array(
            'fields' => array('printer'),
            'conditions' => array('id' => $id)));

        return $cashier_detail;
    }

    public function getServicePrinterName($id) {
        $cashier_detail = $this->find("first", array(
            'fields' => array('name'),
            'conditions' => array('admin_id' => $id)
                )
        );

        return $cashier_detail;
    }
}

?>
