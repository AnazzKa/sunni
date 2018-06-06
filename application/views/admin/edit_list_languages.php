<?php echo $header; ?>
<link href="<?php echo base_url();?>assets/admin/css/fixed-data-table.css" rel="stylesheet">
</head>
<?php echo $sidebar; ?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Laguages<small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="" type="button" class="btn btn-primary fllft btn_add" style="background-color:#162b52"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a type="button" class="btn btn-primary fllft del_btn" style="background-color:#162b52"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </li>
                            <li><a onclick="goBack()" data-toggle="tooltip" title="" data-original-title="Go Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="tbleovrscroll">
                            <table id="example" class="display table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                <tr class="tablbg">
                                    <th>No.</th>
                                    <th>Tittle</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($languages as $language){ ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td class="txt_lan">
                                            <input type="hidden" class="lan_id" value="<?php echo $language['id'];?>">
                                            <?php echo $language['title'];?></td>


                                        <td>
                                            <input type="checkbox" name="" value="<?php echo $language['id'];?>" class="chck_lan">
                                            <a type="button" class="btn btn-primary fllft edit_btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                        </td>
                                    </tr>
                                    <?php $i++; } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-lg pager" id="myPager"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:600px">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="language_form" method="post" action="<?php echo base_url();?>admin/preference/add_language">
                <div class="modal-body">
                    <p>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                            <label>Laguage</label>
                            <input type="text" name="languagename" placeholder="Language" data-rule-required="true" class="form-control languagename">
                        </div> </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit_language" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>




<?php echo $footer; ?>
<script src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/js/dataTables.buttons.min.js" type="text/javascript"></script>


<script src="<?php echo base_url();?>assets/admin/js/noty/jquery.noty.packaged.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( );
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#language_form").validate();
        var options = {
            dataType : "json",
            success  :    function(data)
            {
                if(data.status == true)
                {
                    //$('.body_blur').hide();

                    setTimeout(function(){
                        $('#language_form')[0].reset();
                        $('#language_form').hide();
                        if(data.result=='add'){
                            $.toast('Education added successfully', {'width': 500,'duration': 1000});
                        }else{
                            $.toast('Education updated successfully', {'width': 500,'duration': 1000});
                        }
                        location.reload();
                    }, 3000);
                }
                else
                {
                    $('.body_blur').hide();
                    $.toast(data.reason, {'width': 500,'duration': 1000});
                    return false;
                }
            }
        };

        $('#language_form').submit(function(e){
            e.preventDefault();
            $('.body_blur').show();
            var st =  $("#language_form").validate();
            st = st.toShow;
            if(st.length <=0){
                $(this).ajaxSubmit(options);

            }
            // $('.body_blur').hide();
        });
    });
    $(document).on('click','.del_btn',function(){

        var cur=$(this);
        var lan_ids = [];
        $('.chck_lan').each(function () {
            var cur_this = $(this);
            var cur_val = $(this).val();
            if(cur_this.is(":checked")){
                lan_ids.push(cur_val);
            }

        });
        if(lan_ids.length > 0){
            noty({
                text: 'Do you want to continue?',
                type: 'warning',
                buttons: [
                    {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {

                        // this = button element
                        // $noty = $noty element

                        $noty.close();


                        $('.body_blur').show();
                        $.post('<?php echo base_url();?>admin/preference/delete_language/',{lan_ids:lan_ids}, function(data){
                            $('.body_blur').hide();
                            if(data.status){
                                $.toast('Deleted successfully', {'width': 500, 'duration':1000});
                                location.reload();
                            }else{
                                $.toast(data.reason, {'width': 500, 'duration':1000});
                            }
                        },'json');
                    }


                    },
                    {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
                        $noty.close();

                    }
                    }
                ]
            });
        }
    });
    $(document).on('click', '.btn_add',function (e) {
        e.preventDefault();
        $('#add').modal('show');
        $('#add').find('.modal-title').text('Add Language');
        $('#language_form').find('.languagename').val('');
        $('#language_form').find('#submit_language').text('Save');
        var up_form = '<?= base_url();?>admin/preference/add_language';
        $("#language_form").attr("action", up_form);
    });
    $(document).on('click', '.edit_btn',function () {
        var cur = $(this);
        var txt_lan = cur.parent().parent().find('.txt_lan').text();
        txt_lan = $.trim(txt_lan);
        var lan_id = cur.parent().parent().find('.lan_id').val();
        $('#add').modal('show');
        $('#add').find('.modal-title').text('Update Language');
        $('#language_form').find('.languagename').val(txt_lan);
        $('#language_form').find('#submit_language').text('Update');
        var up_form = '<?= base_url();?>admin/preference/update_language/'+lan_id;
        $("#language_form").attr("action", up_form);
    });
</script>


</body>
</html>