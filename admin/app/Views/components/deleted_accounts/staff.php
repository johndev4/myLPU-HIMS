<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Deleted Accounts</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Delete all Button -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#deleteallModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-trash"></i></span>
                        <span class="info-box-text text-black-50">Delete all data</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the user's information from the system, including health records.</div>
                            </div><br>
                            <form action="" method="get" id="delete_form">
                                <div class="float-right mt-1">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Delete Modal -->

            <!-- Delete All Modal -->
            <div class="modal fade" id="deleteallModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently wipe out all of the users' information from the system, including health records</div>
                            </div><br>
                            <form action="" method="get" id="deleteall_form">
                                <input type="hidden" name="role" value="staff">
                                <div class="float-right mt-1">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Delete all Modal -->

            <!-- /Modal -->

            <!-- Table -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header record-header">
                            <h3 class="card-title">Staffs</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="informations_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!-- TBODY HERE -->
                                <tfoot>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
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


<!-- Script -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#informations_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('userdata/fetchAllLycean/staff') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });

        // For sidebar
        $("#mainUserInformationNav").addClass('menu-open');
        $("#mainUserInformationNav > a").addClass('active');
        $("#staffInformationNav > a").addClass('active');

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

        // Set Delete All Modal Form
        $('#deleteall_form').attr(
            'action',
            '<?= site_url('userdata/deleteAllStaffData') ?>'
        );
    });

    function retrieveData(id) {
        $('#delete_form').attr(
            'action',
            '<?= site_url('userdata/deleteStaffData') ?>/' + id
        );
    }

</script>

<?= $this->endSection('content') ?>