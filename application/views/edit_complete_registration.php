<!DOCTYPE html>
<html>


<!-- ====================HEAD STRT======================= -->
<?php echo $head; ?>
<!-- ====================HEAD END======================= -->

</head>
<body>

<style type="text/css">
    img#profile_image{
    height: 150px !important;
    width: 150px !important;
    border-radius: 100px !important;
}
label.radio-inline {
    /* float: left; */
    display: inline;
    width: auto;
    vertical-align: middle;
    margin: 0px 50px 0 0;
}
button.upload_btn {
    background: #c71e56;
    border: none;
    padding: 8px;
    width: 100%;
    color: #fff;
    border-radius: 3px;
}
#userfile{
    visibility: hidden;
}
</style>

<!-- ====================HEDER STRT======================= -->
<?php echo $header; ?>
<!-- ====================HEDER END======================= -->


<div class="container-fluid browse"></div>

<div class="frespace"></div>


<div class="container">
<form id="comp_register_form" class="" action="<?php echo base_url();?>register/do_register" method="post" enctype="multipart/form-data">
<div class="col-md-2 upldphoto ">
    <h5 class="mrgn_tp20" style="text-align: center;">Photo Upload</h5>

    <div class="photoup">
    <img class="profileimage" id="profile_image" src="#" alt="" />
        
    </div>

    <input type="file" name="userfile" id="userfile" class="form-control">
     <button type="button" class="upload_btn">Upload</button>
    <i><p class="txtbtmimg">only JPG, PNG Formats are allowed and Maximum file Size up to 2MB</p></i>
</div>

    <div class="col-md-10">


<div class="searchmnbd">



    <h4 class="formhead">Basic Information</h4>
 <div class="row" >
    <div class="col-md-12 ">
        <div class="col-md-4 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Name*</label>
            <input name="txtName" type="text" value="<?= $data['name'];?>" id="txtName" class="form-control" placeholder="Name of Bride/ Groom">
                                            
        </div>
        <div class="col-md-4 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Gender*</label>
            <label class="radio-inline" for="radios-0">
                <span name="radios"><input id="radiobtnMale" <?= $data['gender'] == 'MALE' ? 'checked' : "";?> class="radio_gender" type="radio" name="genderReg" value="MALE"> Male</span>
                   
            </label>
            <label class="radio-inline" for="radios-1">
                <span name="radios"><input id="radiobtnfemale" class="radio_gender" type="radio" name="genderReg" <?= $data['gender'] == 'FEMALE' ? 'checked' : "";?> value="FEMALE"> Female</span>
               
            </label>                               
        </div>

        <div class="col-md-4 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Date of Birth*</label>
            <div class="col-md-4 col-xs-2" style="padding-left: 5px; padding-right: 5px;">
                                <div class="error_div">
                                    <label style="float: left" class="smaller" for="dateOfBirthDay">
                                        <select name="dateOfBirthDay" class="form-control SlectBox" id="dateOfBirthDay">
                                            <option value="">DD</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                       
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-2" style="padding-left: 5px; padding-right: 5px;">
                                <div class="error_div">
                                    <label style="float: left" class="smaller" for="dateOfBirthMonth">
                                        <select name="dateOfBirthMonth" class="form-control SlectBox" id="dateOfBirthMonth">
                                            <option value="">MM</option>
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Apr</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">Aug</option>
                                            <option value="09">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                       
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-2" style="padding-left: 5px; padding-right: 5px;">
                                <div class="error_div">
                                    <label style="float: left" class="smaller" for="dateOfBirthyear">
                                        <select name="dateOfBirthyear" class="form-control SlectBox" id="dateOfBirthyear">
                                            <option value="">YY</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                        </select>
                                       
                                    </label>
                                </div>
                            </div>
                                            
        </div>
    </div> 
    </div>    
 <div class="row" >
 <div class="col-md-12">
 
        <div class="col-md-4 mrgn_tp20">
            <label for="txtEmail" class=" col-form-label col-form-label-sm">E-mail*</label>
           <input name="txtEmail" value="<?= $data['email'];?>" type="text" id="txtEmail" class="form-control" placeholder="Your Email">                                  
        </div>
        <div class="col-md-4 mrgn_tp20">
            <label for="ctxtEmail" class="col-form-label col-form-label-sm">Confirm E-mail*</label>
           <input name="ctxtEmail" value="<?= $data['cemail'];?>" type="text" id="ctxtEmail" class="form-control" placeholder="Confirm Email">                                  
        </div>
         <div class="col-md-4 mrgn_tp20">
            <label for="txtPassword" class=" col-form-label col-form-label-sm">Password*</label>
          <input name="txtPassword" type="password" id="txtPassword" class="form-control" placeholder="Password">                                
        </div>
    </div>    
