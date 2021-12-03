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
                <div class="col-md-6 col-sm-6 col-12">
                    <a href="<?= site_url('consultations') ?>" class="text-dark">
                        <div class="info-box shadow p-3">
                            <span class="info-box-icon dash-widgets"><i class="fas fa-clipboard-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Requests</span>
                                <span class="info-box-number" id="newRequestWidget"></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Scheduled Consultation -->
                <div class="col-md-6 col-sm-6 col-12">
                    <a href="<?= site_url('consultations') ?>" class="text-dark">
                        <div class="info-box shadow p-3">
                            <span class="info-box-icon dash-widgets"><i class="far fa-calendar-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Scheduled Consultations</span>
                                <span class="info-box-number" id="scheduledConsultationWidget"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php if ($designation !== 'Guidance Counselor') : ?>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow-none">
                            <div class="card-header dash-widgets">
                                <h3 class="card-title">Medicines</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus text-light"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 medicine-hr">
                                        <span class="font-weight-bold">Expired</span>
                                        <ul class="mt-2 ml-n4" style="list-style: none;" id="expiredMedicineWidget">
                                            <!-- EXPIRED MEDICINE HERE -->
                                        </ul>
                                    </div>

                                    <div class="col-md-6 justify-content-center">
                                        <span class="font-weight-bold low-stock">Low Stock</span>
                                        <ul class="mt-2 ml-n4" style="list-style: none;" id="lowStockMedicineWidget">
                                            <!-- LOW STOCK MEDICINE HERE -->
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <a href="<?= site_url('inventory/medicines/stocks') ?>" class="float-right">Go to Stocks &gt</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

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
        // Fetch "scheduled consultation" widget count
        $.ajax({
            url: '<?= site_url('dashboard/countScheduledConsultations') ?>',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#scheduledConsultationWidget').text(response);
            }
        });

        <?php if ($designation !== 'Guidance Counselor') : ?>
            // Fetch "expired medicine" widget list
            $.ajax({
                url: '<?= site_url('dashboard/fetchExpiredMedicine') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#expiredMedicineWidget').html(response);
                }
            });
            // Fetch "low stock medicine" widget list
            $.ajax({
                url: '<?= site_url('dashboard/fetchLowStockMedicine') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#lowStockMedicineWidget').html(response);
                }
            });
        <?php endif; ?>

        setInterval(function() {
            // Fetch "new request consultation" widget count
            $.ajax({
                url: '<?= site_url('dashboard/countNewRequestConsultations') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#newRequestWidget').text(response);
                }
            });
            // Fetch "scheduled consultation" widget count
            $.ajax({
                url: '<?= site_url('dashboard/countScheduledConsultations') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#scheduledConsultationWidget').text(response);
                }
            });

            <?php if ($designation !== 'Guidance Counselor') : ?>
                // Fetch "expired medicine" widget list
                $.ajax({
                    url: '<?= site_url('dashboard/fetchExpiredMedicine') ?>',
                    type: 'get',
                    dataType: 'html',
                    success: function(response) {
                        $('#expiredMedicineWidget').html(response);
                    }
                });
                // Fetch "low stock medicine" widget list
                $.ajax({
                    url: '<?= site_url('dashboard/fetchLowStockMedicine') ?>',
                    type: 'get',
                    dataType: 'html',
                    success: function(response) {
                        $('#lowStockMedicineWidget').html(response);
                    }
                });
            <?php endif; ?>
        }, 5000);
    });
</script>

<?= $this->endSection('content') ?>