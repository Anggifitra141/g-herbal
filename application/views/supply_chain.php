<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Supply Chain</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group">
                                  <form method="post" role="form" action="<?php echo site_url('supply_chain/count')?>">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Start Date: </label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            <input id="start_date" name="start_date" type="text" class="form-control" value="<?= $this->session->userdata('start_date') ?>" autocomplete="off">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label>End Date: </label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            <input id="end_date" name="end_date" type="text" class="form-control" value="<?= $this->session->userdata('end_date') ?>" autocomplete="off">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <div class="col-md-3">
                                            <label>&nbsp; </label>
                                            <div class="input-group">
                                              <button type="submit" class="btn green btn-outline sbold">Proses <i class="fa fa-refresh"></i> </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- <div class="col-md-2">
                                        <div class="form-group">
                                          <div class="col-lg-3">
                                            <label>&nbsp; </label>
                                            <div class="input-group">
                                              <a href="<?= base_url() ?>supply_chain/report_download?start_date=<?= $this->session->userdata('start_date') ?>&end_date=<?= $this->session->userdata('end_date') ?>" title="Download" class="btn green-jungle btn-outline sbold">Download <i class="fa fa-download"></i>  </a>

                                            </div>
                                          </div>
                                        </div>
                                      </div> -->
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
                          <th>Action Code</th>
                          <th>Total Apl</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Total Unique Leads</td>
                          <td><?php echo $leads['total'];?></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Not Connected (Tidak Tersambung)</td>
                          <td><?php echo $not_connect['not_connect']; ?></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Connected (Tersambung)</td>
                          <td><?php echo $connect['connect']; ?></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Not Contacted (Tidak Terkontak)</td>
                          <td><?php echo $not_contact['not_contact']; ?></td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Contacted (Terkontak)</td>
                          <td><?php echo $contact['contact']; ?></td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Not Presented (Tidak Presentasi)</td>
                          <td><?php echo $not_presetented['not_presetented']; ?></td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Presented (Presentasi)</td>
                          <td><?php echo $presetented['presetented']; ?></td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>Follow up (Tindak Lanjut)</td>
                          <td><?php echo $fu['FU']; ?></td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>Not Interested (Tidak Tertarik)</td>
                          <td><?php echo $ni['NI']; ?></td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>Not Qualified (Tidak Memenuhi Ketentuan)</td>
                          <td><?php echo $nq['NQ']; ?></td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td><b>Agree To Buy (SALES)<b></td>
                          <td><b><?php echo $sale['SALE']; ?></b></td>
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
    $('#start_date, #end_date').datepicker({
      rtl: App.isRTL(),
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true
    });

  });

</script>
