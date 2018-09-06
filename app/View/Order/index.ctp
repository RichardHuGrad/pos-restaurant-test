<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="../../../html/css/style.css" />
    <link rel="stylesheet" href="../../../html/css/jianpan.css" />
    <?php echo $this->Html->css(array('order', 'components/TastesComponent', 'summarypanel')); ?>
</head>

<body>

    <div class="container">
        <div class="header">
      
            <!-- logo -->
            <?php echo $this->Html->image('logo-pos.png', array( 'alt' => 'logo', 'class' => 'logo')); ?>
            <!-- <img src="img/logo-pos.png" alt="logo" class="logo" /> -->
            <!-- 导航 -->

            <ul class="nav">
              <li><a href="../../../homes/dashboard" class="nav-a"><?php echo __('Home'); ?></a></li>
              <li class="barnav">
                <a href="javascript:;" class="nav-a"><?php echo __('Languages'); ?></a>
                <ul style="display: none;">
                  <li><a href="javascript:;">English</a></li>
                  <li><a href="javascript:;">中文</a></li>
                </ul>
              </li>
              <li><a href="javascript:;" onclick="huiyuan();" class="nav-a member"><?php echo __('Member'); ?></a></li>
              <!-- <li><a onclick="paidui();" class="nav-a">排队</a></li>
              <li><a onclick="quhao();"class="nav-a">取号</a></li> -->
            </ul>
            <?php echo $this->Html->image('nav.png', array( 'class' => 'smalllogo', 'alt' => 'pad菜单')); ?>
            <!-- <img src="images/nav.png" class="smalllogo" alt="pad菜单" /> -->
            <!-- 登录按钮 -->
            <div class="login_right">
              <button type="button" name="button" onclick="loginout(this);"><?php echo __('Logout'); ?></button>
              <span>管理员</span>
            </div>
          </div>

        <div class="page2-content">
            <div class="page2-left">
              <div class="page2-top">
                <h4><?php echo __('Order No.')?><?php echo @$Order_detail['Order']['order_no']; ?>, <?php echo __('Table No.')?><?php echo $table; ?><?php echo @$Order_detail['Order']['phone']!=''?(', Tel: '.$Order_detail['Order']['phone']):''; ?></h4>
                <button type="button" name="button" class="newPhone">添加外卖手机号码</button>
                <!-- 外卖手机号 -->
                        <div class="lock-div">
                            <input type="text" name="" value="" placeholder="请输入手机号" id="phone">
                            <img src="../../../html/images/icon-08.png" alt="关闭" class="closeBox">
                          </div>
              </div>
              <div class="page2-left-c">
                <!-- 左侧菜单 -->
                <ul class="page2-tabnav">
                    <?php
                    if (!empty($records)) {
                        foreach ($records as $key => $category) {
                            ?>
                            <li <?php if ($key == 0) echo "class='active'" ?>><a style="line-height: 40px;" data-toggle="tab" href="#tab<?php echo $category['Category']['id']; ?>"><?php echo $category['Category']['eng_name'] . "<br/>" . $category['Category']['zh_name']; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <a href="javascript:;" class="tab-bot">
                  <img src="../../../html/images//btn01.png" alt="向下按钮">
                </a>
                <!-- 右侧菜品选择 -->
                <div class="page2-tavright">
                  <!-- 搜索 -->
                  <input type="text" name="" placeholder="搜索" class="tab-input" />
                  <img src="../../../html/images/icon-08.png" alt="去除搜索内容" class="tab-close" />
                  <!-- 内容 -->
                  <div class="tab-content tabright tab1 <?php if(@$Order_detail['Order']['table_status']=='P') echo 'hide'; ?>">

                    <?php
                    if (!empty($records)) {
                        $count = 0;
                        foreach ($records as $key => $category) {
                            $count++;
                            ?>
                            <div id="tab<?php echo $category['Category']['id']; ?>" class="tab-pane fade in <?php if ($key == 0) echo "active" ?>">
                                <div class="clearfix">
                                    <div class="clearfix row productbox">
                                        <?php if (!empty($category['Cousine'])) { ?>
                                            <ul>
                                                <?php
                                                foreach ($category['Cousine'] as $items) {
                                                    ?>
                                                    <li class="add_items" alt="<?php echo $items['id']; ?>" title="Add to Cart">
                                                        <div class="clearfixrow" style="font-size: medium;">
                                                            <div class="dish-price">$<?php echo number_format($items['price'], 2); ?></div>
                                                            <div class="dish-title"><div class="name-title"><h4><?php echo $items['zh_name'] . "<br/>" . $items['eng_name']; ?></h4></div></div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        } else {
                                            echo "<div class='noitems'>No Items Available</div>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                  </div>
                </div>

              </div>
        </div>

        <div class="page2-right">
              <div class="right-btn" id="button-group">
                <button id="delete-btn" class="rBtn rBtn02"><strong><?php echo __('Delete');?></strong></button>
                <button id="take-out-btn" class="rBtn rBtn04"><strong><?php echo __('Takeout');?></strong></button>
                <button id="urge-btn" class="rBtn rBtn05"><strong><?php echo __('Urge');?></strong></button>
                <button id="quantity-btn" class="rBtn rBtn03" data-toggle="modal" data-target="#change-quantity-component-modal"><strong><?php echo __('Change Quantity');?></strong></button>
                <button id="batch-add-taste-btn" class="rBtn rBtn01" data-toggle="modal" data-target="#taste-component-modal"><strong><?php echo __('Batch Add Taste');?></strong></button>
                <button id="change-price-btn" class="rBtn rBtn06" data-toggle="modal" data-target="#change-price-component-modal"><strong><?php echo __('Change Price');?></strong></button>
                <!-- <button id="free-price-btn" class="btn btn-lg"><strong>免费</strong></button> -->
                <!-- <button id="add-discount-btn" class="btn btn-lg">Add Discount</button>  -->     
              </div>

              <div class="right-con">
                <div class="right-tab clearfix">
                  <ul class="right-top">
                    <li class="firstLi right-active">
                      <a href="javascript:;">订单列表</a>
                    </li>
                    <li class="totalSelection">
                      <a href="javascript:;">全选</a>
                    </li>
                    <li class="reverseSelection">
                      <a href="javascript:;">反选</a>
                    </li>
                    <li class="cancel">
                      <a href="javascript:;"><p>取消</p><p>选择</p></a>
                    </li>
                    <li class="not_yet">
                      <a href="javascript:;">未送厨</a>
                    </li>
                    <li class="already">
                      <a href="javascript:;">已送厨</a>
                    </li>
                  </ul>
                  <!-- <ul class="right-list" id="order-component"> -->
                    <!-- 背景色 class="rig-act" data-state="1" 表示已送厨-->
                    <!-- <li data-state="1">
                      <a href="javascript:;">
                        <div class="list-left">
                          <h4>宋嫂牛肉面 </h4>
                          <p>Option: 中辣；少麻；去葱；加卤蛋；加面；加肉；改米线；多花生</p>
                        </div>
                        <div class="list-center">
                          12.99 <span>(15%off)</span>
                        </div>
                        <div class="list-right">1</div>
                      </a>
                    </li> -->
                  <!-- </ul> -->
                  <ul class="right-list" id="order-component">
                  <!-- 背景色 class="rig-act" -->

                  </ul>
                </div>
                <div class="right-tab">
                  <a href="javascript:;" class="add_zhe">加入折扣</a>
                  <div class="add-content">
                    <ul class="add-ul">
                      <li>
                        <span>固定折扣</span>
                        <input type="text" />
                      </li>
                      <li>
                        <span>%折扣</span>
                        <input type="text" id="txt2"/>
                      </li>
                      <li>
                        <span>优惠码</span>
                        <input type="text" />
                      </li>
                    </ul>
                    <div class="add-right">
                      <span>折扣快捷按钮</span>
                      <button type="button" name="button" class="butt">15%</button>
                      <button type="button" name="button" class="butt">20%</button>
                      <button type="button" name="button" class="butt">25%</button>
                    </div>
                  </div>
                </div>
                <div class="right-tab1">
                  <button id="pay-btn" type="button" name="button" class="rightBtn01"><strong><?php echo __('Pay')?></strong></button>
                  <button id="send-to-kitchen-btn" type="button" name="button" class="rightBtn02"><strong><?php echo __('Send to Kitchen')?></strong></button>
                </div>
              </div>

            </div>

        </div>

    </div>


</div>

<div id="single-extra-component-modal-placeholder">

</div>

<div class="modal fade clearfix" id="taste-component-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <ul id="taste-component-items" class="clearfix">

                </ul>
                <div class="clearfix">
                    <h4>已选:</h4>
                </div>
                <ul id="selected-extra" class="clearfix">

                </ul>
            </div>
            <div class="modal-body clearfix">
                <div class="clearfix">
                    <h4>特殊口味: 
                    <input id="taste-component-special" type="text" placeholder="e.g. no onions, no mayo" size="30" style="height:30px"></h4>
                </div>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" id="change-flavor-component-save" class="pull-right btn btn-lg btn-success" data-dismiss="modal">Save 保存</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade clearfix" id="change-price-component-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>修改价格</h4>
            </div>
            <div class="modal-body clearfix">
                <h4>新价格： <input id="change-price-component-price" type="number" placeholder="$ 0.00" style="height:30px"></h4>
            </div>
            <div class="modal-footer clearfix">                  
                <button type="button" id="change-price-component-save" class="pull-right btn btn-lg btn-success" data-dismiss="modal">Save 保存</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade clearfix" id="change-quantity-component-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>修改数量</h4>
            </div>
            <div class="modal-body clearfix">
                <h4>新数量: <input id="change-quantity-component" type="number" style="height:30px"> <button class="btn btn-lg btn-success">+</button> <button class="btn btn-lg btn-success">-</button></h4>

            </div>
            <div class="modal-footer clearfix">                  
                <button type="button" id="change-quantity-component-save" class="pull-right btn btn-lg btn-success" data-dismiss="modal">Save 保存</button>
            </div>
        </div>
    </div>
</div>

<script id="single-extra-component" type="text/template">
    <div class="modal fade clearfix" id="single-extra-component-modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content clearfix">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <ul id="single-extra-component-categories" class="clearfix">
                    </ul>

                </div>
                <div class="modal-body clearfix">
                    <ul id="single-extra-component-items" class="clearfix">

                    </ul>


                    <div id="single-selected-extra-title" class="clearfix">
                        <?php echo __('Selected Taste');?>:
                    </div>
                    <ul id="single-selected-extra" class="clearfix">

                    </ul>
                    <div id="single-selected-combo-title" class="clearfix">
                        <?php echo __('Selected Combo');?>:
                    </div>
                    <ul id="single-selected-combo" data-combo-num="0" class="clearfix">

                    </ul>

                </div>
                <div class="modal-footer clearfix">
                    <div class="clearfix">
                        <label class="pull-left" for="single-extra-component-special">Special Instructions: </label>
                        <input class="pull-left" id="single-extra-component-special" type="text" placeholder="e.g. no onions, no mayo" size="30" style="height:26px">
                    </div>
                    <div class="clearfix">
                         <button style="display:none;" type="button" id="single-extra-component-clear" class="pull-left btn btn-lg btn-danger">Clear 清除</button>
                        <button type="button" id="single-extra-component-save" class="pull-right btn btn-lg btn-success">Save 保存</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<div class="modal fade clearfix" id="edit-phone-component-modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content clearfix">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Input Phone</h4>
                </div>
                <div class="modal-body clearfix">
                    Phone: <input name="phone" type="text" style="height:30px" value="<?php echo @$Order_detail['Order']['phone']; ?>">
                </div>
                <div class="modal-footer clearfix">
                    
                    <button type="button" id="edit-phone-component-save" class="pull-right btn btn-lg btn-success">Save 保存</button>
                </div>
            </div>
        </div>
</div>


<!-- <script id="taste-component" type="text/template"></script> -->
<script id="selected-extra-item-component" type="text/template">
    <li class="selected-extra-item clearfix" data-extra-id="{0}" data-extra-category-id="{1}">
        <button type="button" class="close pull-right">&times;</button>
        <div class="selected-extra-item-name">{2}</div>
        <div class="selected-extra-item-price">{3}</div>
    </li>
</script>

<?php
echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.mCustomScrollbar.concat.min.js', 'barcode.js', 'epos-print-5.0.0.js', 'fanticonvert.js', 'jquery.kinetic.min.js', 'flowtype.js', 'avgsplit.js', 'notify.min.js'));
echo $this->fetch('script');
?>

<script type="text/javascript">


    if (!String.prototype.format) {
      String.prototype.format = function() {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function(match, number) {
          return typeof args[number] != 'undefined'
            ? args[number]
            : match
          ;
        });
      };
    }


    $(".add_items").on("click", function () {

        var item_id = $(this).attr("alt");
        var message = $("#Message").val();
        var table = "<?php echo $table ?>";
        var type = "<?php echo $type ?>";
        //console.log(item_id, table, type);

        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'addItem')); ?>",
            type: "POST",
            data: {item_id: item_id, table: "<?php echo $table ?>", type: "<?php echo $type ?>"},
            success: function (json) {
                // console.log(html);

                // $(".order-summary-indent").scrollTop($(".order-summary-indent ul").height());
                $("#order_no_display").html("Order 订单号 #" + $("#Order_no").val() + ", Table 桌 #<?php echo $table; ?>");
        //         $(".products-panel").removeClass('load1 csspinner');

        //         //console.log(json);
        //         var obj = JSON.parse(json);
        // //  {"extra_categories":["15","16"],"order_item_id":"4143","comb_id":"0","comb_num":"0"}
        //         renderOrder(function() {
        //             if (obj.comb_id != 0) {
        //                 $("#order-component li[data-order-item-id=" + obj.order_item_id + "]").trigger("click");
        //                 $("#add-taste-btn").trigger("click");
        //             }

        //         });

                var obj = JSON.parse(json);
        //  {"extra_categories":["15","16"],"order_item_id":"4143","comb_id":"0","comb_num":"0"}
                Obj = JSON.parse(json);

                renderOrder(function() {
                    if (obj.comb_id != 0) {
                        $("#order-component li[data-order-item-id=" + obj.order_item_id + "]").trigger("click");
                        $("#add-taste-btn").trigger("click");
                    }

                });
            }
        });

    });


    /***************************************************************************************************************/

    function isSelect(data){

        //console.log($("#" + data.id + ""));
        if($("#" + data.id + "").hasClass("select")){
            $("#" + data.id + "").removeClass("select");
        }else{
            $("#" + data.id + "").addClass("select");
        }
    }

    var order_item_length = '';
    

    var click = order_item_length + 1;

    //加菜到summaryPanel里
    $(".add_items").on("click", function () {
        var item_id = $(this).attr("alt");
        var table = "<?php echo $table ?>";
        var type = "<?php echo $type ?>";
        var price = $(".dish-price")[$(this).attr("alt") - 1].innerText;
        var cuisine = $(".name-title").children()[$(this).attr("alt") - 1].innerText;
        //console.log(price);
        //console.log(cuisine);

        click = click + 1;

        $("#order-component").append("<li onclick='isSelect(this)' class='order-item' data-order-item-id=" + item_id + " id='order-item-" + click + "' data-state='1' style='margin-bottom: 2px; width: 100%; background-color: rgb(240, 240, 240);''><a href='javascript:;'><div class = 'list-left'><h4>" + cuisine + "</h4><p id='tasteOption'></p></div><div class='list-center'>" + price + "</div><div class='list-right'>1</div></li>"); 
    });

    //删除已选菜品
    $('#delete-btn').on('click', function () {
        var selected_item_id_list = getSelectedItem();

        if (selected_item_id_list.length == 0) {
            // alert("No item selected 没有选择菜");
             $.notify("No item selected 没有选择菜",  { position: "top center", className:"warn"});
            return false;
        }

        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'removeitem')); ?>",
            type: "post",
            data: {selected_item_id_list: selected_item_id_list, table: "<?php echo $table ?>", type: "<?php echo $type ?>", order_no: "<?php echo @$Order_detail['Order']['order_no']; ?>"},
            success: function(html) {
                renderOrder();
            }
        });

    });
    //get order_item_id of all selected items
    var getSelectedItem = function () {
        var order_item_id_list = [];

        $('#order-component .order-item.selected').each(function() {
            order_item_id_list.push(parseInt($(this).attr('data-order-item-id')));
            // console.log($(this).attr('data-order-item-id'));
        });

        return order_item_id_list;
    }

    //删除已选菜品
    // $('#delete-btn').on('click', function () {
    //     for(var i = 0; i < $("#order-component > li").length; i++){
    //         if($("#order-component > li").hasClass("select")){
    //             $(".select").remove();
    //         }
    //     }
    // });


    $('#change-price-btn').on('click', function() {
        // var selected_item_id_list = getSelectedItem();

        // if (selected_item_id_list.length == 0) {
        //     // alert("No item selected");
        //      $.notify("No item selected 没有选择菜",  { position: "top center", className:"warn"});
        //     return false;
        // }

        // //popup an input for new price
        // $('#change-price-component-modal').modal('hide').remove();
        // var changePriceComponent = ChangePriceComponent.init();
        // $('body').append(changePriceComponent);


        //$('#change-price-component-modal').modal('show');

        // for(var i = 0; i < $(".select").length; i++){
        //     $(".select")[i].innerHTML = 123;
        // }
        


    });

    $('#take-out-btn').on('click', function() {
        alert("外卖！");
        // var selected_item_id_list = getSelectedItem();

        // if (selected_item_id_list.length == 0) {
        //     // alert("No item selected");
        //     $.notify("No item selected 没有选择菜",  { position: "top center", className:"warn"});
        //     return false;
        // }

        // $.ajax({
        //     url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'takeout')); ?>",
        //     method: "post",
        //     data: {selected_item_id_list: selected_item_id_list, table: "<?php echo $table ?>", type: "<?php echo $type ?>"},
        //     success: function (html) {
        //         renderOrder();
        //     },
        // });
    });


    //修改价格保存
    $('#change-price-component-save').on('click', function() {
        var change_price = $('#change-price-component-price').val();

        for(var i = 0; i < $('.select').length; i++){
            $('.select')[i].children[0].childNodes[1].innerText = ("$" + change_price);
        }
    });

    //修改数量保存
    $('#change-quantity-component-save').on('click', function() {
        var change_quantity = $('#change-quantity-component').val();

        for(var i = 0; i < $('.select').length; i++){
            $('.select')[i].children[0].childNodes[2].innerText = change_quantity;
        }
    });

    


    // $('body').on('click', '#change-quantity-component-save', function() {

    //     var quantity = $('input[name="quantity"]').val();
    //     if(quantity == ''){
    //       alert("Please input quantity!");
    //       $('input[name="quantity"]').focus();
    //       return;
    //     }
    //     quantity = Math.round(parseInt(quantity));
        
    //     var selected_item_id_list = getSelectedItem();

    //     $.ajax({
    //         url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'changeQuantity')); ?>",
    //         method: "post",
    //         data: {
    //             selected_item_id_list: selected_item_id_list,
    //             quantity: quantity,
    //             table: "<?php echo $table ?>",
    //             type: "<?php echo $type ?>",
    //             order_no: $("#Order_no").val()
    //         },
    //         success: function(html) {
    //             // $(".summary_box").html(html);
    //             $('#change-quantity-component-modal .close').trigger('click');
    //             renderOrder();
    //         }
    //     });
    // });



    // $('body').on('click', '#change-price-component-save', function() {
    //     var selected_item_id_list = getSelectedItem();

    //     var price = $('#change-price-component-price').val();
    //     price = Math.round(parseFloat(price) * 100) / 100;

    //     $.ajax({
    //         url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'changePrice')); ?>",
    //         method: "post",
    //         data: {
    //             selected_item_id_list: selected_item_id_list,
    //             price: price,
    //             table: "<?php echo $table ?>",
    //             type: "<?php echo $type ?>",
    //             order_no: $("#Order_no").val()
    //         },
    //         success: function(html) {
    //             // $(".summary_box").html(html);
    //             renderOrder();
    //             $('#change-price-component-modal .close').trigger('click');
    //         }
    //     });
    // });

    $('body').on('click', '#urge-btn', function() {
        alert("催菜！");
        // var selected_item_id_list = getSelectedItem();

        // if (selected_item_id_list.length == 0) {
        //     // alert("No item selected");
        //      $.notify("No item selected 没有选择菜",  { position: "top center", className:"warn"});
        //     return false;
        // }

        // $.ajax({
        //     url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'urgeItem')); ?>",
        //     method: "post",
        //     data: {
        //         selected_item_id_list: selected_item_id_list,
        //         table: "<?php echo $table ?>",
        //         type: "<?php echo $type ?>",
        //         order_no: $("#Order_no").val()
        //     },
        //     success: function(html) {
        //         // $(".summary_box").html(html);
        //         renderOrder();
        //     }
        // });
    });


    // $('body').on('click', '#quantity-btn', function() {
    //     var selected_item_id_list = getSelectedItem();

    //     if (selected_item_id_list.length == 0) {
    //         // alert("No item selected");
    //         $.notify("No item selected 没有选择菜",{ position: "top center",className:"warn" });
    //         return false;
    //     }

    //     $('#change-quantity-component-modal').modal('hide').remove();
    //     var changeQuantityComponent = ChangeQuantityComponent.init();
    //     $('body').append(changeQuantityComponent);
    // });


    /***************************************************************************************************************/
    //get order_item_id of all selected items
    var getSelectedItem = function () {
        var order_item_id_list = [];

        $('#order-component .order-item.select').each(function() {
            order_item_id_list.push(parseInt($(this).attr('data-order-item-id')));
            // console.log($(this).attr('data-order-item-id'));
        });

        //console.log(order_item_id_list);

        return order_item_id_list;
    }

    var getSelectedItemDetails = function () {
        var selectedDetails = [];

        $('#order-component .order-item.selected').each(function() {
            var temp = {
                "special": $(this).attr('data-special'),
                "selected-extras": $(this).attr('data-selected-extras'),
                "combo_id": $(this).attr('data-comb-id'),
                "cousine_id": $(this).attr('data-cousine-id'),
            }
            // console.log($(this).attr('data-order-item-id'));

            selectedDetails.push(temp);
        });

        return selectedDetails;
    }


    function getCurrentItems () {
        var current_items = []; // store order-item-id
        $('#order-component li').each(function() {
            current_items.push($(this).attr('data-order-item-id'));
        });

        return current_items;
    }

    $("#send-to-kitchen-btn").on('click', function() {
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'printToKitchen')); ?>",
            type: "post",
            data: {
                order_no: $("#Order_no").val(),
                type: "<?php echo $type ?>",
                table: '<?php echo $table ?>',
            },
            success: function(html) {
                $(".summary_box").html(html);
                renderOrder();
                <?php
                if($type == 'D')
                  echo "window.location = '{$this->Html->url(array('controller' => 'homes', 'action' => 'dashboard'))} ' ;";
                else
                  echo "window.location = window.location;"
                ?>              
                
            }
        });
    });

    $(document).ready(function () {
      
        // $('#edit-phone-component-modal').on('shown.bs.modal', function () {
        //     $( "input[name='phone']").focus();
        // })  

        // $('#change-price-component-modal').on('shown.bs.modal', function () {
        //     $( "input[type='number']").focus();
        // })  

        // $('#change-quantity-component-modal').on('shown.bs.modal', function () {
        //     $( "input[name='quantity']").focus();
        // })  
            

        $(".search-clear").click(function () {
            $("#search-input").val('');
            $("#search-input").focus();
            $(".add_items").show();
        })

        $("#search-input").on("keyup", function () {
            var value = $(this).val();

            $(".add_items").each(function (index) {
                $row = $(this);

                var id = $row.find(".name-title").text();

                if (id.toLowerCase().indexOf(value) < 0) {
                    $row.hide();
                } else {
                    $row.show();
                }
            });
        });

        renderOrder();
        
        //hide some buttons for online orders
        <?php 
           if(@$Order_detail['Order']['table_status']=='P'){
             echo "$('#pay-btn,#delete-btn,#quantity-btn,#change-price-btn,#edit-phone-btn').hide();";
           }              
        ?>
        
    });


    $(document).on("keyup", ".discount_section", function () {
        if ($(this).val()) {
            $(".discount_section").attr("disabled", "disabled");
            $(this).removeAttr("disabled");
            $(this).focus();
        } else {
            $(".discount_section").removeAttr("disabled");
        }
    })

    $(document).on("click", "#apply-discount", function () {

        var fix_discount = $("#fix_discount").val();
        var percent_discount = $("#percent_discount").val();
        var promocode = $("#promocode").val();

        
        if (fix_discount || percent_discount || promocode) {

            var discountType  = $("input.discount_section:enabled").attr('id');
            var discountValue = $("input.discount_section:enabled").val();
       
            $.ajax({
                url: "<?php echo $this->Html->url(array('controller' => 'discount', 'action' => 'addDiscount')); ?>",
                method: "post",
                dataType: "json",
                data: {"discountType":discountType,"discountValue":discountValue,"order_no": $("#Order_no").val()},
                success: function (res) {
                    renderOrder();

                    if (res.ret === 0) {
                        alert(res.message);
                    }
                }
            })

        } else {
            // alert("Please add discount first. 请加入折扣。");
            $.notify("Please add discount first. 请加入折扣。",  { position: "top center", className:"warn"});
            return false;
        }
    })

    $(document).on('click', ".remove_discount", function () {
        var message = $("#Message").val();
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'discount', 'action' => 'removeDiscount')); ?>",
            method: "post",
            data: {order_no:  $("#Order_no").val()},
            success: function (html) {
                renderOrder();
            }
        })
    })
    $(document).on('click', ".add-discount", function () {
        if (!$(this).hasClass('disabled')) {
            $(".discount_view").toggle();
        }
    });
    $(document).on("click", '.dropdown-toggle', function () {
        if ($(this).attr("aria-expanded") == 'true') {
            $(".clearfix.cart-wrap").addClass("csspinner");
        } else {
            $(".clearfix.cart-wrap").removeClass("csspinner");
        }
        dropDownFixPosition($(this), $(".dropdown-menu"));
    });

    // notice
    // change style, should be move to style.css in the future
    function dropDownFixPosition(button, dropdown) {
        var dropDownTop = button.position().top;
        var left = $(document).width() - dropdown.width();
        var top = $(document).height() - dropdown.height();
        dropdown.css('left', left / 2 + "px");
        dropdown.css('top', "20%");
    }


    $(document).on('click', "html", function () {
        $(".clearfix.cart-wrap").removeClass("csspinner");
    });

    $(document).on('click', ".dropdown-menu", function (event) {
        event.stopPropagation();
    });



    $('#batch-add-taste-btn').on('click', function() {
        var selected_item_id_list = getSelectedItem();

        if (selected_item_id_list.length == 0) {
            // alert("No item selected 没有选择菜");
             $.notify("No item selected 没有选择菜",  { position: "top center", className:"warn"});
            return false;
        } else {
            $("#selected-extra").empty();
        }

    });


    


    var TastesComponent = (function() {
        var tastesComponent = $($('#taste-component').html());


        var createDom = function (tastes) {
            var itemsUl = tastesComponent.find('#taste-component-items');

            for (var i = 0; i < tastes.length; ++i) {

                var taste = tastes[i];

                if (taste.category_id == 1) {
                    // build item with jquery
                    var itemComponent = $('<li class="taste-item-component" data-extra-id="{0}" data-extra-category-id="{1}"><div class="taste-item-name">{2}</div><div class="taste-item-price">{3}</div></li>'.format(taste.id, taste.category_id, taste.name_zh, taste.price));
                    // itemComponent.find('.taste-item-name').text(taste.name_zh);
                    // itemComponent.find('.taste-item-price').text(taste.price);

                    if (parseFloat(taste.price) == 0) {
                        itemComponent.find('.taste-item-price').hide();
                    }

                    itemsUl.append(itemComponent);
                } else {
                    continue;
                }


            }
        }

        var bindEvent = function(SelectedExtraItemComponent) {
            tastesComponent.find('.taste-item-component').each(function() {
                // console.log($(this));
                $(this).on('click', function() {
                    var extra_id = $(this).attr('data-extra-id'),
                        extra_category_id = $(this).attr('data-extra-category-id'),
                        name = $(this).find('.taste-item-name').text(),
                        price = $(this).find('.taste-item-price').text();

                    var selectedItem = SelectedExtraItemComponent.init(extra_id, extra_category_id, name, price);
                    selectedItem.find('button').on('click', function() {
                        selectedItem.remove();
                    })

                    tastesComponent.find('#selected-extra').append(selectedItem);
                });
            });
            // clear button

        }

        var init = function(tastes, SelectedExtraItemComponent) {
            createDom(tastes);
            bindEvent(SelectedExtraItemComponent);

            return tastesComponent;
        }



        return {
            init: init
        }
    })();


    var SingleExtraComponent = (function() {

        var createDom = function (tastes, categories, combo_id, selected_extras, SelectedExtraItemComponent, special, cousineExtraCategory) {

            var singleExtraComponent = $($('#single-extra-component').html());

            // build title list
            var titleUl = singleExtraComponent.find('#single-extra-component-categories');
            for (var i = 0; i < categories.length; ++i) {

                var category = categories[i];

                // category_id 1 means the tastes id
                /*
                if (category.category_id == combo_id || category.category_id == "1") {
                    var categoryComponent = $('<li data-extra-category-id="{0}" data-extra-combo-num="{1}">{2}({3})</li>'.format(category.category_id, category.combo_num,category.name_en, category.name_zh));
                    titleUl.append(categoryComponent);
                }
                */
                if (cousineExtraCategory.indexOf(category.category_id) >= 0 || category.category_id == "1") {
                    var categoryComponent = $('<li data-extra-category-id="{0}" data-extra-combo-num="{1}">{2}({3})</li>'.format(category.category_id, category.combo_num,category.name_en, category.name_zh));
                    titleUl.append(categoryComponent);
                }
            }

            // build item list
            var itemsUl = singleExtraComponent.find('#single-extra-component-items');

            for (var i = 0; i < tastes.length; ++i) {
                var taste = tastes[i];
                // category_id 1 means the tastes id
                // other category
                /*
                if (taste.category_id == combo_id || taste.category_id == "1") {
                    // build item with jquery
                    var itemComponent = $('<li class="taste-item-component" data-extra-id="{0}" data-extra-category-id="{1}"><div class="taste-item-name">{2}</div><div class="taste-item-price">{3}</div></li>'.format(taste.id, taste.category_id, taste.name_zh, taste.price));

                    if (parseFloat(taste.price) == 0) {
                        itemComponent.find('.taste-item-price').hide();
                    }

                    itemsUl.append(itemComponent);
                }
                */
                if (cousineExtraCategory.indexOf(taste.category_id) >= 0 || taste.category_id == "1") {
                    // build item with jquery
                    var itemComponent = $('<li class="taste-item-component" data-extra-id="{0}" data-extra-category-id="{1}"><div class="taste-item-name">{2}</div><div class="taste-item-price">{3}</div></li>'.format(taste.id, taste.category_id, taste.name_zh, taste.price));

                    if (parseFloat(taste.price) == 0) {
                        itemComponent.find('.taste-item-price').hide();
                    }

                    itemsUl.append(itemComponent);
                }
            }

            singleExtraComponent.find('#single-extra-component-special').val(special);


            // build selected item list
            var selectedExtraUl = singleExtraComponent.find('#single-selected-extra');
            selectedExtraUl.empty();

            var selectedComboUl = singleExtraComponent.find('#single-selected-combo');
            selectedComboUl.empty();

            $.each(selected_extras, function(i) {
                var tempItem = SelectedExtraItemComponent.init(selected_extras[i]['id'], selected_extras[i]['category_id'], selected_extras[i]['name'], selected_extras[i]['price']);

                if (selected_extras[i]['category_id'] == '1') {
                    selectedExtraUl.append(tempItem);
                } else {
                    selectedComboUl.append(tempItem);
                }
            });

            if (combo_id == '0') {
                singleExtraComponent.find('#single-selected-combo-title').hide();
                selectedComboUl.hide();
            }


            // build up selected items based on the history data
            return singleExtraComponent;

        }


        var bindEvent = function(singleExtraComponent, categories, combo_id, SelectedExtraItemComponent) {
            // add event for select extra
            singleExtraComponent.find('.taste-item-component').each(function() {
                // console.log($(this));
                $(this).on('click', function() {
                    var extra_id = $(this).attr('data-extra-id'),
                        extra_category_id = $(this).attr('data-extra-category-id'),
                        name = $(this).find('.taste-item-name').text(),
                        price = $(this).find('.taste-item-price').text();
                    var selectedItem = SelectedExtraItemComponent.init(extra_id, extra_category_id, name, price);

                    var combo_num = 0;
                    for (var i = 0; i < categories.length; ++i) {
                        if(categories[i].category_id == combo_id) {
                            combo_num = categories[i].combo_num;
                        }
                    }
                    // console.log(combo_num);

                    if (extra_category_id == '1') {
                        singleExtraComponent.find('#single-selected-extra').append(selectedItem);
                    } else {
                        // restriction of combo
                        if (singleExtraComponent.find('#single-selected-combo li').length < combo_num) {
                            singleExtraComponent.find('#single-selected-combo').append(selectedItem);
                        }
                    }

                });
            });

            // bind event for categories, different category bind different items
            singleExtraComponent.find('#single-extra-component-categories li ').each(function() {
                $(this).on('click', function() {
                    // hide all extra
                    singleExtraComponent.find('#single-extra-component-items li').hide();
                    var category_id = $(this).attr("data-extra-category-id");

                    singleExtraComponent.find('#single-extra-component-items li').each(function() {
                        if ($(this).attr("data-extra-category-id") == category_id) {
                            $(this).show();
                        }
                    })
                })
            });

            singleExtraComponent.find('#single-extra-component-categories li').last().click();
            return singleExtraComponent;
        }

        var init = function(tastes, categories, combo_id, selected_extras, SelectedExtraItemComponent, special, cousineExtraCategory) {
            var singleExtraComponent = createDom(tastes, categories, combo_id, selected_extras, SelectedExtraItemComponent, special, cousineExtraCategory);
            singleExtraComponent = bindEvent(singleExtraComponent, categories, combo_id, SelectedExtraItemComponent);

            return singleExtraComponent;
        }

        return {
            init: init,
            bindEvent: bindEvent
        }
    })();

    var ChangePriceComponent = (function() {
        var createDom = function() {
            var changePriceComponent = $($('#change-price-component').html().format('改价格'));

            return changePriceComponent;
        }

        var init = function() {
            var changePriceComponent = createDom();

            return changePriceComponent;
        }

        return {
            init: init
        }
    })();

    var ChangeQuantityComponent = (function() {
        var createDom = function() {
            var changeQuantityComponent = $($('#change-quantity-component').html().format('改数量'));

            return changeQuantityComponent;
        }

        var init = function() {
            var changeQuantityComponent = createDom();

            return changeQuantityComponent;
        }

        return {
            init: init
        }
    })();



    var SelectedExtraItemComponent = (function() {
        var createDom = function (extra_id, extra_category_id, name, price) {
            var selectedItem = $($('#selected-extra-item-component').html().format(extra_id, extra_category_id, name, price));
            if (parseFloat(price) == 0) {
                selectedItem.find('.selected-extra-item-price').hide();
            }

            return selectedItem;
        }

        var bindEvent = function(selectedItem) {
            selectedItem.find('button').on('click', function() {
                selectedItem.remove();
            })

            return selectedItem;
        }

        var init = function(extra_id, extra_category_id, name, price) {
            var selectedItem = createDom(extra_id, extra_category_id, name, price);
            selectedItem = bindEvent(selectedItem);

            return selectedItem;
        }

        return {
            init: init
        }
    })()

  class CousineExtraCategory {
      constructor(cousine_id, category_ids) {
            this.cousine_id = cousine_id;
            this.category_ids = category_ids;
        }
    }

    class Extra {
        constructor(id, cousine_id, name_en, name_zh, price, category_id) {
            this.id = id;
            this.cousine_id = cousine_id;
            this.name_en = name_en;
            this.name_zh = name_zh;
            this.price = price;
            this.category_id = category_id;
        }
    }

    class ExtraCategory {
        constructor(category_id, name_en, name_zh, combo_num) {
            this.category_id = category_id;
            this.name_en = name_en;
            this.name_zh = name_zh;
            this.combo_num = combo_num;
        }
    }

