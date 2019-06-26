<link rel="stylesheet" href="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.css" type="text/css">

<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Managed Data</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                          <div id="success">
                            <div class="alert alert-success"> <button class="close" data-dismiss="alert">&times;</button><strong>Data Berhasil Di Simpan</strong>.</div>
                          </div>

                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="add" onclick="add()" class="btn green btn-outline sbold"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button onclick="filter_data()" class="btn yellow-lemon btn-outline sbold"> Filter
                                        <i class="fa fa-filter"></i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button onclick="download_data()" class="btn green-jungle btn-outline sbold"> Download
                                        <i class="fa fa-download"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table">
                        <thead>
                            <tr>
                                <th width="1"> NO </th>
                                <th width="60px"> ACTION</th>
                                <th width="140px"> NAMA </th>
                                <th > NO HP </th>
                                <th width="120px"> DOB </th>
                                <th> JENIS KELAMIN </th>
                                <th width="160px"> MINUM 2 KAPSUL SECARA RUTIN ? </th>
                                <th width="160px"> APAKAH SETIAP PAKET YANG DI BELI SELALU DI HABISKAN ?</th>
                                <th width="160px"> APAKAH ANDA MERASAKAN MANFAAT DAN HASILNYA ? </th>
                                <th> EMAIL </th>
                                <th> PEMESANAN </th>
                                <th width="250px"> ALAMAT </th>
                                <th width="120px"> KOTA / KABUPATEN </th>
                                <th> ZIP </th>
                                <th> NAMA PENERIMA </th>
                                <th> NO HP PENERIMA </th>
                                <th> KARTU KREDIT </th>
                                <th> EXPIRED </th>
                                <th width="90px"> AGENT </th>
                                <th> STATUS</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

