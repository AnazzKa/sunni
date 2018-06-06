<?php $session_array = $this->session->userdata('logged_in_user');  ?>
<div class="headermain">
    <div class="topmn">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="header-text"> <i class="head fa fa-envelope-o" aria-hidden="true"></i>Email us: sunnimanzil@gmail.com  </div>
                    <div class="header-text"> <i class="head fa fa-envelope-o" aria-hidden="true"></i>Call us: +91 9645492569  </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 social">
                        <ul>
                            <li class="fb pull-left"><a target="_blank" href="#">
                                    <img class="smicone" src="<?php echo base_url();?>assets/user/img/fb.png">
                                </a></li>
                            <li class="tw pull-left"><a target="_blank" href="#">
                                    <img class="smicone" src="<?php echo base_url();?>assets/user/img/twtr.png">
                                </a></li>
                            <li class="googleplus pull-left"><a target="_blank" href="#">
                                    <img class="smicone" src="<?php echo base_url();?>assets/user/img/gpls.png">
                                </a></li>
                                 <?php if(isset($session_array)){ ?>
                                <li class="fa fa-sign-out pull-left"><a class="btn btn-sm btn-primary logout_btn pull-right" href="<?php echo base_url();?>login/logout">Logout</a></li>
                                <?php } ?>
                        </ul>
                       
                       

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="top_wrap navbar-default">
        <div class="container pd_0">

            <div class="col-md-12">

                <div class="col-md-3 col-xs-4">
                    <div class="home_logo"></div>
                </div>
<?php 
if(!isset($session_array)){ ?> 
                <div class="col-md-9 col-xs-4" style="padding: 0;">
                    <div class="navreg_form clearfix">
                        <div class="form-inline">
                            <form action="" id="login_form" method="post" name="loginform">
                                <div class="form-group">
                                    <input class="form-control input-sm input_loginid" id="username" name="username" placeholder="Email / Mob No" required="" type="text" spellcheck="false" ginger_software_editor="true"></div>
                                <div class="form-group">
                                     <input class="form-control input-sm input_loginpswd" id="password" name="password" placeholder="Password" required="" type="password">
                                     <button class="btn btn-sm btn-primary login_btn" type="submit">Sign In</button>
                                      <a  href= "<?php echo base_url();?>register/complete_registration" class="btn btn-sm btn-primary " type="submit">Sign Up</a>
                                    <div class="form_layer2">
                                        <a class="forgot_pwd">Forgot Password?</a>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<?php } ?>
 
   
            </div>



        </div>
    </div>

</div>
<script type="text/javascript">
   /* $(document).ready(function(){
        $('.login_btn').click(function(e){
            e.preventDefault();
            var data = $('#login_form').serializeArray();
            $.post('<?php echo base_url();?>login/process', data, function(data){
                if(data.status)
                {   
                    $.toast('Login successfully', {'width': 500});
                    var data = data.data;
                    if(data.is_verified == 0)
                    {
                        window.location ='<?php echo base_url();?>register/complete_registration/'+data.id;
                    }else{
                          window.location ='<?php echo base_url();?>home';
                    }
                }else{
                    $.toast(data.reason, {'type': 'danger','width': 500,'duration': 2500});
                }
            },'json');
        });
    });*/
</script>