// load extra based on category id
    var loadExtras = function() {
        var extras = [];

        <?php
            if (!empty($extras)) {
                $i = 0;
                foreach ($extras as $extra) {
            ?>
                    var status = '<?php echo $extra["status"]; ?>';
                    if (status == 'A') {
                        var temp_extra = new Extra(
                            id = '<?php echo $extra["id"]; ?>',
                            cousine_id = '<?php echo $extra["cousine_id"]; ?>',
                            name_en = '<?php echo $extra["name"]; ?>',
                            name_zh = '<?php echo $extra["name_zh"]; ?>',
                            price = '<?php echo $extra["price"]; ?>',
                            category_id = '<?php echo $extra["category_id"]; ?>');

                        extras.push(temp_extra);
                    }

            <?php
                }
            ?>

        <?php
            }
        ?>
        return extras;
    }

    var loadExtraCategories = function() {
        var categories = [];

        <?php
            if (!empty($extra_categories)) {
                $i = 0;
                foreach ($extra_categories as $category) {
         ?>
                    var tempCategory = new ExtraCategory(
                            category_id = '<?php echo $category["id"] ?>',
                            name_en = '<?php echo $category["name"] ?>',
                            name_zh = '<?php echo $category["name_zh"] ?>',
                            combo_num = '<?php echo $category["extras_num"] ?>'
                        );

                    categories.push(tempCategory);
         <?php
                }
            }
          ?>

        return categories;
    }

    var loadCousineExtraCategories = function() {
        var cousine_categories = [];
    var cousine_id;
        var category = [];

        <?php
            if (!empty($records)) {
                foreach ($records as $rc1) {
          foreach ($rc1['Cousine'] as $rc2) {
         ?>
              cousine_id = '<?php echo $rc2['id']; ?>';
                    category = [];
                    <?php if ($rc2['extrascategories']) { 
            foreach ($rc2['extrascategories'] as $cid) { ?>
              category.push('<?php echo $cid; ?>');
          <?php }
            }
           ?>
                     cousine_categories[cousine_id] = category;
         <?php
                }
            }
      }
          ?>

        return cousine_categories;
    }


    var extras = loadExtras();
    var extraCategories = loadExtraCategories();
    var cousineExtraCategories = loadCousineExtraCategories();

    var tastesComponent = TastesComponent.init(extras, SelectedExtraItemComponent);



    $('body').append(tastesComponent);


    // save button, send ajax to the backend and store the data in database
    $('body').on('click', '#taste-component-save', function() {
        // console.log($('#selected-extra li'));
        // save all selected-extra to all selected items
        var selected_item_id_list = getSelectedItem();
        var selected_extras_id = [];
        $('#selected-extra li').each(function() {
            selected_extras_id.push($(this).attr('data-extra-id'));
            // selected_extras_amount += parseFloat($(this).find(".selected-extra-item-price").text());
        });
        // selected_extras_id = selected_extras_id.join(',');
        // console.log(selected_extras_id);
        // console.log(selected_item_id_list);
        // console.log(selected_extras_amount);
        
        if(selected_extras_id.length == 0){
          $.notify("No taste selected 没有选择口味",  { position: "top center", className:"warn"});
         return false;
        }
        
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'batchAddExtras')); ?>",
            method: "post",
            data: {selected_item_id_list: selected_item_id_list, selected_extras_id: selected_extras_id, table: "<?php echo $table ?>", type: "<?php echo $type ?>", special: $("#taste-component-special").val()},
            success: function (html) {
                renderOrder();
                
                $('#taste-component-special').val('');
                $('#taste-component-modal .close').trigger('click');
            }
        });
    });



    $('body').on('click', '#add-taste-btn' ,function() {
      
        var selected_item_id_list = getSelectedItem();
        
        if (selected_item_id_list.length == 0) { 
                     
            // $.notify("No item selected 没有选择菜",{position:"top center",className:"warn"}); return false;
            
            //default select the first item
            $("#order-component li:first").click();
            
            selected_item_id_list = getSelectedItem();

        } else if (selected_item_id_list.length > 1) {
            // alert("Please select only one item");
            $.notify("Please select only one item 请只选择一个菜。",  { position: "top center", className:"warn"});
            return false;
        }


        var selected_item_id = parseInt(selected_item_id_list[0]);

        var selected_extras = [];
        if (getSelectedItemDetails()[0]['selected-extras']) {
            selected_extras = JSON.parse(getSelectedItemDetails()[0]['selected-extras']);
        }

        // combo_id = 0 mean no combo
        // other combo_id means the different extra.category_id
        var combo_id = getSelectedItemDetails()[0]['combo_id'];
        var cousine_id = getSelectedItemDetails()[0]['cousine_id'];
        var special = getSelectedItemDetails()[0]['special'];
        
        var cousineExtraCategory = [];
        if (typeof cousineExtraCategories[cousine_id] !== 'undefined') {
          cousineExtraCategory = cousineExtraCategories[cousine_id];
        }
        
        // remove existing modal
        $('#single-extra-component-modal').modal('hide').remove();
        var singleExtraComponent = SingleExtraComponent.init(extras, extraCategories, combo_id, selected_extras, SelectedExtraItemComponent, special, cousineExtraCategory);
        $('body').append(singleExtraComponent);

    });


    $('body').on('click', '#single-extra-component-save', function() {

        var selected_item_id = getSelectedItem()[0];
        var selected_extras_id = [];
        $('#single-selected-extra li').each(function() {
            selected_extras_id.push($(this).attr('data-extra-id'));
        });

        $('#single-selected-combo li').each(function() {
            selected_extras_id.push($(this).attr('data-extra-id'));
        });

        var combo_id = $("#order-component li[data-order-item-id=" + selected_item_id + "]").attr("data-comb-id");
        // console.log(combo_id);

        if (combo_id != 0) {
            var combo_num = 0;
            for (var i = 0; i < extraCategories.length; ++i) {
                if(extraCategories[i].category_id == combo_id) {
                    combo_num = extraCategories[i].combo_num;
                }
            }
            //  must match the combo_num then can save the page
            if ( $("#single-selected-combo li").length != combo_num ) {
                $(this).notify("Please selected {0} combo. 请选择{0}种拼盘".format(combo_num), {position: "top center"});
                return false;
            }

        }

        if(selected_extras_id.length == 0) selected_extras_id="";
        
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'addExtras')); ?>",
            method: "post",
            data: {selected_item_id: selected_item_id, selected_extras_id: selected_extras_id, table: "<?php echo $table ?>", type: "<?php echo $type ?>", special: $("#single-extra-component-special").val()},
            success: function(html) {
                renderOrder();
                $('.modal-header .close').trigger('click');
            }
        })
    });

    // listen to ajax send
    ! function () {
        var ulContent;
        $(document).ajaxStop(function () {
            var $ul = $('#order-component');
            if(ulContent !== $ul.html()){
                ulContent = $ul.html();
                $ul.trigger('contentChanged');
            }
        });
    }();
    
    // when part of selected items are printed, only allow delete action
    // $('body').on('click contentChanged','#order-component, #select-all',function() {
    //     // console.log('click');
    //     ChangeBtnDisabled(['#delete-btn, #change-price-btn' , '#urge-btn']);
    // });

    function ChangeBtnDisabled(selectors) {
        
        //var selectorStr = selectors.join(',');
        if ($('#order-component li.selected.is-print').length > 0) {
            $.notify("If you want to modify items which have been sent to kitchen, please delete it and readd it. \n 已选项中包含已送厨菜品，若要修改已送厨菜品，请删除后重新添加",{ position: "top center", className:"info"});
            $('#button-group .btn').not(selectors[0]).attr('disabled', true);
        } else {
            $('#button-group .btn').not(selectors[0]).attr('disabled', false);
        }

        // only enable when all selected items are printed
        if ( $('#order-component li.selected').length > 0 && $('#order-component li.selected').length == $('#order-component li.selected.is-print').length) {
            $(selectors[1]).attr('disabled', false);
        } else {
            $(selectors[1]).attr('disabled', true);
        }
    }
    

    $('#pay-btn').on('click', function () {


        // if message exist save message
        // $('#send-to-kitchen-btn').trigger('click');

        // for(var i = 0; i < order.items.length; i++){
        //     //console.log(order.items[i]._name_zh);

        //     console.log(order.items[i].item_id);
        //     $.ajax({
        //         url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'addItem')); ?>",
        //         type: "post",
        //         data: {item_id: order.items[i].item_id, table: "<?php echo $table ?>", type: "<?php echo $type ?>"},
        //         success: function (json) {
                    

        //             // console.log(html);

        //             // $(".order-summary-indent").scrollTop($(".order-summary-indent ul").height());
        //             // $("#order_no_display").html("Order 订单号 #" + $("#Order_no").val() + ", Table 桌 #<?php echo $table; ?>");
        //             // $(".products-panel").removeClass('load1 csspinner');

        //             // var obj = JSON.parse(json);
        //             // //  {"extra_categories":["15","16"],"order_item_id":"4143","comb_id":"0","comb_num":"0"}
        //             // renderOrder(function() {
        //             //     if (obj.comb_id != 0) {
        //             //         $("#order-component li[data-order-item-id=" + obj.order_item_id + "]").trigger("click");
        //             //         $("#add-taste-btn").trigger("click");
        //             //     }

        //             // });

        //         }

        //     })
        // };

        window.location = "<?php echo $this->Html->url(array('controller' => 'pay', 'action' => 'index', 'table' => $table, 'type' => $type)); ?>";

    });


    


    

    $('body').on('click', '#edit-phone-component-save', function() {

        var phone = $('input[name="phone"]').val();

        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'editPhone')); ?>",
            method: "post",
            data: {
                phone: phone,
                order_no: $("#Order_no").val()
            },
            success: function(html) {
                $('#edit-phone-component-modal .close').trigger('click');
                //renderOrder();
                window.location.reload();
            }
        });
    });


    function loadOrder(order_no) {
        var tempOrder = new Order(order_no);
        <?php
            if (!empty($Order_detail['OrderItem'])) {
            ?>
                var percent_discount = '<?php echo $Order_detail['Order']['percent_discount'] ;?>';
                var fix_discount = '<?php echo $Order_detail['Order']['fix_discount']; ?>';

                // console.log(percent_discount);
                // console.log(fix_discount);
                if (percent_discount != 0) {
                    tempOrder.discount = {"type": "percent", "value": percent_discount}
                    // console.log(tempOrder.discount)
                } else if (fix_discount != 0) {
                    tempOrder.discount = {"type": "fixed", "value": fix_discount}
                }
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
            ?>
                    var temp_item = new Item(
                            item_id = '<?php echo $i ?>',
                            image= '<?php if ($value['image']) { echo $value['image']; } else { echo 'no_image.jpg';};?>',
                            name_en = '<?php echo $value['name_en']; ?>',
                            name_zh = '<?php echo $value['name_xh']; ?>',
                            selected_extras_name = '<?php echo implode(",", $selected_extras_name); ?>', // can be extend to json object
                            price = '<?php echo $value['price'] ?>',
                            extras_amount = '<?php echo $value['extras_amount'] ?>',
                            quantity = '<?php echo $value['qty'] ?>',
                            order_item_id = '<?php echo $value['id'] ?>',
                            state = "keep",
                            shared_suborders = null,
                            assigned_suborder = null,
                            is_takeout = '<?php echo $value["is_takeout"] ?>',
                            comb_id = '<?php echo $value["comb_id"] ?>',
                            selected_extras_json = '<?php echo $value['selected_extras'] ?>',
                            is_print = '<?php echo $value['is_print']?>',
                            special = '<?php echo  $value["special_instruction"]?>',
                            cousine_id = '<?php echo $value['item_id']?>');

                    tempOrder.addItem(temp_item);
            <?php
                    $i++;
                }
            ?>

        <?php
            }
        ?>
        return tempOrder;
    }


    function renderOrder(callback) {
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'order', 'action' => 'summarypanel', $table, $type)); ?>",
            type: "post",
            success: function(html) {


                $("#order-component").html(html);
                $("#order-component").empty();
                
                $("#order-component").removeClass('load1 csspinner');


                function isSelect(data){

                    //console.log($("#" + data.id + ""));
                    if($("#" + data.id + "").hasClass("select")){
                        $("#" + data.id + "").removeClass("select");
                    }else{
                        $("#" + data.id + "").addClass("select");
                    }
                }

                order_item_length = order.items.length;
                console.log(order_item_length);

                if(order_item_length != 0){
                    var click = 0;

                    for(var i = 0; i < order.items.length; i++){
                        //console.log(order.items[i]);


                        $("#order-component").append("<li onclick='isSelect(this)' class='order-item' data-order-item-id=" + order.items[i].order_item_id + " id='order-item-" + click + "' data-state='1' style='margin-bottom: 2px; width: 100%; background-color: rgb(240, 240, 240);''><a href='javascript:;'><div class = 'list-left'><h4>" + order.items[i]._name_zh + " " +order.items[i]._name_en + "</h4><p id='tasteOption'></p></div><div class='list-center'>$" + order.items[i]._price + "</div><div class='list-right'>1</div></li>");

                        click = click + 1;

                    }
                }
            }
        })
    }


    $('body').on('click', '.selected-extra-item', function() {
      
      if($(this).has('button').length){
        $(this).remove();
      }
       
    });
    

