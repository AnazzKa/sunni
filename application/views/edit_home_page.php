<!DOCTYPE html ><html >

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- ====================HEAD STRT======================= -->
<?php echo $head; ?>
<!-- ====================HEAD END======================= -->

</head>
<body>


<!-- ====================HEDER STRT======================= -->
<?php echo $header; ?>
<!-- ====================HEDER END======================= -->




<div class="home_banner ri_img1">


    <div class="row pd_0 margin_0">
        <div class="container container_head pd_0">
            We bring people together.<br /> Love unites them...					</div>
    </div>

</div>






<div class="bg-area">
    <div class="dyfkg">
        <div class="badge">
            <a href="#"><img alt="" src=""></a>
        </div>
    </div>
    <div class="container">

        <div class="dark">
            <div class="row">
                <div class="col-md-8 col-sm-6">

                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="logintab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#registration" role="tab" data-toggle="tab">Registration</a></li>
                            <!-- <li><a href="#login" role="tab" data-toggle="tab">Login</a></li> -->
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="registration">
                                <form id="register_form" method="post" action="<?php echo base_url();?>register/complete_registration">
                                <div class="form-horizontal text-center" role="form">
                                    <div class="form-group">
                                        <div class="col-sm-12">

                                            <input name="txtName" type="text" id="txtName" class="form-control" placeholder="Name of Bride/ Groom" style="padding-right: 85px;">

                                             </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="col-sm-7">
                                            <label class="radio-inline" for="radios-0">
                                                <span name="radios"><input id="radiobtnMale" type="radio" name="genderReg" value="MALE" checked="checked"></span>
                                                Male
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <span name="radios"><input id="radiobtnfemale" type="radio" name="genderReg" value="FEMALE"></span>
                                                Female
                                            </label>
                                        </div>
                                        <div class="col-sm-5">
                                           


                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <input name="txtEmail" type="text" id="txtEmail" class="form-control" placeholder="Your Email" style="padding-right: 85px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">

                                            <input name="confirmemail" type="text" id="confirmemail" class="form-control" placeholder="Confirm Email" style="padding-right: 85px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">

                                            <input name="txtMobileNo" type="text" id="txtMobileNo" class="form-control" placeholder="Mobile Number">

                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">

                                            <input name="confirmmobile" type="text" id="confirmmobile" class="form-control" placeholder="Confirm Mobile Number">

                                           
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                           <!--  <select name="DDProfileCreatedby" id="DDProfileCreatedby" class="form-control" style="height:32px;">
                                                <option value="">Profile Created for</option>
                                                <option value="SELF">Self</option>
                                                <option value="PARENTS">Parents</option>
                                                <option value="GRAND_PARENTS">Grand Parents</option>                                        
                                                <option value="RELATIVES">Relatives</option>
                                                <option value="SIBLINGS">Siblings</option>
                                                <option value="FRIENDS">Friends</option>
                                                <option value="OTHERS">Others</option>

                                            </select>
 -->
                                          </div>
                                        <div class="col-sm-4">

<button type="submit" id="btnRegistration" class="btn btn-default">Register</button>

                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













<div class="bg-1">
    <div class="container">
        <div class="floral1"></div>
        <h3 class="text-center">THE BEST OF YOU IS HE WHO IS THE BEST TO HIS WIFE</h3>
        <p class="paragraph">Entenikkah.com is a premium matrimonial website for global Muslims. Our aim is to help Muslims to find their suitable life partner in an Islamic way. We do not support anything that's not Halal in Islam so Entenikkah.com is not a dating portal at all. Only matured Muslim men and women with an intention of marriage are allowed to register at Entenikkah.com We are among the most trustworthy and technically advanced matrimonial portals. Entenikkah.com will make your matrimonial searches and online-match making a simple, easy and happy experience. No wonder as the number of memberships of Entenikkah.com is greatly increasing day by day.</p>
    </div>
</div>








