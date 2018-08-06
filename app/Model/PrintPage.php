<?php

class PrintPage extends AppModel {

    public $name = 'Printers';
    public $validate = array();

   public function getKitchenPrinterName($id) {
        $cashier_detail = $this->find("all", array(
            'fields' => array('name'),
            'conditions' => array('admin_id' => $id,'type'=>'K')));

        return $cashier_detail;
    }

    public function getServicePrinterName($id) {
        $cashier_detail = $this->find("first", array(
            'fields' => array('name'),
            'conditions' => array('admin_id' => $id,"type"=>'C')
                )
        );

        return $cashier_detail;
    }

    public function getPrintName($id){
    	$cashier_detail = $this->find('first',array(
    		  'fields' => array('name'),
            'conditions' => array('id' => $id)
    		));
    	return $cashier_detail;
    }
}

?>
