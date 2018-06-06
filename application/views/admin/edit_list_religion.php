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
                        <h2>Religion<small></small></h2>
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
                                <?php $i=1; foreach ($religions as $religion){ ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td class="txt_religon">
                                            <input type="hidden" class="religion_id" value="<?php echo $religion['id'];?>">
                                            <?php echo $religion['name'];?></td>


                                        <td>
                                            <input type="checkbox" name="" value="<?php echo $religion['id'];?>" class="chck_religion">
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
            <form id="religion_form" method="post" action="<?php echo base_url();?>admin/preference/add_religion">
                <div class="modal-body">
                    <p>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                            <label>Religion Name</label>
                            <input type="text" name="religion_name" placeholder="Religion Name" data-rule-required="true" class="form-control religion_name">
                        </div> </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit_religion" class="btn btn-primary">Submit</button>
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
        $("#religion_form").validate();
        var options = {
            dataType : "json",
            success  :    function(data)
            {
                if(data.status == true)
                {
                    //$('.body_blur').hide();

                    setTimeout(function(){
                        $('#religion_form')[0].reset();
                        $('#religion_form').hide();
                        if(data.result=='add'){
                            $.toast('Religion added successfully', {'width': 500,'duration': 1000});
                        }else{
                            $.toast('Religion updated successfully', {'width': 500,'duration': 1000});
                        }
                        location.reload();
                    }, 2000);
                }
                else
                {
                    $('.body_blur').hide();
                    $.toast(data.reason, {'width': 500, 'duration': 1000});
                    return false;
                }
            }
        };

        $('#religion_form').submit(function(e){
            e.preventDefault();
            $('.body_blur').show();
            var st =  $("#religion_form").validate();
            st = st.toShow;
            if(st.length <=0){
                $(this).ajaxSubmit(options);

            }
            // $('.body_blur').hide();
        });
    });
    $(document).on('click','.del_btn',function(){

        var cur=$(this);
        var religions = [];
        $('.chck_religion').each(function () {
            var cur_this = $(this);
            var cur_val = $(this).val();
            if(cur_this.is(":checked")){
                religions.push(cur_val);
            }

        });
        if(religions.length > 0){
            noty({
                text: 'Do you want to continue?',
                type: 'warning',
                buttons: [
                    {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {

                        // this = button element
                        // $noty = $noty element

                        $noty.close();


                        $('.body_blur').show();
                        $.post('<?php echo base_url();?>admin/preference/delete_religion/',{religions:religions}, function(data){
                            $('.body_blur').hide();
                            if(data.status){
                                $.toast('Deleted successfully', {'width': 500,'duration': 1000});
                                location.reload();
                            }else{
                                $.toast(data.reason, {'width': 500,'duration': 1000});
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
        $('#add').find('.modal-title').text('Add Religion');
        $('#religion_form').find('.religion_name').val('');
        $('#religion_form').find('#submit_religion').text('Save');
        var up_form = '<?= base_url();?>admin/preference/add_religion';
        $("#religion_form").attr("action", up_form);
    });
    $(document).on('click', '.edit_btn',function () {
        var cur = $(this);
        var txt_religon = cur.parent().parent().find('.txt_religon').text();
        religion_name = $.trim(txt_religon);
        var religion_id = cur.parent().parent().find('.religion_id').val();
        $('#add').modal('show');
        $('#add').find('.modal-title').text('Update Religion');
        $('#religion_form').find('.religion_name').val(religion_name);
        $('#religion_form').find('#submit_religion').text('Update');
        var up_form = '<?= base_url();?>admin/preference/update_religion/'+religion_id;
        $("#religion_form").attr("action", up_form);
    });
</script>


</body>
</html>