</div>
<!-- /.modal -->
<div class="modal fade" id="modal_filter"  role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Filter Data</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="<?php echo base_url() ?>report_data/download">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Date: </label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input id="start_date" name="start_date" type="text" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End Date: </label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input id="end_date" name="end_date" type="text" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status </label>

                        <select class="form-control" name="status_filter" id="status_filter" width="100%">
                          <option value=""> -- Pilih --</option>
                          <option value="SUBMIT"> SUBMIT </option>
                          <option value="APPROVE"> APPROVE </option>
                          <option value="SEND BACK"> SEND BACK </option>
                          <option value="REJECT">REJECT </option>

                        </select>

                    </div>
                  </div>


                </div>
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button class="btn green" type="button" id="filter"><i class="fa fa-filter"></i> Filter</button>
                <input class="btn green-jungle" id="download" type="submit" name="download" value="Download">
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade bs-modal-lg" id="modal_data" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                  <form class="form-horizontal" role="form" id="form_data">
                    <div class="form-body">
                    <div class="form-group">
                      <label class="control-label"><b>Personal Data</b>
                          <span class="required"> * </span>
                      </label>
                      <!-- <input type="hidden" name="lead_id"  value="<?php echo isset($_GET['lead_id']) ? $_GET['lead_id'] : ''; ?>"> -->
                    </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">FORM-ID</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control" name="formid" readonly value="<?php echo $formid; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">NAMA</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control uppercase" name="name"  value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">NO HP</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control uppercase" name="mobile_phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>"  >

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">DOB</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control" name="dob" id="dob">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">JENIS KELAMIN</label>
                          <div class="col-md-7">
                              <select class="form-control" name="gender">
                                <option value="">-- PILIH --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                              </select>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">MINUM 2 KAPSUL SECARA RUTIN ?</label>
                          <div class="col-md-7">
                              <select class="form-control" name="question1">
                                <option value="">-- PILIH --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                              </select>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">APAKAH SETIAP PAKET YANG DI BELI SELALU DI HABISKAN ?</label>
                          <div class="col-md-7">
                              <select class="form-control" name="question2">
                                <option value="">-- PILIH --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                              </select>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">APAKAH ANDA MERASAKAN MANFAAT DAN HASILNYA ?</label>
                          <div class="col-md-7">
                              <select class="form-control" name="question3" id="question3">
                                <option value="">-- PILIH --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                              </select>

                          </div>
                      </div>
                      <div id="benefit">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> JIKA YA, BODY</label>
                            <div class="col-md-7">
                                <select class="form-control" name="benefit_body" id="benefit_body">
                                  <option value="">-- PILIH --</option>
                                  <option value="Lebih Bugar">Lebih Bugar</option>
                                  <option value="Berenergi">Berenergi</option>
                                  <option value="Lebih Sehat">Lebih Sehat</option>
                                  <option value="Lainnya">Lainnya, (opsional)</option>
                                </select>
                            </div>
                        </div>
                        <div id="benefit_body_opsional">
                          <div class="form-group">
                              <label class="col-md-3 control-label"> OPSIONAL BODY</label>
                              <div class="col-md-7">
                                  <textarea class="form-control" name="benefit_body_opsional"></textarea>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> JIKA YA, WEIGHT</label>
                            <div class="col-md-7">
                                <select class="form-control" name="benefit_weight" id="benefit_weight">
                                  <option value="">-- PILIH --</option>
                                  <option value="Merasa Lebih Ringan">Merasa Lebih Ringan</option>
                                  <option value="Penurunan Berat Badan">Penurunan Berat Badan</option>
                                  <option value="Peningkatan Pencernaan">Peningkatan Pencernaan</option>
                                  <option value="Lainnya">Lainnya, (opsional)</option>
                                </select>
                            </div>
                        </div>
                        <div id="benefit_weight_opsional">
                          <div class="form-group">
                              <label class="col-md-3 control-label"> OPSIONAL WEIGHT</label>
                              <div class="col-md-7">
                                  <textarea class="form-control" name="benefit_weight_opsional"></textarea>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> JIKA YA, SKIN</label>
                            <div class="col-md-7">
                                <select class="form-control" name="benefit_skin" id="benefit_skin">
                                  <option value="">-- PILIH --</option>
                                  <option value="Mengurangi Jerawat">Mengurangi Jerawat</option>
                                  <option value="Pipi lebih tirus">Pipi lebih tirus</option>
                                  <option value="Kulit bercahaya alami">Kulit bercahaya alami</option>
                                  <option value="Lainnya">Lainnya, (opsional)</option>
                                </select>
                            </div>
                        </div>
                        <div id="benefit_skin_opsional">
                          <div class="form-group">
                              <label class="col-md-3 control-label"> OPSIONAL SKIN</label>
                              <div class="col-md-7">
                                  <textarea class="form-control" name="benefit_skin_opsional"></textarea>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">EMAIL</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control" name="email" id="email">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">PEMESANAN ?</label>
                          <div class="col-md-7">
                              <select class="form-control" name="booking" id="booking">
                                <option value="">-- PILIH --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                              </select>

                          </div>
                      </div>
                      <div id="quantity">
                        <div class="form-group">
                            <label class="col-md-3 control-label">PAKET RAMADHAN (BODY & WEIGHT)</label>
                            <div class="col-md-2">
                              <div class="input-group">
                                <span class="input-group-addon"> Rp.</span>
                                <input type="text" class="form-control" name="harga_paket_ramadhan" id="harga_paket_ramadhan" value="336000" readonly>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon"> Qty.</span>
                                  <input type="number" class="form-control" name="qty_paket_ramadhan" id="qty_paket_ramadhan" onkeyup="sum_paket_ramadhan()">
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="input-group">
                                <span class="input-group-addon"> Sub Total.</span>
                                <input type="text" class="form-control" name="sub_total_paket_ramadhan" id="sub_total_paket_ramadhan" readonly>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">BODY</label>
                            <div class="col-md-2">
                              <div class="input-group">
                                <span class="input-group-addon"> Rp.</span>
                                <input type="text" class="form-control" name="harga_body" id="harga_body" value="168000" readonly>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon"> Qty.</span>
                                  <input type="number" class="form-control" name="qty_body" id="qty_body" onkeyup="sum_body()">
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="input-group">
                                <span class="input-group-addon"> Sub Total.</span>
                                <input type="number" class="form-control" name="sub_total_body" id="sub_total_body" readonly>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">WEIGHT</label>
                            <div class="col-md-2">
                              <div class="input-group">
                                <span class="input-group-addon"> Rp.</span>
                                <input type="text" class="form-control" name="harga_weight" id="harga_weight" value="168000" readonly>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon"> Qty.</span>
                                  <input type="number" class="form-control" name="qty_weight" id="qty_weight" onkeyup="sum_weight()">
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="input-group">
                                <span class="input-group-addon"> Sub Total.</span>
                                <input type="number" class="form-control" name="sub_total_weight" id="sub_total_weight" readonly>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">SKIN</label>
                            <div class="col-md-2">
                              <div class="input-group">
                                <span class="input-group-addon"> Rp.</span>
                                <input type="text" class="form-control" name="harga_skin" id="harga_skin" value="168000" readonly>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon"> Qty.</span>
                                  <input type="number" class="form-control" name="qty_skin" id="qty_skin" onkeyup="sum_skin()">
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="input-group">
                                <span class="input-group-addon"> Sub Total.</span>
                                <input type="number" class="form-control" name="sub_total_skin" id="sub_total_skin" readonly>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-7">
                              <div class="input-group">
                                <span class="input-group-addon"> Total. Rp.</span>
                                <input type="number" class="form-control" name="total" id="total" readonly>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">ALAMAT</label>
                          <div class="col-md-7">
                              <textarea class="form-control uppercase" name="address"> </textarea>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">KOTA</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control uppercase" name="city">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">KODE POS</label>
                          <div class="col-md-7">
                              <input type="number" class="form-control" name="zip">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">NAMA PENERIMA</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control" name="recipient_name">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">NO HP PENERIMA</label>
                          <div class="col-md-7">
                              <input type="number" class="form-control" name="recipient_hp">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">KARTU KREDIT</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control" name="credit_card" id="credit_card">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">EXPIRED</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control" name="expired" id="expired">

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">AGENT</label>
                          <div class="col-md-7">
                              <input type="text" class="form-control uppercase" name="agent" id="agent" value="<?php echo isset($_GET['agent']) ? $_GET['agent'] : ''; ?>" autocomplete="off">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">STATUS</label>
                          <div class="col-md-7">
                              <select class="form-control" name="status_data">
                                <option value=""> -- Pilih -- </option>
                                <option value="SUBMIT"> SUBMIT</option>
                                <option value="APPROVE"> APPROVE</option>
                                <option value="REJECT"> REJECT</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  </form>
                </div>
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
</div>
<!-- END PAGE CONTENT INNER -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {

    fetch_data('no');

    function fetch_data(is_date_search, start_date='', end_date='', status_filter='')
    {
      var table;
      table = $('#table').DataTable({

        "deferRender":    true,
        "scrollCollapse": true,
        "scrollX":        true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax":{
          url : "<?php echo site_url('data/ajax_list')?>", // json datasource
          type: "POST",
          data: {is_date_search:is_date_search, start_date:start_date, end_date:end_date, status_filter:status_filter}
        },
        "columnDefs": [
        {
          "orderable": false
        }
        ],

      });
    }

    $('#filter').click(function(){
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      var status_filter = $('#status_filter').val();
      var payment_option = $('#payment_d').val();
      if(start_date != '' || end_date !='' || status_filter !='')
      {
      $('#table').DataTable().destroy();
       fetch_data('yes', start_date, end_date, status_filter );
      }
      else
      {
       alert("Silahkan Isi Kolom");
      }
      $('#modal_filter').modal('hide');
     });

     $('#dob, #start_date, #end_date').datepicker({
       rtl: App.isRTL(),
       format: 'dd-mm-yyyy',
       autoclose: true,
       todayHighlight: true
     });

     $("#dob").inputmask("dd-mm-yyyy", {
         clearMaskOnLostFocus: true
     });
     $("#credit_card").inputmask("9999-9999-9999-9999", {
         placeholder: " ",
         clearMaskOnLostFocus: true
     });
     $("#expired").inputmask("99/99", {
         clearMaskOnLostFocus: true
     });

     $('#benefit, #quantity').hide();
     $('#benefit_body_opsional, #benefit_weight_opsional, #benefit_skin_opsional').hide();

     $(document).on("change", "#benefit_body", function(){
       if($('#benefit_body').val() == "Lainnya"){
         $('#benefit_body_opsional').show();
       }else{
         $('#benefit_body_opsional').hide();
       }
     });
     $(document).on("change", "#benefit_weight", function(){
       if($('#benefit_weight').val() == "Lainnya"){
         $('#benefit_weight_opsional').show();
       }else{
         $('#benefit_weight_opsional').hide();
       }
     });
     $(document).on("change", "#benefit_skin", function(){
       if($('#benefit_skin').val() == "Lainnya"){
         $('#benefit_skin_opsional').show();
       }else{
         $('#benefit_skin_opsional').hide();
       }
     });
     $(document).on("change", "#question3", function(){
       if($('#question3').val() == "Ya"){
         $('#benefit').show();
       }else{
         $('#benefit').hide();
       }
     });

     $(document).on("change", "#question3", function(){
       if($('#question3').val() == "Ya"){
         $('#benefit').show();
       }else{
         $('#benefit').hide();
       }
     });

     $(document).on("change", "#booking", function(){
       if($('#booking').val() == "Ya"){
         $('#quantity').show();
       }else{
         $('#quantity').hide();
       }
     });


    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });


  });

  $('#success').hide();

  document.getElementById("data").className = "active";

  function sum_paket_ramadhan() {
        var harga_paket_ramadhan = document.getElementById('harga_paket_ramadhan').value;
        var qty_paket_ramadhan = document.getElementById('qty_paket_ramadhan').value;
        var result = parseFloat(harga_paket_ramadhan) * parseFloat(qty_paket_ramadhan);
        if (!isNaN(result)) {
           document.getElementById('sub_total_paket_ramadhan').value = result;
        }else{
           document.getElementById('sub_total_paket_ramadhan').value = "";
        }
        sum_total();
  }

  function sum_body() {
        var harga_body = document.getElementById('harga_body').value;
        var qty_body = document.getElementById('qty_body').value;
        var result = parseFloat(harga_body) * parseFloat(qty_body);
        if (!isNaN(result)) {
           document.getElementById('sub_total_body').value = result;
        }else{
           document.getElementById('sub_total_body').value = "";
        }
        sum_total();
  }

  function sum_weight() {
        var harga_weight = document.getElementById('harga_weight').value;
        var qty_weight = document.getElementById('qty_weight').value;
        var result = parseFloat(harga_weight) * parseFloat(qty_weight);
        if (!isNaN(result)) {
           document.getElementById('sub_total_weight').value = result;
        }else{
           document.getElementById('sub_total_weight').value = "";
        }
        sum_total();
  }

  function sum_skin() {
        var harga_skin = document.getElementById('harga_skin').value;
        var qty_skin = document.getElementById('qty_skin').value;
        var result = parseFloat(harga_skin) * parseFloat(qty_skin);
        if (!isNaN(result)) {
           document.getElementById('sub_total_skin').value = result;
        }else{
           document.getElementById('sub_total_skin').value = "";
        }
        sum_total();
  }

  function sum_total() {

      var sub_total_paket_ramadhan = document.getElementById('sub_total_paket_ramadhan').value;
      if (document.getElementById('sub_total_paket_ramadhan').value != "") {
         var sub_total_paket_ramadhan = document.getElementById('sub_total_paket_ramadhan').value;
      }else{
         var sub_total_paket_ramadhan = "0";
      }

      var sub_total_body = document.getElementById('sub_total_body').value;
      if (document.getElementById('sub_total_body').value != "") {
         var sub_total_body = document.getElementById('sub_total_body').value;
      }else{
         var sub_total_body = "0";
      }

      var sub_total_weight = document.getElementById('sub_total_weight').value;
      if (document.getElementById('sub_total_weight').value != "") {
         var sub_total_weight = document.getElementById('sub_total_weight').value;
      }else{
         var sub_total_weight = "0";
      }

      var sub_total_skin = document.getElementById('sub_total_skin').value;
      if (document.getElementById('sub_total_skin').value != "") {
         var sub_total_skin = document.getElementById('sub_total_skin').value;
      }else{
         var sub_total_skin = "0";
      }

        var result = parseInt(sub_total_paket_ramadhan) + parseInt(sub_total_body) + parseInt(sub_total_weight) + parseInt(sub_total_skin);
        if (!isNaN(result)) {
           document.getElementById('total').value = result;
        }else{
           document.getElementById('total').value = "";
        }

  }

