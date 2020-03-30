<?php
        $i = 0;
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>




<div class="title_left" align="center">
       <h3><small></small><br />Form laporan pengembalian</h3>
</div>
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i> Form laporan pengembalian</h2>
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
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active" id="adaa"><?= anchor('laporan pengembalian/create', 'Form'); ?>
                </li>
            </ul>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Silahklan Masukan Data <small></small></h2>
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
                <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>


                <?php $add = ["id"=>"demo-form2" ,"data-parsley-validate class" => "form-horizontal form-label-left"]; ?>
                <?= form_open_multipart($form_action, $add) ?>

               
                    <div class="form-group">
                        <?= form_label('Tanggal Awal', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('tanggal_awal', $input->tanggal_awal, ["id" => "single_cal2", "required" => "required", "class" => "form-control has-feedback-left", "placeholder" => "First Name", "aria-describedby" => "inputSuccess2Status2"]) ?>
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Tanggal Akhir', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('tanggal_akhir', $input->tanggal_akhir, ["id" => "single_cal3", "required" => "required", "class" => "form-control has-feedback-left", "placeholder" => "First Name", "aria-describedby" => "inputSuccess2Status2"]) ?>
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    
                   
                    
                    <br />
                    <br />
                    <br />
                     <?php if(!$first_load): ?>
                        <?php if($pengembalians): ?>
                        <table border="1px" id="datatable-buttons" class="table table-striped table-bordered" align="center">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Kode Buku</th>
                                    <th scope="col">Judul Buku</th>
 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pengembalians as $pengembalian): ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $pengembalian->nama_siswa ?></td>
                                        <td><?= $pengembalian->tanggal_pinjam ?></td>
                                        <td><?= $pengembalian->kode_buku ?></td>
                                        <td><?= $pengembalian->judul_buku ?></td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                
                            </tfoot>

                    <?php else: ?>
                                Tidak ada data
                                <br />
                                <br />
                                <?php echo $this->session->userdata("is_ada") ?>

                    <?php endif; ?>
                        
                        <?= anchor("Laporan/download2/".$tanggalAwal."/".$tanggalAkhir, "Download", ['class' => 'btn btn-danger']) ?>
                    <?php endif ?>


                <?= form_button(['type'=> 'submit', 'content' => 'simpan', 'class' => 'btn btn-success']) ?>

                <?= form_close(); ?>
            </div>
        </div>

    </div>
</div>



               





	</body>
        <script type="text/javascript">
        // Build the chart
           Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Grafik Transaksi Buku'
    },
    xAxis: {
        categories: ['Buku yang Sudah Di kembalikan', 'Buku Yang Belum Di Kembalikan']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Peminjaman Dan Pengembalian Buku'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Perpustakaan SMK Fadilah',
        data: [<?php echo $data2 ?>, <?php echo $data1 ?>]
    }]
});

    </script>

     

</html>