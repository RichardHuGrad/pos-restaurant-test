
   <header>

        <?php echo $this->Html->css(array('style'));  ?>
        <?php echo $this->Html->css(array('jianpan'));  ?>
    </header>
    <div class="container">
      <!-- 头部 -->
      <div class="header">
  
        <!-- logo -->
        <?php echo $this->Html->image('logo-pos.png', array( 'alt' => 'logo', 'class' => 'logo')); ?>
        <!-- <img src="img/logo-pos.png" alt="logo" class="logo" /> -->
        <!-- 导航 -->

        <ul class="nav">
          <li><a href="index.html" class="nav-a">主页</a></li>
          <li class="barnav">
            <a href="javascript:;" class="nav-a">语言</a>
            <ul style="display: none;">
              <li><a href="javascript:;" class="switch-lang">English</a></li>
              <li><a href="javascript:;" class="switch-lang">中文</a></li>
            </ul>
          </li>
          <li><a href="javascript:;" class="nav-a member" data-toggle="modal" data-target="#modal_member_search">会员</a></li>

          <!-- <li><a onclick="paidui();" class="nav-a">排队</a></li>
          <li><a onclick="quhao();"class="nav-a">取号</a></li> -->
        </ul>

        <div class="modal" id="modal_member_search" role="dialog" hidden="true">
           <div class="modal-dialog modal-lg" style="width:400px">
               <div class="modal-content clearfix">
                   <div class="modal-header">
                       <button type="button" data-dismiss="modal" class="member_btn_close"><?php echo __('Close'); ?></button>
                       <h4><?php echo __('Member'); ?></h4>
                       <button type="button" data-dismiss="modal" id="member_btn_add"><?php echo __('Add'); ?></button>
                   </div>
                   <div class="modal-body clearfix">
                      <div class='row'>
                        <div class='col-sm-12'>
                            <input id="member_search_input" type="text" style="font-size:25px;height:38px" placeholder='Card Number/ID/Name/Phone Number' />
                            <input id="member_search_next" type="hidden" value="" />
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-sm-4'><?php echo __('Card Number'); ?></div>
                        <div class='col-sm-4'><?php echo __('ID'); ?></div>
                        <div class='col-sm-4'><?php echo __('Amount'); ?></div>
                      </div>
                      <div class='row' id='mbm_sch_list'>
                        <div class='col-sm-12'>
                        </div>
                      </div>
                   </div>
               </div>
           </div>
       </div>

        <?php echo $this->Html->image('nav.png', array( 'class' => 'smalllogo', 'alt' => 'pad菜单')); ?>
        <!-- <img src="images/nav.png" class="smalllogo" alt="pad菜单" /> -->
        <!-- 登录按钮 -->
        <div class="login_right">
          <button type="button" name="button" onclick="loginout(this);">登出</button>
          <span>管理员</span>
        </div>
      </div>
      <!-- 主体 -->
         <?php echo $this->Session->flash(); ?>
      <div class="content">
        <div class="content_left">
          
          <div class="c_area">
            <!-- 提示 -->
            <div class="prompt c1" style="display: none;">
              <span>错误：请重新选择</span>
               <?php echo $this->Html->image('icon-02.png', array( 'alt' => '关闭提示')); ?>
              <!-- <img src="images/icon-02.png" alt="关闭提示" /> -->
            </div>
            <!-- 占桌情况 -->

            <div class="sit">
              <!-- li的class为sit_no是未支付，sit_yes是已付款，
                       sit_dan是已打单, sit_kong是空桌 -->
              <!-- 未加class的li是空白 -->
              <ul class="sit_left">
                    <?php
                        $dine_table = @explode(",", $tables['Admin']['table_size']);
                        $dine_table_order = @$tables['Admin']['table_order']?@json_decode($tables['Admin']['table_order'], true):array();
    
                      for($i = 0; $i < $tables['Admin']['no_of_tables']; $i++) {
                          @$table_size[$i]=explode(",",@$table_size[$i]);
                        if(@$table_size[$i][1]==""){
                          @$table_numbers.= @$table_size[$i][0].",";
                          
                        }?>
                        <?php

                        if(@$table_size[$i][1]!="" && @$table_size[$i][1]=="A"){
                      ?>
                      <li class="sit_kong" id="table_<?php echo @$dine_table[$i]<=9?'0'.@$dine_table[$i]:@$dine_table[$i]; ?>" onclick="number(this)">
                      <?php }else if(@$table_size[$i][1]!="" && @$table_size[$i][1]=="N"){?>
                      <li class="sit_no"  id="table_<?php echo @$dine_table[$i]<=9?'0'.@$dine_table[$i]:@$dine_table[$i]; ?>" onclick="number(this)">
                       <span id="tableStatus" style="display: none;"><?php echo @$table_size[$i][1];?></span>
                      <?php }else if(@$table_size[$i][1]!="" && @$table_size[$i][1]=="P"){?>
                        <li class="sit_yes"  id="table_<?php echo @$dine_table[$i]<=9?'0'.@$dine_table[$i]:@$dine_table[$i]; ?>" onclick="number(this)">
                        <span id="tableStatus" style="display: none;"><?php echo @$table_size[$i][1];?></span>
                      <?php }else if(@$table_size[$i][1]!="" && @$table_size[$i][1]=="R"){?>
                        <li class="sit_dan"  id="table_<?php echo @$dine_table[$i]<=9?'0'.@$dine_table[$i]:@$dine_table[$i]; ?>" onclick="number(this)">
                        <span id="tableStatus" style="display: none;"><?php echo @$table_size[$i][1];?></span>
                      <?php }else if(@$table_size[$i][1]==""){?>
                      <li onclick="number(this)"  class="sit_kong"  id="table_<?php echo @$dine_table[$i]<=9?'0'.@$dine_table[$i]:@$dine_table[$i]; ?>">
                      <span id="tableStatus" style="display: none;"><?php echo @$table_size[$i][1];?></span>
                      <?php }?>
                     
                      <p id="ycorder_no" style="display: none;"><?php echo @$orders_no[$table_size[$i][0]]['D'];?></p>
                        <div class="sit-title" id="money1"><span>$</span><?php echo @round($orders_total[$orders_no[$table_size[$i][0]]['D']], 2)? @round($orders_total[$orders_no[$table_size[$i][0]]['D']], 2):'0.00';?></div>
                        <div class="sit-time" id="time1">
                          <!-- 占桌时间 -->
                          <span><?php echo @$orders_time[$i]['D']?date("h:i:sa", strtotime(@$orders_time[$i]['D'])):"0:00" ?></span>
                          
                          <p><small>No.</small><b><?php echo @$dine_table[$i]<=9?"0".@$dine_table[$i]:@$dine_table[$i]; ?></b></p>
                        </div>
                      </li>
                      
                    <?php }?>
                      <div id="tables" style="display: none;"><?php echo @$table_numbers;?></div>
              </ul>
            </div>
          </div>
          
          <!-- 状态 -->
           <div class="static">
             <h4>状态栏</h4>
             <ul>
               <li><span></span>空桌</li>
               <li><span></span>未支付</li>
               <li><span></span>已付款</li>
               <li><span></span>已打单</li>
             </ul>
             <p>现在时间 <?php echo date("Y/m/d H:i", @$time)?></p>
           </div>
        </div>

        <!-- 右侧外卖送餐 -->
        <div class="content_right">
          <div class="c_right_title">
           <?php echo $this->Html->image('icon-02.png', array( 'alt' => '关闭外卖','class'=>'wclose')); ?>
            <!-- <img src="images/icon-02.png" alt="关闭外卖" class="wclose" /> -->
            <div class="p"><small>外卖送餐</small><span>2</span></div>
            <div class="fullOrder">
            	<!-- <img src="images/fullOrder.png" class="img"/> -->
              <?php echo $this->Html->image('fullOrder.png', array( 'class'=>'img')); ?>
            	<ul>
            		<li class="on">全部订单</li><li>外卖</li><li>自取</li>
            	</ul>
            </div>
            <div class="ulBox">
	            <ul class="order">
	           <?php for($i=0;$i< count(@$takeway_tables_key);$i++){
                 
              ?>
                <li>
                  <h4><?php echo @$takeway_tables_key[$i];?></h4>
                  <div class="order_content">
                    <div class="order_left">
                      <p><?php echo @$orders_no[$takeway_tables_key[$i]]["T"];?></p>
                      <p>$ <?php echo @$orders_total[$orders_no[$takeway_tables_key[$i]]['T']];?></p>
                    </div>
                    <div class="order_right"><?php echo @$orders_time[$takeway_tables_key[$i]]['T']?date("H:i", strtotime(@$orders_time[$takeway_tables_key[$i]]['T'])):"" ?></div>
                  </div>
                </li>
                <?php }?> 

                <?php for($i=0;$i< count(@$waiting_tables_key);$i++){
                 
              ?>
                <li>
                  <h4><?php echo @$waiting_tables_key[$i];?></h4>
                  <div class="order_content">
                    <div class="order_left">
                      <p><?php echo @$orders_no[$waiting_tables_key[$i]]["T"];?></p>
                      <p>$ <?php echo @$orders_total[$orders_no[$waiting_tables_key[$i]]['T']];?></p>
                    </div>
                    <div class="order_right"><?php echo @$orders_time[$waiting_tables_key[$i]]['T']?date("H:i", strtotime(@$orders_time[$waiting_tables_key[$i]]['T'])):"" ?></div>
                  </div>
                </li>
                <?php }?>

	      
	            </ul>
	            <ul class="order">
         
                <?php for($i=0;$i< count(@$waiting_tables_key);$i++){
                 
              ?>
                <li>
                  <h4><?php echo @$waiting_tables_key[$i];?></h4>
                  <div class="order_content">
                    <div class="order_left">
                      <p><?php echo @$orders_no[$waiting_tables_key[$i]]["T"];?></p>
                      <p>$ <?php echo @$orders_total[$orders_no[$waiting_tables_key[$i]]['T']];?></p>
                    </div>
                    <div class="order_right"><?php echo @$orders_time[$waiting_tables_key[$i]]['T']?date("H:i", strtotime(@$orders_time[$waiting_tables_key[$i]]['T'])):"" ?></div>
                  </div>
                </li>
                <?php }?>

	         
	            </ul>
	            <ul class="order">
                   <?php for($i=0;$i< count(@$takeway_tables_key);$i++){
                 
              ?>
                <li>
                  <h4><?php echo @$takeway_tables_key[$i];?></h4>
                  <div class="order_content">
                    <div class="order_left">
                      <p><?php echo @$orders_no[$takeway_tables_key[$i]]["T"];?></p>
                      <p>$ <?php echo @$orders_total[$orders_no[$takeway_tables_key[$i]]['T']];?></p>
                    </div>
                    <div class="order_right"><?php echo @$orders_time[$takeway_tables_key[$i]]['T']?date("H:i", strtotime(@$orders_time[$takeway_tables_key[$i]]['T'])):"" ?></div>
                  </div>
                </li>
                <?php }?> 
            
              </li>
            </ul>
          	</div>
          </div>
        </div>
      </div>
    </div>
    <!-- 外卖按钮 -->
    <button type="button" name="button" class="wbtn">外卖送餐</button>


    <!-- 管理员,虚拟键盘 -->
    <div class="key" id="key_admin">
    <?php echo $this->Html->image('icon-14.png', array('alt'=>'关闭虚拟键盘' ,'class'=>'key_img')); ?>
      <!-- <img src="images/icon-14.png" alt="关闭虚拟键盘" class="key_img" /> -->
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

        <li class="no b6"></li>
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
    <!-- 弹出层 -->


    <div class="model model1">
      <div class="model-title" >堂食 NO.<span id="tanchu"></span></div>
       <?php echo $this->Html->image('icon-06.png', array('alt'=>'关闭弹出层','class'=>'model-close')); ?>

      <!-- <img src="images/icon-06.png" alt="关闭弹出层" class="model-close" /> -->
      <ul class="model-content">
        
        <li>
          <a onclick="dingdan(this)">
            <div class="model-img"></div>
            <span>订单</span>
          </a>
        </li>
        <li>
          <a onclick="fukuan(this)">
            <div class="model-img"></div>
            <span>付款</span>
          </a>
        </li>
        <li class="model-nav3">
          <a>
            <div class="model-img"></div>
            <span>换桌</span>
          </a>
        </li>
        <li class="model-nav4">
          <a tabindex="-1" href="<?php 
          
          for($i = 1; $i <= $tables['Admin']['no_of_tables']; $i++) { 
              if(@$dinein_tables_status[$i] == 'N' or @$dinein_tables_status[$i] == 'P')
                echo "javascript:makeavailable('".$this->Html->url(array('controller'=>'homes', 'action'=>'makeavailable', 'table'=>$i, 'type'=>'D', 'order'=>@$orders_no[$i]['D']))."');"; else echo "javascript:void(0);";
          } 
          ?>">
          <div class="model-img"></div>
          <span><?php echo __('Clear Table'); ?></span></a>
        </li>
        <li class="model-nav5">
          <a href="javascript:;">
            <div class="model-img"></div>
            <span><?php echo __('Merge Bill'); ?></span>
          </a>
        </li>
        <li>
          <a onclick="Split(this)">
            <div class="model-img"></div>
            <span>分单</span>
          </a>
        </li>
        <li>
          <a onclick="Histroy(this)">
            <div class="model-img"></div>
            <span>历史订单</span>
          </a>
        </li>
        <li>
          <a onclick="Receipt(this)">
            <div class="model-img"></div>
            <span>打印账单</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- 弹出层，变更 -->
 
    <div class="model model2">
      <div class="model-title" >堂食 NO.<span id="huanzhou1"></span> 变更为</div>
       <?php echo $this->Html->image('icon-06.png', array('alt'=>'关闭弹出层','class'=>'model-close')); ?>
      <!-- <img src="images/icon-06.png" alt="关闭弹出层" class="model-close" /> -->
      <div class="model2-content">
        <input type="text" name="" placeholder="堂食" class="model-input" />
        <ul class="tang1" id="Changed">
         <!--  <?php 
            $table_numbers=explode(",",trim($table_numbers,","));
            
            for($l=0;$l< count($table_numbers);$l++){ ?>
               
             <li><a href="javascript:;" onclick="ChangeTable(this)"><?php echo $table_numbers[$l]<=9 ? "0".$table_numbers[$l]:$table_numbers[$l]; ?></a></li>
           <?php }?> -->
         
        </ul>
      
      </div>
    </div>
    <!-- 弹出层，合单 -->
    <div class="model model3">
      <div class="model-title" >堂食 NO.01 合并为</div>
      <?php echo $this->Html->image('icon-06.png', array('alt'=>'关闭弹出层','class'=>'model-close')); ?>
      <!-- <img src="images/icon-06.png" alt="关闭弹出层" class="model-close" /> -->
      <div class="model3-content">
        <input type="text" name="" placeholder="堂食" class="model-input" />
        <ul class="tang1">
          <?php
                  $dinein_tables_keys = array_keys($dinein_tables_status);
                  for ($t = 0; $t < count(@$dinein_tables_status); $t++) {
                      if (@$dinein_tables_status[$dinein_tables_keys[$t]] == "N" && $dinein_tables_keys[$t] != $i) {
                          ?>
                          <li><a href="javascript:;"><?php echo $dinein_tables_keys[$t]; ?></a></li>
                          <?php
                      }
                  }
                  ?>
        </ul>
      </div>
      <button type="button" class="model3_btn">确认合并</button>
    </div>

    <div id="dialog">
      <p>密码解锁</p>
      <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="login-password" type="password"  class="EntPassword form-control adminInp" placeholder="password" aria-describedby="sizing-addon1"/>
      </div>
      
      <input type="hidden" id="url" value="" />
      
      <div class="admin-btn">
        <button type="button" class="a_no" value="Cancel" onclick="checkPasswordC()">取消</button>
        <button type="button" class="a_yes" value="Enter" onclick="checkPassword('<?php echo $admin_passwd[0]['admins']['password']?>')">输入</button>
      </div>
    </div>


    <!-- 弹出层，会员 -->
    <div id="member">
      <div class="member-top">
        <button type="button" class="member-btn">新&nbsp;增</button>
        <h2>会员列表</h2>
        <?php echo $this->Html->image('icon-06.png', array('alt'=>'关闭弹出层','class'=>'member-close')); ?>
        <!-- <img src="images/icon-06.png" alt="关闭弹出层" class="member-close" /> -->
      </div>
      <div class="member-bot">
        <input type="text" name="" class="member-input" placeholder="搜索卡号/ID/姓名/电话" />
        <p>
          <span>Card Number</span>
          <span>ID</span>
          <span>Amount</span>
        </p>
        <ul class="memberLi">
          <li>
            <a href="javascript:;">
              <span>10001</span>
              <span>ABC123</span>
              <span>$558</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <span>10002</span>
              <span>ABC123</span>
              <span>$558</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <span>10003</span>
              <span>ABC123</span>
              <span>$558</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- 新增会员 -->
      <div class="add_member">
        <div class="member-top">
        <?php echo $this->Html->image('icon-07.png', array('alt'=>'关闭新增会员','class'=>'member-close1')); ?>
          <!-- <img src="images/icon-07.png" alt="关闭新增会员" class="member-close1" /> -->
          <h2>添加新会员</h2>
        </div>
        <div class="member-center"><b>会员ID</b>ABC123</div>
        <div class="add_bot">
          <label>Card Number</label>
          <input type="text" name="" placeholder="请添加备注信息" />
          <label>Name</label>
          <input type="text" name="" placeholder="请添加备注信息" />
          <label>Phone Number</label>
          <input type="text" name="" placeholder="请添加备注信息" />
          <label>Note</label>
          <input type="text" name="" placeholder="请添加备注信息" />
        </div>
        <button type="button" class="add_btn">保存信息</button>
      </div>
      <!-- 会员详情 -->
      <div class="xiang_member">
        <div class="member-top">
        <?php echo $this->Html->image('icon-07.png', array('alt'=>'关闭会员详情','class'=>'member-close2')); ?>
          <!-- <img src="images/icon-07.png" alt="关闭会员详情" class="member-close2" /> -->
          <h2>会员页面</h2>
        </div>
        <div class="member-bot">
          <p>
            <span>Card Number</span>
            <span>ID</span>
            <span>Amount</span>
          </p>
          <p class="p_color">
            <span>10001</span>
            <span>ABC123</span>
            <span>Nan</span>
          </p>
          <p class="p_span">
            <span>Phone</span>
            <span>Note</span>
          </p>
          <p class="p_color p_span">
            <span>647-123-4567</span>
            <span>聚餐 家庭 面食 少盐</span>
          </p>
          <div class="p_back">
            <p class="p_color p_span">
              <span>单号：D51710171215</span>
              <span>2017/12/2 15:58</span>
            </p>
            <p class="p_color p_span">
              <span>账单金额<small>$44.5</small></span>
              <span>支付：<small>$50</small></span>
            </p>
            <p class="p_color p_span">
              <span>账单金额<small>$449</small></span>
              <span></span>
            </p>
          </div>
          <div class="p_back">
            <p class="p_color p_span">
              <span>单号：D51710171215</span>
              <span>2017/12/2 15:58</span>
            </p>
            <p class="p_color p_span">
              <span>账单金额<small>$44.5</small></span>
              <span>支付：<small>$50</small></span>
            </p>
            <p class="p_color p_span">
              <span>账单金额<small>$449</small></span>
              <span></span>
            </p>
          </div>
          <div class="p_back">
            <p class="p_color">
              <span>总消费<small>$449</small></span>
              <span>总充值<small>$449</small></span>
              <span>账户余额<small>$449</small></span>
            </p>
          </div>
        </div>
        <div class="x_btn">
          <button type="button" class="xiang_btnL">会员充值</button>
          <button type="button" class="xiang_btnR">查看充值记录</button>        
        </div>
      </div>
      <!-- 充值记录 -->
      <div class="chong_member">
        <div class="member-top">
        <?php echo $this->Html->image('icon-07.png', array('alt'=>'关闭新增会员','class'=>'member-close3')); ?>
          <!-- <img src="images/icon-07.png" alt="关闭新增会员" class="member-close3" /> -->
          <h2>会员充值历史记录</h2>
          <?php echo $this->Html->image('icon-06.png', array('alt'=>'关闭弹出层','class'=>'member-close4')); ?>
          <!-- <img src="images/icon-06.png" alt="关闭弹出层" class="member-close4" /> -->
        </div>
        <div class="member-bot">
          <p>
            <span>充值时间</span>
            <span>充值余额</span>
            <span>类型</span>
          </p>
          <ul class="memberLi">
            <li>
              <a href="javascript:;">
                <span>2018/05/08</span>
                <span>$558</span>
                <span>现金</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- 弹出层，会员充值 -->
    <div id="member_C">
      <div class="c_member">
        <div class="member-top">
        <?php echo $this->Html->image('icon-07.png', array('alt'=>'关闭会员详情','class'=>'member-close5')); ?>
          <!-- <img src="images/icon-07.png" alt="关闭会员详情" class="member-close5"> -->
          <h2>会员充值页面</h2>
        </div>
        <div class="member-bot">
          <label>充值信息</label>
          <p>
            <span>Card Number</span>
            <span>ID</span>
            <span>Amount</span>
          </p>
          <p class="p_color">
            <span>10001</span>
            <span>ABC123</span>
            <span>Nan</span>
          </p>
        </div>
        <ul class="payM">
          <li class="active-li">
            <a href="javascript:;"><?php echo $this->Html->image('c1.png'); ?><!-- <img src="images/c1.png"> --></a>
          </li>
          <li>
            <a href="javascript:;"><?php echo $this->Html->image('c2.png'); ?><!-- <img src="images/c2.png"> --></a>
          </li>
          <li>
            <a href="javascript:;"><?php echo $this->Html->image('c3.png'); ?><!-- <img src="images/c3.png"> --></a>
          </li>
        </ul>
        <button type="button" class="c_btn">确认充值</button>
      </div>
      <div class="r_member">
        <div class="formkey">
          <input type="text" value="" class="keyboard" placeholder="0.00">
          <!-- 左侧数字 -->
          <ul class="num_left">
            <li class="num" style="height: 112px; line-height: 112px;">1</li>
            <li class="num" style="height: 112px; line-height: 112px;">2</li>
            <li class="num" style="height: 112px; line-height: 112px;">3</li>
            <li class="num" style="height: 112px; line-height: 112px;">4</li>
            <li class="num" style="height: 112px; line-height: 112px;">5</li>
            <li class="num" style="height: 112px; line-height: 112px;">6</li>
            <li class="num" style="height: 112px; line-height: 112px;">7</li>
            <li class="num" style="height: 112px; line-height: 112px;">8</li>
            <li class="num" style="height: 112px; line-height: 112px;">9</li>
            <li class="empty" style="height: 112px; line-height: 112px;">清空</li>
            <li class="num" style="height: 112px; line-height: 112px;">0</li>
            <!--<li class="retreat" style="height: 112px; line-height: 112px;">后退</li>-->
            <li class="num" style="height: 112px; line-height: 112px;">.</li>
          </ul>
          <!-- 右侧操作 -->
          <div class="num_right">
            <a href="javascript:;" class="payde" style="padding-top: 75px; padding-bottom: 75px;">默认<br>金额</a>
            <a href="javascript:;" class="paymo" style="padding-top: 75px; padding-bottom: 75px;">输入</a>
          </div>
        </div>
      </div>
    </div>
    <!-- 充值成功 -->
    <div id="mer" >
      <p>充值已成功!</p>
      <div class="p_back">
        <span>充值金额<small>$44.5</small></span>
        <span>账户余额<small>$44.5</small></span>
      </div>
    </div>
    <!-- 充值未成功 -->
    <div id="mer1">
      <p>余额不足!</p>
      <div class="p_back">
        <span>应付金额<small>$44.5</small></span>
        <span>账户余额<small>$44.5</small></span>
      </div>
    </div>

    


        <?php
          echo $this->Html->script(array('jquery.js', 'keyboard.js'));

          echo $this->fetch('script');
        ?>

    <!-- Modal -->
    

    <script type="text/javascript">

      $('.switch-lang').on('click', function() {
          $.ajax({
              url: "<?php echo $this->Html->url(array('controller' => 'homes', 'action' => 'switchLang')); ?>",
              method: "post",
              data: {
                  lang: $(this).data('lang')
              },
              success: function(html) {
                  // reload the page
                  location.reload();
              }
          })
          // console.log("click");
      });


      function mergebill(tableId) {
          var table_merge = "";
          $('input[name="mergetable[]"]:checked').each(function () {
             table_merge += $(this).val()+",";
              $(this).attr("checked",false);
          });
          table_merge = table_merge.substring(0,(table_merge.length-1));

          document.location = "../merge/index/table:"+tableId+"/tablemerge:"+table_merge+"/type:D";

      }

      function makeavailable(url){
          $("#dialog").show();
          $(".EntPassword").val("");
          $('#url').val(url);
      }



      function checkPassword(passwd){
            // $('#dialog').hide();
       // var pwd_makeavailable = hex_md5($(".EntPassword").val());
            
          document.location = $('#url').val();
            
                // alert("Your password is incorrect!");
          $('.popPassword .input-group-addon').notify("Your password is incorrect!", {position: "top", className: "error"});
           
      }
    
      function checkPasswordC(){
          $('#dialog').hide();
      }


      tables=$("#tables").html();
      // console.log(tables);
    	//外卖订单切换
    	$(".fullOrder li").click(function(){
    		$(this).addClass("on").siblings().removeClass("on");
    		var i = $(this).index();
    		$(".ulBox").find("ul").eq(i).show().siblings().hide();
    	})

      //会员
      function huiyuan(){
        alert("This function is temporarily unopened.");
      }
      
      function loginout(that){
        var tiaozhuan = '<?php echo $this->Html->url(array("controller" => "homes", "action" => "logout")) ?>';

        window.location.href=tiaozhuan;
      }

