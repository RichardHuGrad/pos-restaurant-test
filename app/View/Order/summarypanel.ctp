

<?php
                    echo $this->Session->flash();

                    $i = 0;
                    $arr = '';
                    echo '{';
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
                        
                        //$arr = array('i' => $i, 'name_en' => $value['name_en'], 'name_xh' => $value['name_xh']);
                        //count($Order_detail['OrderItem']);

                        $arr = '"' . $i . '": {"name_en":"' . $value['name_en'] . '","name_xh":"' . $value['name_xh'] . '","price":"' . $value['price'] . '","extras_amount":"' . $value['extras_amount'] . '","qty":"' . $value['qty'] . '","id":"' . $value['id'] . '","is_print":"' . $value['is_print'] . '","is_takeout":"' . $value['is_takeout'] . '","comb_id":"' . $value['comb_id'] . '","selected_extras":"' . $value['selected_extras'] . '","special_instruction":"' . $value['special_instruction'] . '","item_id":"' . $value['item_id'] . '"},';

                        if($i == (count($Order_detail['OrderItem']) - 1)){
                            $arr = '"' . $i . '": {"name_en":"' . $value['name_en'] . '","name_xh":"' . $value['name_xh'] . '","price":"' . $value['price'] . '","extras_amount":"' . $value['extras_amount'] . '","qty":"' . $value['qty'] . '","id":"' . $value['id'] . '","is_print":"' . $value['is_print'] . '","is_takeout":"' . $value['is_takeout'] . '","comb_id":"' . $value['comb_id'] . '","selected_extras":"' . $value['selected_extras'] . '","special_instruction":"' . $value['special_instruction'] . '","item_id":"' . $value['item_id'] . '"}';
                        }
                        
                        echo $arr;

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
                    
                    //echo substr($arr, 0, -1);
                    echo '}';
?>
