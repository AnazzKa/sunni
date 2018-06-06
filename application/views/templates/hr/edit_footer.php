<div class="body_blur" style="display: none"></div>
<footer>
    <div class="pull-right">
        Mickinley <a href=""></a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<link href="<?php echo base_url();?>assets/admin/plugins/jqtoast/jquery.m.toast.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/jqtoast/jquery.m.toast.js"></script>

<script src="<?php echo base_url();?>assets/admin/js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/sidebar.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/custom.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Switchery -->

<!-- Autosize -->

<!-- jQuery autocomplete -->


<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/jqvalidation/css/validationEngine.jquery.css" type="text/css"/>

<script src="<?php echo base_url();?>assets/admin/plugins/jqvalidation/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
</script>
<script src="<?php echo base_url();?>assets/admin/plugins/jqvalidation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
</script>
<script src="<?php echo base_url();?>assets/admin/js/jquery.form.js"></script>


<script>

    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
    });

</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<!-- compose -->
<script>
    $('#compose, .compose-close').click(function(){
        $('.compose').slideToggle();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            placement : 'right',
            trigger : 'hover'
        });
    });
</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<style>
    .body_blur {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 99999;
        background-color: rgba(0,0,0,0.4);
        background-image: url(<?= base_url() ?>assets/admin/images/ajax-loader.gif);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 30px 30px;
        display: none;
    }

</style>


