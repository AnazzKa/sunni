<div class="body_blur" style="display: none"></div>
<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<footer>
    <div class="pull-right">
        Mickinley <a href=""></a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<link rel="stylesheet" media="screen" href="<?= base_url() ?>assets/admin/plugins/val/demo/css/screen.css">
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

<script src="<?= base_url() ?>assets/admin/plugins/val/dist/jquery.validate.js"></script>


<script src="<?php echo base_url();?>assets/admin/js/jquery.form.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#submit_password').click(function (e) {
            e.preventDefault();
            var data = $('#password_form').serializeArray();
            $.post('<?php echo base_url();?>admin/dashboard/update_password', data, function (data) {
                if (data.status) {
                    $.toast('Password Updated Successfully', {'width': 500,'duration': 1500});
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                } else {
                    $.toast(data.reason, {'width': 1000,'duration': 1500});
                }
            }, 'json');

        });
    });
</script>

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


