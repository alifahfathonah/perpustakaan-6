<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="title_left" align="center">
       <h3><small></small><br />Form buku</h3>
</div>
<div class="x_panel">
    
    <div class="x_content">
        
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
                            <?= form_hidden('id_buku', isset($input->id_buku) ? $input->id_buku : '', ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Kode Buku', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('kode_buku', $input->kode_buku, ["id" => "kode_buku", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('kode_buku') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Judul Buku', 'first-name', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <?= form_dropdown('id_judul', getDropdownList('judul', ['id_judul', 'judul_buku']), $input->id_judul, ['class' => 'form-control', "id" => "id_judul"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('id_judul') ?>
                        </div>
                    </div>

                   <div class="form-group">
                                <div class="col-2">
                                    <p class="control-label col-md-3 col-sm-3 col-xs-12">Status</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="block-label">
                                        <?= form_radio('is_ada', 'y',
                                            isset($input->is_ada) && ($input->is_ada == 'y') ? true : false)
                                        ?> Ada
                                    </label>
                                    <label class="block-label">
                                        <?= form_radio('is_ada', 'n',
                                            isset($input->is_ada) && ($input->is_ada == 'n') ? true : false)
                                        ?> Dipinjam
                                    </label>
                                </div>
                                <div class="col-4">
                                    <?= form_error('is_ada') ?>
                                </div>
                    </div>

                    
                    <?php if(!empty($input->foto)): ?>

                        <img src='<?php echo base_url("foto/$input->foto") ?>' alt="<?= $input->nama_buku ?>">

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
<script type="text/javascript">
    $(document).ready(function() {
        
    })
</script>