</script>


<script type="text/javascript" src="../../../html/js/jquery.js"></script>
    <script type="text/javascript" src="../../../html/js/keyboard.js"></script>
    <script type="text/javascript">
        //我就在想这里的折扣有什么用，到付款的时候不是有折扣吗
    $(".butt").click(function(){
        var basic = $(this).text();
        basic =parseFloat( basic.substr(0, basic.length - 1));
        $("#txt2").val(basic);
    })

        
    $(document).ready(function(){

      // nav
      $(".barnav").hover(function(){
        $(this).find("ul").slideDown();
      },function(){
        $(this).find("ul").slideUp();
      });
      $(".barnav").on("click",function(){
        var ulD = $(this).find("ul").css("display");
        if(ulD == "none"){
          $(this).find("ul").slideDown();
        }else{
          $(this).find("ul").slideUp();
        }
      });
      // content
      var winH = $(window).height() - 110, //100是导航
          winH1 = $(window).height() - 190,
          winW = $(window).width();//可是宽度
      $(".content").css("height",winH+"px");
      if(winW > 768){
        $(".page2-content .page2-left,.page2-content .page2-right .cashierbox .right-tab").css("height",winH+"px");
        $(".right-list").css("height", winH - 300 + "px");
        $(".page2-content .page2-left-c, .right-list").css("height",winH1+"px");
      }else{
        $(".page2-content .page2-left").css({"height":"500px"});
        $(".page2-content .page2-left-c").css("height","410px");
        $(".right-list").css("height","410px");
      }


      // 菜单向下滑动
      $(".page2-content .tab-bot").on("click",function(){
        var scroll = $(".page2-content .page2-tabnav").scrollTop() + 70;
        $(".page2-content .page2-tabnav").scrollTop(scroll);
      });
      $(".tab-bot1").on("click",function(){
        var scroll = $("#change .page2-tabnav").scrollTop() + 70;
        $("#change .page2-tabnav").scrollTop(scroll);
      });
      $(".tab-bot2").on("click",function(){
        var scroll = $(".change-q").scrollTop() + 50;
        $(".change-q").scrollTop(scroll);
      });
      $(".page2-content .page2-tabnav li").on("click",function(){
        var index = $(this).data("index");
        // $(".page2-content .tabright").hide();
        $(".page2-content .tab"+index).show();
        $(this).addClass("tab-active");
        $(this).siblings().removeClass("tab-active");
      });
      $("#change .page2-tabnav li").on("click",function(){
        var index = $(this).data("index");
        $("#change .right-list").hide();
        $("#change .chan"+index).show();
        $(this).addClass("tab-active");
        $(this).siblings().removeClass("tab-active");
      });
      
      
      //菜品数量调整
      $(".rBtn04").on("click",function(){
        $("#changeNum").fadeIn();
      });
      $("#changeNum .cancel").on("click",function(){
        $("#changeNum").hide();
  
      });
      //菜品价格调整
      $(".rBtn05").on("click",function(){
        $("#changePrice").fadeIn();
      });
      $("#changePrice .cancel").on("click",function(){
        $("#changePrice").hide();
      });
      
      
      //判断哪个菜品被选中
      $("#order-component > li").on("click",function(){
        console.log(12314);
        if($(this).hasClass("select")){
            $(this).removeClass("select");
        }else{
            $(this).addClass("select");
        }
      })



      //取消选择的菜品
      $(".cancel").click(function(){
        $(".right-list li").removeClass("select");
      })
      //订单列表
      $(".firstLi").click(function(){
        $(".right-list li").removeClass("select");
        
      })
      //全选
      $(".totalSelection").click(function(){
        $(".right-list li").addClass("select");
        
      })
      //送厨与未送厨背景颜色区分
      $(function(){
        $(".right-list li").each(function(){
            var state = $(this).attr("data-state");
            if(state==1){
                $(this).css('background-color','#f0f0f0');
            }
        })
      })
      //未送厨
      $(".not_yet").click(function(){
        $(".right-list li").each(function(){
            var state = $(this).attr("data-state");
            if(state==0){
                $(this).addClass("select");
            }else{
                $(this).removeClass("select");
            }
            
        })
        
      })
      //已送厨
      $(".already").click(function(){
        $(".right-list li").each(function(){
            var state = $(this).attr("data-state");
            if(state==1){
                $(this).addClass("select");
            }else{
                $(this).removeClass("select");
            }
            
        })
      })
      //反选()
      $(".reverseSelection").click(function(){
        $(".right-list li").each(function(){
            var selected = $(this).attr("class");
            if(selected == 'select'){                           
                $(this).removeClass("select");
            }else if(selected != 'select'){
                $(this).addClass("select");
            }
        })
      })
      //右侧已选菜品选中操作
      $(".right-list li").click(function(){
            var selected = $(this).attr("class");
                if(selected =='select'){
                    $(this).removeClass("select");
        
                }else if(selected !='select'){
                    $(this).addClass("select");
        
                }
      })
      //类似选项卡样式切换
      $(".right-top li").click(function(){
        $(this).addClass("right-active").siblings().removeClass("right-active");
      })
        
     //电话号码弹窗
     $(".newPhone").click(function(){
        $(this).next(".lock-div").fadeIn();
     })
     $(".closeBox").click(function(){
        $(this).parents(".lock-div").fadeOut();
     })
      
      //添加折扣
      $(".add_zhe").click(function(){
        $(".add-content").slideToggle();
      })
      // 去除搜索框中的内容
      $(".tab-close").on("click",function(){
        $(".tab-input").val("");
      });
      // 管理员密码
      $(".login_right span").on("click",function(){
        $("#admin").show();
      });
      $(".a_no").on("click",function(){
        $("#admin").hide();
        $(".key").hide();
      });
      $(".a_yes").on("click",function(){
        $(".key").show();
      });
      $(".key_img").on("click",function(){
        $(".key").hide();
      });
      // 回车,跳转到管理员界面      
      $(".return").on("click",function(){
        var aVal = $("#write").val();
        if(aVal == 1){//如果取到的键值是回车
          window.location.href="admin.html";         
        }else{
          alert("解锁密码错误！");
        }
      });
      window.document.onkeydown= function(evt){
       evt = window.event || evt;
       var aVal = $("#write").val();
       if(evt.keyCode == 13 && aVal == 1){//如果取到的键值是回车
          window.location.href="admin.html";         
       }else if(evt.keyCode == 13 && aVal != 1){
          alert("解锁密码错误！");
       }
      }
      // 移除已选口味
      $(".change-q img").on("click",function(){
        $(this).parents("li").remove();
      });
      $(".rBtn06").on("click",function(){
        $("#change").show();
      });
      $(".change-close").on("click",function(){
        $("#change").hide();
      });
    });
    </script>
</body>



