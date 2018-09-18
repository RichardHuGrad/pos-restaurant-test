<?php 

  echo @$Order_detail['Order']['order_no'];
  echo " ";
  echo @$Order_detail['Order']['phone']!=''?(', Tel: '.$Order_detail['Order']['phone']):'';
  echo "/";


  if (!empty($records)) {
      foreach ($records as $key => $category) {
          echo $category['Category']['id'];
          echo " ";
          echo $category['Category']['eng_name'];
          echo " ";
          echo $category['Category']['zh_name'];
          echo " ";
      }
      echo "/";
  }


  if (!empty($records)) {
      $count = 0;
      foreach ($records as $key => $category) {
          $count++;
          //echo $category['Category']['id'];
          // if ($key == 0) 
          // echo "active";
          if (!empty($category['Cousine'])) {
            foreach ($category['Cousine'] as $items) {
                echo "<";
                echo $category['Category']['id'];
                echo "<";
                echo $items['id'];
                echo "<";
                echo number_format($items['price'], 2); 
                echo "<";
                echo $items['zh_name'];
                echo "<";
                echo $items['eng_name'];


                // echo "{'" + $category['Category']['id'] + "':{'" + $items['id'] + "': {'price':'" + number_format($items['price'], 2) + "'}} " +"}";


            }
          } else {
              echo "No Items Available";
          }

      }
  }


  // echo @$Order_detail['Order']['order_no'];
  // //echo $Order_detail['OrderItem'];

  // print_r($Order_detail['OrderItem']);


  


?>