<div class="section_padding m_padding bg-2">
    <section class="search_form">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <hgroup class="text-center heading_1 wow fadeInDown animated" data-wow-delay="300ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 300ms; animation-name: fadeInDown;">
                        <h3>
                            <span class="text_semibold color_emerald"></span> <span class="text_light color_textblack">Matching Your Preferences</span></h3>
                        <h4 class="text_light color_green">
                            Find your Special Someone!</h4>
                    </hgroup>
                    <div class="search_box wow fadeInDown animated" data-wow-delay="300ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 300ms; animation-name: fadeInDown;">
                        <div class="row">
                            <div class="container_drop_down">
                            <form action="<?php echo base_url();?>search/result" id="" method="post" >
                                <div class="col-sm-2 col-xs-6 pd_0 lets-dropdown">
                                    <div class="container_drop_txt">I'm looking for a</div>

                                    <select name="gender" id="gender" class="form-control form_dropdown" onchange="toggleAgeByGender(this)">
                                        <option value="FEMALE" label="Woman" selected="selected">Woman</option>
                                        <option value="MALE" label="Man">Man</option>
                                    </select>       </div>
                                <div class="col-sm-3 col-xs-6 search_pannel_agg_wrap search_bottom_pd lets-dropdown-right">

                                    <div class="container_drop_txt">age</div>
                                    <div class="age_wrap">
                                        <div class="white_txt pull-left">

                                            <select name="agefrom" id="agefrom" class="form-control form_dropdown search_pannel_age">
                                            <?php for ($i=18; $i<71; $i++) { ?>
                                            
                                                <option value="<?php echo $i ;?>" label="<?php echo $i ;?>"><?php echo $i ;?></option>
                                                <?php } ?>
                                            </select>               </div>
                                        <div class="search_pannel_to">to</div>
                                        <div class="pull-left">

                                            <select name="ageto" id="ageto" class="form-control form_dropdown search_pannel_age">
                                                 <?php for ($j=18; $j<71; $j++) { ?>
                                            
                                                <option value="<?php echo $j ;?>" label="<?php echo $j ;?>"><?php echo $j ;?></option>
                                                <?php } ?>
                                            </select>               </div>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-xs-6 search_bottom_pd lets-dropdown">
                                    <div class="container_drop_txt">Madhab</div>

                                    <select name="cast" id="frm-community" class="form-control form_dropdown search_pannel_religion">

                                        <option value="" label="Select" selected="selected">Select</option>
                                        <?php foreach ($casts as $key => $cast) { ?>
                                             <option value="<?php echo $cast['id'];?>" label="<?php echo $cast['cast'];?>"><?php echo $cast['cast'];?></option>
                                        <?php } ?>
                                       
                                        
                                    </select>                       </div>
                                <div class="col-sm-3 col-xs-6 pad_right_0 search_bottom_pd lets-dropdown-right">
                                    <div class="container_drop_txt">and Education</div>

                                    <select name="education" id="frm-education" class="form-control form_dropdown search_pannel_mt">
                                        <option value="" label="Select" selected="selected">Select</option>
                                        <?php foreach ($educations as $key => $education) { ?>
                                            <option value="<?php echo $education['id'];?>" label="<?php echo $education['title'];?>"><?php echo $education['title'];?></option>
                                        <?php } ?>
                                       
                                    </select>                   </div>

                                <div class="col-sm-2 col-xs-12 pd_0 search_bottom_pd">
                                    <input name="" type="submit" class="search_pannel_lets waves-effect waves-light touch-feedback" value="Let's Begin" />
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





















<div class="section_padding section_grey m_padding">
    <section class="block_whywtn">
        <div class="container">
            <div class="row">
                <div class="container-fluid">

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <hgroup class="text-center heading_1 wow fadeInDown animated" data-wow-delay="300ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 300ms; animation-name: fadeInDown;">
                            <h1></h1>
                        </hgroup>
                        <span class="text_light color_textblack1 subheading_1">
</span>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="featued_box">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 wow fadeInDown animated" data-wow-delay="300ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 300ms; animation-name: fadeInDown;">
                                <div class="f_box text-center same_height" style="height: 371px;">
                                    <span class="f_icon f_icon_1 anim_all"></span>
                                    <div class="f_contwrap">
                                        <h3>
                                            Global and wide set of Muslim Profiles for Nikah</h3>
                                        <p>
                                            Kerala Nikah offers genuine profiles which are manually screened by our expert team and then uploaded on the site.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 wow fadeInDown animated" data-wow-delay="500ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 500ms; animation-name: fadeInDown;">
                                <div class="f_box text-center same_height" style="height: 371px;">
                                    <span class="f_icon f_icon_2 anim_all"></span>
                                    <div class="f_contwrap">
                                        <h3>
                                            Free and easy profile registration</h3>
                                        <p>
                                            Registration in Kerala NIkah is completely free!.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 wow fadeInDown animated" data-wow-delay="700ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 700ms; animation-name: fadeInDown;">
                                <div class="f_box text-center same_height" style="height: 371px;">
                                    <span class="f_icon f_icon_3 anim_all"></span>
                                    <div class="f_contwrap">
                                        <h3>
                                            Registered profiles are manually screened</h3>
                                        <p>
                                            We provide you a secure platform to meet your life partner.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 wow fadeInDown animated" data-wow-delay="900ms" data-wow-duration="500ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 900ms; animation-name: fadeInDown;">
                                <div class="f_box text-center same_height" style="height: 371px;">
                                    <span class="f_icon f_icon_4 anim_all"></span>
                                    <div class="f_contwrap">
                                        <h3>
                                            Safe and secure site 100% privacy guaranteed</h3>
                                        <p>
                                            Large set of profiles to select from, Assistance from experts.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





















<!-- ====================HEDER STRT======================= -->
<?php echo $footer; ?>
<!-- ====================HEDER END======================= -->





<link rel="stylesheet" media="screen" href="<?= base_url() ?>assets/admin/plugins/val/demo/css/screen.css">
<link href="<?php echo base_url();?>assets/admin/plugins/jqtoast/jquery.m.toast.css" rel="stylesheet">

<script src="<?php echo base_url();?>assets/admin/plugins/jqtoast/jquery.m.toast.js"></script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/val/dist/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/user/js/custom/register.js"></script>

<script type="text/javascript">
    $(function () {
       $( ".dob" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: '1970:2002'
       });
    });
</script>
</body>

</html>