// 换桌方面的js

      function number(that){
        table_number="";
        var str_table="";
        table_number=$(that).children("div").next().children("P").children("b").html();
        tableStatus=$(that).children("span").html();
        // tables0=tables.substring(0,tables.Length-1);
        tables1=tables.split(",");
        for(var i=0;i< tables1.length-1;i++){
          if(tables1[i]<=9){
            tables1[i]="0"+tables1[i];
          }
          str_table +='<li><a href="" onclick="ChangeTable(this)">'+tables1[i]+'</a></li>';
        }
          // str_table = str_table.replace(/table/i,tables1[i]);
           //  
         
        var str="";
        var str1="";

        order_no=$(that).children("P").html();
        str1=table_number;
        $("#huanzhou1").html(table_number);
        $("#tanchu").html(str1);
        $("#Changed").html(str_table);

      }


      // 订单
      function dingdan(that){
        var table_num=$("#tanchu").html();
        var tiaozhuan = '<?php echo $this->Html->url(array("controller"=>"order", "action"=>"index","table"=>"table_num", "type"=>"D")); ?>';
        tiaozhuan = tiaozhuan.replace(/table_num/i,table_num);
        window.location.href=tiaozhuan;
      }  
        // 订单
      function Histroy(that){
        var table_num=$("#tanchu").html();

       var hisorder = '<?php echo $this->Html->url(array("controller"=>"homes", "action"=>"tableHistory","table_no"=>"table_num")); ?>';
        hisorder = hisorder.replace(/table_num/i,table_num);
        window.location.href=hisorder;
      }
      // 付款
      function fukuan(that){
        if(!order_no){
          alert("no order");
        }else{
          var table_num=$("#tanchu").html();
      
          var fukuan = '<?php echo $this->Html->url(array("controller"=>"pay", "action"=>"index","table"=>"table_num", "type"=>"D")); ?>';
          fukuan = fukuan.replace(/table_num/i,table_num);
          window.location.href=fukuan;
        }
       
      }
      // 打印收据
      function Receipt(that){
        if(!order_no){
          alert("no order");
        }else{
          if (tableStatus!="P") {

            var table_num=$("#tanchu").html();
            var receipt = '<?php echo $this->Html->url(array("controller"=>"pay", "action"=>"printBill","order"=>"order_no", "type"=>"D")); ?>';
            receipt = receipt.replace(/order_no/i,order_no);
            window.location.href=receipt;
          }
        }
       
      }
      // 分单
        function Split(that){
        if(!order_no){
          alert("no order");
        }else{
          if(tableStatus!= "N"  &&　tableStatus != "R"){

            var table_num=$("#tanchu").html();
            // console.log(tableStatus);
            // echo $this->Html->url(array('controller'=>'split', 'action'=>'index', 'table'=>$i, 'type'=>'D', 'split_method' =>'1'))
            var Split = '<?php echo $this->Html->url(array("controller"=>"split", "action"=>"index","table"=>"table_num","split_method"=>"1", "type"=>"D")); ?>';
            Split = Split.replace(/table_num/i,table_num);
            window.location.href=Split;
          }else{
            alert("Order status is not allowed.");
          }
        }
       
      }
    
  

      function ChangeTable(that){
        if(!order_no){
          alert("no order!");
        }else{


        var table_s=$(that).html();    //要还的桌号
        var table_class1 = $("li#table_"+table_number).attr("class"); //获取p元素的class 
        var table_class2 = $("li#table_"+table_s).attr("class"); //获取p元素的class 

        var ycorder_no=$("li#table_"+table_number).children("p").html();   //订单号
        var money=$("li#table_"+table_number).children("p").next("div").html();   //订单号
        var time1=$("li#table_"+table_number).children("p").next("div").next("div").children("span").html();   //订单号

        var ycorder_no2=$("li#table_"+table_s).children("p").html();   //订单号
        var money2=$("li#table_"+table_s).children("p").next("div").html();   //订单号
        var time2=$("li#table_"+table_s).children("p").next("div").next("div").children("span").html();   //订单号
      
           $.ajax({
            type: "POST",
            url: "<?= $this->Html->url(array('controller' => 'homes', 'action' => 'move_order')); ?>",
            data: {"table": table_s,"order_no":order_no},
            dataType: 'json',
              success: function(data) {
                $("li#table_"+table_number).removeClass(table_class1); //获取p元素的class 
                $("li#table_"+table_s).addClass(table_class1); //获取p元素的class 
                $("li#table_"+table_number).addClass(table_class2); //获取p元素的class 
                $("li#table_"+table_s).children("p").html(ycorder_no);
                $("li#table_"+table_number).children("p").html(ycorder_no2);

                $("li#table_"+table_s).children("p").next("div").html(money);
                $("li#table_"+table_number).children("p").next("div").html(money2);

                $("li#table_"+table_s).children("p").next("div").next("div").children("span").html(time1);
                $("li#table_"+table_number).children("p").next("div").next("div").children("span").html(time2);

                $("li#table_"+table_s).children("p").next("div").next("div").children("p").children("b").html(table_s);
                $("li#table_"+table_number).children("p").next("div").next("div").children("p").children("b").html(table_number);

                $(".model1").hide();$(".model2").hide();
              
            }
        });
         }
      }
