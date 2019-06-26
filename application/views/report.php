<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Report Data</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn yellow-lemon btn-outline sbold"> Filter
                                        <i class="fa fa-filter"></i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn green-jungle btn-outline sbold"> Download
                                        <i class="fa fa-download"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table">
                        <thead>
                            <tr>
                                <th width="1"> No </th>
                                <th> Code </th>
                                <th> Name </th>
                                <th> Adrress 1 </th>
                                <th> address 2 </th>
                                <th> City </th>
                                <th> Province</th>
                                <th> Zip </th>
                                <th> Email</th>
                                <th> Dob</th>
                                <th> Gender</th>
                                <th> Phone 1</th>
                                <th> Phone 2</th>
                                <th> Entry</th>
                                <th> User</th>
                                <th> Campaigns</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="1"> 1 </td>
                              <td> Code </td>
                              <td> Name </td>
                              <td> Adrress 1 </td>
                              <td> address 2 </td>
                              <td> City </td>
                              <td> Province</td>
                              <td> Zip </td>
                              <td> Email</td>
                              <td> Dob</td>
                              <td> Gender</td>
                              <td> Phone 1</td>
                              <td> Phone 2</td>
                              <td> Entry</td>
                              <td> User</td>
                              <td> Campaigns</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

</div>
<!-- END PAGE CONTENT INNER -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable({
      "deferRender":    true,
      "scrollCollapse": true,
			"processing": true,
		  //"serverSide": true,
			"order": [],
      //"ajax":{
				//url : "<?php echo site_url('user/ajax_list')?>", // json datasource
				//type: "POST"
			//},
      "columnDefs": [
			{
				"orderable": false
			}
			],
    });

  });
document.getElementById("report").className = "active";
</script>
