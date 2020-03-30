<?php
$username = $this->session->userdata("username");
$nama_user = $this->session->userdata("nama_user");
$level = $this->session->userdata("level");
$profile = $this->session->userdata("profile");


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
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
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php if($profile != ""): ?>
                            <img class="img-responsive avatar-view" src="<?php echo base_url("profile/".$profile) ?>" alt="Avatar" title="<?php echo $nama_user ?>">
                          <?php else: ?>
                            <img class="img-responsive avatar-view" src='<?php echo base_url("profile/no_profile.jpg") ?>' alt="Avatar" title="<?php echo $nama_user ?>">
                          <?php endif ?>
                        </div>
                      </div>
                      <h3><?php echo $nama_user ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> Universitas Mercu Buana
                        </li>


                      <a class="btn btn-success" href="<?php echo base_url('index.php/Profile/gantiPass') ?>"><i class="fa fa-edit m-right-xs"></i> Ganti Password</a>
                      <br>
<a class="btn btn-success" href="<?php echo base_url('index.php/Profile/gantiFoto') ?>"><i class="fa fa-edit m-right-xs"></i> Ganti Foto</a>
                      <!-- start skills -->
                      <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                          </div>
                        </li>
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail User</h2>
                        </div>
                        
                      </div>
                      <!-- start of user-activity-graph -->
                      
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    
                          <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="true">Profile</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Nama</th>
                                  <th>Jabatan</th>
                                  <th class="hidden-phone">Username</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><?php echo $nama_user ?></td>
                                  <td><?php echo $level ?></td>
                                  <td class="hidden-phone"><?php echo $username ?></td>

                                </tr>
                                
                              </tbody>
                            </table>

                            <!-- start user projects -->
                            
                            <!-- end user projects -->

                          </div>

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<script>

    $(document).ready(function(){
      console.log("berhasil");
    });
</script>