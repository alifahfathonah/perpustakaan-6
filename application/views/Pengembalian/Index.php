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
<div class="title_left" align="center">
   <h3><small>Table pengembalian</small><br /></h3>
</div>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i>Table pengembalian</h2>
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
                <li role="presentation" class="active"><?= anchor('pengembalian', 'List'); ?>
                </li>
            </ul>
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <h2>pengembalian<small></small></h2>
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

            <?= form_open("Pengajar/search", ['method' => 'GET']) ?>
            <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'Search for...', 'class' => 'form-control']) ?>
                        <span class="input-group-btn">
                            <?= form_button(["content" => "Cari", "type" => "submit", "class" => "btn btn-default"]) ?>
                        </span>

                    </div>
                </div>
            </div>
            </div>
        <?= form_close() ?>


					<?php if($pengembalians): ?>
					<table border="1px" id="datatable-buttons" class="table table-striped table-bordered" align="center">
						<thead>
							<tr>
                                <th scope="col">NO</th>
								<th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kode Buku</th>
                                <th scope="col">Id Judul</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Email</th>
                                <th scope="col">Kembali?</th>
                                <th scope="col">Hapus</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($pengembalians as $pengembalian): ?>
								<tr>
									<td><?= ++$i ?></td>
									<td><?= $pengembalian->tanggal_pinjam ?></td>
                                    <td><?= $pengembalian->nama_siswa ?></td>
                                    <td><?= $pengembalian->kode_buku ?></td>
                                    <td><?= $pengembalian->judul_buku ?></td>
                                    <td>Rp. <?= number_format($pengembalian->denda, 0, ',', '.') ?></td>
                                    <td>
                                        <?php if($pengembalian->denda != 0): ?>
                                            <?= form_open("pengembalian/kirimEmail"); ?>
                                            <?= form_hidden("nama_siswa", $pengembalian->nama_siswa) ?>
                                            <?= form_hidden("email", $pengembalian->email) ?>
                                            <?= form_button(["type" => "submit", "class" => "btn btn-danger btn-xs", "content" => "Kirim Peringatan"]); ?>
                                        <?= form_close(); ?>

                                        <?php else: ?>
                                        
                                            <?= "Tidak ada Peringatan"; ?>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?= form_open("pengembalian/kembalikan"); ?>
                                            <?= form_hidden("id_pinjam", $pengembalian->id_pinjam) ?>
                                            <?= form_hidden("id_buku", $pengembalian->id_buku) ?>
                                            <?= form_hidden("denda", $pengembalian->denda) ?>
                                            <?= form_button(["type" => "submit", "class" => "btn btn-danger btn-xs", "content" => "Kembalikan", "onclick" => "return confirm('Kembalikan Buku?')"]); ?>
                                        <?= form_close(); ?>
                                        
                                        </td>
                                    <td>
                                        <?= form_open("pengembalian/delete"); ?>
                                            <?= form_hidden("id_pinjam", $pengembalian->id_pinjam) ?>
                                            <?= form_button(["type" => "submit", "class" => "btn btn-danger btn-xs", "content" => "Hapus", "onclick" => "return confirm('apakah anda yakin akan mengahapus nya')"]); ?>
                                        <?= form_close(); ?>
                                    </td>
                                    
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="13">Jumlah <?= $jumlah ?></td>
							</tr>
						</tfoot>

					<?php else: ?>
								Tidak ada data
                                <?php echo $this->session->userdata("is_ada") ?>

					<?php endif; ?>
					</table>

						<div class="">
							<?= $pagination ?>
						</div>


            </div>
        </div>
        
    </div>
</div>
<script>
  var notif = document.getElementById("ini");

  function ini(){
    notif.innerHTML = null;
  }

  setTimeout(ini, 3000);
</script>