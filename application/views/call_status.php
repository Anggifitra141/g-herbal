<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Call Status</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">

                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table">
                        <thead>
                            <tr>
                                <th width="1"> No </th>
                                <th> Status </th>
                                <th> Status Name </th>
                                <th> Status Connect  </th>
                                <th> Status Contact</th>
                                <th> Status Presetented </th>
                                <th> Status Respon </th>
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
<div class="modal fade bs-modal-lg" id="modal_status" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Call Status</h4>
            </div>
            <div class="modal-body">
              <form role="form" id="form_status">
                <div class="form-body">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Status</label>
                          <input type="text" class="form-control" name="status" placeholder="" readonly>
                      </div>
                      <div class="form-group">
                          <label>Status Name</label>
                          <input type="text" class="form-control" name="status_name" placeholder="" readonly>
                      </div>
                      <div class="form-group">
                        <label>Status Connect</label>
                        <select name="status_connect"  class="form-control">
                          <option value="">-- Status --</option>
                          <option value="CONNECT">CONNECT</option>
                          <option value="NOT CONNECT">NOT CONNECT</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status Contact</label>
                        <select name="status_contact"  class="form-control">
                          <option value="">-- Status --</option>
                          <option value="CONTACT">CONTACT</option>
                          <option value="NOT CONTACT">NOT CONTACT</option>
                          <option value="NOT">NOT</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status Presetented</label>
                        <select name="status_presetented"  class="form-control">
                          <option value="">-- Status --</option>
                          <option value="PRESETENTED">PRESETENTED</option>
                          <option value="NOT PRESETENTED">NOT PRESETENTED</option>
                          <option value="NOT">NOT</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status Respon</label>
                        <select name="status_respon"  class="form-control">
                          <option value="">-- Status --</option>
                          <option value="FU">FU</option>
                          <option value="NI">NI</option>
                          <option value="NQ">NQ</option>
                          <option value="SALE">SALE</option>
                          <option value="NOT">NOT</option>
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
				url : "<?php echo site_url('call_status/ajax_list')?>", // json datasource
				type: "POST"
			},
      "columnDefs": [
			{
				"orderable": false
			}
			],
    });

  });

document.getElementById("call_status").className = "active";
/* -- Action -- */

  function get_supply(status){
    save_method = 'update';
    $('#form_status')[0].reset();
        $.ajax({
          url: "<?php echo site_url('call_status/get_call_status')?>/" + status,
          type: "GET",
          dataType: "JSON",
          success: function (data) {

                  $('[name="status"]').val(data.status);
                  $('[name="status_name"]').val(data.status_name);
                  $('[name="status_connect"]').val(data.status_connect);
                  $('[name="status_contact"]').val(data.status_contact);
                  $('[name="status_presetented"]').val(data.status_presetented);
                  $('[name="status_respon"]').val(data.status_respon);

                  $('#modal_status').modal('show');
                  $('.modal-title').text('UPDATE CALL STATUS');
          },
          error: function (jqXHR, textStatus, errorThrown){
                  alert('Error get data from ajax');
          }
        });
  }

  function save() {
      // ajax adding data to database
       $.ajax({
         url : "<?php echo site_url('call_status/update_call_status')?>",
         type: "POST",
         data: $('#form_status').serialize(),
         dataType: "JSON",
         success: function(data)
         {
           //if success close modal and reload ajax table
           $('#modal_status').modal('hide');
             location.reload();// for reload a page
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
             alert('Error, Try again!');
         }
     });
  }

</script>
