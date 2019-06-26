<html>
  <head>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form class="form-horizontal createpolis-form" role="form" action="<?= site_url() ?>create_polis/add_data/" method="POST">
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
                    <input type="text" class="form-control uppercase" name="recipient_name">

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

            <div class="col-md-2 col-md-offset-9">
              <button type="submit" class="btn green" ><i class="fa fa-save"></i> Save </button>
            </div>
        </div>
        </form>
      </div>
    </div>
    <div style="padding-bottom: 50px">

    </div>
	<div class="page-footer">
    <div class="container">Application By : 2018 Anggi Fitrahandika &copy;
        <a style="color:blue;" target="blank" href="http://seiberms.com">Seiber Mitra Solusi</a> &nbsp;|&nbsp; All Right Reserved

    </div>
  </div><br/>
    <!-- BEGIN CORE PLUGINS -->

    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/pages/scripts/validate_form_cp.js" type="text/javascript"></script>
    <script>
      $(document).ready(function() {


     /*   $('.uppercase').val (function () {
            return this.value.toUpperCase();
        }); */
        /*$('#province, #city').select2({
          theme: "bootstrap",
          width: null
        }); */

        $('#dob').datepicker({
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

        $(document).on("change", "#booking", function(){
          if($('#booking').val() == "Ya"){
            $('#quantity').show();
          }else{
            $('#quantity').hide();
          }
        });


      });

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

      function save() {
          // ajax adding data to database
           $.ajax({
             url : "<?php echo site_url('create_polis/add_data')?>",
             type: "POST",
             data: $('#form_data').serialize(),
             dataType: "JSON",
             success: function(data, response)
             {
               //if success close window
               //if success close modal and reload ajax table
               if(data.status) //if success close modal and reload ajax table
                  {
                    alert('success');
                    window.close();
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

    </script>

  </body>
</html>
