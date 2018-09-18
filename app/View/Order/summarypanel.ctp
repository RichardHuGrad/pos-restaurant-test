

<?php
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
                        
                        $arr = array('i' => $i, 'name_en' => $value['name_en'], 'name_xh' => $value['name_xh']);
                        echo json_encode($arr);

                        //$arr = '{"' . $i . '": {"name_en":"' . $value['name_en'] . '","name_xh":"' . $value['name_xh'] . '"}';

                        //echo $arr;

                        // echo $i;
                        // //if ($value['image']) { echo $value['image']; } else { echo 'no_image.jpg';};
                        // echo $value['name_en'];
                        // echo $value['name_xh'];
                        // echo implode(",", $selected_extras_name);
                        // echo $value['price'];
                        // echo $value['extras_amount'];
                        // echo $value['qty'];
                        // echo $value['id'];
                        // echo $value["is_takeout"];
                        // echo $value["comb_id"];
                        // echo $value['selected_extras'];
                        // echo $value['is_print'];
                        // echo $value["special_instruction"];
                        // echo $value['item_id'];



                
                        $i++;
                    }
              

           
          


</script>
