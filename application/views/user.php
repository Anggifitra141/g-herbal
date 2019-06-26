<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> User Account</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <?php if($this->session->userdata('level') == 'SUPERADMIN'){?>
                                    <button onclick="tambah_user()" class="btn green btn-outline sbold"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                                  <?php }?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table">
                        <thead>
                            <tr>
                                <th width="1"> No </th>
                                <th> Username </th>
                                <th> Fullname </th>
                                <th> Level </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

</div>
<!-- END PAGE CONTENT INNER -->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">user</h4>
            </div>
            <div class="modal-body">
              <form role="form" id="form_user">
                <div class="form-body">
                    <div class="col-md-12">
                      <input type="hidden" class="form-control" name="id">
                      <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="username" placeholder="" >
                      </div>
                      <div class="form-group">
                          <label>Fullname</label>
                          <input type="text" class="form-control" name="fullname" placeholder="" >
                      </div>
                      <div class="form-group" id="pass">
                          <label>Kata Sandi</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="">
                      </div>
                      <div class="form-group" id="konf_pass">
                          <label>Konfirmasi Kata Sandi</label>
                          <input type="password" class="form-control" id="confirm_password" name="konfirmasi_password" placeholder="" >
                      </div>
                      <div class="form-group">
                          <label>Level</label>
                          <select class="form-control" name="level">
                            <option value="">-- Pilih --</option>
                            <option value="SUPERADMIN">SUPERADMIN</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="QUALITY">QUALITY</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status">
                            <option value="">-- Pilih --</option>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="NO ACTIVE">NO ACTIVE</option>
                          </select>
                      </div>
                    </div>
                </div>
              </form>

            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" onclick="save()">Save </button>
            </div>
            </div>
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
</div>

<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable({
      "deferRender":    true,
      "scrollCollapse": true,
			"processing": true,
		  "serverSide": true,
			"order": [],
      "ajax":{
				url : "<?php echo site_url('user/ajax_list')?>", // json datasource
				type: "POST"
			},
      "columnDefs": [
			{
				"orderable": false
			}
			],
    });

  });

document.getElementById("users").className = "active";
/* -- Action -- */
  function tambah_user() {
  	save_method = 'tambah';
  	$('#form_user')[0].reset(); // reset form on modals
  	$('#modal_user').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
	}

  function get_user(id){
    save_method = 'update';
    $('#form_user')[0].reset();
        $.ajax({
          url: "<?php echo site_url('user/get_user')?>/" + id,
          type: "GET",
          dataType: "JSON",
          success: function (data) {

                  $('[name="id"]').val(data.id);
                  $('[name="username"]').val(data.username);
                  $('[name="fullname"]').val(data.fullname);
                  $('[name="level"]').val(data.level);
                  $('[name="status"]').val(data.status);

                  $('#pass').hide();
                  $('#konf_pass').hide();
                  $('#modal_user').modal('show');
                  $('.modal-title').text('UPDATE USER');
          },
          error: function (jqXHR, textStatus, errorThrown){
                  alert('Error get data from ajax');
          }
        });
  }

  function save() {
    var url;
  	if(save_method == 'tambah')
  	{
      	url = "<?php echo site_url('user/tambah_user')?>";
  	}
  	else{
    	url = "<?php echo site_url('user/update_user')?>";
  	}
          // ajax adding data to database
           $.ajax({
             url : url,
             type: "POST",
             data: $('#form_user').serialize(),
             dataType: "JSON",
             success: function(data, response)
             {
               //if success close modal and reload ajax table
               $('#modal_user').modal('hide');
               location.reload();
                // location.reload();// for reload a page
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
                 alert('Konfirmasi Password Yang anda masukan tidak sama');
             }
         });
     }

     function delete_user(id) {

      	if(confirm('Are you sure delete this data?'))
      	{
        	// ajax delete data from database
          	$.ajax({
            	url : "<?php echo site_url('user/delete_user')?>/"+ id,
            	type: "POST",
            	dataType: "JSON",
            	success: function(data)
            	{
               		location.reload();
            	},
            	error: function (jqXHR, textStatus, errorThrown)
            	{
                	alert('Error deleting data');
            	}
        	});
      	}
    }
</script>
