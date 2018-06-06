<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Mckinley</title>


    <link href="<?php echo base_url(); ?>assets/admin/print/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
    <script>
        function printDiv(divName) {

            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            var printButton = document.getElementById("printpagebutton");
            printButton.style.visibility = 'hidden';
            var printButtons = document.getElementById("back_button");
            printButtons.style.visibility = 'hidden';
            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>

<body>
<div id="print">
    <input id="printpagebutton" type="button" style="background-color: #3c8dbc; color: #FFF; height: 34px;"
           onclick="printDiv('print')" value="Print report!"/>

    <a id="back_button" href="<?php echo base_url();?>admin/sales" style="text-decoration: none; background-color: #3c8dbc; color: #FFF; height: 34px; padding: 10px">Back</a>
    <div class="book">

        <!--==============================STRT FIRST PAGE==============================================-->

        <div class="page">
            <div class="sub_page">

                <div class="head">
                    <div class="adres">
                        <h2 class="mnads"><?php echo $company['name']; ?><br>
                            <span class="ads"><?php echo $company['address']; ?><br>
                            Tel : <?php echo $company['phone']; ?>
                     </span>
                        </h2>
                        <div class="clnd_dtls">
                            <div class="clnd_lft">
                                <table>
                                    <tr style="border: none;">
                                        <td style="border: none;"></td>
                                        <td class="bld" style="visibility: hidden; border:none;">dummy</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td style="border: none;">GSTIN:</td>
                                        <td style="border: none;" class="bld"><?php echo $company['gst_no']; ?></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="clnd_rght">
                                <table style="float:right;  ">
                                    <?php
                                    $dl_nos = explode(',', $company['dl_no']);
                                    foreach ($dl_nos as $k => $dl_no) { ?>
                                        <tr style="border: none;">
                                            <td style="border: none;"><?php if ($k == 0) {
                                                    echo "DL NO:";
                                                }; ?> </td>
                                            <td style="border: none;" class="bld"><?php echo $dl_no; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>


                    <p class="invstxthd"><b>Tax Invoice</b></p>


                    <table style="width: 100%">
                        <tr>
                            <td>Invoice No: <?php echo $all_data['sales']['invoice_number']; ?></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>
                        <tr>
                            <td>Invoice Date: <?php echo $all_data['sales']['sale_date']; ?></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>
                        <tr>
                            <td>Reverse Charge(Y/N): NO</td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>

                        <tr>
                            <td>State: <?php echo $company['state']; ?></td>
                            <td class="brdr_fl">Code</td>
                            <td class="brdr_fl" style="width: 50px"></td>
                            <td class="brdr_fl">32</td>
                        </tr>
                    </table>


                    <p class="biltoprt">Bill to Party</p>


                    <table style="width: 100%;">

                        <tr>
                            <td><?php echo $all_data['sales']['customer']; ?></td>
                            <td style="border: none;"></td>
                        </tr>
                        <tr>
                            <td style="border: none;"><?php echo $all_data['sales']['c_address']; ?></td>
                            <td style="width: 213px;border-left: 2px solid;">
                                <table style="width: 100%;">
                                    <?php
                                    $c_dl_nos = explode(',', $all_data['sales']['dl_no']);
                                    foreach ($c_dl_nos as $k => $c_dl_no) { ?>
                                        <tr style="border: none;">
                                            <td style="border: none;"><?php if ($k == 0) {
                                                    echo "DL NO:";
                                                }; ?> </td>
                                            <td style="border: none;" class=""><?php echo $c_dl_no; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>GSTIN: <?php echo $all_data['sales']['gst_no']; ?></td>
                            <td style="border: none;"></td>
                        </tr>
                    </table>

                    <table style="width: 100%;">
                        <tr>
                            <td>State: <?php echo $all_data['sales']['state']; ?></td>

                            <td class="brdr_fl">Code</td>
                            <td class="brdr_fl" style="width: 50px"></td>
                            <td class="brdr_fl">32</td>
                        </tr>
                        <tr>
                            <td>GSTIN: <?php echo $all_data['sales']['gst_no']; ?></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>
                    </table>

                    <table style="width: 100%;">
                        <tr style="    background: #ebedf1; font-weight: 600 ;text-align: center;">
                            <td style="width: 2%;">S. No.</td>
                            <td>Product Description</td>
                            <td style="width: 4%;">HSN code</td>
                            <td style="width: 4%;">PACK</td>
                            <td style="width: 4%;">BATCH</td>
                            <td style="width: 9%;">EXP DATE</td>
                            <td style="width: 4%;">Qty</td>
                            <td style="width: 6%;">Rate</td>
                            <td style="width: 6%;">PTR</td>
                            <td style="width: 6%;">MRP</td>
                            <td style="width: 7%;">Amount</td>
                            <td style="width: 7%;">DISCOUNT</td>
                            <td style="width: 7%;">DISCOUNT VALUE</td>
                            <td>Taxable Value</td>
                        </tr>
                        <?php $i = 1;
                        $last_vendor = "";
                        $item_total = 0;
                        $remb_item_total = 0;
                        $total_amount = 0;
                        $total_remb_amount = 0;
                        $item_discount = 0;
                        $remb_item_discount = 0;
                        $item_discount_price = 0;
                        $remb_item_discount_price = 0;
                        foreach ($all_data['sales']['items'] as $sale_item) {

                            if ($last_vendor != $sale_item['vendor_id']) {
                                ?>
                                <tr>
                                    <td style="padding: 2px 1px 2px 36px;" colspan="8">
                                        Mfgr:<?php echo $sale_item['vendor']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php }
                            $last_vendor = $sale_item['vendor_id'];
                            ?>
                            <tr>
                                <?php $amount = $sale_item['price'] * $sale_item['qty'];
                                $discount_price = $sale_item['discount_price'] * $sale_item['qty'];
                                $discount = $amount - $discount_price;
                                $item_total += $sale_item['qty'];
                                $total_amount += $amount;
                                $item_discount += $discount;
                                $item_discount_price += $discount_price;
                                ?>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $sale_item['item_title']; ?></td>
                                <td><?php echo $sale_item['hsn_code']; ?></td>
                                <td><?php echo $sale_item['packing_type']; ?></td>
                                <td><?php echo $sale_item['lot_no']; ?></td>
                                <td><?php echo $sale_item['exp_date']; ?></td>
                                <td><?php echo $sale_item['qty']; ?></td>
                                <td><?php echo $sale_item['price']; ?></td>
                                <td><?php echo $sale_item['ptr_price']; ?></td>
                                <td><?php echo $sale_item['mrp']; ?></td>
                                <td><?php echo $amount; ?></td>
                                <td><?php echo $sale_item['sales_discount']; ?></td>
                                <td><?php echo $discount; ?></td>
                                <td><?php echo $discount_price; ?></td>
                            </tr>

                            <?php $i++;
                        } ?>
                        <?php if (!empty($all_data['sales']['remb_items'])) { ?>
                            <tr style="background-color: #ebedf1">
                                <td colspan="14">Reimbersment products</td>

                            </tr>

                            <?php $i = 1;
                            $last_vendor = "";
                            foreach ($all_data['sales']['remb_items'] as $sale_item) {

                                if ($last_vendor != $sale_item['vendor_id']) {
                                    ?>
                                    <tr>
                                        <td style="padding: 2px 1px 2px 36px;" colspan="8">
                                            Mfgr:<?php echo $sale_item['vendor']; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php }
                                $last_vendor = $sale_item['vendor_id'];
                                ?>
                                <tr>
                                    <?php $amount = $sale_item['price'] * $sale_item['qty'];
                                    $discount_price = $sale_item['discount_price'] * $sale_item['qty'];
                                    $remb_item_total += $sale_item['qty'];
                                    $discount = $amount - $discount_price;
                                    $total_remb_amount += $amount;
                                    $remb_item_discount += $discount;
                                    $remb_item_discount_price += $discount_price;
                                    ?>
                                    <td><?php //echo $i;
                                        ?></td>
                                    <td><?php echo $sale_item['item_title']; ?></td>
                                    <td><?php echo $sale_item['hsn_code']; ?></td>
                                    <td><?php echo $sale_item['packing_type']; ?></td>
                                    <td><?php echo $sale_item['lot_no']; ?></td>
                                    <td><?php echo $sale_item['exp_date']; ?></td>
                                    <td><?php echo $sale_item['qty']; ?></td>
                                    <td><?php echo $sale_item['price']; ?></td>
                                    <td><?php echo $sale_item['ptr_price']; ?></td>
                                    <td><?php echo $sale_item['mrp']; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td><?php echo $sale_item['sales_discount']; ?></td>
                                    <td><?php echo $discount; ?></td>
                                    <td><?php echo $discount_price; ?></td>
                                </tr>
                                <?php $i++;
                            }
                        }
                        $total_items = $remb_item_total + $item_total;
                        $total_item_amonut = $total_remb_amount + $total_amount;
                        $total_discount_amonut = $remb_item_discount + $item_discount;
                        $total_discount_price = $remb_item_discount_price + $item_discount_price;
                        ?>
                        <tr>
                            <td class="ttl" colspan="6">Total</td>
                            <td><?php echo $total_items; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_item_amonut; ?></td>
                            <td>-</td>
                            <td><?php echo $total_discount_amonut; ?></td>
                            <td><?php echo $total_discount_price; ?></td>
                        </tr>

                        <tr>
                            <td class="ttl" colspan="6"></td>
                            <td class="amnd" colspan="5">AMOUNT BEFORE TAX</td>
                            <td class="amnd" colspan="3"> <?php echo $total_discount_price; ?></td>
                        </tr>

                        <?php
                        $tot_tax = 0;
                        foreach ($taxes as $tax) {
                            $tot_tax += $tax['total_tax'];

                            ?>
                            <tr>
                                <td class="ttl" colspan="6"></td>
                                <td class="amnd" colspan="5">ADD <?php echo $tax['name']; ?></td>
                                <td class="amnd" colspan="3"> <?php echo $tax['total_tax']; ?></td>
                            </tr>
                        <?php }

                        $sub_total = $tot_tax + $total_discount_price;
                        $grand_total = round($sub_total);
                        $round_of = $grand_total - $sub_total;
                        $round_of = round($round_of, 2);
                        ?>

                        <tr>
                            <td class="ttl" colspan="6"></td>
                            <td class="amnd" colspan="5">ROUND OFF</td>
                            <td class="amnd" colspan="3"> <?php echo $round_of; ?></td>
                        </tr>
                        <tr>
                            <td class="ttl" colspan="6"></td>
                            <td class="amnd" colspan="5">TOTAL AMOUNT</td>
                            <td class="amnd" colspan="3"> <?php echo $grand_total; ?></td>
                        </tr>
                        <?php $amont_inwords = amountInwords($grand_total);
                        $amont_inwords = ucfirst($amont_inwords);
                        ?>
                        <tr>
                            <td style="background-color: #ebedf1;text-align: center;font-weight: 600; font-size: 15px;"
                                colspan="14">Total Invoice amount in words Rs <?php echo $amont_inwords; ?> only
                            </td>
                        </tr>


                        <!--  <tr style="height: 20px;">
                              <td colspan="12"></td>
                          </tr>-->


                        <tr style="border:none;">
                            <td colspan="10" style="    text-align: center;
    font-weight: 600;background: #ebedf1;padding: 5px; border:1px solid;">Bank Details
                            </td>
                            <td style="" colspan="4">CERTIFIED THAT ABOVE PARTICULARS ARE TRUE AND CORRECT

                            </td>
                        </tr>
                        <tr style="border:none;">
                            <td style=" border:1px solid" colspan="10">Bank A/C:</td>
                            <td class="" colspan="4"></td>
                        </tr>
                        <tr style="border:none;">
                            <td style=" border:1px solid" colspan="10">Bank IFSC:</td>
                            <td class="amnd" colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="10" style="padding:5px 20px 20px;"> 1 We hereby certify the medicine sold under
                                this invoice do not contravene in anyway section 18 of the Drug Act 1940
                                <br><br>
                                2 Check batch no on delivery<br>
                                3 Subject to Kannur jurisdiction
                            </td>
                            <td class="amnd" colspan="4">For MCKINLEY BIOGENICS PVT LTD</td>
                        </tr>


                    </table>


                </div>

            </div>
        </div>

    </div>


    <!--==============================END FIRST PAGE==============================================-->


</div>

</body>
</html>
