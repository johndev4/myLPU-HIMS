<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="m-0 font-weight-normal text-black-50 d-inline">Consultation Report |</h1>
                    <span class="d-inline"><a href="<?= site_url('consultations') ?>">Back</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">

            </div>

            <!-- Tabs -->
            <div class="col-sm-12 col-md-12">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-weekly-tab" data-toggle="pill" href="#custom-tabs-four-weekly" role="tab" aria-controls="custom-tabs-four-weekly" aria-selected="true">Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-monthly-tab" data-toggle="pill" href="#custom-tabs-four-monthly" role="tab" aria-controls="custom-tabs-four-monthly" aria-selected="false">Monthly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-yearly-tab" data-toggle="pill" href="#custom-tabs-four-yearly" role="tab" aria-controls="custom-tabs-four-yearly" aria-selected="false">Yearly</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style=" overflow-y:auto">

                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Weekly Table -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-weekly" role="tabpanel" aria-labelledby="custom-tabs-four-weekly-tab">

                                <span class="d-block mb-2" style="font-size: 10pt;">Filter by:</span>

                                <div class="row form-group d-inline">
                                    <span for="dropdownYear" class="ml-2">Year</span>
                                    <select name="" class="col-sm-12 col-md-2 form-control d-inline weekly-yr" id="dropdownYear">
                                        <!-- OPTIONS HERE -->
                                    </select>

                                    <span for="dropdownMonth" class="month-label">Month</span>
                                    <select name="" class="col-sm-12 col-md-2 form-control d-inline weekly-mnth" id="dropdownMonth" disabled="disabled">
                                        <!-- OPTIONS HERE -->
                                    </select>
                                </div>
                                <br><br>

                                <!-- Table -->
                                <table id="weekly_table" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Accepted Consultations</th>
                                            <th>Rejected Consultations</th>
                                            <th>Cancelled Consultations</th>
                                            <th>Week</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /Weekly table -->

                            <!-- Monthly Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-monthly" role="tabpanel" aria-labelledby="custom-tabs-four-monthly-tab">

                                <span name="" class="d-block mb-2" style="font-size: 10pt;">Filter by:</span>

                                <div class="row form-group d-inline">
                                    <span for="monthly_dropdownYear" class="ml-2">Year</span>
                                    <select name="select" class="col-sm-12 col-md-2 form-control d-inline weekly-yr" id="monthly_dropdownYear">
                                        <!-- OPTIONS HERE -->
                                    </select>
                                </div>
                                <br><br>

                                <!-- Table -->
                                <table id="monthly_table" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Accepted Consultations</th>
                                            <th>Rejected Consultations</th>
                                            <th>Cancelled Consultations</th>
                                            <th>Month</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /Monthly Table -->

                            <!-- Yearly Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-yearly" role="tabpanel" aria-labelledby="custom-tabs-four-yearly-tab">

                                <!-- Table -->
                                <table id="yearly_table" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Accepted Consultations</th>
                                            <th>Rejected Consultations</th>
                                            <th>Cancelled Consultations</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /Yearly Table -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /Tabs -->

        </div>
    </section>
</div>
<!-- /.container-fluid -->






