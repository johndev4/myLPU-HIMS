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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline shadow">
            <div class="card-body box-profile">

                <form action="<?= site_url('changepassword/updatePassword') ?>" method="post">
                    <span class="p-2 d-block mb-2" style="background-color:rgb(223, 223, 223); border-radius:4px;">
                        You are required to change the default password.</span>

                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <input type="password" class="form-control mb-2" id="password" placeholder="New Password" name="password">
                    <!-- Validation Error -->
                    <?php if (!empty(session()->get('p_validation'))) : ?>
                        <?php if (session()->get('p_validation')->hasError('password')) : ?>
                            <span class="error text-danger">
                                <?= session()->get('p_validation')->getError('password'); ?>
                            </span>
                            <script>
                                $().ready(function() {
                                    $('#password').addClass('border border-danger');
                                    $('#password').val('<?= session()->get('postData')['password'] ?>');
                                });
                            </script>
                        <?php endif; ?>
                    <?php endif; ?>

                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                    <!-- Validation Error -->
                    <?php if (!empty(session()->get('p_validation'))) : ?>
                        <?php if (session()->get('p_validation')->hasError('confirm_password')) : ?>
                            <span class="error text-danger">
                                <?= session()->get('p_validation')->getError('confirm_password'); ?>
                            </span>
                            <script>
                                $().ready(function() {
                                    $('#confirm_password').addClass('border border-danger');
                                    $('#confirm_password').val('<?= session()->get('postData')['confirm_password'] ?>');
                                });
                            </script>
                        <?php endif; ?>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-danger btn-block mt-3 swalDefaultSuccess">
                        <b>Change Password</b></button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js') ?>"></script>





    <!-- Script -->
    <script>
        $('document').ready(function() {
            // Sweet Alert for success staus
            <?php if (session()->get('success') !== null) : ?>
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: '<?= session()->get('success'); ?>'
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>