</div>
<div class="row" >
<div class="col-md-12">

        <div class="col-md-4 mrgn_tp20">
            <label for="ctxtPassword" class=" col-form-label col-form-label-sm">Confim password*</label>
          <input name="ctxtPassword" type="password" id="ctxtPassword" class="form-control" placeholder="Confirm Password">                                
        </div>

        <div class="col-md-4 mrgn_tp20">
            <label for="marrital_status" class=" col-form-label col-form-label-sm">Marital Status*</label>
            <select id="marrital_status" name="marrital_status" class="form-control">
                <option value="">Please select</option>
                <option value="SINGLE">Never Married</option>
                <option value="MARRIED ">Married </option>
                <option value="DIVERCED">Divorced</option>
                <option value="WIDOWED">Widowed</option>
                
            </select>
        </div>

        <div class="col-md-4 mrgn_tp20 div_no_child">
            <label for="no_of_childrens" class=" col-form-label col-form-label-sm">No. of Children*</label>
            <select id="no_of_childrens" name="no_of_childrens" class="form-control SlectBox">
                <option value="">Please select</option>
                <?php for ($i=0; $i <= 5; $i++) { 
                    echo "<option value=".$i.">".$i."</option>";
                } ?>
                
            </select>
        </div>
        
</div>
</div>
<div class="row" >
<div class="col-md-12">
        <div class="col-md-4 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Madhab</label>
            <select id="cast" name="cast" class="form-control" id="cast">
                <option value="">Please select</option>
                <?php foreach ($casts as $key => $cast) { ?>
                    <option value="<?php echo $cast['id'];?>"><?php echo $cast['cast'];?></option>
                <?php } ?>
                
            </select>
        </div>

         <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Living Country*</label>
            <select placeholder="Select Country" id="country" name="country"
                    data-rule-required="true" class="SlectBox form-control country">
                <option value="">Please select</option>
                <?php foreach ($countries as $countries1) { ?>
                    <option value="<?php echo $countries1['id']; ?>"><?php echo $countries1['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-1 mrgn_tp20">
          <label for="country_code" class=" col-form-label col-form-label-sm">Code</label>
           <input name="country_code" type="text" id="country_code" class="form-control" placeholder="Country Code">   
         </div>
        

         <div class="col-md-3 mrgn_tp20">
            <label for="txtMobileNo" class=" col-form-label col-form-label-sm">Mobile*</label>
           <input name="txtMobileNo" value="<?= $data['mobile'];?>" type="text" id="txtMobileNo" class="form-control" placeholder="Mobile Number">                             
     
         </div>
       </div>
        </div>
        
       


       

        <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">State*</label>
            <select name="state" id="state" data-rule-required="true"
                    class="form-control state">
                <option value="">Please select</option>

            </select>
        </div>

        <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">District*</label>
            <select placeholder="Select District" id="district" name="district"
                    data-rule-required="true" class="SlectBox form-control district">
                <option value="">Please select</option>
            </select>
        </div>
        <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Taluk*</label>
            <select placeholder="Select taluk" id="taluk" name="taluk"
                    data-rule-required="true" class="SlectBox form-control taluk">
                <option value="">Please select</option>
              
            </select>
        </div>
        <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Panchayath</label>
            <select placeholder="Select panchayath" id="panchayath" name="panchayath"
                    data-rule-required="true" class="SlectBox form-control panchayath">
                <option value="">Please select</option>
               
            </select>
        </div>
        <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Nearest Town*</label>
            <input type="text" name="city" class="form-control" id="city">
        </div>

        
         <div class="col-md-4 mrgn_tp20 mrgn_tp20">
            <label for="DDProfileCreatedby" class=" col-form-label col-form-label-sm">Profile Created for*</label>
            <select name="DDProfileCreatedby" id="DDProfileCreatedby" class="form-control SlectBox">
                    <option value="">Profile Created for</option>
                    <option value="SELF">Self</option>
                    <option value="SON">Son</option>
                    <option value="DAUGHTER">Daughter</option>                     
                    <option value="SISTER">Sister</option>
                    <option value="BROTHER">Brother</option>
                    <option value="RELATIVE">Relative</option>
                    <option value="FRIEND">Friend</option>
                </select>
        </div>

        
        <div class="col-md-12 col12">
            
          
            <div class="col-md-4 mrgn_tp20">
                <label for="education_level" class="col-form-label col-form-label-sm">Education (School/College)</label>
                <select id="education_level" name="education_level" class="form-control SlectBox">
                    <option value="">Please select</option>
                    <?php foreach ($educations as $key => $education) {
                     ?>  
                        <option value="<?php echo $education['id'];?>"><?php echo $education['title'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mrgn_tp20">
                <label for="islamic_education" class="col-form-label col-form-label-sm">Education (ISLAMIC)</label>
                <select id="islamic_education" name="islamic_education" class="form-control SlectBox">
                    <option value="">Please select</option>
                    <?php foreach ($islamic_educations as $key => $islamic_education) {
                     ?> 
                        <option value="<?php echo $islamic_education['id'];?>"><?php echo $islamic_education['title'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mrgn_tp20">
                <label for="education_field" class="col-form-label col-form-label-sm">Education Field</label>
                <select id="education_field" name="education_field" class="form-control SlectBox">
                    <option value="">Please select</option>
                    <?php foreach ($fields as $key => $field) {  ?>  
                        <option value="<?php echo $field['id'];?>"><?php echo $field['title'];?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-4 mrgn_tp20">
                <label for="work_as" class="col-form-label col-form-label-sm">Work As</label>
                <select id="work_as" name="work_as" class="form-control SlectBox">
                    <option value="">Please select</option>
                   <?php foreach ($works_as['works'] as $key => $work) { ?>  
                    <optgroup label="<?php echo $work['title'];?>">
                    <?php foreach ($work['sub_work'] as $key => $sub_work) {  ?>  
                    <option value="<?php echo $sub_work['id'];?>"><?php echo $sub_work['title'];?></option>
                    <?php } ?>
                     </optgroup>
                      
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mrgn_tp20">
                <label for="work_with" class="col-form-label col-form-label-sm">Works with</label>
                <select id="work_with" name="work_with" class="form-control SlectBox">
                    <option value="">Please select</option>
                     <?php foreach ($works_with as $key => $work_with) {
                     ?>  
                        <option value="<?php echo $work_with['id'];?>"><?php echo $work_with['title'];?></option>
                    <?php } ?>
                </select>
            </div>

             <div class="col-md-4 mrgn_tp20 other_spec" style="display: none">
            <label for="work_specify" class=" col-form-label col-form-label-sm">Other Specify</label>
            <input type="text" name="work_specify" class="form-control" id="work_specify">
        </div>

        </div>

        
        


    <div class="col-md-12 col12">
    <div class="row" style="margin: 0;">
        <div class="col-md-4 mrgn_tp20">
            <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Height*(cm)</label>
            <select id="height" name="height" class="form-control">
                <option value="">Please select</option>
                  <?php foreach ($heights as $key => $height) {  ?>
                    <option value="<?php echo $height['id'];?>"><?php echo $height['height'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4 mrgn_tp20">
            <label for="weight" class="col-form-label col-form-label-sm">Weight(Kg)</label>
            <input name="weight" type="number" id="weight" class="form-control" placeholder="Weight">
        </div>
        
        <div class="col-md-4 mrgn_tp20">
            <label for="body_type" class=" col-form-label col-form-label-sm">Body Type*</label>
            <select id="body_type" name="body_type" class="form-control SlectBox">
                <option value="">Please select</option>
                <option value="SLIM">Slim</option>
                <option value="ATHLETIC ">Athletic </option>
                <option value="AVERAGE">Average</option>
                <option value="HEAVY">Heavy</option>
            </select>
        </div>
        </div>
        <div class="col-md-4 mrgn_tp20">
            <label for="skin_tone" class=" col-form-label col-form-label-sm">Skin Tone*</label>
            <select id="skin_tone" name="skin_tone" class="form-control SlectBox">
                <option value="">Please select</option>
                <option value="VERY_FAIR">Very Fair</option>
                <option value="FAIR ">Fair </option>
                <option value="WHITISH">Whitish</option>
                <option value="DARK">Dark</option>
            </select>
        </div>
        <div class="col-md-4 mrgn_tp20">
            <label for="smoke" class=" col-form-label col-form-label-sm">Smoke*</label>
            <select id="smoke" name="smoke" class="form-control SlectBox">
                <option value="">Please select</option>
                <option value="NO">No</option>
                <option value="YES ">Yes </option>
                <option value="OCCASSIONALLY">Occassionally</option>
            </select>
        </div>
        <div class="col-md-4 mrgn_tp20">
            <label for="family_status" class=" col-form-label col-form-label-sm">Family status*</label>
            <select id="family_status" name="family_status" class="form-control SlectBox">
                <option value="">Please select</option>
                <option value="POOR">Poor</option>
                <option value="AVERAGE ">Average</option>
                <option value="MIDDLE_CLASS">Middle Class</option>
                <option value="HIGHER_CLASS">Higher Class</option>
            </select>
        </div>

        <div class="col-md-6 mrgn_tp20 mrgn_tp20">
                <label for="colFormLabelSm" id="about_groom" class="col-form-label col-form-label-sm">About</label>
                <textarea rows="5" name="about" cols="75" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mrgn_tp20 mrgn_tp20">
                <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Address, Contact number for enquiry*</label>
                <textarea rows="5" name="address" cols="75" placeholder="Contact number for enquiry  (Provide Male  contact number only. Don’t provide Female contact number)" class="form-control"></textarea>
            </div>
        </div>

    

        <input type="submit" name="submit" value="Save&Continue" class="btnnxt" >



</div>

</div>
</form>
</div>





<!-- ====================HEDER STRT======================= -->
<?php echo $footer; ?>
<!-- ====================HEDER END======================= -->


<script src="<?= base_url() ?>assets/admin/plugins/val/dist/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/jquery.form.js"></script>

 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/user/js/custom/complete_register.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile_image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#userfile").change(function(){
        readURL(this);
    });

    $('.upload_btn').click(function(){
            $('#userfile').trigger('click');
        });


        });
    </script>

</body>

</html>


