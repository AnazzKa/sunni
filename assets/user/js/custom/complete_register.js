$(document).ready(function() {
        $('#country').select2();
        $('#state').select2();
        $('#cast').select2();
        $('#dateOfBirthDay').select2();
        $('#dateOfBirthyear').select2();
        $('#dateOfBirthMonth').select2();
        $('#height').select2();
        $('#marrital_status').select2();
        $('#mother_tongue').select2();
        $('#diet').select2();
        $('#annnual_income').select2();
        $('.SlectBox').select2();




    var baseurl = $('#base_url').val();
        $("#comp_register_form").validate();
        var options = {
            dataType : "json",
            success  :    function(data)
            {
                if(data.status == true)
                {
                    $('.body_blur').hide();

                        $.toast('Registered successfully', {'width': 500});
                    setTimeout(function(){
                        $('#comp_register_form')[0].reset();
                        $('#comp_register_form').hide();
                        window.location = baseurl+'home';
                    }, 1000);
                }
                else
                {
                    $('.body_blur').hide();
                    $.toast(data.reason, {'type': 'danger','width': 500,'duration': 2500});
                    return false;
                }
            }
        };

        $('#comp_register_form').submit(function(e){
            e.preventDefault();
            $('.body_blur').show();
            var st =   $("#comp_register_form").validate();
            st = st.toShow;
            if(st.length<=0)
            {
                $(this).ajaxSubmit(options);
                $('.body_blur').hide();
            }
            $('.body_blur').hide();
        });
     $('#country').change(function () {

         var cur = $(this);
         var country_id = cur.val();
         if(country_id != ''){
            $('.body_blur').show();
             $.get(baseurl+'register/get_states_by_country', {country_id: country_id}, function (data) {
                 $('.body_blur').hide();
                 if (data.status) {
                   
                     var opt = '';
                     var data = data.data;
                     
                     opt += '<option value="">Please select</option>';
                     for (var i = 0; i < data.length; i++) {
                        var c_code = data[i].code;
                         opt += '<option value="' + data[i].id + '">' + data[i].state_name + '</option>';
                     }
                     $('#state').html(opt);
                     $('#state').select2();
                     
                     $('#country_code').val(c_code);
                 } else {
                     $.toast('No state found', {'width': 500});
                 }
             }, 'json');
         }

     });
     $('#state').change(function () {
         var cur = $(this);
         var state_id = cur.val();
         if(state_id != '') {

             $.get(baseurl+'register/get_district_by_state', {state_id: state_id}, function (data) {

                 if (data.status) {
                  
                     var opt = '';
                     opt += '<option value="">Please Select</option>';
                     var data = data.data;
                     for (var i = 0; i < data.length; i++) {
                         opt += '<option value="' + data[i].id + '">' + data[i].d_name + '</option>';
                     }
                     $('#district').html(opt);
                     $('#district').select2();
                     
                 } else {
                     $.toast('No District found', {'width': 500});
                 }
             }, 'json');
         }
     });
     $('#district').change(function () {
         var cur = $(this);
         var district_id = cur.val();
         if(district_id != '') {

             $.get(baseurl+'register/get_taluk_by_district', {district_id: district_id}, function (data) {

                 if (data.status) {
                  
                     var opt = '';
                     opt += '<option value="">Please Select</option>';
                     var data = data.data;
                     for (var i = 0; i < data.length; i++) {
                         opt += '<option value="' + data[i].id + '">' + data[i].taluk + '</option>';
                     }
                     $('#taluk').html(opt);
                     $('#taluk').select2();
                     
                 } else {
                     $.toast('No Taluk found', {'width': 500});
                 }
             }, 'json');
         }
     });
     $('#taluk').change(function () {
         var cur = $(this);
         var taluk_id = cur.val();
         if(taluk_id != '') {

             $.get(baseurl+'register/get_panchayath_by_taluk', {taluk_id: taluk_id}, function (data) {

                 if (data.status) {
                  
                     var opt = '';
                     opt += '<option value="">Please Select</option>';
                     var data = data.data;
                     for (var i = 0; i < data.length; i++) {
                         opt += '<option value="' + data[i].id + '">' + data[i].panchayath + '</option>';
                     }
                     $('#panchayath').html(opt);
                     $('#panchayath').select2();
                     
                 } else {
                     $.toast('No Taluk found', {'width': 500});
                 }
             }, 'json');
         }
     });
     $('#religion').change(function () {
         var cur = $(this);
         var rel_id = cur.val();
         if(rel_id != '') {

             $.get(baseurl+'register/get_cast_by_relgion', {rel_id: rel_id}, function (data) {

                 if (data.status) {
                    // $('#city')[0].sumo.unload();
                     var opt = '';
                     opt += '<option value="">Please Select</option>';
                     var data = data.data;
                     for (var i = 0; i < data.length; i++) {
                         opt += '<option value="' + data[i].id + '">' + data[i].cast + '</option>';
                     }
                     $('#cast').html(opt);
                    $('#cast').select2();
                 } else {
                     $.toast('No Cast found', {'width': 500});
                 }
             }, 'json');
         }
     });
     $('#marrital_status').change(function(){
        var cur = $(this);
        var marrital_status = cur.val();
        if(marrital_status == "SINGLE")
        {
            $('.div_no_child').hide();
        }else{
            $('.div_no_child').show();
        }
     });
     $('#DDProfileCreatedby').change(function(){
        var cur = $(this);
        var created_by = $("#DDProfileCreatedby option:selected").text();
        $('#about_groom').text("About your "+created_by);
     });


     $('#work_with').change(function(){
        
        if($("#work_with option:selected").text() == "Other"){
            console.log($(this).text());
            $('.other_spec').show();
        } else{
            $('.other_spec').hide();
        }
        console.log($(this).text());
     });

     $('.radio_gender').change(function() {

        var selValue = $('input[name=genderReg]:checked').val();
        
        $.post(baseurl+'register/getislamicEducation/', function(data){
            if(data.status)
            {
                var data = data.data;
                var opt = '';
                if(selValue == 'MALE'){
                    for (var i = 0; i < data.length; i++) {
                      
                         opt += '<option value="' + data[i].id + '">' + data[i].title + '</option>';
                       
                     }
                }else if(selValue == 'FEMALE'){
                    for (var i = 0; i < data.length; i++) {
                        if(data[i].is_allowed_female == 1){
                          //  alert(selValue);
                         opt += '<option value="' + data[i].id + '">' + data[i].title + '</option>';
                        }
                    }
                }
                $('#islamic_education').html(opt);
                $('#islamic_education').select2();
            }else{

            }
        },'json' );
        
           
    });

 });


