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
                <!-- Consultation Request -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box shadow p-3">
                        <span class="info-box-icon dash-widgets"><i class="fas fa-clipboard-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Requests</span>
                            <span class="info-box-number" id="newRequestWidget"></span>
                        </div>
                    </div>
                </div>

                <!-- Consultation -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box shadow p-3">
                        <span class="info-box-icon dash-widgets"><i class="far fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Scheduled Consultations</span>
                            <span class="info-box-number" id="scheduledConsultationWidget"></span>
                        </div>
                    </div>
                </div>

                <!-- Records -->
                <?php if ($designation !== 'Guidance Counselor') : ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box shadow p-3">
                            <span class="info-box-icon dash-widgets"><i class="fas fa-file-medical"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Records</span>
                                <span class="info-box-number" id="recordWidget"></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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

        // Fetch "new request" widget count
        $.ajax({
            url: '<?= site_url('dashboard/countNewRequestConsultations') ?>',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#newRequestWidget').text(response);
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= site_url('dashboard/countNewRequestConsultations') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#newRequestWidget').text(response);
                }
            });
        }, 5000);

        // Fetch "scheduled consultation" widget count
        $.ajax({
            url: '<?= site_url('dashboard/countScheduledConsultations') ?>',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#scheduledConsultationWidget').text(response);
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= site_url('dashboard/countScheduledConsultations') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#scheduledConsultationWidget').text(response);
                }
            });
        }, 5000);

        // Fetch "record" widget count
        $.ajax({
                url: '<?= site_url('dashboard/countLyceanRecords') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#recordWidget').text(response);
                }
            });
        setInterval(function() {
            $.ajax({
                url: '<?= site_url('dashboard/countLyceanRecords') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#recordWidget').text(response);
                }
            });
        }, 5000);
    });
</script>

<?= $this->endSection('content') ?>