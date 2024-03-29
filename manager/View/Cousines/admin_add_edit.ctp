<?php
$option_status = array('A' => 'Active', 'I' => 'Inactive');
?>

<script type="text/javascript">

    $(document).ready(function() {

        $("#CousineRestaurantId").on("change", function() {
            $("#CousineCasierId").attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Html->url(array('plugin' => false, 'controller' => 'cousines', 'action' => 'get_cashiers')); ?>',
                data: 'locationid=' + $("#CousineRestaurantId").val(),
                success: function(data) {
                    $("#cancel_button").removeAttr('disabled');
                    $("#submit_button").removeAttr('disabled');
                    $("#CousineCasierId").removeAttr('disabled');
                    $("#CousineCasierId").html(data);
                }
            })
        });

    });
</script>

<div id="app">
    <!-- sidebar -->
    <?php echo $this->element('sidebar'); ?>
    <!-- / sidebar -->
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <?php echo $this->element('header'); ?>
        <!-- end: TOP NAVBAR -->
        <div class="main-content" >
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle"><?php echo ('' == $id) ? 'Add' : 'Edit'; ?> Cuisines</h1>
                        </div>                        
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- Global Messages -->
                <?php echo $this->Session->flash(); ?>
                <!-- Global Messages End -->
                <!-- start: FORM VALIDATION EXAMPLE 1 -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">   
                            <?php echo $this->Form->create('Cousine', array('method' => 'post', 'class' => 'form', 'role' => 'form', 'autocomplete' => 'off', 'type' => 'file'));
                            echo $this->Form->input('id', array('type' => 'hidden', 'required' => false)); ?>
                            <div class="row">
                                <?php

                                $is_super_admin = $this->Session->read('Admin.is_super_admin');
                                if('Y' == $is_super_admin){
                                ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Restaurant <span class="symbol required"></span></label>
                                            <?php echo $this->Form->input('restaurant_id', array('type' => 'select', 'options' => $restaurants, 'class' =>'form-control validate[required]', 'div' => false, 'empty'=>'Select Restaurant',  'label' => false, 'required' => false));
                                            ?>
                                        </div>
                                    </div>
                                <?php } else {
                                    echo $this->Form->input('restaurant_id', array('type' => 'hidden', 'value'=>$this->Session->read('Admin.id'), 'required' => false));
                                }?>
                                
                                <?php foreach ($languages as $key => $language){ ?>

                                <?php $readonly = ''; if (($key  == "zh") && ($remote_id)) $readonly = 1; ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Cousine Name (<?php echo $language; ?>)<span class="symbol required"></span></label>
                                            <?php 
                                            if ($readonly) {
                                            	echo $this->Form->input('CousineLocal.' . $key . '.name', array('type' => 'text', 'readonly' => 'readonly', 'maxlength' => '200', 'class' =>'form-control validate[required]', 'div' => false, 'label' => false, 'required' => false));
                                            } else {
                                            	echo $this->Form->input('CousineLocal.' . $key . '.name', array('type' => 'text', 'maxlength' => '200', 'class' =>'form-control validate[required]', 'div' => false, 'label' => false, 'required' => false));
                                            }
                                            echo $this->Form->input('CousineLocal.' . $key . '.id', array('type' => 'hidden', 'required' => false));
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Price <span class="symbol required"></span></label>
                                        <?php 
                                        if ($remote_id) {
                                        	echo $this->Form->input('price', array('type' => 'text', 'maxlength' => '5', 'class' =>'form-control validate[required]', 'readonly' => 'readonly', 'div' => false, 'label' => false, 'required' => false));
                                        } else {
                                        	echo $this->Form->input('price', array('type' => 'text', 'maxlength' => '5', 'class' =>'form-control validate[required]', 'div' => false, 'label' => false, 'required' => false));
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Configure Printer<span class="symbol required"></span></label>
                                        <?php  
                                            $printer=$pri;
                                            echo $this->Form->input('printer', array( 
                                                'multiple' => 'checkbox',
                                                'separator'=> '</div><div class="checkbox">',
                                                'before' => '<div class="checkbox" style="margin-left:20px;">',
                                                'after'  => '</div>',
                                                'div' => false, 
                                                'options' =>  $printer,
                                                'label' => false,
                                                "legend" => false,
                                                'selected' => $select1
                                               ), array('class'=>'validate[minCheckbox[1]] checkbox')
                                            );   
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Category <span class="symbol required"></span></label>
                                        <?php 
                                        if ($remote_id) {
                                        	echo $this->Form->input('category_id', array('type' => 'select', 'options' => $categories, 'class' =>'form-control validate[required]', 'readonly' => 'readonly', 'div' => false, 'empty'=>'Select Category',  'label' => false, 'required' => false));
                                        } else {
                                        	echo $this->Form->input('category_id', array('type' => 'select', 'options' => $categories, 'class' =>'form-control validate[required]', 'div' => false, 'empty'=>'Select Category',  'label' => false, 'required' => false));
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <?php echo $this->Form->input('status', array('options' => $option_status, 'class' => 'form-control', 'empty' => false, 'label' => false, 'div' => false)); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Server ID</label>
                                        <?php echo $this->Form->input('remote_id', array('type' =>'text', 'class' => 'form-control', 'label' => false, 'div' => false, 'required' => false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <?php echo $this->Form->input('image', array('type' => 'file', 'maxlength' => '200', 'class' => 'form-control', 'id' => 'image', 'div' => false, 'label' => false)); ?>
                                        <span id="beaconkey-error" class="help-block"></span>
                                    </div>                                                                              
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Comb Num <span class="symbol required"></span></label>
                                        <?php 
                                        if ($remote_id) {
                                            echo $this->Form->input('comb_num', array('options' => $option_comb, 'multiple' => true, 'class' =>'form-control', 'readonly' => 'readonly', 'empty' => false, 'label' => false, 'div' => false));
                                        } else {
                                            echo $this->Form->input('comb_num', array('options' => $option_comb, 'multiple' => true, 'class' =>'form-control', 'empty' => false, 'label' => false, 'div' => false));
                                        }
                                        ?>
                                    </div>
                                </div>
                                
        
                                <?php
                                if($id) {
                                 ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">&nbsp;</label>
                                            <?php if ($this->request->data['Cousine']['image']) { ?>
                                                <?php echo $this->Html->image(COUSINE_IMAGE_PATH . $this->request->data['Cousine']['image'], array('border' => 0, 'width' => 100)); ?>

                                                <!-- place delete image button here -->
                                                <a onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->Html->url(array('controller'=>'cousines', 'image'=>$this->request->data['Cousine']['image'], 'action'=>'deleteimage', 'admin' => true,'escape' => false, 'id' => base64_encode($this->request->data['Cousine']['id']))) ?>"><i class="fa fa-trash"></i></a>
                                            <?php } else { ?>
                                                <?php echo $this->Html->image('/img/no_image.jpg', array('border' => 0, 'width' => 100)); ?>
                                            <?php } ?>
                                        </div> 
                                    </div>
                                <?php }?>
                                

                            </div>
                
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <span class="symbol required"></span>Required Fields
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">                                        
                                </div>
                                <div class="col-md-5">
                                    <?php echo $this->Form->button('Save <i class="fa fa-arrow-circle-right"></i>',array('class' => 'btn btn-primary btn-wide pull-left_form','type' => 'submit','id' => 'submit_button'));

                                    echo $this->Html->link('Cancel <i class="fa fa-times-circle"></i>',
                                        array('plugin' => false,'controller' => 'cousines','action' => 'index', 'admin' => true),
                                        array('class' => 'btn btn-primary btn-wide pull-right', 'escape' => false)
                                    );
                                    ?>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <!-- end: FORM VALIDATION EXAMPLE 1 -->
            </div>
        </div>
    </div>
    <!-- start: FOOTER -->
   <?php echo $this->element('footer'); ?>
    <!-- end: FOOTER -->
</div>

<?php
echo $this->Html->css(array('validationEngine.jquery'));
echo $this->Html->script(array('jquery.validationEngine-en', 'jquery.validationEngine'));
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#CousineAdminAddEditForm").validationEngine();
    });
</script>