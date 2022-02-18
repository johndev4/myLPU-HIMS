<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Records</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Modal -->
            <!-- View Modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Records</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <!-- View Info -->
                                <div class="col-xl-6 col-md-6">
                                    <div class="card  h-80 w-100 py-0" style="border-left: 7px solid rgb(190, 190, 190); border-radius:6px">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Name</div>
                                                    <div class="h5 mb-0 font-weight-normal text-dark" id="rec_fullname"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-2 mr-n5">
                                    <div class="card  h-80 w-100 py-0" style="border-left: 7px solid rgb(190, 190, 190); border-radius:6px">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ID no.</div>
                                                    <div class="h5 mb-0 font-weight-normal text-dark" id="rec_idno"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12 mb-2 mr-n5">
                                    <div class="card  h-80 w-100 py-0" style="border-left: 7px solid rgb(190, 190, 190); border-radius:6px">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Department</div>
                                                    <div class="h5 mb-0 font-weight-normal text-dark" id="rec_department"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /View Info -->

                                <!-- Details -->
                                <div class="col-lg-4">
                                    <div class="card overflow-auto" style="height: 454px;">
                                        <h6 class="card-header text-danger text-bold" style="padding: 14.2px 0px 14.2px 20px">Details
                                            <i class="far fa-edit text-secondary float-right mr-4" onclick="constructModifyModal($('#rec_idno').text())" data-toggle="modal" data-target="#modifyModal"></i>
                                        </h6>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="text-secondary">Date of Birth</label><br>
                                                        </div>
                                                        <div class="col-md-12 mt-n2">
                                                            <span class="h6" id="birthdate"></span>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <label class="text-secondary">Age</label><br>
                                                        </div>
                                                        <div class="col-md-12 mt-n2">
                                                            <span class="h6" id="age"></span>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <label class="text-secondary">Gender</label><br>
                                                        </div>
                                                        <div class="col-md-12 mt-n2">
                                                            <span class="h6" id="gender"></span>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <label class="text-secondary">Blood type</label><br>
                                                        </div>
                                                        <div class="col-md-12 mt-n2">
                                                            <span class="h6" id="bloodtype"></span>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <label class="text-secondary">Height</label><br>
                                                        </div>
                                                        <div class="col-md-12 mt-n2">
                                                            <span class="h6" id="height"></span>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <label class="text-secondary">Weight</label><br>
                                                        </div>
                                                        <div class="col-md-12 mt-n2">
                                                            <span class="h6" id="weight"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Details -->

                                <!-- File -->
                                <div class="col-lg-8">
                                    <!-- Table -->
                                    <div class="card">
                                        <div class="card-body table-responsive p-0" style="height: 230px;">
                                            <table id="medicalfiles_table" class="table table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>File Name</th>
                                                        <th>Date Added</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- MEDICAL FILES -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /Table -->

                                    <!-- Upload -->
                                    <div class="row" style="border:1px solid none">
                                        <div class="col-12">
                                            <!-- Table -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form action="<?= site_url('records/uploadFacultyRecord') ?>" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_no">
                                                        <div class="row">
                                                            <div class="col-md-12" style="border:1px solid none;">
                                                                <div class="form-group">
                                                                    <label for="medicalfile"> Upload File </label>
                                                                    <div class="d-flex justify-content-start mt-2">
                                                                        <i class="d-inline fas fa-file-upload fa-2x text-secondary" style="border:1px solid none;"></i>
                                                                        <input type="file" name="medicalfile" id="medicalfile" class="form-control-file py-2 px-1" style="border:1px solid none;">
                                                                    </div>
                                                                    <!-- Validation Error -->
                                                                    <?php if (!empty(session()->get('upload_validation'))) : ?>
                                                                        <?php if (!empty(session()->get('upload_validation')['medicalfile'])) : ?>
                                                                            <span class="error text-danger">
                                                                                <?= session()->get('upload_validation')['medicalfile']; ?>
                                                                            </span>
                                                                            <script>
                                                                                $().ready(function() {
                                                                                    $('#medicalfile').addClass('border border-danger');
                                                                                });
                                                                            </script>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>


                                                                    <div class="d-block">
                                                                        <input type="text" class="form-control mb-3" id="filename" name="filename" placeholder="File name here...">
                                                                        <!-- Upload Button -->
                                                                        <button type="submit" class="btn text-light ml-1  mt-n1 swalDefaultSuccess save-button-color float-right">Save</button>
                                                                    </div>
                                                                    <!-- Validation Error -->
                                                                    <?php if (!empty(session()->get('upload_validation'))) : ?>
                                                                        <?php if (!empty(session()->get('upload_validation')['filename'])) : ?>
                                                                            <span class="error text-danger">
                                                                                <?= session()->get('upload_validation')['filename']; ?>
                                                                            </span>
                                                                            <script>
                                                                                $().ready(function() {
                                                                                    $('#filename').addClass('border border-danger');
                                                                                });
                                                                            </script>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Upload -->
                                </div>
                                <!-- /File -->
                                <br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /View Modal -->

            <!-- Details Modify modal -->
            <div class="modal fade" id="modifyModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="min-width:250px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Details</h5>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="modifyModalForm">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="mod_birthdate" class="col-form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="mod_birthdate" name="birth_date">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('birth_date')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('birth_date'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_birthdate').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="mod_gender" class="col-form-label">Gender</label>
                                        <select class="form-control" id="mod_gender" name="gender">
                                            <option value="" selected="selected">---Select Gender---</option>
                                            <option value="Male" selected="selected">Male</option>
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
                                    <div class="col-4 form-group">
                                        <label for="mod_bloodtype" class="col-form-label">Blood-type</label>
                                        <select class="form-control" id="mod_bloodtype" name="blood_type">
                                            <option value="" selected="selected">---Blood Type---</option>
                                            <option value="A+" selected="selected">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('blood_type')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('blood_type'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_bloodtype').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_height" class="col-form-label">Height</label>
                                        <input type="text" class="form-control" id="mod_height" name="height" placeholder="in feet or inches">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('height')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('height'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_height').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_weight" class="col-form-label">Weight</label>
                                        <input type="text" class="form-control" id="mod_weight" name="weight" placeholder="in pounds">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('weight')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('weight'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_weight').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer pb-3 float-right">
                                    <button type="button" class="btn button-width" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Details Modify modal -->

            <!-- Table Delete Modal -->
            <div class="modal fade" id="tabledeleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the file from the system</div>
                            </div><br>
                            <div class="float-right">
                                <form action="" method="get" id="deleteModalForm">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table Delete Modal -->
            <!-- /Modal -->

            <!-- Table -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header record-header">
                            <h3 class="card-title">Faculty Records</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="records_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!-- TBODY HERE -->
                                <tfoot>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>First name</th>
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
</div>
<!-- /.container-fluid -->





<!-- Script -->
<script>
    setTimeout(function() {
        <?php if (session()->get('success') !== null) : ?>
            // Sweet Alert for success staus
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

            // Re-show view modal with data after upload and delete medical records
            <?php if (!empty(session()->get('postData'))) : ?>
                var data = <?= session()->get('postData') ?>;
                retrieveData(data['id_no']);
                $('#viewModal').modal('show');
            <?php endif ?>
        <?php endif; ?>

        // File Upload Validation Error
        <?php if (!empty(session()->get('upload_validation'))) : ?>
            retrieveData2();
            $('#viewModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
            });
            $('#viewModal').modal('show');
        <?php endif; ?>

        // Modify Validation Error
        <?php if (!empty(session()->get('mod_validation'))) : ?>
            retrieveData('<?= session()->get('id_no') ?>');
            $('#viewModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
            });
            $('#viewModal').modal('show');
            setTimeout(function() {
                constructModifyModal('<?= session()->get('id_no') ?>', {
                    error: true
                });
                $('#modifyModal').on('hidden.bs.modal', function(evt) {
                    $('.error').addClass('d-none');
                    $('input.border').removeClass('border border-danger');
                    $('select.border').removeClass('border border-danger');
                });
                $('#modifyModal').modal('show');
            }, 500);
        <?php endif; ?>
    }, 500);

    $(document).ready(function() {
        $("#records_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            buttons: ["copy", "excel", "pdf", "print"],
            ajax: {
                type: 'post',
                url: '<?= site_url('records/fetchAllFaculty') ?>',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // For sidebar
        $("#mainUserRecordNav").addClass('menu-open');
        $("#mainUserRecordNav > a").addClass('active');
        $("#facultyRecordNav > a").addClass('active');

        // Reset add modal on close
        $('#viewModal').on('hidden.bs.modal', function(evt) {
            $('#medicalfile').val("");
            $('#filename').val("");
        });
    });

    // Retrieve data with id
    function retrieveData(id) {
        $.ajax({
            url: '<?= site_url('records/fetchLyceanById') ?>/' + id,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#rec_idno').text(response['id_no']);
                $('#rec_fullname').text(`${response['last_name']}, ${response['first_name']}`);
                $('#rec_department').text(response['department']);
                $('input[name=id_no]').val(response['id_no']);

                $('#birthdate').text(response['birth_date']);
                $('#age').text(response['age']);
                $('#gender').text(response['gender']);
                $('#bloodtype').text(response['blood_type']);
                $('#height').text(response['height']);
                $('#weight').text(response['weight']);
            }
        });

        $.ajax({
            url: '<?= site_url('records/fetchAllRecordsById') ?>/' + id,
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#medicalfiles_table>tbody').html(response);
            }
        })
    }

    // Retrieve data
    function retrieveData2() {
        <?php if (!empty(session()->get('postData'))) : ?>
            var data = <?= session()->get('postData') ?>;
            $('#filename').val(data['filename']);
            retrieveData(data['id_no']);
        <?php endif ?>
    }

    // Set action form of deleteModalForm base on id
    function setDeleteActionForm(id) {
        $('#deleteModalForm').prop('action', '<?= site_url('records/deleteFacultyRecord') ?>/' + id);
    }

    // Construct modify modal
    function constructModifyModal(id, obj = {
        error: false
    }) {
        $('#modifyModalForm').prop('action', '<?= site_url('records/modifyFacultyData') ?>/' + id);
        if (obj['error'] == false) {
            $('#mod_birthdate').val($('#birthdate').text() == '---' ? '' : formatDate($('#birthdate').text()));
            $('#mod_gender').val($('#gender').text() == '---' ? '' : $('#gender').text());
            $('#mod_height').val($('#height').text() == '---' ? '' : $('#height').text());
            $('#mod_weight').val($('#weight').text() == '---' ? '' : $('#weight').text());
            $('#mod_bloodtype').val($('#bloodtype').text() == '---' ? '' : $('#bloodtype').text());
        } else {
            var data = <?= session()->get('getData') ?>

            $('#mod_birthdate').val(formatDate(data['birth_date']));
            $('#mod_gender').val(data['gender']);
            $('#mod_height').val(data['height']);
            $('#mod_weight').val(data['weight']);
            $('#mod_bloodtype').val(data['blood_type']);
        }
    }

    // Format date
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    // Multiple modal scroll
    $('body').on('hidden.bs.modal', function() {
        if ($('.modal.show').length > 0) {
            $('body').addClass('modal-open');
        }
    });
</script>

<?= $this->endSection('content') ?>