<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Recordings</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group">
                                  <form method="post" role="form" action="<?php echo site_url('recording')?>">
                                  	<input type="hidden" name="search" value="Y">
                                  		<div class="col-md-2">
                                        <div class="form-group">
                                          <label>Phone Number: </label>
                                            <input id="phone_number" name="phone_number" type="text" class="form-control" autocomplete="off">
                                        </div>
                                      </div>
                                  		<div class="col-md-2">
                                        <div class="form-group">
                                          <label>Agent : </label>
                                            <select id="agent" class="form-control" name="agent">
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <label>Status :</label>
                                            <select id="status" class="form-control" name="status">
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <label>Campaign: </label>
                                            <select id="campaign" class="form-control" name="campaign">
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <label>Start Date : </label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            <input id="start_date" name="start_date" type="text" class="form-control"  autocomplete="off">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <label>End Date : </label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            <input id="end_date" name="end_date" type="text" class="form-control"  autocomplete="off">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="center">
                                        <div class="form-group">
                                          <div class="col-md-3">
                                            <label>&nbsp; </label>
                                            <div class="input-group">
                                              <button type="submit" class="btn purple btn-outline sbold center"  style="margin-left: 450px; margin-top: -10px;">Search <i class="fa fa-search"></i> </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table">
                      <thead>
                        <tr>
                          <th style="width:1px;">No</th>
                          <th>Filename</th>
                          <th>Duration</th>
                          <th>Date</th>
                          <!-- <th>Campaign</th> -->
                          <th>Agent</th>
                          <th>Status</th>
                          <th>Play</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php
                      	if (isset($recording)) {
                      			$no = 1;
                      			foreach ($recording as $row) {
                      	?>
	                        <tr>
	                          <td><?php echo $no++; ?></td>
	                          <td><?php echo $row['filename'];?></td>
	                          <td><?php echo gmdate('H:i:s', $row['length_in_sec'])?></td>
	                          <td><?php echo $row['start_time'];?></td>
	                          <!-- <td><?php /* echo $row->filename; */?></td> -->
	                          <td><?php echo $row['user'];?></td>
	                          <td><?php echo $row['status'];?></td>
	                          <td><audio controls style="width: 230px; display: block; margin: -6px;" controlsList="nodownload"><source src="<?php echo $row['location'];?>"  type="audio/mpeg"></audio> </td>
	                          <td><a title="Download" href="<?php echo $row['location'] ?>" class="btn green-jungle btn-outline sbold" download="<?php echo str_replace(' ','-', $row['filename']).'_'.$row['filename']; ?>"><i class="fa fa-download"></1></a></td>
	                        </tr>

                        <?php } }?>
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
    $('#start_date, #end_date').datepicker({
      rtl: App.isRTL(),
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true
    });

    $('#agent, #status, #campaign').select2({
      theme: "bootstrap",
      width: null
    });


    $.ajax({
      url: "<?php echo site_url('recording/get_user')?>",
      dataType: "json",
      type: "GET",
      async: true,
      success: function (data) {
          var options = '<option value="">-- Agent --</option>';
          data.forEach(function(d){
            options += "<option value='"+d.user+"' data-id='"+d.user+"'>" + d.user+ "||" +d.full_name + "</option>";
          });
          $('#agent').html(options);
      },
      error(jqXHR, textStatus, errorThrown) {
          alert('Something wrong happened because: ' + errorThrown)
      }
    });

     $.ajax({
      url: "<?php echo site_url('recording/get_status')?>",
      dataType: "json",
      type: "GET",
      async: true,
      success: function (data) {
          var options = '<option value="">-- Status --</option>';
          data.forEach(function(d){
            options += "<option value='"+d.status+"' data-id='"+d.status+"'>" + d.status+ "||"+d.status_name+"</option>";
          });
          $('#status').html(options);
      },
      error(jqXHR, textStatus, errorThrown) {
          alert('Something wrong happened because: ' + errorThrown)
      }
    });

      $.ajax({
      url: "<?php echo site_url('recording/get_campaign')?>",
      dataType: "json",
      type: "GET",
      async: true,
      success: function (data) {
          var options = '<option value="">-- Campaign --</option>';
          data.forEach(function(d){
            options += "<option value='"+d.campaign_id+"' data-id='"+d.campaign_id+"'>" + d.campaign_id+ "</option>";
          });
          $('#campaign').html(options);
      },
      error(jqXHR, textStatus, errorThrown) {
          alert('Something wrong happened because: ' + errorThrown)
      }
    });
      document.getElementById("recording").className = "active";
  });

</script>
