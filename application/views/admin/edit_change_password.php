<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mckinley| Admin </title>
    <link href="<?php echo base_url();?>assets/admin/images/fav.png" rel="shortcut icon">

    <!-- Bootstrap -->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="<?php echo base_url();?>assets/admin/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/admin/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/admin/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->

    <link href="<?php echo base_url();?>assets/admin/css/login-style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="<?php echo base_url();?>assets/admin/js/jquery-1.11.3.js"></script>
    <script type='<?php echo base_url();?>assets/admin/text/javascript' src='js/jquery.particleground.js'></script>
    <script type='<?php echo base_url();?>assets/admin/text/javascript' src='js/demo.js'></script>

    <script src="<?php echo base_url();?>assets/admin/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/noty/jquery.noty.packaged.min.js"></script>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
        }

        body {
            background:     #a7afbe;
            color: #fff;
            line-height: 1.3;
            -webkit-font-smoothing: antialiased;
        }
        #particles {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #intro {
            position: absolute;
            left: 0;
            top: 10%;
            padding: 0 20px;
            width: 100%;
            text-align: center;
        }
        -


        @media only screen and (max-width: 568px) {
            #intro {
                padding: 0 10px;
            }
        }

    </style>
</head>
<body>

<div id="particles">
    <div id="intro">
        <div class="wrap">
            <!-- strat-contact-form -->




            <!-- start-form -->
            <form class="contact_form" action="<?php echo base_url();?>admin/login/change_pwd" method="post" name="contact_form" id="login_form" style="float: none;  margin: 20% auto;">
                <h1 style="color:#000">Change Your Account</h1>
                <ul>
                    <li>
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="random" value="<?php echo $random; ?>">
                        <input type="password" name="password" class="textbox2" placeholder="New Password">
                       <!-- <p><img src="<?php /*echo base_url();*/?>assets/admin/images/lock.png" alt=""></p>-->
                    </li>
                    <li>
                        <input type="password" name="c_password" class="textbox2" placeholder="Confirm Password">
                      <!--  <p><img src="<?php /*echo base_url();*/?>assets/admin/images/lock.png" alt=""></p>-->
                    </li>
                </ul>
                <input type="submit" name="Sign In" class="btn_login" value="Update"/>

                <div class="clear"></div>
            </form>



            <!-- end-form -->
            <!-- start-account -->

            <!-- end-account -->

            <!-- end-contact-form -->
        </div></div>
</div>

<!--=================================================== forgot password popup ==================================================-->

<div class="body_blur" style="display: none"></div>
<style>
    .body_blur {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 99999;
        background-color: rgba(0,0,0,0.4);
        background-image: url(<?= base_url() ?>assets/public/images/loading.gif);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 30px 30px;
        display: none;
    }

</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn_login').click(function (e) {
            e.preventDefault();
            $('.body_blur').show();
            var data = $('#login_form').serializeArray();
            console.log(data);
            $.post('<?php echo base_url();?>admin/login/change_pwd', data, function (data) {
                $('.body_blur').hide();
                if (data.status == true) {
                    noty({text: 'Password changed', type: 'success', timeout: 1000 });
                    window.location = "<?php echo base_url();?>admin/dashboard";
                } else {
                    noty({text: data.reason, type: 'error', timeout: 1000 });
                }
            }, 'json');
        });
        $('#send').click(function (e) {
            e.preventDefault();
            $('.body_blur').show();
            var data = $('#pass_form').serializeArray();
            console.log(data);
            $.post('<?php echo base_url();?>admin/login/forgot_password', data, function (data) {
                $('.body_blur').hide();
                if (data.status == true) {
                    noty({text: 'Password changed', type: 'success', timeout: 1000 });
                    setTimeout(function(){
                        window.location = "<?php echo base_url();?>admin/Login/loged_out";
                    }, 1000);

                } else {
                    $('#name').val('');
                    noty({text: data.reason, type: 'error', timeout: 1000 });
                }
            }, 'json');
        });
    });
</script>
</body>
</html>