<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- ====================HEAD STRT======================= -->
<?php echo $head; ?>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!-- ====================HEAD END======================= -->
<style type="text/css">
    .panel-danger>.panel-heading {
    color: #ffffff;
    background-color: #c32558;
    border-color: #c32558;
}
input#checkbox160o {
    margin-right: 10px;
}
.panel {
    margin-bottom: 2px;
    }
    ul#detail-1, ul#detail-2, ul#detail-3,ul#detail-4,ul#detail-5{
    height: 170px;
    overflow: scroll;
    overflow-x: hidden;
}
.fa-caret-right{
  transition: all .4s ease;
}
.active .fa-caret-right{
  transform: rotate(90deg);
}


</style>
</head>
<body>


<!-- ====================HEDER STRT======================= -->
<?php echo $header; ?>

<!-- ====================HEDER END======================= -->


<div class="container-fluid mnbdview">

    <div class="col-md-12">
        <div class="col-md-3">
            <div class="panel-group active" id="accordion">
            <div class="panel panel-danger panel-default ">
                <div class="panel-heading toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <h3 class="panel-title">MADHAB <span style="float: right;"> > </span> </h3>
                </div>
                <ul class="list-group"  id="detail-1">
                <?php foreach ($casts as $key => $cast) { ?>
                    
                
                    <li class="list-group-item">
                        <input class="myCheckboxes1" value="<?php echo $cast['id'];?>" name="casts[]" id="checkbox160o" type="checkbox"> <span style="vertical-align: text-bottom;"><?php echo $cast['cast'];?></span> 
                    </li>
                    <?php } ?>
                    
                    
                </ul>
            </div>

             <div class="panel panel-danger panel-default ">
                <div class="panel-heading toggle" id="dropdown-detail-2" data-toggle="detail-2">
                    <h3 class="panel-title">EDUCATION <span style="float: right;"> > </span> </h3>
                </div>
                <ul class="list-group"  id="detail-2">
                <?php foreach ($educations as $key => $education) { ?>
                    
                
                    <li class="list-group-item">
                        <input class="myCheckboxes1" value="<?php echo $education['id'];?>" name="education[]" id="checkbox160o" type="checkbox"> <span style="vertical-align: text-bottom;"><?php echo $education['title'];?></span> 
                    </li>
                    <?php } ?>
                    
                    
                </ul>
            </div>

            <div class="panel panel-danger panel-default active">
                <div class="panel-heading toggle" id="dropdown-detail-3" data-toggle="detail-3">
                    <h3 class="panel-title">ISLAMIC EDUCATION  <span style="float: right;"> > </span></h3>
                </div>
                <ul class="list-group"  id="detail-3">
                      <?php foreach ($islamic_educations as $key => $islamic_education) { ?>
                    
                
                    <li class="list-group-item">
                        <input class="myCheckboxes1" value="<?php echo $islamic_education['id'];?>" name="education[]" id="checkbox160o" type="checkbox"> <span style="vertical-align: text-bottom;"><?php echo $islamic_education['title'];?></span> 
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
            <div class="panel panel-danger panel-default active">
                <div class="panel-heading toggle" id="dropdown-detail-4" data-toggle="detail-4">
                    <h3 class="panel-title">WORK AS  <span style="float: right;"> > </span></h3>
                </div>
                <ul class="list-group"  id="detail-4">
                      <?php foreach ($works_with as $key => $work_with) { ?>
                    
                
                    <li class="list-group-item">
                        <input class="myCheckboxes1" value="<?php echo $work_with['id'];?>" name="education[]" id="checkbox160o" type="checkbox"> <span style="vertical-align: text-bottom;"><?php echo $work_with['title'];?></span> 
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>

            <div class="panel panel-danger panel-default active">
                <div class="panel-heading toggle" id="dropdown-detail-5" data-toggle="detail-5">
                    <h3 class="panel-title">HEIGHT  <span style="float: right;"> > </span></h3>
                </div>
                <ul class="list-group"  id="detail-5">
                      <?php foreach ($heights as $key => $heights) { ?>
                    
                
                    <li class="list-group-item">
                        <input class="myCheckboxes1" value="<?php echo $heights['id'];?>" name="education[]" id="checkbox160o" type="checkbox"> <span style="vertical-align: text-bottom;"><?php echo $heights['height'];?></span> 
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>

            </div>


        </div>




        <div class="col-md-9">

            <!-- profile details start -->
            <?php 
            foreach ($data as $key => $user) { 
                ?>
            <div class="col-md-6">
                <div class="prfldiv">
                    <div class="prfldetailss">
                        <div class="col-md-4 profile_image">
                            <img src="<?php echo base_url();?>uploads/profile/<?php echo $user['profile_image'];?>">
                        </div>
                        <div class="col-md-8">
                            <h4 class="nameh4"><?php echo $user['name'];?> <span>(<?php echo $user['user_id'];?>)</span></h4>
                            <table>
                                <tr>
                                    <td>Age</td>
                                    <td>: <?php echo $user['date_of_birth'];?>Yrs</td>
                                </tr>
                                <tr>
                                    <td>Madhab</td>
                                    <td>: <?php echo $user['cast'];?></td>
                                </tr>
                                <tr>
                                    <td>Mother Tongue</td>
                                    <td>: <?php echo $user['mother_tongue'];?></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>: <?php echo $user['city'];?>, Kerala</td>
                                </tr>
                                <tr>
                                    <td>Education</td>
                                    <td>: BA</td>
                                </tr>
                                <tr>
                                    <td>Profession</td>
                                    <td>: UI, UX Designer</td>
                                </tr>
                            </table>
                        </div>
                    </div>    

                    <div class="col-md-12 contact_tab_prfl">
                        <!-- <div class="col-md-6 ftrprfldiv">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <h6>Send Message</h6>
                        </div> -->
                        <div class="col-md-6 ftrprfldiv">
                            <label><i class="fa fa-user" aria-hidden="true"></i></label>
                            <h6>View Full Profile</h6>
                        </div>
                        <div class="col-md-6 ftrprfldiv">
                            <label><i class="fa fa-address-book" aria-hidden="true"></i></label>
                            <h6>Contact Details</h6>
                        </div>
                    </div>

                    <div class="expressbtn">
                        <a href="#"><p style="margin:0;text-align: center; ">Express Intrest</p></a>
                    </div>


                </div>
            </div>
<?php } ?>

             <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>

            <!-- profile details end -->
            <!-- profile details start -->
            
            <!-- profile details end -->
            <!-- profile details start -->
            <
            <!-- profile details end -->
            <!-- profile details start -->
            
            <!-- profile details end -->




        </div>
    </div>
    
</div>




<!-- ====================HEDER STRT======================= -->
<?php echo $footer; ?>
<!-- ====================HEDER END======================= -->




<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/select2-v4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery/jquery-1.4.2.js"></script>
<script type="text/javascript" src="../img.shaadi.com/mobile/js/jquery.browser.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery/jquery.bt.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/login-box-vs-27.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/community/com-reg/reg-vs-19.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery.blockUI-v2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/waves/waves.min-vs-1.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    //$('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});
</script>






</body>

</html>


