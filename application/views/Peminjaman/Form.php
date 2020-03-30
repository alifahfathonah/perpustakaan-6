
<div class="title_left" align="center">
       <h3><small></small><br />Form peminjaman</h3>
</div>
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i> Form peminjaman</h2>
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
                <li role="presentation" class=""><?= anchor('peminjaman', 'List'); ?>
                </li>
                <li role="presentation" class="active"><?= anchor('peminjaman/create', 'Form'); ?>
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
                <?php $add = ["id"=>"demo-form2" ,"data-parsley-validate class" => "form-horizontal form-label-left"]; ?>
                <?= form_open_multipart($form_action, $add) ?>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_hidden('id_pinjam', isset($input->id_pinjam) ? $input->id_pinjam : '', ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Nama Siswa', 'first-name', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <?= form_dropdown('id_siswa', getDropdownList('siswa', ['id_siswa', 'nama_siswa']), $input->id_judul, ['class' => 'form-control']) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('id_siswa') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Judul Buku</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="id_judul" id="judul" class="form-control">
                            <option value="" class="form-control">Please Select</option>
                            <?php
                            foreach ($judul as $jud) {
                                ?>
                                <option <?php echo $judul_selected == $jud->id_judul ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $jud->id_judul ?>"><?php echo $jud->judul_buku ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Buku</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="id_buku" id="buku">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($buku as $buk) {
                                ?>
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option <?php echo $buku_selected == $buk->id_judul ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $buk->id_judul ?>" value="<?php echo $buk->id_buku ?>"><?php echo $buk->kode_buku ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_hidden('tanggal_pinjam', date('Y-m-d'), ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_hidden('tanggal_kembali', "", ["id" => "first-name", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>

                    </div>

                    <script src="<?php echo base_url('asset/js/jquery-1.10.2.min.js') ?>"></script>
                    <script src="<?php echo base_url('asset/js/jquery.chained.min.js') ?>"></script>
                    <script>
                        $("#buku").chained("#judul"); // disini kita hubungkan buka dengan provinsi
                    </script>
                    
                    <?php if(!empty($input->foto)): ?>

                        <img src='<?php echo base_url("foto/$input->foto") ?>' alt="<?= $input->nama_peminjaman ?>">

                    <?php endif ?>
                    <br />
                    <br />
                    <br />

                <?= form_button(['type'=> 'submit', 'content' => 'simpan', 'class' => 'btn btn-success']) ?>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>