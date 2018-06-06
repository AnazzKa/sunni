$(document).ready(function () {
    var baseurl = $('#base_url').val();

  /*  $('#btnRegistration').click(function(e){
        e.preventDefault();

        var data = $('#register_form').serializeArray();
        var st =  $('#register_form').validate();
        //console.log(st);
        st = st.toShow;

        if(st.length <= 0){
            $('.body_blur').show();
            $.post(baseurl+'register/newUser', data, function(data){
                $('.body_blur').hide();
                if(data.status)
                {
                    $.toast('Registered successfully', {'width': 500,'duration': 1500});
                    var user_id = data.data;
                    setTimeout(function(){
                        window.location = baseurl+'register/complete_registration/'+user_id;
                    }, 1000);
                }else{
                    $.toast(data.reason, {'width': 500,'duration': 3000});
                }
            },'json');
        }
    });*/


});

