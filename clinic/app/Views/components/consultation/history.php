<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="m-0 font-weight-normal text-black-50 d-inline">Consultation History |</h1>
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
                <!-- Clear History-->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#clearModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-trash"></i></span>
                        <span class="info-box-text text-black-50">Clear History</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Clear Modal -->
            <div class="modal fade" id="clearModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="min-height: 310px;">
                        <div class="modal-header font-weight-bold text-secondary">
                            Consultation History
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('consultations/clearConsultationHistory') ?>" method="get" id="">
                                <div class="row">
                                    <div class="col-12 form-group mb-n1">
                                        <span>Date range:</span>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="clear_fromdaterange" class="col-form-label">From</label>
                                        <input type="date" class="form-control" id="clear_fromdaterange" name="from_date_range" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('clear_validation'))) : ?>
                                            <?php if (session()->get('clear_validation')->hasError('from_date_range')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('clear_validation')->getError('from_date_range'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#clear_fromdaterange').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="clear_todaterange" class="col-form-label">To</label>
                                        <input type="date" class="form-control" id="clear_todaterange" name="to_date_range" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('clear_validation'))) : ?>
                                            <?php if (session()->get('clear_validation')->hasError('to_date_range')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('clear_validation')->getError('to_date_range'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#clear_todaterange').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="clear_clearallhistory" name="clear_all_history[]" value="true">
                                            <label class="form-check-label" for="clear_clearallhistory">
                                                Clear all consultation history
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right mt-2">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Clear Data</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Clear Modal -->

            <!-- View Modal -->
            <div class="modal fade" id="viewModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header font-weight-bold text-secondary">
                            <div class="modal-title"> Consultation Details</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="row" id="">
                                <div class="col-sm-12 col-md-12" style="border:1px solid none">
                                    <div class="d-block">
                                        <label class="d-inline text-secondary">Consultation ID:</label>
                                        <div class="mt-n2 mb-2 d-inline">
                                            <span id="view_consultationid"></span>
                                        </div>
                                    </div>
                                    <div class="d-block">
                                        <label class="d-inline text-secondary">Date of Request:</label>
                                        <div class="mt-n2 mb-2 d-inline">
                                            <span id="view_dateofrequest"></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <label class="d-block text-secondary">Schedule</label>
                                    <div class="mt-n2 mb-2">
                                        <span class="text-dark time">Time: <span id="view_time"></span> </span>
                                        <span class="text-dark date float-right">Date: <span id="view_date"></span> </span>
                                    </div>
                                    <label class="d-block text-secondary">Meeting Link</label>
                                    <div class="mt-n2 mb-2">
                                        <a href="" class="text-dark" id="view_meetinglinkhref" target="_blank"><span id="view_meetinglinktext"></span></a>
                                    </div>
                                    <hr>
                                    <label class="d-block text-secondary">Concern</label>
                                    <p class="mt-n2 mb-2">
                                        <span id="view_concernmessage"></span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /View Modal -->

            <!-- /Modal -->

            <!-- Tabs -->
            <div class="col-sm-12 col-md-12">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-accepted-tab" data-toggle="pill" href="#custom-tabs-four-accepted" role="tab" aria-controls="custom-tabs-four-accepted" aria-selected="true">Accepted</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-rejected-tab" data-toggle="pill" href="#custom-tabs-four-rejected" role="tab" aria-controls="custom-tabs-four-rejected" aria-selected="false">Rejected</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-cancelled-tab" data-toggle="pill" href="#custom-tabs-four-cancelled" role="tab" aria-controls="custom-tabs-four-cancelled" aria-selected="false">Cancelled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style=" overflow-y:auto">

                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Accepted Table -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-accepted" role="tabpanel" aria-labelledby="custom-tabs-four-accepted-tab">

                                <!-- Table -->
                                <table id="accepted_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Consultation No.</th>
                                            <th>Date of Request</th>
                                            <th>Physician</th>
                                            <th>Lycean</th>
                                            <th>Department</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->

                            </div>
                            <!-- /Accepted Table -->

                            <!-- Rejected Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-rejected" role="tabpanel" aria-labelledby="custom-tabs-four-rejected-tab">

                                <!-- Table -->
                                <table id="rejected_table" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Consultation No.</th>
                                            <th>Date of Request</th>
                                            <th>Physician</th>
                                            <th>Lycean</th>
                                            <th>Department</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->

                            </div>
                            <!-- /Rejected Table -->

                            <!-- Cancelled Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-cancelled" role="tabpanel" aria-labelledby="custom-tabs-four-cancelled-tab">

                                <!-- Table -->
                                <table id="cancelled_table" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Consultation No.</th>
                                            <th>Date of Request</th>
                                            <th>Physician</th>
                                            <th>Lycean</th>
                                            <th>Department</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->

                            </div>
                            <!-- /Cancelled Table -->
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






<!-- Script -->
<script>
    $(document).ready(function() {
        // For sidebar
        $("#consultationNav > a").addClass('active');

        // For datatable
        $("#accepted_table").DataTable({
            dom: 'QBtp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            processing: true,
            paging: true,
            // searching: true,
            order: [],
            ajax: {
                type: 'get',
                url: '<?= site_url('consultations/fetchAllDoneConsultations') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
        $("#rejected_table").DataTable({
            dom: 'QBtp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            processing: true,
            paging: true,
            // searching: true,
            order: [],
            ajax: {
                type: 'get',
                url: '<?= site_url('consultations/fetchAllRejectedConsultations') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
        $("#cancelled_table").DataTable({
            dom: 'QBtp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            processing: true,
            paging: true,
            // searching: true,
            order: [],
            ajax: {
                type: 'get',
                url: '<?= site_url('consultations/fetchAllCancelledConsultations') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });

        // Reset stock out modal on close
        $('#clearModal').on('hidden.bs.modal', function(evt) {
            $('#clear_fromdaterange').val("");
            $('#clear_todaterange').val("");
            $('#clearAllHistory').prop('checked', false);
        });

        // On checked of "Clear all consultation history"
        if ($('#clear_clearallhistory').prop('checked') == true) {
            $('#clear_fromdaterange').prop('readOnly', true);
            $('#clear_todaterange').prop('readOnly', true);
            $('#clear_fromdaterange').val("");
            $('#clear_todaterange').val("");
        } else {
            $('#clear_fromdaterange').prop('readOnly', false);
            $('#clear_todaterange').prop('readOnly', false);
        }
        $('#clear_clearallhistory').on('input', function() {
            if ($('#clear_clearallhistory').prop('checked') == true) {
                $('#clear_fromdaterange').prop('readOnly', true);
                $('#clear_todaterange').prop('readOnly', true);
                $('#clear_fromdaterange').val("");
                $('#clear_todaterange').val("");
            } else {
                $('#clear_fromdaterange').prop('readOnly', false);
                $('#clear_todaterange').prop('readOnly', false);
            }
        });
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_fromdaterange').val(data['from_date_range']);
            $('#' + obj['modalType'] + '_todaterange').val(data['to_date_range']);
        } else {
            $.ajax({
                url: '<?= site_url('consultations/details') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#view_consultationid').text(response['consultation_id']);
                    $('#view_dateofrequest').text(response['date_of_request']);
                    $('#view_time').text(response['time']);
                    $('#view_date').text(response['date']);
                    $('#view_meetinglinkhref').prop('href', response['meeting_link']['href']);
                    $('#view_meetinglinktext').html(response['meeting_link']['text']);
                    $('#view_concernmessage').text(response['concern_message']);
                }
            });
        }
    }

    // Sweet Alert for success staus
    <?php if (session()->getFlashdata('success') !== null) : ?>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: '<?= session()->getFlashdata('success'); ?>'
        });
    <?php endif; ?>

    // Clear History Validation Error
    <?php if (!empty(session()->getFlashdata('clear_validation'))) : ?>
        $('#clearModal').modal('show');
        retrieveData('', {
            error: true,
            modalType: "clear"
        });
        $('#clearModal').on('hidden.bs.modal', function(evt) {
            $('.error').addClass('d-none');
            $('input.border').removeClass('border border-danger');
            $('select.border').removeClass('border border-danger');
        });
    <?php endif; ?>

    // View specific consultation request from notification
    <?php if (isset($_GET['cID'])) : ?>
        setTimeout(function() {
            $('#custom-tabs-four-cancelled-tab').trigger('click');
            retrieveData('<?= $_GET['cID'] ?>');
            $('#viewModal').modal('show');
        }, 500);
    <?php endif; ?>
</script>

<script>
    $(document).ready(function() {
        const exportType = ["CSV", "Excel", "PDF"];

        exportType.forEach(function(item, index) {
            $('#accepted_table_wrapper > .btn-group > .buttons-' + item.toLowerCase()).on('click', function() {
                var tempUserId = "<?= $idNo ?>"
                var enduserId = tempUserId + "/";
                var enduserType = "CLINIC" + "/";
                var type = "History" + "/";
                var action = "Export As " + item + "/";

                var description = "User \"" + tempUserId + "\" exported the accepted consultation history";

                $.ajax({
                    url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                    type: 'get',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
            });
        });
        exportType.forEach(function(item, index) {
            $('#rejected_table_wrapper > .btn-group > .buttons-' + item.toLowerCase()).on('click', function() {
                var tempUserId = "<?= $idNo ?>"
                var enduserId = tempUserId + "/";
                var enduserType = "CLINIC" + "/";
                var type = "History" + "/";
                var action = "Export As " + item + "/";

                var description = "User \"" + tempUserId + "\" exported the rejected consultation history";

                $.ajax({
                    url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                    type: 'get',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
            });
        });
        exportType.forEach(function(item, index) {
            $('#cancelled_table_wrapper > .btn-group > .buttons-' + item.toLowerCase()).on('click', function() {
                var tempUserId = "<?= $idNo ?>"
                var enduserId = tempUserId + "/";
                var enduserType = "CLINIC" + "/";
                var type = "History" + "/";
                var action = "Export As " + item + "/";

                var description = "User \"" + tempUserId + "\" exported the cancelled consultation history";

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
<!-- /Script -->

<?= $this->endSection('content') ?>