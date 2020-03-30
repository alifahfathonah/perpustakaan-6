<div class="title_left" align="center">
       <h3><small></small><br />Form siswa</h3>
</div>
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i> Form siswa</h2>
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
                <li role="presentation" class=""><?= anchor('siswa', 'List'); ?>
                </li>
                <li role="presentation" class="active"><?= anchor('siswa/create', 'Form'); ?>
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
                            <?= form_hidden('id_siswa', isset($input->id_siswa) ? $input->id_siswa : '', ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Nis', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('nis', $input->nis, ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('nis') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Nama Siswa', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('nama_siswa', $input->nama_siswa, ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('nama_siswa') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Email', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('email', $input->email, ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('email') ?>
                        </div>
                    </div>

                   <div class="form-group">
                                <div class="col-2">
                                    <p class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="block-label">
                                        <?= form_radio('jenis_kelamin', 'l',
                                            isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'l') ? true : false)
                                        ?> Laki Laki
                                    </label>
                                    <label class="block-label">
                                        <?= form_radio('jenis_kelamin', 'p',
                                            isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'p') ? true : false)
                                        ?> Perempuan
                                    </label>
                                </div>
                                <div class="col-4">
                                    <?= form_error('jenis_kelamin') ?>
                                </div>
                    </div>

                    
                    <?php if(!empty($input->foto)): ?>

                        <img src='<?php echo base_url("foto/$input->foto") ?>' alt="<?= $input->nama_siswa ?>">

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