<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?= csrf_meta() ?>
    <title>myLPU HIMS: <?= $page_title ?></title>

    <!-- Webapp Icon -->
    <link rel="icon" href="<?= base_url('assets/images/appicon.png') ?>" type="image/png" sizes="16x16">
    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/health-record.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/consultation.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/table-page.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/inventory.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/topbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/help-menu.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- DataTables & Extensions -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/DataTables/datatables.min.css') ?>" />
    <!-- AdminLTE Theme Style -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css'); ?>">

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- DataTables & Extensions -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/DataTables/datatables.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js') ?>"></script>
    <!-- Push.js -->
    <script src="<?= base_url('assets/plugins/push.js/bin/push.min.js') ?>"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed" id="page-top">
    <div class="wrapper">

        <!-- Render top_menubar -->
        <?= view('layouts/top_menubar') ?>
        <!-- Render side_menubar -->
        <?= view('layouts/side_menubar') ?>

        <!-- Dynamic content -->
        <?= $this->renderSection('content') ?>

        <!-- Footer -->
        <footer class="main-footer" style="text-align: center;">
            <strong>Copyright &copy;<?= date('Y') ?></strong>
            All rights reserved.
        </footer>
        <!-- Footer -->

    </div>
    <!-- ./wrapper -->



    <!-- Script -->
    <script>
        $(document).ready(function() {
            // Run or stop online state
            setInterval(function() {
                $.ajax({
                    url: '<?= site_url('consultations/runOnlineState') ?>',
                    type: 'get'
                });
            }, 1000);
        });
    </script>

</body>

</html>