<div class="container">
    <div class="loginpage clearfix">

	<div class="login-logo"><center><?php echo $this->Html->image('login-logo.jpg', array('class' => 'img-responsive', 'alt' => 'POS', 'title' => 'POS')); ?></center></div>

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('Cashier', array('type' => 'POST')) ?>
	<div class="form-group">
	    <div class="form-round"><i class="fa fa-user" aria-hidden="true"></i></div>

	    <?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => __('User Name'), 'required' => 'required', 'class' => 'form-control', 'div' => false, 'label' => false)) ?>

	</div>
	<div class="form-group">
	    <div class="form-round"><i class="fa fa-lock" aria-hidden="true"></i></div>
	    <?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => __('Password'), 'required' => 'required', 'class' => 'form-control', 'div' => false, 'label' => false)) ?>

	</div>
	<div class="text-center"><button type="submit" class="btn"><?php echo __('Sign in') ?></button></div>
	<div class="text-center">
		<button type="button" class="btn attend" style="background-color:#FFBD9D" data-toggle="modal" data-target="#modal_checkin"><?php echo __('Checkin') ?></button>
		
	</div>
	
	<div class="text-center forget-txt">
		<a href="<?php echo $this->Html->url(array('plugin' => false,'controller' => 'homes','action' => 'forgot_password')); ?>"><?php echo __('Forgot your password?') ?></a></div>
	<?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="modal fade clearfix" id="modal_checkin" role="dialog">
   <div class="modal-dialog modal-lg" style="width:500px">
       <div class="modal-content clearfix">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4>Check in</h4>
           </div>
           <div class="modal-body clearfix">
               <input id="checkin-id" type="text" maxlength="100" style="font-size:25px;height:38px" />
           </div>
           <div class="modal-footer clearfix">
               
               <button type="button" id="btn-checkin" class="pull-right btn btn-lg btn-success" data-dismiss="modal">OK 确认</button>
           </div>
       </div>
   </div>
</div>

<div id="member">
      <div class="member-top">
        <button type="button" class="member-btn">新&nbsp;增</button>
        <h2>会员列表</h2>
        <img src="images/icon-06.png" alt="关闭弹出层" class="member-close" />
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
          <img src="images/icon-07.png" alt="关闭新增会员" class="member-close1" />
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
          <img src="images/icon-07.png" alt="关闭会员详情" class="member-close2" />
          <h2>会员页面</h2>
          <button type="button" class="member-btn1">信息修改</button>
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
          <img src="images/icon-07.png" alt="关闭新增会员" class="member-close3" />
          <h2>会员充值历史记录</h2>
          <img src="images/icon-06.png" alt="关闭弹出层" class="member-close4" />
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
          <img src="images/icon-07.png" alt="关闭会员详情" class="member-close5">
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
            <a href="javascript:;"><img src="images/c1.png"></a>
          </li>
          <li>
            <a href="javascript:;"><img src="images/c2.png"></a>
          </li>
          <li>
            <a href="javascript:;"><img src="images/c3.png"></a>
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
echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js'));
echo $this->fetch('script');
?>


<script type="text/javascript" charset="utf-8">

$(document).ready( function(){

    $("#modal_checkin").on('shown.bs.modal', function () {
          $("#checkin-id").focus();
    }) ; 

    $('#btn-checkin').on('click', function() {
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'homes', 'action' => 'checkin')); ?>",
            method: "post",
            data: { userid: $("#checkin-id").val() },
            success: function(html){ 
            	alert(html);
            	$("#checkin-id").val("");
            }
        })
    });

});

// 会员
      $(".member").on("click",function(){
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

</script>