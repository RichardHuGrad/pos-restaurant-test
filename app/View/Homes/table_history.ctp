<?php 
    
    echo $this->Session->flash();

    echo "{";
    
    // if($order_type=='D')
    //     echo '"time":' . '"Table 桌 [[Dinein]]# $table_no, @ $today",';
    // else if($order_type=='T')
    //     echo '"time":' . '"Table 桌 [[Takeout]]# $table_no, @ $today",';


    $i = 0;
    $json = '';

    foreach ($Order_detail as $order) {
        $items_number = count($Order_detail);
        //echo $items_number;
        // echo $order['Order']['created'];
        // echo $order['Order']['order_no'];
        // echo number_format($order['Order']['subtotal'], 2);
        // echo number_format($order['Order']['total'], 2);
        // echo $this->Html->url(array('controller'=>'homes', 'action'=>'tableHisdetail', 'table_no'=>$table_no, 'order_id'=>$order['Order']['id'],'order_type'=>$order_type));


        $json = '"' . $i . '": {"created":"' . $order['Order']['created'] . '", "order_no":"' . $order['Order']['order_no'] . '","subtotal": "' . number_format($order['Order']['subtotal'], 2) . '", "total": "' . number_format($order['Order']['total'], 2) . '"},';

        if($i == ($items_number - 1)){
            $json = '"' . $i . '": {"created":"' . $order['Order']['created'] . '", "order_no":"' . $order['Order']['order_no'] . '","subtotal": "' . number_format($order['Order']['subtotal'], 2) . '", "total": "' . number_format($order['Order']['total'], 2) . '"}';
        }

        echo $json;
        $i++;
    }

    echo "}";



 ?>
                    