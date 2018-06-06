$(document).ready(function () {
    var baseurl = $('#base_url').val();

    $('.sel_customer').change(function () {
        var cur = $(this);
        cust_id = cur.val();
        $.get(baseurl + 'admin_2/sales/get_customer/' + cust_id, function (data) {
            if (data.status) {
                console.log(data.data);
                var data = data.data;
                var name = data.name;
                var phone = data.mobile;
                var addrs = data.address;
                var gstno = data.gst_no;
                var customer = name + '<br/>' + phone + '<br/>GST No:' + gstno;
                $('#get_address').html(customer);
            } else {

            }
        }, 'json');
    });
    $('#sale_type').change(function () {
        var cur = $(this);
        var type = cur.val();
        if (type == 'order') {
            $('#pay_mode').hide();
        } else if (type == 'invoice') {
            $('#pay_mode').show();
        }
    });

    $('#submit_form').click(function (e) {
        e.preventDefault();
        var st = jQuery('#sales_form').validate();
        var data = $('#sales_form').serializeArray();

        data.push({name: 'sale_items', value: JSON.stringify(get_sale_items())});

        /// console.log(st);
        st = st.toShow;

        if (st.length <= 0) {
            // $('.body_blur').show();
            $.post(baseurl + 'admin_2/sales/update_sales_order', data, function (data) {
                $('.body_blur').hide();
                if (data.status) {
                    var sale_id = data.data;
                    $.toast('Sale order updated successfully', {'width': 500, 'duration': 1500});
                    setTimeout(function () {
                        window.location = baseurl + 'admin_2/sales/view_sales_orders';
                    }, 1000);


                } else {
                    $.toast(data.reason, {'width': 1000, 'duration': 1500});
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
    console.log($(this).parent().parent());
    $(this).parent().parent().remove();
});
$(document).on('change', '.items', function () {
    var baseurl = $('#base_url').val();

    var cur = $(this);
    item_id = cur.val();
    $('.body_blur').show();
    $.get(baseurl + 'admin_2/sales/getstockData/' + item_id, function (data) {
        $('.body_blur').hide();
        if (data.status) {
            var data = data.data;
            var qty = data.qtys;
            var price = data.selling_price;
            var discount_price = data.discount_price;

            cur.parent().parent().parent().find('.buy_price').val(price);
            cur.parent().parent().parent().find('.selling_price').val(price);
            cur.parent().parent().parent().find('.discount_price').val(discount_price);
            cur.parent().parent().parent().find('.stck_lbl').text('In Hand: ' + qty);
        } else {

        }
    }, 'json');
});

$(document).on('change', '.remb_items', function () {
    var baseurl = $('#base_url').val();
    var cur = $(this);
    item_id = cur.val();
    get_rembersment_price();
    item_id = cur.val();
    $('.body_blur').show();
    $.get(baseurl + 'admin_2/sales/getstockData/' + item_id, function (data) {
        $('.body_blur').hide();
        if (data.status) {
            var data = data.data;
            var qty = data.qtys;
            var price = data.selling_price;
            var spcl_price = 0.01;
            cur.parent().parent().parent().find('.rem_selling_price').val(spcl_price);
            cur.parent().parent().parent().find('.stck_lbl').text('In Hand: ' + qty);
        } else {

        }
    }, 'json');

});


function get_sale_items() {
    var sale_items = {"sale_order_ids": [], "items": [], "qty": [], "selling_price": [], "discount_price": []};
    //loop through row_repeat elm
    $(".row_append").each(function () {

        var item = $(this).find(".items option:selected").val();

        var qtys = $(this).find(".qty").val();
        var sale_order_id = $(this).find(".sale_order_id").val() != "" ? $(this).find(".sale_order_id").val() : NULL;

        var selling_prices = $(this).find(".selling_price").val();

        var discount_prices = $(this).find(".discount_price").val();

        sale_items.items.push(item);
        sale_items.sale_order_ids.push(sale_order_id);
        sale_items.qty.push(qtys);

        sale_items.selling_price.push(selling_prices);

        sale_items.discount_price.push(discount_prices);
    });

    return sale_items;

}


function get_rembersment_price() {
    var baseurl = $('#base_url').val();
    var remb_items = {"item_ids": [], "qtys": []};
    $('.remb_row').each(function () {
        var remb_item_id = $(this).find('.remb_items').val();
        var remb_qty = $(this).find('.remb_qty').val();
        remb_qty = isNaN(remb_qty) ? 0 : remb_qty;
        remb_qty = remb_qty == '' ? 0 : remb_qty;
        remb_items.item_ids.push(remb_item_id);
        remb_items.qtys.push(remb_qty);
    });
    $.post(baseurl + 'admin_2/sales/get_remb_stockData', remb_items, function (data) {
        if (data.status) {
            var data = data.data;
            $('.remb_price').text('Reimbursement Price:' + data);
        }
    }, 'json');
}

function add_new_row() {
    var prodcuts = $('#item').html();

    var div = '';
    div += '<div class="col-md-12 col-sm-12 col-xs-12 form-group row_append">' +
        '<div class="col-md-3 col-sm-6 col-xs-12 form-group">' +
        '<label class="">&nbsp;</label>' +
        '<select placeholder="items" name="items[]" class="form-control selectBox items">' + prodcuts + '</select>' +
        '</div>' +
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class="stck_lbl">&nbsp;</label>' +
        '<input type="number" name="qty[]" min="0" data-rule-required="true" placeholder="Qty" class="form-control qty">' +
        '</div>' +
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class="">&nbsp;</label>' +
        ' <input type="number" name="selling_price[]" data-rule-required="true" placeholder="Seliing price" class="form-control selling_price">' +
        '</div>' +
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class="">&nbsp;</label>' +
        '<input type="text" name="discount_price[]" placeholder="Discount price" data-rule-required="true" class="form-control discount_price">' +
        '</div>' +
        '<div class="col-md-2 col-sm-6 col-xs-12 form-group">' +
        '<label class="">&nbsp;</label><br>' +
        '<a href="" type="button" class="btn btn-primary fllft btn_add"><i class="fa fa-plus" aria-hidden="true"></i></a>' +
        '<a href="" type="button" class="btn btn-primary fllft btn_remov"><i class="fa fa-trash" aria-hidden="true"></i></a>' +
        '</div>' +
        '</div>';
    $('#appendnewrow').append(div);
    $('.selectBox').SumoSelect({okCancelInMulti: true, selectAll: true, search: true});


}