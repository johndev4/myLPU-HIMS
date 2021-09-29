<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?= csrf_meta() ?>
    <title>myLPU HIMS: <?= $page_title ?></title>

    <!-- Webapp Icon -->
    <link rel="icon" href="<?= base_url('assets/images/app_icon.png') ?>" type="image/png" sizes="16x16">
    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">

    <div class="container-fluid px-1 px-md-2 px-lg-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11">

                <!-- Logo -->
                <div class="login-logo mt-n5 mb-n5 ">
                    <a role="button">
                        <img src="<?= base_url('assets/images/LPU_logo.png') ?>" width="320" height="240" role="button">
                        <!--<b class="font-weight">myLPU HIMS</b>-->
                    </a>
                </div>

                <div class="card login-card-body border-0">
                    <div class="row">
                        <div class="col-sm-6 border-line pb-3" style="border:1px solid none">

                            <h4 class="mb-4 font-weight-bold text-secondary">Login</h4>

                            <!-- Invalid login display -->
                            <span class="text-danger">
                                <?php if (isset($error)) : ?>
                                    <em class="form-control text-danger" style="border-color:rgb(255, 180, 180); background-color:rgb(255, 180, 180); border-radius:6px;">
                                        <?php echo $error ?>
                                    </em>
                                <?php endif ?>
                            </span>

                            <form action="<?= base_url('login') ?>" method="post" accept-charset="utf-8">
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
                                            <a class="forgot_password" href="<?= base_url('forgotpassword') ?>">Forgot Password?</a>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-block text-white color">Log in</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-6 text-md" style="border:1px solid none">
                            <span class="text-sm">This module is exclusively for Lyceans only. Functions included are :</span>
                            <ul class="text-justify text-sm">
                                <li>Change of password</li>
                                <li>Consultation request</li>
                                <li>Receive Schedule for consultation</li>
                                <li>Receive Clearance, Referral, Prescription</li>
                            </ul>
                            <label>Instructions</label>
                            <ul class="text-justify text-sm">
                                <li>To sign-in, specify your username and password and click on the Login button.</li>
                                <li>If you forgot your password, clik on the Forgot Password link for assistance.</li>
                            </ul>
                        </div>
                    </div>
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