<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="../../../html/css/style.css" />
    <link rel="stylesheet" href="../../../html/css/jianpan.css" />
  </head>

  <body>
    <div class="container">
      <!-- 头部 -->
      <div class="header">
      
        <!-- logo -->
        <?php echo $this->Html->image('logo-pos.png', array( 'alt' => 'logo', 'class' => 'logo')); ?>
        <!-- <img src="img/logo-pos.png" alt="logo" class="logo" /> -->
        <!-- 导航 -->

        <ul class="nav">
          <li><a href="../../../homes/dashboard" class="nav-a">主页</a></li>
          <li class="barnav">
            <a href="javascript:;" class="nav-a">语言</a>
            <ul style="display: none;">
              <li><a href="javascript:;">English</a></li>
              <li><a href="javascript:;">中文</a></li>
            </ul>
          </li>
          <li><a href="javascript:;" onclick="huiyuan();" class="nav-a member">会员</a></li>
          <!-- <li><a onclick="paidui();" class="nav-a">排队</a></li>
          <li><a onclick="quhao();"class="nav-a">取号</a></li> -->
        </ul>
        <?php echo $this->Html->image('nav.png', array( 'class' => 'smalllogo', 'alt' => 'pad菜单')); ?>
        <!-- <img src="images/nav.png" class="smalllogo" alt="pad菜单" /> -->
        <!-- 登录按钮 -->
        <div class="login_right">
          <button type="button" name="button" onclick="loginout(this);">登出</button>
          <span>管理员</span>
        </div>
      </div>
      <!-- 主体 -->
      <div class="page2-content payment">
        <div class="page2-left">
          <div class="page2-top">
            <h4><?php echo __('Order No.'); ?><?php echo $Order_detail['Order']['order_no'] ?><?php echo __('Table'); ?> <?php echo (($type == 'D') ? '[[堂食]]' : (($type == 'T') ? '[[外卖]]' : (($type == 'W') ? '[[等候]]' : ''))); ?>#<?php echo $table; ?><?php echo @$Order_detail['Order']['reason']!=''?('<br />'.$Order_detail['Order']['reason']):''; ?></h4>
            <button id="change_table" type="button" name="button">换&nbsp;桌</button>
          </div>
        <div class="page2-left-c">
          <div class="page2-tavright">
          <div class="pay-left">
                <div class="pay-title"><?php echo __('Order Summary'); ?></div>
                <ul class="right-list">
                  <!-- 背景色 class="rig-act" -->
                  <?php
                        if (!empty($Order_detail['OrderItem'])) {
                            foreach ($Order_detail['OrderItem'] as $key => $value) {
                                # code...
                                $selected_extras_name = [];
                                // if ($value['all_extras']) {
                                    // $extras = json_decode($value['all_extras'], true);
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
                  <li>
                    <a href="javascript:;">
                      <div class="list-left">
                        <h4><?php echo $value['name_en'] . "<br/>" . $value['name_xh']; ?></h4>
                        <!-- <p>Option: 中辣；少麻；去葱；加卤蛋；加面；加肉；改米线；多花生</p> -->
                        <p><?php echo implode(",", $selected_extras_name); ?></p>
                      </div>
                      <div class="list-center">
                        <i class="pri"><?php echo ($value['price'] + $value['extras_amount']); ?></i> <span>(15%off)</span>
                      </div>
                      <div class="list-right"><?php echo $value['qty']; ?></div>
                    </a>
                  </li>

                <?php }} ?>
                </ul>
              </div>
              <div class="pay-right">
                <div class="notop">
                  <ul class="pay-ul"> 
                    <li class="noto-act">顾客.01</li>
                  </ul>
                  <div class="pay-right-c">
                    <div class="r-c-top">
                      <div class="c-top-left">
                        <ul class="contL">
                          <li>订单号</li>
                          <li>小计</li>
                          <li>折扣</li>
                        </ul>
                        <ul class="contR">
                          <li>D31710311432</li>
                          <li>$<span id="subtotal">0.00</span></li>
                          <!--<li class="fixed">$<span class="subtotal">0.00</span>*<span class="discount">0.00</span>%</li>-->
                          <li class="fixed">--</li>
                        </ul>
                      </div>
                      <div class="right-tab">
                        <div class="topOpen">
                            <a href="javascript:;" class="add_zhe">加入折扣</a>
                            <a href="javascript:;" class="add_shou"> - 收起</a>
                        </div>
                        <div class="add-content">
                          <ul class="add-ul">
                            <li>
                              <span>固定折扣</span>
                              <input type="text" id="discount1" class="visible">
                            </li>
                            <li>
                              <span>%折扣</span>
                              <input type="text" id="discount2" class="visible">
                            </li>
                            <li>
                              <span>优惠码</span>
                              <input type="text" id="discount3" class="visible">
                            </li>
                          </ul>
                          <div class="add-right">
                            <span>折扣快捷按钮</span>
                            <p class="btn">
                                <button type="button" name="button" class="butt">15%</button>
                                <button type="button" name="button" class="butt">20%</button>
                                <button type="button" name="button" class="butt">25%</button>
                                <i class="application">应用折扣</i>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="c-top-left">
                        <ul class="contL">
                          <li>折后价</li>
                          <li>税(<span class="tax">0.00</span>%):</li>
                          <li>总计:</li>
                        </ul>
                        <ul class="contR">
                          <li><span class="discountMoney">0.00</span></li>
                          <li>$<span class="taxMoney">0.00</span></li>
                          <li>$<span id="total">0.00</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="r-c-center">
                        <ul class="cenL">
                          <li>已收到:</li>
                          <li class="cen-col">现金：$<span class="cash">0.00</span></li>
                          <li class="cen-col">会员：$<span class="member">0.00</span></li>
                          <li class="change">剩余:</li>
                          <li>小费:</li>
                        </ul>
                        <ul class="cenC">
                          <li>$<span class="received">0.00</span></li>
                          <li class="cen-col">卡：$<span class="card">0.00</span></li>
                          <li class="cen-col"></li>
                          <li>$<span class="surplus">0.00</span></li>
                          <li>$<span class="tip">0.00</span></li>
                        </ul>
                        
                    </div>
                    <div class="r-c-bot">
                      <h5>状态</h5>
                      <!-- color1未支付，color2已付款，color3已打单 -->
                      <p><span class="color1"></span>未支付</p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>

          <!-- <div class="page2-left-c">
              
          </div> -->
        </div>
        <div class="page2-right">
          <!-- ipad关闭付款块 -->
          <img src="../../../html/images/icon-06.png" alt="ipad关闭付款块" class="pay_close" />
          <!-- 登录 -->
          <div class="login">
            <div class="login-align">
                <h4>请选择付款方式</h4>
                <ul class="payF">
                  <li>
                    <a href="javascript:;"><img src="../../../html/images/btn02.png"></a>
                  </li>
                  <li>
                    <a href="javascript:;"><img src="../../../html/images/btn03.png"></a>
                  </li>
                  <li>
                    <a href="javascript:;"><img src="../../../html/images/btn04.png"></a>
                  </li>
                </ul>
                <h4>付款金额</h4>
                <div class="formkey">
                  <input type="text" value="" class="keyboard" placeholder="0.00" />
                  <!-- 左侧数字 -->
                  <ul class="num_left">
                    <li class="num">1</li>
                    <li class="num">2</li>
                    <li class="num">3</li>
                    <li class="num">4</li>
                    <li class="num">5</li>
                    <li class="num">6</li>
                    <li class="num">7</li>
                    <li class="num">8</li>
                    <li class="num">9</li>
                    <li class="empty">清空</li>
                    <li class="num">0</li>
                    <!--<li class="retreat">后退</li>-->
                    <li class="num">.</li>
                  </ul>
                  <!-- 右侧操作 -->
                  <div class="num_right">
                    <a href="javascript:;" class="payde">默认<br />金额</a>
                    <a href="javascript:;" class="paymo">输入</a>
                  </div>
                </div>
                
                <div class="right-con">
                    <div class="right-tab1">
                      <button type="button" name="button" class="pay01">确认付款</button>
                      <button type="button" name="button" class="pay02">打印收据</button>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 换桌 -->
    <div id="show_modal"class="model model2">
      <div class="model-title">堂食 NO.01 变更为</div>
      <img src="../../../html/images/icon-06.png" alt="关闭弹出层" class="model-close" />
      <div class="model2-content">
        <input type="text" name="" placeholder="堂食" class="model-input" />
        <ul class="tang1">
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
        </ul>
        <input type="text" name="" placeholder="外卖" class="model-input" />
        <ul class="tang2">
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
        </ul>
        <input type="text" name="" placeholder="送餐" class="model-input" />
        <ul class="tang3">
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
          <li><a href="javascript:;">01</a></li>
        </ul>
      </div>
    </div>

    <!-- ipad付款块按钮 -->
    <button type="button" name="button" class="pay_play">选择/输入付款金额</button>
    <!-- 付款虚拟键盘 -->
    <div class="key" id="pay_key">
      <img src="../../../html/images/icon-14.png" alt="关闭虚拟键盘" class="key_img" />
      <ul id="keyboard">
        <li class="esc">Esc</li>
        <li class="symbol"><span class="off">1</span><span class="on">!</span></li>

        <li class="symbol"><span class="off">2</span><span class="on">@</span></li>

        <li class="symbol"><span class="off">3</span><span class="on">#</span></li>

        <li class="symbol"><span class="off">4</span><span class="on">$</span></li>

        <li class="symbol"><span class="off">5</span><span class="on">%</span></li>

        <li class="symbol"><span class="off">6</span><span class="on">^</span></li>

        <li class="symbol"><span class="off">7</span><span class="on">&amp;</span></li>

        <li class="symbol"><span class="off">8</span><span class="on">*</span></li>

        <li class="symbol"><span class="off">9</span><span class="on">(</span></li>

        <li class="symbol"><span class="off">0</span><span class="on">)</span></li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="delete lastitem">Delete</li>

        <li class="tab no"></li>

        <li class="letter">Q</li>

        <li class="letter">W</li>

        <li class="letter">E</li>

        <li class="letter">R</li>

        <li class="letter">T</li>

        <li class="letter">Y</li>

        <li class="letter">U</li>

        <li class="letter">I</li>

        <li class="letter">O</li>

        <li class="letter">P</li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="symbol lastitem"><span class="off">\</span><span class="on">|</span></li>

        <li class="capslock no"></li>

        <li class="letter">A</li>

        <li class="letter">S</li>

        <li class="letter">D</li>

        <li class="letter">F</li>

        <li class="letter">G</li>

        <li class="letter">H</li>

        <li class="letter">J</li>

        <li class="letter">K</li>

        <li class="letter">L</li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="return lastitem">Enter</li>

        <li class="left-shift">SHIFT</li>

        <li class="letter">Z</li>

        <li class="letter">X</li>

        <li class="letter">C</li>

        <li class="letter">V</li>

        <li class="letter">B</li>

        <li class="letter">N</li>

        <li class="letter">M</li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="right-shift no"></li>

        <li class="no b1"></li>

        <li class="no b2"></li>

        <li class="no b3"></li>

        <li class="no b4"></li>

        <li class="space lastitem">&nbsp;</li>

        <li class="no b5"></li>

        <li class="no b5"></li>

        <li class=" b6"></li>
      </ul>
    </div>
    <!-- 管理员虚拟键盘 -->
    <div class="key" id="admin_key">
      <img src="../../../html/images/icon-14.png" alt="关闭虚拟键盘" class="key_img" />
      <ul id="keyboard">
        <li class="esc">Esc</li>
        <li class="symbol"><span class="off">1</span><span class="on">!</span></li>

        <li class="symbol"><span class="off">2</span><span class="on">@</span></li>

        <li class="symbol"><span class="off">3</span><span class="on">#</span></li>

        <li class="symbol"><span class="off">4</span><span class="on">$</span></li>

        <li class="symbol"><span class="off">5</span><span class="on">%</span></li>

        <li class="symbol"><span class="off">6</span><span class="on">^</span></li>

        <li class="symbol"><span class="off">7</span><span class="on">&amp;</span></li>

        <li class="symbol"><span class="off">8</span><span class="on">*</span></li>

        <li class="symbol"><span class="off">9</span><span class="on">(</span></li>

        <li class="symbol"><span class="off">0</span><span class="on">)</span></li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="delete lastitem">Delete</li>

        <li class="tab no"></li>

        <li class="letter">Q</li>

        <li class="letter">W</li>

        <li class="letter">E</li>

        <li class="letter">R</li>

        <li class="letter">T</li>

        <li class="letter">Y</li>

        <li class="letter">U</li>

        <li class="letter">I</li>

        <li class="letter">O</li>

        <li class="letter">P</li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="symbol lastitem"><span class="off">\</span><span class="on">|</span></li>

        <li class="capslock no"></li>

        <li class="letter">A</li>

        <li class="letter">S</li>

        <li class="letter">D</li>

        <li class="letter">F</li>

        <li class="letter">G</li>

        <li class="letter">H</li>

        <li class="letter">J</li>

        <li class="letter">K</li>

        <li class="letter">L</li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="return lastitem">Enter</li>

        <li class="left-shift">SHIFT</li>

        <li class="letter">Z</li>

        <li class="letter">X</li>

        <li class="letter">C</li>

        <li class="letter">V</li>

        <li class="letter">B</li>

        <li class="letter">N</li>

        <li class="letter">M</li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="no"></li>

        <li class="right-shift no"></li>

        <li class="no b1"></li>

        <li class="no b2"></li>

        <li class="no b3"></li>

        <li class="no b4"></li>

        <li class="space lastitem">&nbsp;</li>

        <li class="no b5"></li>

        <li class="no b5"></li>

        <li class=" b6"></li>
      </ul>
    </div>
    <!-- 管理员密码 -->
    <div id="admin">
      <p>密码解锁</p>
      <input type="text" name="" id="write" class="adminInp" placeholder="请输入密码解锁" />
      <div class="admin-btn">
        <button type="button" class="a_no">取消</button>
        <button type="button" class="a_yes">输入</button>
      </div>
    </div>
    <script type="text/javascript" src="../../../html/js/jquery.js"></script>
    <script type="text/javascript" src="../../../html/js/keyboard.js"></script>
    <script type="text/javascript">
     //写了这么多关于计算的，可能也没什么用，不如意直接调用旧版的计算方法吧
     
     
      $(function(){     
          //整理所有价格显示
            var totalMoney = 0;//菜品总额
            var unitPrice;//单价
            var n;//数量
            var totalQuantity = $(".pri").length;//取所有菜品的类别的个数     
            for(var m=0;m<totalQuantity;m++){
                $(".pri").eq(m).each(function(){
                    unitPrice = parseFloat($(this).text());
                    n = parseInt($(this).parents(".list-center").next(".list-right").text());
                    unitPrice = unitPrice*n;        
                })  
                totalMoney=unitPrice+totalMoney;
            }
            $("#subtotal").text(totalMoney);
            $(".subtotal").text(totalMoney);
            var discount=15;//这个百分比后台调取
            $(".discount").text(discount);//这是折扣百分比 啊
            
            $(".discountMoney").text('--');
            var tax=13;//这个百分比后台调取
            $(".tax").text(tax);
            var taxMoney = parseFloat(tax*totalMoney/100);
            taxMoney = taxMoney.toFixed(2);//这是税 啊
            $(".taxMoney").text(taxMoney);
            var total;
            total = parseFloat(totalMoney)+parseFloat(taxMoney);
            total = total.toFixed(2);//这是总计 啊
            $("#total").text(total);
        })
        
        //添加折扣
      $(".add_zhe").click(function(){
        $(this).parent(".topOpen").next(".add-content").slideDown();
        $(this).parent(".topOpen").find(".add_shou").show();
      })
       $(".add_shou").click(function(){
        $(this).parent(".topOpen").next(".add-content").slideUp();
        $(this).hide();
      })
      $(".butt").click(function(){
        var basic = $(this).text();
        basic =parseFloat( basic.substr(0, basic.length - 1));
        $("#discount2").val(basic);
        $(".discount").text(basic);
        
      })
        
        
        //计算折扣
            
      $(".application").click(function(){
        var txt1 = parseFloat($("#discount1").val());
        var txt2 = parseFloat($("#discount2").val());
        var txt3 = parseFloat($("#discount3").val());
        var subtotal = parseFloat($("#subtotal").text());//小计
        
                var tax2=parseFloat($(".tax").text());
                var total2;
                var taxMoney2;
                var last;
                
                var html="$";
                html+="<span class='subtotal'>";
                html+=subtotal;
                html+="</span>*<span class='discount'>";
                html+=txt2;
                html+="</span>";
                html+="%";
                
                if(!txt1&&!txt2&&!txt3){//无折扣
                    alert("请选择一种折扣！");
                }else if(!txt1&&!txt3){//按照百分比算
                    $(".fixed").text('');
                    $(".fixed").append(html);
            total2 = subtotal - subtotal*txt2/100;
            total2 = total2.toFixed(2)//这是折后价 啊
            taxMoney2 = parseFloat(tax2*total2/100);
                taxMoney2 = taxMoney2.toFixed(2);//这是税 啊
                last = parseFloat(total2)+parseFloat(taxMoney2);
                last = last.toFixed(2);
            console.log('按照百分比算')
        }else if(!txt2&&!txt3){//按照固定折扣算
            $(".fixed").text(-txt1);
            total2 = parseFloat(subtotal) - parseFloat(txt1);
            total2 = total2.toFixed(2)//这是折后价 啊
            taxMoney2 = parseFloat(tax2*total2/100);
                taxMoney2 = taxMoney2.toFixed(2);//这是税 啊
                last = parseFloat(total2)+parseFloat(taxMoney2);
                last = last.toFixed(2);
            console.log('按照固定折扣算')
        }else if(!txt1&&!txt2){
            //这里是优惠码，具体怎么算不知
                    console.log('按照优惠码算')
        }else{
            alert("只能选择一种折扣！");
            $(".add-ul").find("input").val('');
            
            //只能选择一种折扣，清空处理
            $(".fixed").text("--");
            $(".discountMoney").text('$'+subtotal);
            var tax = parseFloat($(".tax").text());
                var taxMoney = parseFloat(tax*subtotal/100);
                taxMoney = taxMoney.toFixed(2);
            $(".taxMoney").text(taxMoney);
            
        }
        $(".discountMoney").text('$'+total2);
        $(".taxMoney").text(taxMoney2);
        $("#total").text(last);
        
        
      })

            //默认金额
            
            $(".payde").on("click",function(){       
                if($(".payF .active").length==0){
                            alert("请选择一种支付方式！");        
                            $(".payment .keyboard").val('');
                        }else{
                            $(".payment .keyboard").val(parseFloat($("#total").text()));
                        }
        
      });

            //点击键盘
            
            $(".num_left li").not(".empty").on("click",function(){       
                if($(".payF .active").length==0){
                            alert("请选择一种支付方式！");        
                            $(".payment .keyboard").val('');
                        }else{
                            var inputVal = $(".payment .keyboard").val(),
                $_this = $(this).html();
                    $(".keyboard").val(inputVal+$_this);
                        }
        
      });
          

      //判断什么支付方式
      var payment = 0;  
      var mm = 0;
      var received = 0;
            
            $(".payF li").click(function(){         
                mm = $(this).index();
            });
            


      //'输入'键 
      $(".paymo").on("click",function(){       
                if($(".payF .active").length==0){
                            alert("请选择一种支付方式！");        
                            $(".payment .keyboard").val('');
                        }else{
                            var num = parseFloat($(".payment .keyboard").val());
                            if(mm==0){

                                $(".pay-right-c").each(function(){
                                    if($(this).css("display")=="block"){
                                        var all = parseFloat($(this).find("#total").text());//总计
                                        $(this).find(".received").text(num);//实收金额
                                        $(this).find(".cash").text(num);//现金
                                        var balance = num-all;//相差值
                                        balance = balance.toFixed(2);
                                        if(num>=all){//判断输入的金额是否大于总金额
                                            $(this).find(".surplus").text(balance);
                                            $(this).find(".change").text('找零:');
                                        }else{
                                            $(this).find(".surplus").text(-1*balance);
                                            $(this).find(".change").text('剩余:');
                                        }
                                        
                                    }
                                })

                            console.log("cash")
                        }else if(mm==1){

                                $(".pay-right-c").each(function(){
                                    if($(this).css("display")=="block"){
                                        var all = parseFloat($(this).find("#total").text());//总金额
                                        var rest = parseFloat($(this).find(".surplus").text());//剩下的金额
                                        $(this).find(".received").text(num);//实收金额
                                        $(this).find(".card").text(num);//银行卡
                                        //如果首选其他支付，有剩余金额时，刷卡金额减去剩余金额等于小费；首选刷卡支付时，刷卡金额减去总金额等于小费，那剩余金额怎么变化？
//                                      if(){}
                                        
                                        
                                        var balance = num-all;//相差值
                                        balance = balance.toFixed(2);
                                        if(num>=all){//判断输入的金额是否大于总金额
                                            $(this).find(".surplus").text("0.00");
                                            $(this).find(".tip").text(balance);
                                        }else{
                                            $(this).find(".surplus").text(-1*balance);
                                            $(this).find(".tip").text("0.00");
                                        }
                                        
                                    }
                                })

                            console.log("card")
                        }else if(mm==2){

                                $(".pay-right-c").each(function(){
                                    if($(this).css("display")=="block"){
                                        var all = parseFloat($(this).find("#total").text());//总计
                                        $(this).find(".received").text(num);//实收
                                        $(this).find(".member").text(num);//会员卡
                                        var balance = num-all;//相差值
                                        balance = balance.toFixed(2);
                                        if(num>=all){//判断输入的金额是否大于总金额
                                            $(this).find(".surplus").text("0.00");
                                            $(this).find(".tip").text(balance);
                                        }else{
                                            $(this).find(".surplus").text(-1*balance);
                                            $(this).find(".tip").text("0.00");
                                        }
                                    }
                                })

                            console.log("membercard")
                        }
                        
                        }
        
      });
      
      //清空处理
      $(".payment .empty").on("click",function(){
        $(".payment .keyboard").val("");
        
        $(".fixed").text("--");
        $(".visible").val('');
        $(".discountMoney").text("--");
        var subtotal = parseFloat($("#subtotal").text());//小计
        var tax = parseFloat($(".tax").text());
            var taxMoney = parseFloat(tax*subtotal/100);
            taxMoney = taxMoney.toFixed(2);
        $(".taxMoney").text(taxMoney);
        var tal = parseFloat(subtotal)+parseFloat(taxMoney);
        $("#total").text(tal);
        $(".cash")[0].innerText = 0;
        $(".card")[0].innerText = 0;

        
        
//      $(".received").text("0.00");
//        $(".cash").text("0.00");
//        $(".card").text("0.00");
//        $(".member").text("0.00");
//        $(".surplus").text("0.00");
//        $(".tip").text("0.00");
      });
      
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
      var winH = $(window).height() - 100, //100是导航
          winH1 = $(window).height() - 190,
          winW = $(window).width();//可是宽度
      $(".page2-content, .payment").css("height",winH+"px");
      // if(winW > 768){
        $(".page2-left").css("height", winH + "px");
        $(".page2-left-c").css("height",winH1 + "px");
        $(".page2-right").css("height", winH + "px");
      // }else{
      //   $(".page2-left").css({"height":"500px"});
      //   $(".page2-left-c").css("height","410px");
      // }

      // 菜单向下滑动
      $(".tab-bot").on("click",function(){
        var scroll = $(".page2-tabnav").scrollTop() + 70;
        console.log(scroll);
        $(".page2-tabnav").scrollTop(scroll);
      });
      $(".page2-tabnav li").on("click",function(){
        var index = $(this).data("index");
        $(".tabright").hide();
        $(".tab"+index).show();
        $(this).addClass("tab-active");
        $(this).siblings().removeClass("tab-active");
      });
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
        $("#admin_key").hide();
        $("#write").val("");
      });
      $(".a_yes").on("click",function(){
        $("#admin_key").show();
      });
      $(".key_img").on("click",function(){
        $(this).parents(".key").hide();
      });
      // 回车,跳转到管理员界面      
      $("#admin_key .return").on("click",function(){
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
       if(evt.keyCode == 13){//如果取到的键值是回车
        if(aVal == 1){         
          window.location.href="admin.html";         
        }else if(aVal != "" && aVal != 1){
          alert("解锁密码错误！");
        }
       }
     }
      var liW = parseFloat($(".payment .num_left li").width()) ,
          liW1 = parseFloat($(".payment .num_left li").width()*2 + 7),
          liW2 = parseInt((liW1 - 80)/2);
      $(".payment .num_left li").css({"height":liW+"px","line-height":liW+"px"});
      $(".payment .num_right a").css({"padding-top":liW2+"px","padding-bottom":liW2+"px"});

      // 输入密码
//    $(".payment .num_left li.num").on("click",function(){
//      var inputVal = $(".payment .keyboard").val(),
//          $_this = $(this).html();
//      $(".keyboard").val(inputVal+$_this);
//    });
      // 清空
//    $(".payment .empty").on("click",function(){
//      $(".payment .keyboard").val("");
//    });
      // 后退
      $(".payment .retreat").on("click",function(){
        var leng = $(".payment .keyboard").val().toString(),valIn = "";
        valIn = leng.substring(0,leng.length-1);
        $(".payment .keyboard").val(valIn);
      });
      // 默认
//    $(".payde").on("click",function(){
//      // 365为现有的默认金额
//      $(".payment .keyboard").val(365);
//    });
      // 关闭ipad付款块
      $(".pay_close").on("click",function(){
        $('.payment .page2-right').hide();
      });
      $(".pay_play").on("click",function(){
        $('.payment .page2-right').css("z-index","20");
      });
      //付款方式
      $(".payF li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      })

      //确认付款
      console.log(payment);
      $(".pay01").click(function () {
            // submit form for complete payment process
            $.ajax({
                url: "<?php echo $this->Html->url(array('controller' => 'pay', 'action' => 'complete')); ?>",
                type: "post",
                data: {
                    pay: $(".received")[0].innerText,
                    paid_by: payment,
                    change: $(".surplus")[0].innerText,
                    table: "<?php echo $table ?>",
                    type: "<?php echo $type ?>",
                    order_id: "<?php echo $Order_detail['Order']['id'] ?>",
                    card_val: $("#card_val").val(),
                    membercard_id: $("#membercard_id").val(),
                    membercard_val: $("#membercard_val").val(),
                    cash_val: $("#cash_val").val(),
                    tip_val: $("#tip_val").val(),
                    tip_paid_by: $("#tip_paid_by").val(),
                },
                success: function (html) {
                    $(".alert-warning").hide();
                    // $(".reprint").trigger("click");
                    $.ajax({
                        url: "<?php echo $this->Html->url(array('controller' => 'pay', 'action' => 'printReceipt')); ?>",
                        type: "post",
                        data: {
                            order_no: "<?php echo $Order_detail['Order']['order_no']; ?>",
                        },
                        success: function (html) {
                            window.location = "<?php echo $this->Html->url(array('controller' => 'homes', 'action' => 'dashboard')); ?>";
                        }
                    })
                },
                beforeSend: function () {
                    $(".RIGHT-SECTION").addClass('load1 csspinner');
                    $(".alert-warning").show();
                }
            })
        })

      $("#change_table").click(function(){
        alert("换桌");
        //$("#show_modal").css({ 'display': "block" });
      })

    });
    </script>
  </body>
