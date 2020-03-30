<?php

    $perPage = 5;
    $keywords = $this->input->get('keywords');

    if (isset($keywords)) {
        $page = $this->uri->segment(3);
    } else {
        $page = $this->uri->segment(2);
    }

    // No urut data tabel.
    $i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<?php $this->load->view('_partial/flash_message') ?>
<!-- Table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="title_left" align="center">
   <h3><small>Table datas</small><br /></h3>
</div>

<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i>Table datas</h2>
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
                <li role="presentation" class="active"><?= anchor('datas', 'List'); ?>
                </li>
                <li role="presentation" class=""><?= anchor('datas/create', 'Form'); ?>
                </li>
            </ul>
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <h2>datas<small></small></h2>
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

            <?= form_open("datas/search", ['method' => 'GET']) ?>
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


          <?php if($datas): ?>
          <table border="1px" id="datatable-buttons" class="table table-striped table-bordered" align="center">
            <thead>
              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama_ibu</th>
                                <th scope="col">Umur Ibu</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody>
                                  <?php foreach($datas as $data): ?>
                                    <tr>
                                      <td><?= ++$i ?></td>
                                      <td><?= $data->nama_ibu ?></td>
                                      <td><?= $data->umur_ibu ?></td>

                                    <td>
                                        <?php if(!empty($data->foto)): ?>
                                            <div class="profile_pic">
                                                <img src='<?php echo base_url("foto/$data->foto") ?>' alt="<?= $data->foto ?>" class="avatar">
                                            </div>
                                        <?php else: ?>
                                                <img src='<?php echo base_url("foto/no_cover.jpg") ?>' alt="Tidak ada Foto" class="avatar">
                                        <?php endif ?>
                                    </td>
                                     
                                    <td>
                                        <?= anchor("Ibu/update/$data->id_ibu", "Edit", ["class" => "btn btn-info btn-xs"]); ?>
                                    </td>
                                    <td>
                                        <?= form_open("Ibu/delete"); ?>
                                            <?= form_hidden("id_ibu", $data->id_ibu) ?>
                                            <?= form_hidden("foto", $data->foto) ?>
                                            <?= form_button(["type" => "submit", "class" => "btn btn-danger btn-xs", "content" => "Hapus", "onclick" => "return confirm('apakah anda yakin akan mengahapus nya')"]); ?>
                                        <?= form_close(); ?>
                                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="14">Jumlah <?= $jumlah ?></td>
              </tr>
            </tfoot>

          <?php else: ?>
                Tidak ada data
                                <?php echo $this->session->userdata("is_ada") ?>

          <?php endif; ?>
          </table>

            <div class="">
            	<?php if($pagination == null): ?>
              		<?= $pagination ?>
              	<?php endif; ?>

            </div>
        <div align="right" class="but_list">
                <?= anchor("Ibu/create", 'Tambah', ['class' => 'btn btn-success']) ?>
                <?= anchor("Ibu/Download", 'Export', ['class' => 'btn btn-warning']) ?>
        </div>
        <div align="right" class="but_list">
                
        </div>
            </div>
        </div>
    </div>
</div>