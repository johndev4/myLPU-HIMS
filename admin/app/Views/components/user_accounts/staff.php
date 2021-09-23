<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">User Accounts</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Add record -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#addModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-plus"></i></span>
                        <span class="info-box-text text-black-50">Add User</span>
                    </button>
                </div>
                <!-- Import List -->
                <!-- <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-file-import"></i></span>
                        <span class="info-box-text text-black-50">Import Data</span>
                    </button>
                </div> -->
            </div>

            <!-- Modals  -->

            <!-- Modal-Add-Record -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Staff</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('useraccounts/addStaffAccount') ?>" method="get" id="add_form">
                                <input type="hidden" name="role" value="staff">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label">ID No.</label>
                                        <input type="text" class="form-control" id="add_idno" name="id_no" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
                                            <?php if (session()->getFlashdata('add_validation')->hasError('id_no')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('add_validation')->getError('id_no'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_idno').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="add_lastname" class="col-form-label">Last Name</label>
                                        <input type="text" class="form-control" id="add_lastname" name="last_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
                                            <?php if (session()->getFlashdata('add_validation')->hasError('last_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('add_validation')->getError('last_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_lastname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="add_firstname" class="col-form-label">First Name</label>
                                        <input type="text" class="form-control" id="add_firstname" name="first_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
                                            <?php if (session()->getFlashdata('add_validation')->hasError('first_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('add_validation')->getError('first_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_firstname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-2 form-group">
                                        <label for="add_middleinit" class="col-form-label">M.I.</label>
                                        <input type="text" class="form-control" id="add_middleinit" name="middle_initial" value="" maxlength="1">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
                                            <?php if (session()->getFlashdata('add_validation')->hasError('middle_initial')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('add_validation')->getError('middle_initial'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_middleinit').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#add_username" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="add_username" name="username" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
                                            <?php if (session()->getFlashdata('add_validation')->hasError('username')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('add_validation')->getError('username'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_username').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_department" class="col-form-label">Department</label>
                                        <select class="form-control" id="add_department" name="department">
                                            <option value="" selected="selected">---Choose Department---</option>
                                            <option value="COECSA">COECSA</option>
                                            <option value="CITHM">CITHM</option>
                                            <option value="CAS">CAS</option>
                                            <option value="CAMS">CAMS</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
                                            <?php if (session()->getFlashdata('add_validation')->hasError('department')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('add_validation')->getError('department'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_department').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Modal-Add-Record -->

            <!-- Modify Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Account Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="modify_form">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="mod_idno" class="col-form-label">ID No.</label>
                                        <input type="text" class="form-control" id="mod_idno" name="id_no" value="" disabled="disabled">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
                                            <?php if (session()->getFlashdata('mod_validation')->hasError('id_no')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('mod_validation')->getError('id_no'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_idno').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="mod_lastname" class="col-form-label">Last Name</label>
                                        <input type="text" class="form-control" id="mod_lastname" name="last_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
                                            <?php if (session()->getFlashdata('mod_validation')->hasError('last_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('mod_validation')->getError('last_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_lastname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="mod_firstname" class="col-form-label">First Name</label>
                                        <input type="text" class="form-control" id="mod_firstname" name="first_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
                                            <?php if (session()->getFlashdata('mod_validation')->hasError('first_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('mod_validation')->getError('first_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_firstname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-2 form-group">
                                        <label for="mod_middleinit" class="col-form-label">M.I.</label>
                                        <input type="text" class="form-control" id="mod_middleinit" name="middle_initial" value="" maxlength="1">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
                                            <?php if (session()->getFlashdata('mod_validation')->hasError('middle_initial')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('mod_validation')->getError('middle_initial'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_middleinit').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#mod_username" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="mod_username" name="username" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
                                            <?php if (session()->getFlashdata('mod_validation')->hasError('username')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('mod_validation')->getError('username'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_username').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="mod_department" class="col-form-label">Department</label>
                                        <select class="form-control" id="mod_department" name="department">
                                            <option value="" selected="selected">---Choose Department---</option>
                                            <option value="COECSA">COECSA</option>
                                            <option value="CITHM">CITHM</option>
                                            <option value="CAS">CAS</option>
                                            <option value="CAMS">CAMS</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
                                            <?php if (session()->getFlashdata('mod_validation')->hasError('department')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->getFlashdata('mod_validation')->getError('department'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_department').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer pb-3 float-right">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Update</button>
                                    <button type="button" class="btn btn-danger button-width" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Modify Modal -->

            <!-- Reset Modal -->
            <div class="modal fade" id="resetModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will reset the password to default</div>
                            </div><br>
                            <form action="" method="get" id="reset_form">
                                <div class="float-right">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Reset Modal -->

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the account from the system</div>
                            </div><br>
                            <form action="" method="get" id="delete_form">
                                <div class="float-right">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Delete Modal -->

            <!-- /Modals -->

            <!-- Table -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header record-header">
                            <h3 class="card-title">Staff</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="staff_account" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>First name</th>
                                        <th>Surname</th>
                                        <th>Department</th>
                                        <th style="width:150px;"></th>
                                    </tr>
                                </thead>
                                <!-- TBODY HERE -->
                                <tfoot>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>First name</th>
                                        <th>Surname</th>
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
        $("#staff_account").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'get',
                url: '<?= base_url('useraccounts/fetchAllStaff') ?>',
                contentType: ' application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // For sidebar
        $("#mainUserAccountNav").addClass('menu-open');
        $("#mainUserAccountNav > a").addClass('active');
        $("#staffAccountNav > a").addClass('active');

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

        // Add Validation Error
        <?php if (!empty(session()->getFlashdata('add_validation'))) : ?>
            $('#addModal').modal('show');
            retrieveData('<?= session()->get('id_no') ?>', {
                error: true,
                modalType: "add"
            });
            $('#addModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Modify Validation Error
        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
            $('#modifyModal').modal('show');
            retrieveData('<?= session()->get('id_no') ?>', {
                error: true,
                modalType: "mod"
            });
            $('#modifyModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Reset add modal on close
        $('#addModal').on('hidden.bs.modal', function(evt) {
            $('#add_idno').val("");
            $('#add_lastname').val("");
            $('#add_firstname').val("");
            $('#add_middleinit').val("");
            $('#add_username').val("");
            $('#add_department').val("");
        });

        // On ID No. Input
        $('#add_idno').on('input', function() {
            $.ajax({
                url: '<?= base_url('useraccounts/fetchLyceanInfoById') ?>/' + $('#add_idno').val(),
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#add_lastname').val(response['last_name']);
                    $('#add_firstname').val(response['first_name']);
                    $('#add_middleinit').val(response['middle_initial']);
                    $('#add_department').val(response['department']);
                }
            });
        });
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_idno').val(data['id_no']);
            $('#' + obj['modalType'] + '_lastname').val(data['last_name']);
            $('#' + obj['modalType'] + '_firstname').val(data['first_name']);
            $('#' + obj['modalType'] + '_middleinit').val(data['middle_initial']);
            $('#' + obj['modalType'] + '_username').val(data['username']);
            $('#' + obj['modalType'] + '_department').val(data['department']);
        } else {
            $.ajax({
                url: '<?= base_url('useraccounts/fetchLyceanById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#mod_idno').val(response['id_no']);
                    $('#mod_lastname').val(response['last_name']);
                    $('#mod_firstname').val(response['first_name']);
                    $('#mod_middleinit').val(response['middle_initial']);
                    $('#mod_username').val(response['username']);
                    $('#mod_department').val(response['department']);

                    resId = response['id_no'];
                }
            });
        }

        $('#modify_form').attr(
            'action',
            '<?= base_url('useraccounts/modifyStaffAccount') ?>/' + id
        );
        $('#delete_form').attr(
            'action',
            '<?= base_url('useraccounts/deleteStaffAccount') ?>/' + id
        );
        $('#reset_form').attr(
            'action',
            '<?= base_url('useraccounts/resetStudentAccount') ?>/' + id
        );
    }
</script>

<?= $this->endSection('content') ?>