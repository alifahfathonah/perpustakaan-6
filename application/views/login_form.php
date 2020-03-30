<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplikasi Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>asset/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>asset/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>asset/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
              <h1>Login Form</h1>
              <br />
              <br />
            <?php if (!empty($this->session->flashdata('error'))): ?>
        		<?= $this->session->flashdata("error") ?></p>
    		<?php endif ?>
              <?= form_open($form_action, ['name' => 'login_form', 'id' => 'login_form']); ?>



              <div>
              	<?= form_input('username', $input->username, ['class' => 'form-control', 'placeholder' => 'Username']) ?>
              	<?= form_error('username', '<p class="field_error">', '</p>');?>
              </div>
              <div>
              <?= form_password('password', $input->password, ['class' => 'form-control', 'placeholder' => 'Password']) ?>
              <?= form_error('password', '<p class="field_error">', '</p>');?>
              </div>
              <br />
              <div>
               <input type="submit" name="submit" class="btn btn-default submit" id="submit" value="Submit"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Perpustakaan</h1>
                  <p></p>
                </div>
              </div>
         
          <?= form_close() ?>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              	
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> </h1>
                  <p></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>