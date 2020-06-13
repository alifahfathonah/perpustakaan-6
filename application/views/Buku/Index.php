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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery-ui.js" type="text/javascript"></script>
<div id="ini">
  <?php $this->load->view('_partial/flash_message') ?>
</div>
<!-- Table -->
<div class="title_left" align="center">
   <h3><small>Table buku</small><br /></h3>
</div>

<div class="x_panel">
    
    <div class="x_content">
        
        <div class="x_panel">
            
            <div class="x_content">

            <?= form_open("Buku/search", ['method' => 'GET']) ?>
            <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'Cari Kode Buku..', 'class' => 'form-control', "id" => "title"]) ?>
                        <span class="input-group-btn">
                            <?= form_button(["content" => "Cari", "type" => "submit", "class" => "btn btn-default"]) ?>
                        </span>

                    </div>
                </div>
            </div>
            </div>
        <?= form_close() ?>


					<?php if($bukus): ?>
					<table border="1px" id="datatable-buttons" class="table table-striped table-bordered" align="center">
						<thead>
							<tr>
                                <th scope="col">NO</th>
								<th scope="col">Kode Buku</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Status Buku</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($bukus as $buku): ?>
								<tr>
									<td><?= ++$i ?></td>
									<td><?= $buku->kode_buku ?></td>
                                    <td><?= $buku->judul_buku ?></td>
                                    <td><?= $buku->is_ada == 'y' ? "Ada" : "Di Pinjam" ?></td>
                                    <td>
                                        <?= anchor("buku/edit/$buku->id_buku", "Edit", ["class" => "btn btn-info btn-xs"]); ?>
                                    </td>
                                    <td>
                                        <?= form_open("buku/delete"); ?>
                                            <?= form_hidden("id_buku", $buku->id_buku) ?>
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
				<div align="right" class="but_list">
                <?= anchor("buku/create", 'Tambah', ['class' => 'btn btn-success']) ?>
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
