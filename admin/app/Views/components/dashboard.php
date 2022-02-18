<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Welcome -->
            <div class="row">
                <div class="col-md-12">
                    <div class="info-box shadow p-5" style="background-image: linear-gradient(to right, rgb(255, 115, 115), rgb(202, 58, 58)70%);">
                        <span class="icon text-white"><i class="fas fa-heartbeat fa-7x dash-banner-ico"></i></span>
                        <p class="position-relative text-white dash-banner-text">Welcome <b><?= $firstname ?></b>!</p>
                    </div>
                </div>
            </div>

            <!-- New User Accounts Design -->
            <div class="row">
                <div class="col-12">
                    <label class="text-secondary">Accounts</label>
                </div>
                <!-- Student Accounts -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow" style="border: 2px solid none">
                        <span class="info-box-icon"><i class="far fa-user-graduate fa-lg" style="color:#a62d38"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Student</span>
                            <span class="info-box-number font-weight-normal">Active: <?= $active_widget_counter['student'] ?></span>
                            <span class="info-box-number font-weight-normal">Deleted: <?= $deleted_widget_counter['student'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow" style="border: 2px solid none">
                        <span class="info-box-icon"><i class="far fa-chalkboard-teacher fa-lg" style="color:#a62d38"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Faculty</span>
                            <span class="info-box-number font-weight-normal">Active: <?= $active_widget_counter['faculty'] ?></span>
                            <span class="info-box-number font-weight-normal">Deleted: <?= $deleted_widget_counter['faculty'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow" style="border: 2px solid none">
                        <span class="info-box-icon"><i class="far fa-user-tie fa-lg" style="color:#a62d38"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Staff</span>
                            <span class="info-box-number font-weight-normal">Active: <?= $active_widget_counter['staff'] ?></span>
                            <span class="info-box-number font-weight-normal">Deleted: <?= $deleted_widget_counter['staff'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow" style="border: 2px solid none">
                        <span class="info-box-icon"><i class="far fa-user-md fa-lg" style="color:#a62d38"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Health Personnel</span>
                            <span class="info-box-number font-weight-normal">Active: <?= $active_widget_counter['health_personnel'] ?></span>
                            <span class="info-box-number font-weight-normal">Deleted: <?= $deleted_widget_counter['health_personnel'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Script -->
<script>
    $(document).ready(function() {
        // For sidebar
        $("#dashboardNav > a").addClass('active');
    });
</script>

<?= $this->endSection('content') ?>