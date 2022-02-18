<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Activity Logs</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Table -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header record-header">
                            <h3 class="card-title"><br></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="activitylogs_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>End User</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>User Agent</th>
                                        <th>Remote Address</th>
                                        <th>Server Address</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <!-- TBODY HERE -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div>
    </section>
</div><!-- /.container-fluid -->






<!-- SCRIPT -->
<script>
    $(document).ready(function() {
        // For sidebar
        $("#activitylogsNav > a").addClass('active');

        // For datatable
        var activityTable = $("#activitylogs_table").DataTable({
            dom: 'QBtp',
            buttons: ["csv", "excel", "pdf", "colvis"],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            paging: true,
            processing: true,
            order: [],
            ajax: {
                type: 'post',
                url: '<?= site_url('activitylogs/fetchAllLogs') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // CREATE ACTIVITY LOG ON EXPORT
        $('.btn.btn-secondary.buttons-csv.buttons-html5').on('click', function() {
            var enduserId = "<?= $adminId ?>" + "/";
            var enduserType = "ADMIN" + "/";
            var type = "Activity Log" + "/";
            var action = "Export As CSV" + "/";
            var description = "User \"" + <?= $adminId ?> + "\" exported the activity log";

            $.ajax({
                url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                type: 'get',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
        });

        $('.btn.btn-secondary.buttons-excel.buttons-html5').on('click', function() {
            var enduserId = "<?= $adminId ?>" + "/";
            var enduserType = "ADMIN" + "/";
            var type = "Activity Log" + "/";
            var action = "Export As Excel" + "/";
            var description = "User \"" + <?= $adminId ?> + "\" exported the activity log";

            $.ajax({
                url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                type: 'get',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
        });

        $('.btn.btn-secondary.buttons-pdf.buttons-html5').on('click', function() {
            var enduserId = "<?= $adminId ?>" + "/";
            var enduserType = "ADMIN" + "/";
            var type = "Activity Log" + "/";
            var action = "Export As PDF" + "/";
            var description = "User \"" + <?= $adminId ?> + "\" exported the activity log";

            $.ajax({
                url: "<?= site_url('activitylogs/createLogGetRequest/') ?>" + enduserId + enduserType + type + action + description,
                type: 'get',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
        });
    });
</script>

<?= $this->endSection('content') ?>