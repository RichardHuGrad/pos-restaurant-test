
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
                            <h1 class="mainTitle"> Configure Printer </h1>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php

                                $is_super_admin = $this->Session->read('Admin.is_super_admin');
                               
                                    echo $this->Form->input('restaurant_id', array('type' => 'hidden', 'value'=>$this->Session->read('Admin.id'), 'required' => false));
                                ?>
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