<!-- SCRIPT -->
<script>
    $(document).ready(function() {
        // For sidebar
        $("#consultationNav > a").addClass('active');

        // For datatable
        $("#weekly_table").DataTable({
            dom: 'Btp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            processing: true,
            paging: false,
            searching: false,
            order: [],
        });
        $('#dropdownYear').on('input', function() {
            if ($('#dropdownYear').val() == '') {
                $('#dropdownMonth').prop('disabled', true);
                $('#dropdownMonth').val('');
                fetchWeeklyData();

            } else {
                $('#dropdownMonth').prop('disabled', false);
            }
        });
        $('#dropdownMonth').on('input', function() {
            fetchWeeklyData();
        });

        $("#monthly_table").DataTable({
            dom: 'Btp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            processing: true,
            paging: false,
            searching: false,
            order: [],
        }).buttons().container().appendTo('#monthly_table_wrapper .col-md-6:eq(0)');
        $('#monthly_dropdownYear').on('input', function() {
            fetchMonthlyData();
        });

        $("#yearly_table").DataTable({
            dom: 'Btp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            processing: true,
            paging: false,
            searching: false,
            order: [],
            ajax: {
                type: 'get',
                url: '<?= site_url('reports/fetchYearlyReport') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });

        // For year combobox
        $.ajax({
            url: '<?= site_url('consultations/fetchYearOnConsultations') ?>/',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#dropdownYear').html(response);
                $('#monthly_dropdownYear').html(response);
            }
        });

        // For month combobox
        $.ajax({
            url: '<?= site_url('consultations/fetchMonthOnConsultations') ?>/',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#dropdownMonth').html(response);
            }
        });
    });

    function fetchWeeklyData() {
        $("#weekly_table").DataTable().destroy();
        $("#weekly_table").DataTable({
            dom: 'Btp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            processing: true,
            paging: false,
            searching: false,
            order: [],
            ajax: {
                type: 'get',
                url: '<?= site_url('reports/fetchWeeklyReport') ?>' + '?year=' + $('#dropdownYear').val() + '&month=' + $('#dropdownMonth').val(),
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
    }

    function fetchMonthlyData() {
        $("#monthly_table").DataTable().destroy();
        $("#monthly_table").DataTable({
            dom: 'Btp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            processing: true,
            paging: false,
            searching: false,
            order: [],
            ajax: {
                type: 'get',
                url: '<?= site_url('reports/fetchMonthlyReport') ?>' + '?year=' + $('#monthly_dropdownYear').val(),
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
    }
</script>

<script src="<?= base_url('assets/js/date_helper.js') ?>"></script>
<script>
    $(document).ready(function() {
        const exportType = ["CSV", "Excel", "PDF"];

        $('#dropdownMonth').on('input', function() {
            exportType.forEach(function(item, index) {
                $('#weekly_table_wrapper > .btn-group > .buttons-' + item.toLowerCase()).on('click', function() {
                    var tempUserId = "<?= $idNo ?>"
                    var enduserId = tempUserId + "/";
                    var enduserType = "CLINIC" + "/";
                    var type = "Reports" + "/";
                    var action = "Export As " + item + "/";

                    var dateStatement = $('#dropdownMonth').val() != "" && $('dropdownYear').val() != "" ? " from \"" + getMonthName($('#dropdownMonth').val()) + "-" + $('#dropdownYear').val() + "\"" : "";
                    var description = "User \"" + tempUserId + "\" exported the weekly report" + dateStatement;

                    $.ajax({
                        url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                        type: 'get',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                });
            });
        });


        $('#monthly_dropdownYear').on('input', function() {
            exportType.forEach(function(item, index) {
                $('#monthly_table_wrapper > .btn-group > .buttons-' + item.toLowerCase()).on('click', function() {
                    var tempUserId = "<?= $idNo ?>"
                    var enduserId = tempUserId + "/";
                    var enduserType = "CLINIC" + "/";
                    var type = "Reports" + "/";
                    var action = "Export As " + item + "/";

                    var dateStatement = $('#monthly_dropdownYear').val() != "" ? " from year \"" + $('#monthly_dropdownYear').val() + "\"" : "";
                    var description = "User \"" + tempUserId + "\" exported the monthly report" + dateStatement;

                    $.ajax({
                        url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                        type: 'get',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                });
            });
        });


        exportType.forEach(function(item, index) {
            $('#yearly_table_wrapper > .btn-group > .buttons-' + item.toLowerCase()).on('click', function() {
                var tempUserId = "<?= $idNo ?>"
                var enduserId = tempUserId + "/";
                var enduserType = "CLINIC" + "/";
                var type = "Reports" + "/";
                var action = "Export As " + item + "/";
                var description = "User \"" + tempUserId + "\" exported the yearly report";

                $.ajax({
                    url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                    type: 'get',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
            });
        });
    });
</script>

<?= $this->endSection('content') ?>