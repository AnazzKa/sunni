$(document).ready(function () {
    var baseurl = $('#base_url').val();

    $('.sel_vendor').change(function () {
        var cur = $(this);
        vendor_id = cur.val();
        $.get(baseurl + 'admin_2/purchase/get_vendor/' + vendor_id, function (data) {
            if (data.status) {
                var data = data.data.result;
                var name = data.name;
                var phone = data.mobile;
                var addrs = data.address;
                var vendor = name + '<br/>' + phone + '<br/>' + addrs;
                $('#get_address').html(vendor);
            } else {

            }
        }, 'json');
    });

    $('#submit_form').click(function (e) {
        e.preventDefault();

        var data = $('#po_form').serializeArray();
        var st = jQuery('#po_form').validate();
        console.log(st);
        st = st.toShow;

        if (st.length <= 0) {
            $('.body_blur').show();
            $.post(baseurl + 'admin_2/purchase/addNewPurchaseorder', data, function (data) {
                $('.body_blur').hide();
                if (data.status) {
                    $.toast('Purchase order created successfully', {'width': 500, 'duration': 1500});
                    setTimeout(function () {
                        window.location = baseurl + 'admin_2/purchase';
                    }, 1000);
                } else {
                    $.toast(data.reason, {'width': 500, 'duration': 1500});
                }
            }, 'json');
        }
    });


});
$(document).on('click', '.btn_add', function (e) {
    e.preventDefault();
    add_new_row();
});
$(document).on('click', '.btn_remov', function (e) {
    e.preventDefault();
    $(this).parent().parent().remove();
});
$(document).on('change', '.items', function () {
    var baseurl = $('#base_url').val();
    var cur = $(this);
    item_id = cur.val();
    cur.parent().parent().parent().find('.samplestck_lbl').text('');
    cur.parent().parent().parent().find('.stck_lbl').text(' ');
    if (item_id != '') {
        $('.body_blur').show();
        $.get(baseurl + 'admin_2/purchase/getstockData/' + item_id, function (data) {
            $('.body_blur').hide();
            if (data.status) {
                var data = data.data;
                var qty = data.stock;
                var price = data.price;
                var selling_price = data.selling_price;
                var mrp = data.mrp;
                var item_packing = data.item_packing;
                var sample_packing = data.sample_packing;
                var grp = data.grp;
                var sample_price = data.sample_price;
                var sample_qty = data.sam_qty;
                cur.parent().parent().parent().find('.buy_price').val(price);
                cur.parent().parent().parent().find('.selling_price').val(selling_price);
                cur.parent().parent().parent().find('.mrp').val(mrp);
                cur.parent().parent().parent().find('.itm_pack').val(item_packing);
                cur.parent().parent().parent().find('.packing_type').val(grp);
                cur.parent().parent().parent().find('.sample_pack').val(sample_packing);
                cur.parent().parent().parent().find('.stck_lbl').text(':In Hand: ' + qty);
                cur.parent().parent().parent().find('.sample_price').val(sample_price);
                cur.parent().parent().parent().find('.samplestck_lbl').text(':In Hand: ' + sample_qty);
            } else {

            }
        }, 'json');
    }
});

function add_new_row() {
    var prodcuts = $('#item').html();
    var warehouse = $('#warehouse').html();
    var div = '';
    div += '<div class="col-md-12 col-sm-12 col-xs-12 form-group">' +
        ' <div class="row">'+
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label><b>Product Name</b></label>' +
        '<select placeholder="items" name="items[]" class="form-control selectBox items">' + prodcuts + '</select>' +
        '</div>' +
        '<div class="col-md-1 col-sm-6 col-xs-12 form-group">' +
        '<label><b>Price</b></label>' +
        '<input type="number" name="buy_price[]" placeholder="Price" class="form-control buy_price">' +
        '</div>' +
        ' <div class="col-md-1 col-sm-6 col-xs-12 form-group">' +
        '<label><b>MRP</b></label>' +
        '<input type="number" name="mrp[]" data-rule-required="true" placeholder="MRP" class="form-control mrp">'+
        '</div>'+
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class=""><b>Packing Type</b>&nbsp;</label>' +
        '<input type="text" name="packing_type[]" placeholder="Packing Type"' +
        'class="form-control packing_type">' +
        '</div>'+
        ' <div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class=""><b>Pack</b>&nbsp;</label>' +
        '<input type="text" name="itm_pack[]" data-rule-required="true"' +
        'placeholder="Pack" class="form-control itm_pack">' +
        '</div>'+
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class=""><b>Sample Pack</b>&nbsp;</label>' +
        '<input type="text" name="sample_pack[]" data-rule-required="true"' +
        'placeholder="Sam.Pack" class="form-control sample_pack">' +
        '</div>'+
        '</div>'+
        '<div class="row">'+
        '<div class="col-md-1 col-sm-6 col-xs-12 form-group">' +
        ' <label><b>Qty</b></label>'+
        '<input type="number" name="qty[]" placeholder="Qty" min="1" class="form-control qty">' +
        '<label class="stck_lbl">&nbsp;</label>' +
        '</div>' +
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">'+
        '<label><b>Warehouse</b></label>'+
        '<select class="form-control selectBox" data-rule-required="true" name="warehouse[]">'+warehouse+'</select>'+
        '</div>'+
        '<div class="col-md-1 col-sm-6 col-xs-12 form-group">' +
        '<label><b>Sample Qty</b></label>'+
        '<input type="number" name="sample_qty[]" min="0" data-rule-required="true" placeholder="Sam.Qty" class="form-control sample_qty">' +
        '<label class="samplestck_lbl">&nbsp;</label>' +
        '</div>' +
        '<div class="col-md-1 col-sm-6 col-xs-12 form-group">' +
        '<label><b>Sample price</b></label>' +
        '<input type="number" name="sample_price[]" data-rule-required="true" placeholder="Sam. Price" class="form-control sample_price">' +
        '</div>' +
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">'+
        '<label><b>Sample Warehouse</b></label>'+
        '<select class="form-control selectBox" data-rule-required="true" name="sample_warehouse[]">'+warehouse+'</select>'+
        '</div>'+
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label><b>Remarks</b></label>' +
        '<input type="text" name="remarks[]" placeholder="Remarks" class="form-control remarks">' +
        '</div>'+
        '<div class="col-md-1 col-sm-6 col-xs-12 form-group">' +
        '<label><b>Action</b></label><br>' +
        '<a href="" type="button" class="btn btn-primary fllft btn_add"><i class="fa fa-plus" aria-hidden="true"></i></a>' +
        '<a href="" type="button" class="btn btn-primary fllft btn_remov"><i class="fa fa-trash" aria-hidden="true"></i></a>' +
        '</div>' +
        '</div>' +
        '</div>';
    $('#appendnewrow').append(div);
    $('.selectBox').SumoSelect({okCancelInMulti: true, selectAll: true, search: true});
}