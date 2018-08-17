
<?php echo $this->Html->css(array('timepicki'), null, array('inline' => false)); ?>
<?php echo $this->Html->script(array('timepicki'), array('inline' => false)); ?>

<?php echo $this->Html->css(array('bootstrap-datetimepicker'));
echo $this->Html->script(array('bootstrap-datepicker')); 

echo $this->Html->css(array('validationEngine.jquery'));
echo $this->Html->script(array('jquery.validationEngine-en', 'jquery.validationEngine'));
?>


<script type="text/javascript">
    jQuery(document).ready(function () {
        $("#PromocodeAdminAddEditForm").validationEngine();
        jQuery('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '1y'
        });

        jQuery('#PromocodeStartTime').timepicki({increase_direction:'up'});
        jQuery('#PromocodeEndTime').timepicki({increase_direction:'up'});
    });
    $(document).ready(function() {
        $("input[type=checkbox]").addClass("validate[minCheckbox[1]] checkbox");

        $("#PromocodeCategoryId").on("change", function() {
            $("#PromocodeItemId").attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Html->url(array('plugin' => false, 'controller' => 'promocodes', 'action' => 'get_item')); ?>',
                data: {categoryid: $("#PromocodeCategoryId").val(), restaurant_id: $("#PromocodeRestaurantId").val()},
                success: function(data) {
                    $("#cancel_button").removeAttr('disabled');
                    $("#submit_button").removeAttr('disabled');
                    $("#PromocodeItemId").removeAttr('disabled');
                    $("#PromocodeItemId").html(data);
                }
            })
        });
    });
</script>

<?php $option_yes_no = array('Y' => 'Yes', 'N' => 'No');
$option_status = array('1' => 'Active', '0' => 'Inactive');
?>
<style>
.radio, .checkbox {
    margin-left: 22px;
}
</style>
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
                            <h1 class="mainTitle">Edit Discount</h1>
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
                            <?php echo $this->Form->create('Promocode', array('method' => 'post', 'class' => 'form', 'role' => 'form', 'autocomplete' => 'off', 'type' => 'file'));
                            echo $this->Form->input('id', array('type' => 'hidden', 'required' => false)); ?>
                                <?php

                                $is_super_admin = $this->Session->read('Admin.is_super_admin');
                               
                            ?>
                                <section id="page-title">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h1 style="font-size:16px;">Set Discount Button</h1>
                                        </div>                        
                                    </div>
                                </section>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('discount1', array( 'type' => 'text', 'maxlength' => '25', 'label' => '', 'div' => false, 'required' => true, 'class' => 'form-control validate[required]')); ?> %
                                        </div>
                                    </div>
                                    <!-- <br><br> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('discount2', array('type' => 'text', 'maxlength' => '25', 'label' => '', 'div' => false, 'required' => true, 'class' => 'form-control validate[required]')); ?> %
                                        </div> 
                                    </div>
                                    <!-- <br><br> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('discount3', array('type' => 'text', 'maxlength' => '25', 'label' => '', 'div' => false, 'required' => true, 'class' => 'form-control validate[required]')); ?> %
                                        </div> 
                                    </div>
                             
                                

                            </div>
                           
                            <div class="row">
                               
                                <div class="col-md-5">
                                    <?php echo $this->Form->button('Save <i class="fa fa-arrow-circle-right"></i>',array('class' => 'btn btn-primary btn-wide pull-left_form','type' => 'submit','id' => 'submit_button'));

                                    echo $this->Html->link('Cancel <i class="fa fa-times-circle"></i>',
                                        array('plugin' => false,'controller' => 'promocodes','action' => 'index', 'admin' => true),
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
