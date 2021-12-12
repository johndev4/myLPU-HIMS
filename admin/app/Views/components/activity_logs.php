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
                            <h3 class="card-title">.</h3>
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
                                <!-- <tfoot>
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
                                </tfoot> -->
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
        // For datatable
        var activityTable = $("#activitylogs_table").DataTable({
            dom: 'Bfrtip',
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            search: {
                caseInsensitive: false
            },
            order: [],
            buttons: ["csv", "excel", "pdf"],
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

<?= $this->endSection('content') ?>