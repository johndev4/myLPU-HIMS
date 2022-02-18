<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?= csrf_meta() ?>
    <title>myLPU HIMS: <?= $page_title ?></title>

    <!-- Webapp Icon -->
    <link rel="icon" href="<?= base_url('assets/images/appicon.png') ?>" type="image/png" sizes="16x16">
    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">

    <!-- Modal -->
    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotpasswordModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-2">
                        <span class="info-box-icon text-secondary"><i class="fas fa-2x fa-user-cog"></i></span>
                        <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Please contact ICTD</div>
                        <div class="mt-1 font-weight-normal text-secondary"><i class="fas fa-phone-alt"></i> (+6346) 481 – 1424</div>
                        <div class="mt-1 font-weight-normal text-secondary"><i class="fas fa-envelope"></i> servicedesk.ict@lpu.edu.ph</div>
                    </div><br>
                    <div class="">
                        <button type="button" class="btn btn-light btn-block" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Forgot Password Modal -->
    <!-- /Modal -->

    <div class="login-box" style="border:1px solid none">
        <div class="login-logo mb-3 mx-auto d-block">
            <a role="button">
                <img src="<?= base_url('assets/images/mylpuclinic-logo.png') ?>" class="img-fluid" alt="Logo" width="300" height="240" role="button">
            </a>
        </div>

        <div class="card-body login-card-body shadow">
            <div class="row pt-1">
                <div class="col-lg-6 border-line">
                    <h4 class="mb-4 font-weight-bold text-secondary">Login</h4>

                    <!-- Invalid login display -->
                    <span class="text-danger">
                        <?php if (isset($error)) : ?>
                            <em class="form-control text-danger" style="border-color:rgb(255, 180, 180); background-color:rgb(255, 180, 180); border-radius:6px;">
                                <?php echo $error ?>
                            </em>
                        <?php endif ?>
                    </span>

                    <form action="<?= site_url('login') ?>" method="post" accept-charset="utf-8">
                        <?= csrf_field() ?>
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" style="border-radius: 10px 0px 0px 10px;" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text" style="border-radius: 0px 10px 10px 0px;">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" style="border-radius: 10px 0px 0px 10px;" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text" style="border-radius: 0px 10px 10px 0px;">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 pt-2">
                                <label for="remember">
                                    <a class="forgot_password" href="" data-toggle="modal" data-target="#forgotpasswordModal">Forgot Password?</a>
                                </label>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-block text-white color">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 text-md">
                    <label class="text-sm font-weight-normal">This module is exclusively for Lyceans only. Functions included are :</label>
                    <ul class="text-justify text-sm">
                        <li>Change of password</li>
                        <li>Consultation request</li>
                        <li>Receive Schedule for consultation</li>
                        <li>Receive Clearance, Referral, or Prescription</li>
                    </ul>
                    <label>Instructions</label>
                    <ul class="text-justify text-sm">
                        <li>To sign-in, specify your username and password and click on the Login button.</li>
                        <li>If you forgot your password, click on the Forgot Password link for assistance.</li>
                    </ul>
                </div>

                <div class="col-lg-12 mt-3">
                    <span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('terms') ?>">Terms & Conditions</a></span>
                    <span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('privacy') ?>">Privacy Policy</a></span>
                    <span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('help') ?>">Help</a></span>
                    <br>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>