<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link href="<?php echo base_url();?>assets/admin/images/fav.png" rel="shortcut icon">

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">








    <title>Sunni Manzil</title>



    <style>
        * {
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {

            font-family: 'Whitney';
            margin:0;padding:0;
            height:100vh;overflow:hidden
        }
        @font-face {
            font-family: 'Whitney';
            src: url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-Book.eot');
            src: url('<?php echo base_url();?>assets/admin/fonts/fonts/WhitneyHTF-Book.eot?#iefix') format('embedded-opentype'),
            url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-Book.woff') format('woff'),
            url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-Book.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Whitney';
            src: url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-SemiBold.eot');
            src: url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-SemiBold.eot?#iefix') format('embedded-opentype'),
            url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-SemiBold.woff') format('woff'),
            url('<?php echo base_url();?>assets/admin/fonts/WhitneyHTF-SemiBold.ttf') format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'webrupeebook';
            src: url('<?php echo base_url();?>assets/admin/fonts/webrupee.v2.0-webfont.woff2') format('woff2'),
            url('<?php echo base_url();?>assets/admin/fonts/webrupee.v2.0-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;

        }
        .login {
            position: absolute;
            top: 44%;
            left: 50%;
            margin: -10rem 0 0 -10rem;
            width: 40rem;
            height: 25rem;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
        }
        .login:hover > .login-header, .login.focused > .login-header {
            width: 4rem;
        }
        .login:hover > .login-header > .text, .login.focused > .login-header > .text {
            font-size: 1.5rem;
            transform: rotate(-90deg);
        }
        .login.loading > .login-header {
            width: 20rem;
        }
        .login.loading > .login-header > .text {
            display: none;
        }
        .login.loading > .login-header > .loader {
            display: block;
        }

        .login-header {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
            width: 24rem;
            height: 25rem;
            background: #c61e56;
            transition: width 0.5s ease-in-out;
        }
        .login-header > .text {
            display: block;
            width: 100%;
            height: 100%;
            font-size: 8rem;
            text-align: center;
            line-height: 25rem;
            color: #fff;
            transition: all 0.5s ease-in-out;
        }
        .login-header > .loader {
            display: none;
            position: absolute;
            left: 5rem;
            top: 5rem;
            width: 10rem;
            height: 10rem;
            border: 2px solid #fff;
            border-radius: 50%;
            animation: loading 2s linear infinite;
        }
        .login-header > .loader:after {
            content: "";
            position: absolute;
            left: 4.5rem;
            top: -0.5rem;
            width: 1rem;
            height: 1rem;
            background: #fff;
            border-radius: 50%;
            border-right: 2px solid #c61e56;
        }
        .login-header > .loader:before {
            content: "";
            position: absolute;
            left: 4rem;
            top: -0.5rem;
            width: 0;
            height: 0;
            border-right: 1rem solid #fff;
            border-top: 0.5rem solid transparent;
            border-bottom: 0.5rem solid transparent;
        }

        @keyframes loading {
            50% {
                opacity: 0.5;
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .login-form {
            margin: 0 0 0 2rem;
            padding: 0.5rem;
        }

        .login-input {
            display: block;
            width: 100%;
            font-size: 1.6rem;
            padding: 1.5rem 1rem;
            box-shadow: none;
            border-color: #ccc;
            border-width: 0 0 2px 0;
            margin-top: 20px;
        }
        .login-input + .login-input {
            margin: 20xpx 0 0;
        }
        .login-input:focus {
            outline: none;
            border-bottom-color: #c61e56;
        }

        .login-btn {
            position: absolute;
            right: 1rem;
            bottom: 1rem;
            width: 5rem;
            height: 5rem;
            border: none;
            background: #c61e56;
            border-radius: 50%;
            font-size: 0;
            border: 0.6rem solid transparent;
            transition: all 0.3s ease-in-out;
        }
        .login-btn:after {
            content: "";
            position: absolute;
            left: 1rem;
            top: 0.8rem;
            width: 0;
            height: 0;
            border-left: 2.4rem solid #fff;
            border-top: 1.2rem solid transparent;
            border-bottom: 1.2rem solid transparent;
            transition: border 0.3s ease-in-out 0s;
        }
        .login-btn:hover, .login-btn:focus, .login-btn:active {
            background: #fff;
            border-color: #c61e56;
            outline: none;
            cursor:pointer;
        }
        .login-btn:hover:after, .login-btn:focus:after, .login-btn:active:after {
            border-left-color: #c61e56;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px rgba(255, 165, 0, 0.26) inset;
        }
        img{height:100%;width:100%;}

        #background{z-index:-12;overflow:hidden;background: #c61e56;}

        .frgt{text-decoration:none;    color: #00BCD4;}


body{background-color: #a7afbe;}

    </style>
    <script src="<?php echo base_url();?>assets/admin/js/jquery-1.11.3.js"></script>
    <script src='<?php echo base_url();?>assets/admin/js/rain.js'></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap/bootstrap.min.js"></script>
    <link href="<?php echo base_url();?>assets/admin/plugins/jqtoast/jquery.m.toast.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/admin/plugins/jqtoast/jquery.m.toast.js"></script>


</head>

<!--<body onload="run();">-->
<body >

<div class="login" style="position:absolute;z-index:9">
    <?php
    $msg = $this->session->flashdata('msg');
    if(!empty($msg)){?>
        <div class="alert alert-info">
            <strong>.Warning!</strong> <?php echo $this->session->flashdata('msg');?>
        </div>
    <?php } ?>
    <header class="login-header"><span class="text">LOGIN</span><span class="loader"></span></header>
    <form class="login-form" id="login_form">
        <input class="login-input" name="username" type="text" placeholder="Username"/>
        <input class="login-input" name="password" type="password" placeholder="Password"/>
        <button class="login-btn btn_login" type="submit">login</button>
        <p>  <a href="" type="button" class="" data-toggle="modal" data-target="#forgortpasswrd">forgot password?</a>

        </p>
    </form>
</div>
<div id="forgortpasswrd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="max-width:650px;margin:auto;height:155px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Forgot Password</h4>
            </div>
            <div class="modal-body">
                <form class="form-label-left" action="<?php echo base_url();?>admin/login/forgot_password" method="post" name="pass_form" id="pass_form"  method="post" >
                    <div class="row">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12 bodrnone" data-validate-length-range="6" data-validate-words="2" name="uname" value="" required type="text" placeholder="Enter Email ID">
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 tpmr15">
                                <button id="send" type="submit" class="btn btn-primary pull-right" style="margin-top: 20px;">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<!--<img id="background" alt="background" src="<?php /*echo base_url();*/?>assets/admin/images/test2.jpg" />
-->

<script  type="text/ecmascript">

    $('.login-input').on('focus', function() {
        $('.login').addClass('focused');
    });

    $('.login').on('submit', function(e) {
        e.preventDefault();
        $('.login').removeClass('focused').addClass('loading');
    });

/*
    function run() {
        var image = document.getElementById('background');
        image.onload = function() {
            var engine = new RainyDay({
                image: this,
                gravityAngle: Math.PI / 9
            });
            engine.trail = engine.TRAIL_SMUDGE;
            engine.rain([ [1, 0, 1000], [3, 3, 1] ], 100);
        };
        image.crossOrigin = 'anonymous';
      //  image.src = 'assets/admin/images/test2.jpg';
    }*/

</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.btn_login').click(function (e) {
            e.preventDefault();

            $('.body_blur').show();
            var data = $('#login_form').serializeArray();
            console.log(data);
            $.post('<?php echo base_url();?>index.php/admin/login/login_process', data, function (data) {
                $('.body_blur').hide();
                if (data.status == true) {
                    window.location = "<?php echo base_url();?>admin/dashboard";
                } else {
                    $.toast(data.reason, {'width': 500});
                }
            }, 'json');
        });


    });
</script>

</body>
</html>
