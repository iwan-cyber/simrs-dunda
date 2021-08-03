
<!DOCTYPE html>
<head>
    <title>Registrasi</title>
    
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Phoenixcoded" />
      <!-- Favicon icon -->

      <link rel="icon" href="<?= base_url(); ?>/template/files/assets/images/logo-pemda.jpg" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/template/files/bower_components/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?= base_url(); ?>/template/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/template/files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/template/files/assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/template/files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/template/files/assets/css/style.css">
  </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary"><?=lang('Auth.register')?></h3>
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                    </div>
                                    <form class="md-float-material form-material" action="<?= route_to('register'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="text" name="username" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" value="<?= old('username') ?>">
                                            <span class="form-bar"></span>
                                            <label class="float-label"><?=lang('Auth.username')?></label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="text" name="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" value="<?= old('email') ?>" >
                                            <span class="form-bar"></span>
                                            <label class="float-label"><?=lang('Auth.email')?></label>
                                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-primary">
                                                    <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label"><?=lang('Auth.password')?></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-primary">
                                                    <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label"><?= lang('Auth.repeatPassword'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><?=lang('Auth.register')?></button>
                                            </div>
                                        </div>
                                    </form>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-inverse text-left m-b-0">Kunjungi Kami:</p>
                                                <p class="text-inverse text-left"><a href="#"><b>Website RSUD Dunda</b></a></p>
                                            </div>
                                            <div class="col-md-4">
                                                SIMRS DUNDA<br>
                                                V-2021-0.0.0.1
                                            </div>
                                            <div class="col-md-12">
                                            <p>Sudah punya akun? <a href="<?= route_to('login'); ?>">Login Sekarang</a></p>
                                            </div>
                                        </div>
                                
                            </div>
                        </div>
                  
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
   
<!-- Required Jquery -->
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="<?= base_url(); ?>/template/files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>/template/files/assets/js/common-pages.js"></script>
</body>


<!-- Mirrored from html.phoenixcoded.net/mega-able/default/auth-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 07:06:13 GMT -->
</html>
