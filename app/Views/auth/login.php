

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.phoenixcoded.net/mega-able/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 06:57:41 GMT -->
<head>
    <title>Login System</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" action="<?= route_to('login') ?>" method="post">
                            <div class="text-center text-white">
                                SIMRS DUNDA V.2021-1.0.1
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Sign In</h3>
                                            <?= csrf_field(); ?>
                                        </div>
                                    </div>
                                <?php if ($config->validFields === ['email']): ?>
                                    <div class="form-group form-primary">
                                        <input type="text" name="login" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><?=lang('Auth.email')?></label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                <?php else: ?>
                                        <div class="form-group form-primary">
                                        <input type="text" name="login" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><?=lang('Auth.emailOrUsername')?></label>
                                    </div>
                                <?php endif; ?>

                                    <div class="form-group form-primary">
                                        <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><?=lang('Auth.password')?></label>
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                   
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20"><?=lang('Auth.loginAction')?></button>
                                        </div>
                                    </div>
                                    <hr/>
                                   

                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Kunjungi Kami:</p>
                                            <p class="text-inverse text-left"><a href="http://rsdunda.com/" target="_blank"><b>WWW.RSUDUNDA.COM</b></a></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="<?= base_url(); ?>/template/files/assets/images/logo-pemda.jpg" class="img-40 img-radius mCS_img_loaded" alt="small-logo.png">
                                        </div>
                                        <div class="col-md-12">
                                            <?php if ($config->allowRegistration) : ?>
                                                                <p>Belum punya akun?<a href="<?= route_to('register') ?>">Daftar Sekarang!</a></p>
                                            <?php endif; ?>
                                            <?php if ($config->activeResetter): ?>
                                                                <p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?= base_url(); ?>/template/files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?= base_url(); ?>/template/files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?= base_url(); ?>/template/files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?= base_url(); ?>/template/files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?= base_url(); ?>/template/files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
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


<!-- Mirrored from html.phoenixcoded.net/mega-able/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 06:57:41 GMT -->
</html>
