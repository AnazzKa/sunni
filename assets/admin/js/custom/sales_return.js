$(document).ready(function(){

    var baseurl = $('#base_url').val();

    $("#submit_form").click(function(e){

        e.preventDefault();

        var data = $('#sales_form').serializeArray();

            $.post(baseurl+'admin_2/sales_return/new_salesreturn_item', data, function(data){
                if(data.status)
                {
                    $.toast('Sales returned successfully', {'width': 500,'duration': 1500});
                    setTimeout(function(){
                        location.reload();
                    }, 1000);

                }else{
                    $.toast(data.reason, {'width': 500,'duration': 1500});
                }
            },'json');
    });


    $(document).on('click', '.btn_remov', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });

});