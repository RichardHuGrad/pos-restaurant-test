<?php 

  echo @$Order_detail['Order']['order_no'];
  echo @$Order_detail['Order']['phone']!=''?(', Tel: '.$Order_detail['Order']['phone']):'';


  if (!empty($records)) {
      foreach ($records as $key => $category) {
          echo $category['Category']['id'];
          echo $category['Category']['eng_name'];
          echo $category['Category']['zh_name'];
      }
  }


  if (!empty($records)) {
      $count = 0;
      foreach ($records as $key => $category) {
          $count++;
          echo $category['Category']['id'];
          if ($key == 0) 
          echo "active";
          if (!empty($category['Cousine'])) {
            foreach ($category['Cousine'] as $items) {
                echo $items['id'];
                    echo number_format($items['price'], 2); 
                    echo $items['zh_name'];
                    echo $items['eng_name'];
            }
          } else {
              echo "No Items Available";
          }

      }
  }










?>