<div class="title_left" align="center">
       <h3><small></small><br />Form user</h3>
</div>
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i> Form user</h2>
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
                <li role="presentation" class=""><?= anchor('user', 'List'); ?>
                </li>
                <li role="presentation" class="active"><?= anchor('user/create', 'Form'); ?>
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
                            <?= form_hidden('id_user', isset($input->id_user) ? $input->id_user : '', ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Username', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('username', $input->username, ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('username') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Password', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('password', $input->password, ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Nama User', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_input('nama_user', $input->nama_user, ["id" => "first-name", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('nama_user') ?>
                        </div>
                    </div>

                    <div class="form-group">
                                <div class="col-2">
                                    <p class="control-label col-md-3 col-sm-3 col-xs-12">Level</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="block-label">
                                        <?= form_radio('level', 'admin',
                                            isset($input->level) && ($input->level == 'admin') ? true : false)
                                        ?> Admin
                                    </label>
                                    <label class="block-label">
                                        <?= form_radio('level', 'operator',
                                            isset($input->level) && ($input->level == 'operator') ? true : false)
                                        ?> Operator
                                    </label>
                                </div>
                                <div class="col-4">
                                    <?= form_error('level') ?>
                                </div>
                    </div>

                    <div class="form-group">
                                <div class="col-2">
                                    <p class="control-label col-md-3 col-sm-3 col-xs-12">Blokir</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="block-label">
                                        <?= form_radio('is_blokir', 'y',
                                            isset($input->is_blokir) && ($input->is_blokir == 'y') ? true : false)
                                        ?> Ya
                                    </label>
                                    <label class="block-label">
                                        <?= form_radio('is_blokir', 'n',
                                            isset($input->is_blokir) && ($input->is_blokir == 'n') ? true : false)
                                        ?> Tidak
                                    </label>
                                </div>
                                <div class="col-4">
                                    <?= form_error('is_blokir') ?>
                                </div>
                    </div>

                   
                    <br />
                    <br />
                    <br />

                <?= form_button(['type'=> 'submit', 'content' => 'simpan', 'class' => 'btn btn-success']) ?>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>