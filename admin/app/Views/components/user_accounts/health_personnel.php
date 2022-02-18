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
                <!-- Delete all Button -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#deleteallModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-trash"></i></span>
                        <span class="info-box-text text-black-50">Delete all data</span>
                    </button>
                </div>
            </div>

            <!-- Modals  -->

            <!-- Modal-Add-Record -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Health Personnel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('useraccounts/addHealthPersonnelAccount') ?>" method="get" id="add_form">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label required">ID No.</label>
                                        <input type="text" class="form-control" id="add_idno" name="id_no" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('id_no')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('id_no'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_idno').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#add_username" class="col-form-label required">Username</label>
                                        <input type="text" class="form-control" id="add_username" name="username" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('username')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('username'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_username').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_lastname" class="col-form-label required">Last Name</label>
                                        <input type="text" class="form-control" id="add_lastname" name="last_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('last_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('last_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_lastname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_firstname" class="col-form-label required">First Name</label>
                                        <input type="text" class="form-control" id="add_firstname" name="first_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('first_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('first_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_firstname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_middlename" class="col-form-label required">Middle Name</label>
                                        <input type="text" class="form-control" id="add_middlename" name="middle_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('middle_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('middle_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_middlename').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_gender" class="col-form-label required">Gender</label>
                                        <select class="form-control" id="add_gender" name="gender">
                                            <option value="" selected="selected">---Select Gender---</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('gender')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('gender'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_gender').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-8 form-group">
                                        <label for="add_designation" class="col-form-label required">Designation</label>
                                        <select class="form-control" id="add_designation" name="designation">
                                            <option value="" selected="selected">---Choose Designation---</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Nurse">Nurse</option>
                                            <option value="Guidance Counselor">Guidance Counselor</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('designation')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('designation'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_designation').addClass('border border-danger');
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
                                        <label for="mod_idno" class="col-form-label required">ID No.</label>
                                        <input type="text" class="form-control" id="mod_idno" name="id_no" value="" readonly="readonly">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('id_no')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('id_no'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_idno').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#mod_username" class="col-form-label required">Username</label>
                                        <input type="text" class="form-control" id="mod_username" name="username" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('username')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('username'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_username').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_lastname" class="col-form-label required">Last Name</label>
                                        <input type="text" class="form-control" id="mod_lastname" name="last_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('last_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('last_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_lastname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_firstname" class="col-form-label required">First Name</label>
                                        <input type="text" class="form-control" id="mod_firstname" name="first_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('first_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('first_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_firstname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_middlename" class="col-form-label required">Middle Name</label>
                                        <input type="text" class="form-control" id="mod_middlename" name="middle_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('middle_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('middle_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_middlename').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_gender" class="col-form-label required">Gender</label>
                                        <select class="form-control" id="mod_gender" name="gender">
                                            <option value="" selected="selected">---Select Gender---</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('gender')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('gender'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_gender').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-8 form-group">
                                        <label for="mod_designation" class="col-form-label required">Designation</label>
                                        <select class="form-control" id="mod_designation" name="designation">
                                            <option value="" selected="selected">---Choose Designation---</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Nurse">Nurse</option>
                                            <option value="Guidance Counselor">Guidance Counselor</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('designation')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('designation'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_designation').addClass('border border-danger');
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

            <!-- Delete all Modal -->
            <div class="modal fade" id="deleteallModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently wipe out all of the accounts from the system</div>
                            </div><br>
                            <form action="" method="get" id="deleteall_form">
                                <div class="float-right mt-1">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Delete all Modal -->

            <!-- /Modals -->

            <!-- Table -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header record-header">
                            <h3 class="card-title">Health Personnel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="accounts_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Designation</th>
                                        <th style="width:150px;"></th>
                                    </tr>
                                </thead>
                                <!-- TBODY HERE -->
                                <tfoot>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Designation</th>
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
        $("#accounts_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('useraccounts/fetchAllHealthPersonnel') ?>',
                contentType: ' application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });

        // For sidebar
        $("#mainUserAccountNav").addClass('menu-open');
        $("#mainUserAccountNav > a").addClass('active');
        $("#healthpersonnelAccountNav > a").addClass('active');

        // Sweet Alert for success staus
        <?php if (session()->get('success') !== null) : ?>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: '<?= session()->get('success'); ?>'
            });
        <?php endif; ?>

        // Add Validation Error
        <?php if (!empty(session()->get('add_validation'))) : ?>
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
        <?php if (!empty(session()->get('mod_validation'))) : ?>
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
            $('#add_username').val("");
            $('#add_lastname').val("");
            $('#add_firstname').val("");
            $('#add_middlename').val("");
            $('#add_gender').val("");
            $('#add_designation').val("");
        });

        // On ID No. Input
        $('#add_idno').on('input', function() {
            $.ajax({
                url: '<?= site_url('useraccounts/fetchHealthPersonnelInfoById') ?>/' + $('#add_idno').val(),
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != '') {
                        $('#add_lastname').val(response['last_name']);
                        $('#add_firstname').val(response['first_name']);
                        $('#add_middlename').val(response['middle_name']);
                        $('#add_gender').val(response['gender']);
                        $('#add_designation').val(response['designation']);
                    }
                }
            });
        });

        // Set Delete All Modal Form
        $('#deleteall_form').attr(
            'action',
            '<?= site_url('useraccounts/deleteAllHealthPersonnelAccounts') ?>'
        );
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_idno').val(data['id_no']);
            $('#' + obj['modalType'] + '_username').val(data['username']);
            $('#' + obj['modalType'] + '_lastname').val(data['last_name']);
            $('#' + obj['modalType'] + '_firstname').val(data['first_name']);
            $('#' + obj['modalType'] + '_middlename').val(data['middle_name']);
            $('#' + obj['modalType'] + '_gender').val(data['gender']);
            $('#' + obj['modalType'] + '_designation').val(data['designation']);
        } else {
            $.ajax({
                url: '<?= site_url('useraccounts/fetchHealthPersonnelById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#mod_idno').val(response['id_no']);
                    $('#mod_username').val(response['username']);
                    $('#mod_lastname').val(response['last_name']);
                    $('#mod_firstname').val(response['first_name']);
                    $('#mod_middlename').val(response['middle_name']);
                    $('#mod_gender').val(response['gender']);
                    $('#mod_designation').val(response['designation']);

                    resId = response['id_no'];
                }
            });
        }

        $('#modify_form').attr(
            'action',
            '<?= site_url('useraccounts/modifyHealthPersonnelAccount') ?>/' + id
        );
        $('#delete_form').attr(
            'action',
            '<?= site_url('useraccounts/deleteHealthPersonnelAccount') ?>/' + id
        );
        $('#reset_form').attr(
            'action',
            '<?= site_url('useraccounts/resetHealthPersonnelAccount') ?>/' + id
        );
    }
</script>

<?= $this->endSection('content') ?>