function filter_data() {
    $('#modal_filter').modal('show');
    $('#filter').show();
    $('.modal-title').text('Filter Data');
    $('#download').hide();
  }
function download_data() {
  $('#modal_filter').modal('show');
  $('.modal-title').text('Download Data');
  $('#download').show();
  $('#filter').hide();
}
/* -- Action -- */
  function add() {
    save_method = 'add';
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#form_data')[0].reset(); // reset form on modals
    $('#modal_data').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }

  function get_data(formid){
  save_method = 'update';
  $('#form_data')[0].reset();
      $.ajax({
        url: "<?php echo site_url('data/get_data')?>/" + formid,
        type: "GET",
        dataType: "JSON",
        success: function (data) {

              var a = new Date(data.dob);
              var b = a.getDate();
              var c = a.getMonth()+1;
              var d = a.getFullYear();
              var dob = (b <= 9 ? '0' + b : b) + "/" + (c <= 9 ? '0' + c : c) + "/" + d;
              if(isNaN(a) || isNaN(b) || isNaN(c) || isNaN(d)){
                var dob = "";
              }else{
                var dob;
              }

              $('[name="formid"]').val(data.formid);
              $('[name="name"]').val(data.name);
              $('[name="mobile_phone"]').val(data.mobile_phone);
              $('[name="dob"]').val(dob);
              $('[name="gender"]').val(data.gender);
              $('[name="question1"]').val(data.question1);
              $('[name="question2"]').val(data.question2);
              $('[name="question3"]').val(data.question3);
              $('[name="benefit_body"]').val(data.benefit_body);
              $('[name="benefit_body_opsional"]').val(data.benefit_body);
              $('[name="benefit_weight"]').val(data.benefit_weight);
              $('[name="benefit_weight_opsional"]').val(data.benefit_weight);
              $('[name="benefit_skin"]').val(data.benefit_skin);
              $('[name="benefit_skin_opsional"]').val(data.benefit_skin);
              $('[name="email"]').val(data.email_data);
              $('[name="booking"]').val(data.booking);
              $('[name="harga_paket_ramadhan"]').val(data.harga_paket_ramadhan);
              $('[name="qty_paket_ramadhan"]').val(data.qty_paket_ramadhan);
              $('[name="sub_total_paket_ramadhan"]').val(data.sub_total_paket_ramadhan);
              $('[name="harga_body"]').val(data.harga_body);
              $('[name="qty_body"]').val(data.qty_body);
              $('[name="sub_total_body"]').val(data.sub_total_body);
              $('[name="harga_weight"]').val(data.harga_weight);
              $('[name="qty_weight"]').val(data.qty_weight);
              $('[name="sub_total_weight"]').val(data.sub_total_weight);
              $('[name="harga_skin"]').val(data.harga_skin);
              $('[name="qty_skin"]').val(data.qty_skin);
              $('[name="sub_total_skin"]').val(data.sub_total_skin);
              $('[name="total"]').val(data.total);
              $('[name="address"]').val(data.address);
              $('[name="city"]').val(data.city);
              $('[name="zip"]').val(data.zip);
              $('[name="recipient_name"]').val(data.recipient_name);
              $('[name="recipient_hp"]').val(data.recipient_hp);
              $('[name="credit_card"]').val(data.credit_card);
              $('[name="expired"]').val(data.expired);
              $('[name="agent"]').val(data.agent);
              $('[name="status_data"]').val(data.status_data);

              if($('#question3').val() == "Ya"){
                $('#benefit').show();
              }else{
                $('#benefit').hide();
              }

              if($('#booking').val() == "Ya"){
                $('#quantity').show();
              }else{
                $('#quantity').hide();
              }

              if($('#benefit_body').val() === null){
                $('#benefit_body').val('Lainnya')
                $('#benefit_body_opsional').show();
              }else{
                $('#benefit_body_opsional').hide();
              }

              if($('#benefit_weight').val() === null){
                $('#benefit_weight').val('Lainnya')
                $('#benefit_weight_opsional').show();
              }else{
                $('#benefit_weight_opsional').hide();
              }

              if($('#benefit_skin').val() === null){
                $('#benefit_skin').val('Lainnya')
                $('#benefit_skin_opsional').show();
              }else{
                $('#benefit_skin_opsional').hide();
              }

              $('#modal_data').modal('show');
              $('.modal-title').text('UPDATE DATA');
        },
        error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
        }
      });
}


  function save() {
    var url;
    if(save_method == 'add')
    {
        url = "<?php echo site_url('data/add_data')?>";
    }
    else{
      url = "<?php echo site_url('data/update_data')?>";
    }
          // ajax adding data to database
           $.ajax({
             url : url,
             type: "POST",
             data: $('#form_data').serialize(),
             dataType: "JSON",
             success: function(data, response)
             {
               //if success close modal and reload ajax table
               if(data.status) //if success close modal and reload ajax table
                  {
                      $('#modal_data').modal('hide');
                      location.reload();
                      $('#success').show();
                      // location.reload();// for reload a page
                  }
                  else
                  {
                      for (var i = 0; i < data.inputerror.length; i++)
                      {
                          $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                          $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                      }
                  }

             },
             error: function (jqXHR, textStatus, errorThrown)
             {
                 alert('Error, Try again!');
             }
         });
  }

  function delete_data(formid) {

        if(confirm('Are you sure delete this data?'))
        {
          // ajax delete data from database
            $.ajax({
              url : "<?php echo site_url('data/delete_data')?>/" + formid,
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
