$(document).ready(function () {


});
$(document).ready(function() {
    var baseurl = $('#base_url').val();
    var v = jQuery("#receive_form").validate({
        submitHandler: function(datas) {
            jQuery(datas).ajaxSubmit({

                dataType : "json",
                success  :    function(data)
                {
                    if(data.status)
                    {

                        $('.body_blur').hide();
                        $.toast('Item received successfully', {'width': 500});
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }
                    else
                    {
                        $('.body_blur').hide();
                        $.toast(data.reason, {'width': 500});
                        return false;
                    }
                }
            });
        }
    });


});
$(document).on('click', '.btn_remov', function (e) {
    e.preventDefault();
    $(this).parent().parent().parent().remove();
});
