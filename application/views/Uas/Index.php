<?php

    $perPage = 10;
    $keywords = $this->input->get('keywords');

    if (isset($keywords)) {
        $page = $this->uri->segment(3);
    } else {
        $page = $this->uri->segment(2);
    }

    // No urut data tabel.
    $i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<div id="ini">
  <?php $this->load->view('_partial/flash_message') ?>
</div>
<!-- Table -->
						
<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jumlah Penduduk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Provinsi</th>
                                <th>Jumlah Penduduk</th>
                            </tr>
                        </thead>
                        </tr>
                      </thead>
                      <tbody>
                            <?php foreach($uass as $uas): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $uas->nama_provinsi ?></td>
                                    <td><?= $uas->jumlah_penduduk ?></td>                                   
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                  </div>
                  <?= anchor("Uas/download/", "Download", ['class' => 'btn btn-danger']) ?>
                </div>
              </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
        <?php foreach ($uass as $uas): ?>
            {
                name: "<?php echo $uas->nama_provinsi ?>",
                y: <?php echo $uas->jumlah_penduduk ?>,

            },
        <?php endforeach ?>
    ]
    }]
});
</script>
<script>
  var notif = document.getElementById("ini");

  function ini(){
    notif.innerHTML = null;
  }

  setTimeout(ini, 3000);
</script>