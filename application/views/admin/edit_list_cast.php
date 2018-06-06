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
                        <h2>Cast<small></small></h2>
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
                                    <th>Religion</th>
                                    <th>Cast</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($casts as $cast){ ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td class="txt_ocu">
                                            <input type="hidden" class="cast_id" value="<?php echo $cast['id'];?>">
                                            <?php echo $cast['name'];?></td>

                                        <td><?php echo $cast['cast'];?></td>
                                        <td>
                                            <input type="checkbox" name="" value="<?php echo $cast['id'];?>" class="chec_cast">
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
            <form id="cast_form" method="post" action="<?php echo base_url();?>admin/preference/add_cast">
                <div class="modal-body">
                    <p>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                            <label>Religion</label>
                            <select class="form-control religion_id" name="religion_id">
                                <option value="">Please Select</option>
                                <?php foreach ($religions as $religion){ ?>
                                <option value="<?php echo $religion['id'];?>"><?php echo $religion['name'];?></option>
                            <?php } ?>
                            </select>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">

                            <label>Cast</label>
                            <input type="text" name="cast" placeholder="Cast" data-rule-required="true" class="form-control cast">
                        </div>
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit_cast" class="btn btn-primary">Submit</button>
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
        $("#cast_form").validate();
        var options = {
            dataType : "json",
            success  :    function(data)
            {
                if(data.status == true)
                {
                    //$('.body_blur').hide();

                    setTimeout(function(){
                        $('#cast_form')[0].reset();
                        $('#cast_form').hide();
                        if(data.result=='add'){
                            $.toast('Cast added successfully', {'width': 500,'duration': 1000});
                        }else{
                            $.toast('Cast updated successfully', {'width': 500,'duration': 1000});
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

        $('#cast_form').submit(function(e){
            e.preventDefault();
            $('.body_blur').show();
            var st =  $("#cast_form").validate();
            st = st.toShow;
            if(st.length <=0){
                $(this).ajaxSubmit(options);

            }
            // $('.body_blur').hide();
        });
    });
    $(document).on('click','.del_btn',function(){

        var cur=$(this);
        var cast_ids = [];
        $('.chec_cast').each(function () {
            var cur_this = $(this);
            var cur_val = $(this).val();
            if(cur_this.is(":checked")){
                cast_ids.push(cur_val);
            }

        });
        if(cast_ids.length > 0){
            noty({
                text: 'Do you want to continue?',
                type: 'warning',
                buttons: [
                    {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {


                        $noty.close();


                        $('.body_blur').show();
                        $.post('<?php echo base_url();?>admin/preference/delete_cast/',{cast_ids:cast_ids}, function(data){
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
        $('#add').find('.modal-title').text('Add Cast');
        $('#cast_form').find('.religion_id').val('');
        $('#cast_form').find('.cast').val('');
        $('#cast_form').find('#submit_cast').text('Save');
        var up_form = '<?= base_url();?>admin/preference/add_cast';
        $("#cast_form").attr("action", up_form);
    });
    $(document).on('click', '.edit_btn',function () {
        var cur = $(this);
        var cast_id = cur.parent().parent().find('.cast_id').val();
        $.get('<?php echo base_url();?>admin/preference/get_cast_by_id/'+cast_id, function (data) {
            if(data.status)
            {
                $('#add').modal('show');
                var data = data.data;
                var up_form = '<?= base_url();?>admin/preference/update_cast/'+cast_id;
                $('#add').find('.modal-title').text('Update Cast');
                $('#cast_form').find('.religion_id').val(data.religion_id);
                $('#cast_form').find('.cast').val(data.cast);
                $('#cast_form').find('#submit_cast').text('Update');
                $("#cast_form").attr("action", up_form);
            }else{

            }
        } ,'json');

    });
</script>


</body>
</html>