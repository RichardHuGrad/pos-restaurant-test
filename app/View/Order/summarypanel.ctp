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
                    // }
                
                        // var temp_item = new Item(
                        //         item_id = 'echo $i',
                        //         image= 'if ($value['image']) { echo $value['image']; } else { echo 'no_image.jpg';};',
                        //         name_en = 'echo $value['name_en']; ',
                        //         name_zh = 'echo $value['name_xh']; ',
                        //         selected_extras_name = 'echo implode(",", $selected_extras_name);', // can be extend to json object
                        //         price = 'echo $value['price']',
                        //         extras_amount = 'echo $value['extras_amount']',
                        //         quantity = 'echo $value['qty']',
                        //         order_item_id = 'echo $value['id']',
                        //         state = "keep",
                        //         shared_suborders = null,
                        //         assigned_suborder = null,
                        //         is_takeout = 'echo $value["is_takeout"]',
                        //         comb_id = 'echo $value["comb_id"]',
                        //         selected_extras_json = 'echo $value['selected_extras']',
                        //         is_print = 'echo $value['is_print']',
                        //         special = 'echo  $value["special_instruction"]',
                        //         cousine_id = 'echo $value['item_id']');

                        // tempOrder.addItem(temp_item);

                        echo $value['price'];
                        echo $value['name_xh'];
                
                        $i++;
                    }

?>