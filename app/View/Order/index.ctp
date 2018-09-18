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


  //echo $Order_detail['OrderItem'];

  $i = 0;
  foreach ($Order_detail['OrderItem'] as $key => $value) {

      $selected_extras_name = [];
  // if ($value['all_extras']) {
      $extras = json_decode($value['all_extras'], true);
      $selected_extras = json_decode($value['selected_extras'], true);

      // prepare extras string
      $selected_extras_id = [];
      if (!empty($selected_extras)) {
          foreach ($selected_extras as $k => $v) {
              $selected_extras_name[] = $v['name'];
              $selected_extras_id[] = $v['id'];
          }
      }

      // var temp_item = new Item(
      //         item_id = $i,
      //         image= if ($value['image']) { echo $value['image']; } else { echo 'no_image.jpg';},
      //         name_en = $value['name_en'],
      //         name_zh = $value['name_xh'],
      //         selected_extras_name = implode(",", $selected_extras_name), // can be extend to json object
      //         price = $value['price'],
      //         extras_amount = $value['extras_amount'],
      //         quantity = $value['qty'],
      //         order_item_id = $value['id'],
      //         state = "keep",
      //         shared_suborders = null,
      //         assigned_suborder = null,
      //         is_takeout = $value["is_takeout"],
      //         comb_id = $value["comb_id"],
      //         selected_extras_json = $value['selected_extras'],
      //         is_print = $value['is_print'],
      //         special = $value["special_instruction"]
      // );

      // tempOrder.addItem(temp_item);

      echo $value['name_xh'];

      $i++;
  }


?>