// 换桌结束
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
          winH1 = $(window).height() - 155 -22;//100是导航，55是状态栏 22是上padding
      $(".content").css("height",winH+"px");
      $(".c_area").css("height",winH1+"px");

      $(".wbtn").on("click",function(){
        $(".content_right").animate({width:"40%"});
      });
      $(".wclose").on("click",function(){
        $(".content_right").animate({width:"0"});
      });

      $(".prompt img").on("click",function(){
        $(this).parent().css("display","none");
      });
      // 弹出层
      $(".model-close").on("click",function(){
        $(this).parents(".model").hide();
      });
      var $_this;
      $(".sit_no,.sit_yes,.sit_dan,.sit_kong,.sit_bai").on("click",function(){
        $_this = $(this);
        $(".model1").show();
      });
      // 变更
      $(".model-nav3").on("click",function(){
        // $(".model1").hide();
        $(".model2").show();
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
      // 变空桌
      // $(".model-nav4").on("click",function(){
      //   $(".model").hide();
      //   // $("#admin").addClass("adminCss").show();

      //   $.ajax({
      //         url: "<?php echo $this->Html->url(array('controller'=>'homes', 'action'=>'makeavailable', 'table'=>$i, 'type'=>'D', 'order'=>@$orders_no[$i]['D'])); ?>",
      //         type: "post",
              
      //         success: function(html) {
      //             // reload the page
      //             location.reload();
      //         }
      //     })
      // });
      
      // 回车,跳转到管理员界面      
      $(".return").on("click",function(){
        hrefG();
      });
      window.document.onkeydown= function(evt){
       evt = window.event || evt;
       if(evt.keyCode == 13){//如果取到的键值是回车
        hrefG();
       }
      }
      function hrefG(){
        var aVal = $("#write").val(),
            adminCss = $("#admin").attr("class");
        // 1是管理员解锁密码
        if(aVal == 1 && adminCss == null){ 
          // 跳转管理员界面
          window.location.href="admin.html";         
        }else if(aVal == 1 && adminCss == "adminCss"){
          // 变空桌
          alert("成功变空桌！");
          $("#admin,.key").hide();
          $("#write").val("");
          // 改变点击的li的class变成空桌的class名
          $_this.attr("class","sit_kong");
        }else{
          alert("解锁密码错误！");
        }
      }
     
     
      // 会员
      $(".member").on("click",function(){
        //return false;
        $("#member").show();
      });
      $(".member-close,.member-close4").on("click",function(){
        $("#member").hide();
        $(".chong_member,.xiang_member").animate({width:'0'},200);
      });
      // 新增会员
      $(".member-btn").on("click",function(){
        $(".add_member").animate({width:'100%'},300);
      });
      $(".member-close1").on("click",function(){
        $(".add_member").animate({width:'0'},200);
      });
      // 会员详情页
      $(".memberLi li").on("click",function(){
        $(".xiang_member").animate({width:'100%'},300);
      });
      $(".member-close2").on("click",function(){
        $(".xiang_member").animate({width:'0'},200);
      });
      // 充值记录
      $(".xiang_btnR").on("click",function(){
        $(".chong_member").animate({width:'100%'},200);
      });
      $(".member-close3").on("click",function(){
        $(".chong_member").animate({width:'0'},200);
      });
      var liW = parseFloat($(".r_member .num_left li").width()) ,
          liW1 = parseFloat($(".r_member .num_left li").width()*2 + 7),
          liW2 = parseInt((liW1 - 80)/2);
      $(".r_member .num_left li").css({"height":liW+"px","line-height":liW+"px"});
      $(".r_member .num_right a").css({"padding-top":liW2+"px","padding-bottom":liW2+"px"});

      // 输入密码
      $(".r_member .num_left li.num").on("click",function(){
        var inputVal = $(".r_member .keyboard").val(),
            $_this = $(this).html();
        $(".r_member .keyboard").val(inputVal+$_this);
      });
      // 清空
      $(".r_member .empty").on("click",function(){
        $(".r_member .keyboard").val("");
      });
      // 后退
      $(".r_member .retreat").on("click",function(){
        var leng = $(".r_member .keyboard").val().toString(),valIn = "";
        valIn = leng.substring(0,leng.length-1);
        $(".r_member .keyboard").val(valIn);
      });
      // 默认
      $(".r_member .payde").on("click",function(){
        // 365为现有的默认金额
        $(".r_member .keyboard").val(365);
      });
      // 会员充值
      $(".xiang_btnL").on("click",function(){
        var winW = $(window).width();
        if(winW > 768){
          $("#member_C").animate({width:'1000px'},200);
        }else{
          $("#member_C").animate({width:'760px',marginLeft:'-380px'},200);
          $(".c_member").css("width","380px");
          $(".r_member").css("width","320px");
        }
      });
      $(".member-close5").on("click",function(){
        $("#member_C").animate({width:'0'},200);
      });
      $(".payM li").click(function(){
      	$(this).addClass("active-li").siblings().removeClass('active-li');
      })
      // 充值情况
      $(".c_btn").on("click",function(){
        $("#mer").fadeIn();
        setTimeout(function(){
          $("#mer").fadeOut(1000);
        },1500);
      });
      // 合并
      $(".model-nav5").on("click",function(){
        $(".model3").show();
      });
      $(".model3 li").on("click",function(){
        $(this).toggleClass("hover");
      });
      $(".model3_btn").on("click",function(){
        var claB = $(".hover").length;
        if(claB > 1){
          window.location.href = "page5.html";
        }
      });
    });
    </script>
  </body>
</html>
