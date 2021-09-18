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

            <div class="row">
                <!-- Student Accounts -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow p-3">
                        <span class="info-box-icon dash-widgets"><i class="fas fa-user-graduate"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Student Accounts</span>
                            <span class="info-box-number"><?= $widget_counter['student'] ?></span>
                        </div>
                    </div>
                </div>

                <!-- Faculty Accounts -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow p-3">
                        <span class="info-box-icon dash-widgets"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Faculty Accounts</span>
                            <span class="info-box-number"><?= $widget_counter['faculty'] ?></span>
                        </div>
                    </div>
                </div>

                <!-- Staff Accounts -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow p-3">
                        <span class="info-box-icon dash-widgets"><i class="fas fa-user-tie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Staff Accounts</span>
                            <span class="info-box-number"><?= $widget_counter['staff'] ?></span>
                        </div>
                    </div>
                </div>

                <!-- Clinic staff Accounts -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow p-3">
                        <span class="info-box-icon dash-widgets"><i class="fas fa-user-md"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Clinic Staff Accounts</span>
                            <span class="info-box-number"><?= $widget_counter['health_personnel'] ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Weather widget -->
            <!-- <div class="weather">
                <a class="weatherwidget-io" href="https://forecast7.com/en/14d32120d91/general-trias/" data-label_1="GEN. TRIAS" data-label_2="WEATHER" data-theme="clear">GEN. TRIAS WEATHER</a>
                <script>
                    ! function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://weatherwidget.io/js/widget.min.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'weatherwidget-io-js');
                </script>
            </div> -->


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