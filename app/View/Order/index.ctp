<?php 

  echo $this->Session->flash();
  
  echo '{"oeder_id": "';
  echo @$Order_detail['Order']['id'];
  echo '", "oeder_no": "';
  echo @$Order_detail['Order']['order_no'];
  echo '", "order_phone": "';
  echo @$Order_detail['Order']['phone']!=''?(', Tel: '.$Order_detail['Order']['phone']):'';
  echo '", "Category": { "';

  $i = 0;
  if (!empty($records)) {
      foreach ($records as $key => $category) {
          echo $i;
          echo '": {"id": "';
          echo $category['Category']['id'];
          echo '", "eng_name": "';
          echo $category['Category']['eng_name'];
          echo '", "zh_name": "';
          echo $category['Category']['zh_name'];
          if(count($records) != $i+1){
            echo '"},"';
          }else{
            echo '"}';
          }
          $i++;
      }
  }

  echo '  },';

  if (!empty($records)) {
      $count = 0;
      foreach ($records as $key => $category) {
          echo '"';
          echo $key;
          echo '":[';
          $count++;
          //echo $category['Category']['id'];
          // if ($key == 0) 
          // echo "active";
          if (!empty($category['Cousine'])) {
            $i = 0;
            foreach ($category['Cousine'] as $items) {
                echo '{"id": "';
                echo $category['Category']['id'];
                echo '", "itmes_id": "';
                echo $items['id'];
                echo '", "price": "';
                echo number_format($items['price'], 2); 
                echo '", "zh_name": "';
                echo $items['zh_name'];
                echo '", "eng_name": "';
                echo $items['eng_name'];
                if(count($category['Cousine']) != $i+1){
                  echo '"},';
                }else{
                  echo '"}';
                }
                
                $i++;
            }
          } else {
              echo "No Items Available";
          }

          
          if($key+1 != count($records)){
            echo '],';
          }else{
            echo ']';
          }

      }
  }

  echo ' }';

?>