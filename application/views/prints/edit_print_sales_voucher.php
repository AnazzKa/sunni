<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mckinley</title>


    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/admin/print/voucher.css" rel="stylesheet" type="text/css">
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
</head>

<body>

<div id="print">
    <input id="printpagebutton" type="button" style="background-color: #3c8dbc; color: #FFF; height: 34px;"
           onclick="printDiv('print')" value="Print report!"/>

    <a id="back_button" href="<?php echo base_url();?>admin/sales/get_receivables_amount" style="text-decoration: none; background-color: #3c8dbc; color: #FFF; height: 34px; padding: 10px">Back</a>
<div class="book">

    <!--==============================STRT FIRST PAGE==============================================-->

    <div class="page">
        <div class="sub_page">

            <div class="head">
                <div class="adres">

                    <h2 class="mnads"><?php echo $company['name'];?><br>
                        <span class="ads"><?php echo $company['address']; ?><br>

                            <?php echo $company['phone']; ?>
                     </span>
                    </h2>

                </div>
                <div class="customer_det">

                    <h3 class="mnads"><?php echo $receipt['c_name'];?><br>
                        <span class="cusu_ads"><?php echo $receipt['c_address'];?><br>

                            <?php echo $receipt['c_mobile'];?>
                        </span>
                    </h3>

                </div>



                <h2 class="invstxthd"><b><u>Receipt Voucher</u></b></h2>

                <table>
                    <tr>
                        <td class="brdrno">Date: <span><?php echo $receipt['receipt_date'];?></span></td>
                        <td class="brdrno" style="text-align: right;">Voucher Number: <span><?php echo $receipt['receipt_number'];?></span></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th style="width: 8%">S.No:</th>
                        <th style=" width: 75%; text-align: left;">Details</th>
                        <th style="text-align: right;">Amount</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Sale Number: <?php echo $receipt['sales_number'];?> </td>
                        <td><?php echo $receipt['amount_paid'];?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ttl" colspan="2">Total</td>
                        <td><?php echo $receipt['amount_paid'];?></td>
                    </tr>

                </table>
                <?php $amont_inwords = amountInwords($receipt['amount_paid']);
                $amont_inwords = ucfirst($amont_inwords);
                ?>
                <table style="margin-top: 2px;    line-height: 20px;">
                    <tr>
                        <td style="border:none;width:160px;">BY Cheque/Cash:</td>
                        <td style="    border-bottom: 1px dotted;
    border-left: none;
    border-top: none;
    border-right: none;"></td>
                    </tr>
                    <tr>
                        <td style="border:none;">Total Amount in Words:</td>
                        <td style="    border-bottom: 1px dotted;
    border-left: none;
    border-top: none;
    border-right: none;"><?php echo $amont_inwords. 'Only';?></td>
                    </tr>
                </table>


                <table style="    margin-top: 40px;">
                    <tr>
                        <td style="    text-align: center;
    width: 200px;
    border: none;">
                            <div class="sign_bx"></div>
                            Recipient's Signature
                        </td>

                        <td style="border:none;"></td>

                        <td style="    text-align: center;
    width: 200px;
    border: none;">
                            <div class="sign_bx"></div>
                            Accountant's Signature
                        </td>


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
