<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="title_left" align="center">
       <h3><small></small><br />Form password</h3>
</div>
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-bars"></i> Form password</h2>
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
                <li role="presentation" class=""><?= anchor('password', 'List'); ?>
                </li>
                <li role="presentation" class="active"><?= anchor('password/create', 'Form'); ?>
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
                        <?= form_label('Password Baru', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_password('password1', $input->password1, ["id" => "pw1", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('password1') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= form_label('Ulangi Password Baru', 'first-name', ["class" => "control-label col-md-3 col-sm-3 col-xs-12"]) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= form_password('password2', $input->password2, ["id" => "pw2", "required" => "required", "class" => "form-control col-md-7 col-xs-12"]) ?>
                        </div>
                        <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                            <?= form_error('password2') ?>
                            <span id="notif"></span>
                        </div>
                    </div>

                    
                    <?php if(!empty($input->foto)): ?>

                        <img src='<?php echo base_url("foto/$input->foto") ?>' alt="<?= $input->nama_password ?>">

                    <?php endif ?>
                    <br />
                    <br />
                    <br />

                <?= form_button(['type'=> 'submit', 'content' => 'simpan', 'class' => 'btn btn-success', "id" => "but"]) ?>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var pass1, pass2;

        $('#pw1').keyup(function(event) {
           pass1 = $("#pw1").val();

        });

        console.log(pass1);

        $('#pw2').keyup(function(event) {
            console.log(pass1);
            if(pass1 == $('#pw2').val()) {
                $('#notif').text("Password sama");
            } else if(pass1 != $('#pw2').val()) {
                $('#notif').text("Password tidak Sama");
                console.log($("#but").type);
            }
        });
    });
</script>

