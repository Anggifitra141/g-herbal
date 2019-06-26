<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row widget-row">
      <?php if($this->session->userdata('level') != 'AGENT'){?>
        <div class="col-md-6">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Data</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-layers"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $data; ?>"><?php echo $data; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Submit</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue fa fa-reorder"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $data_submit; ?>"><?php echo $data_submit; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Approved</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green-jungle fa fa-check"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $approved; ?>"><?php echo $approved; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-6">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Send Back</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-yellow-lemon fa fa-undo"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $send_back; ?>"><?php echo $send_back; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-6">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Reject</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red fa fa-close"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $reject; ?>"><?php echo $reject; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
      <?php }?>
      <?php if($this->session->userdata('level') == 'AGENT'){?>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Daily Sales</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-layers"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $daily_sales; ?>"><?php echo $daily_sales; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Weekly Sales</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-layers"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $weekly_sales; ?>"><?php echo $weekly_sales; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Monthly Sales</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-layers"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $monthly_sales; ?>"><?php echo $monthly_sales; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Total Sales</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-layers"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $total_sales; ?>"><?php echo $total_sales; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Submit</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue fa fa-reorder"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $data_submit; ?>"><?php echo $data_submit; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Approved</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green-jungle fa fa-check"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $approved; ?>"><?php echo $approved; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Send Back</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-yellow-lemon fa fa-undo"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $send_back; ?>"><?php echo $send_back; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                <h4 class="widget-thumb-heading">Reject</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red fa fa-close"></i>
                    <div class="widget-thumb-body">

                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $reject; ?>"><?php echo $reject; ?></span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
      <?php }?>
    </div>
    <div class="mt-content-body">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-green-steel uppercase bold">Rate Presentase Sales</span>
                            <span class="caption-helper hide">weekly stats...</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div id="morris_chart_2" class="portlet-body-morris-fit morris-chart" style="height: 267px"> </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- END PAGE CONTENT INNER -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script>

  $(document).ready(function() {
    // AREA CHART
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    new Morris.Area({
      element: 'morris_chart_2',
      data: [
        { m: '2018-01', a: <?php echo $count1?>},
        { m: '2018-02', a: <?php echo $count2?>},
        { m: '2018-03', a: <?php echo $count3?>},
        { m: '2018-04', a: <?php echo $count4?>},
        { m: '2018-05', a: <?php echo $count5?>},
        { m: '2018-06', a: <?php echo $count6?>},
        { m: '2018-07', a: <?php echo $count7?>},
        { m: '2018-08', a: <?php echo $count8?>},
        { m: '2018-09', a: <?php echo $count9?>},
        { m: '2018-010', a: <?php echo $count10?>},
        { m: '2018-011', a: <?php echo $count11?>},
        { m: '2018-012', a: <?php echo $count12?>}
      ],
      xkey: 'm',
      ykeys: ['a'],
      labels: ['Data'],
      fillOpacity: 0.4,
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
        var month = months[x.getMonth()];
        return month;
      },
      dateFormat: function(x) {
        var month = months[new Date(x).getMonth()];
        return month;
      },
      pointFillColors: ['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors: ['#3598dc'],
    });
  })

  document.getElementById("dashboard").className = "active";

</script>
