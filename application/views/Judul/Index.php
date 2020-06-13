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
   <h3><small>Table judul</small><br /></h3>
</div>

<div class="x_panel">
    
    <div class="x_content">
        
        <div class="x_panel">
            
        </div>
        <?= form_close() ?>


					<?php if($juduls): ?>
					<table border="1px" id="datatable-buttons" class="table table-striped table-bordered" align="center">
						<thead>
							<tr>
                                <th scope="col">NO</th>
								<th scope="col">Judul Buku</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Buku Tersedia</th>
                                <th scope="col">Buku Di Pinjam</th>
                                <th scope="col">Total Buku</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($juduls as $judul): ?>
								<tr>
									<td><?= ++$i ?></td>
									<td><?= $judul->judul_buku ?></td>
                                    <td><?= $judul->penulis ?></td>
                                    <td><?= $judul->penerbit ?></td>
                                    <td>
                                        <?php if(!empty($judul->cover)): ?>
                                            <div class="profile_pic">
                                                <img src='<?php echo base_url("cover/$judul->cover") ?>' width="150" alt="<?= $judul->cover ?>">
                                            </div>
                                        <?php else: ?>
                                                <img src='<?php echo base_url("cover/no_cover.jpg") ?>' alt="Tidak ada cover" class="avatar">
                                        <?php endif ?>
                                    </td>
                                    <td><?= $judul->jumlah_ada ?></td>
                                    <td><?= $judul->jumlah_dipinjam ?></td>
                                    <td><?= $judul->jumlah_total ?></td>
                                    <td>
                                        <?= anchor("judul/edit/$judul->id_judul", "Edit", ["class" => "btn btn-info btn-xs"]); ?>
                                    </td>
                                    <td>
                                        <?= form_open("judul/delete"); ?>
                                            <?= form_hidden("id_judul", $judul->id_judul) ?>
                                            <?= form_hidden("cover", $judul->cover) ?>
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
                <?= anchor("judul/create", 'Tambah', ['class' => 'btn btn-success']) ?>
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