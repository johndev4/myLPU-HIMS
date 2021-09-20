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
                                    <!-- /View Info -->

                                    <!-- Details -->
                                    <div class="col-lg-4">
                                        <div class="card overflow-auto" style="height: 362px;">
                                            <h5 class="card-header text-danger">Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <span class=" d-block"><label class="text-secondary">Birthdate:</label> 10-14-2000</span>
                                                        <span class="d-block"><label class="text-secondary">Age:</label> 21</span>
                                                        <span class="d-block"><label class="text-secondary">Sex:</label> F</span>
                                                        <span class="d-block"><label class="text-secondary">Blood type:</label> O-</span>
                                                        <span class="d-block"><label class="text-secondary">Height:</label> 5"2</span>
                                                        <span class="d-block"><label class="text-secondary">Weight:</label> 100kg</span>
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
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th style="width: 450px">File Name</th>
                                                            <th style="width: 250px">Date Added</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td><a href="">Mistica, John_Medical_Result.pdf</a></td>
                                                            <td>09-07-2021</td>
                                                            <td><button type="button" class="btn text-danger" data-toggle="modal" data-target="#tabledeleteModal">Delete</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td><a href="">Mistica, John_MRI_Result.pdf</a></td>
                                                            <td>09-07-2021</td>
                                                            <td><button type="button" class="btn text-danger" data-toggle="modal" data-target="#tabledeleteModal">Delete</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3.</td>
                                                            <td><a href="">Mistica, John_Dental_Result.pdf</a></td>
                                                            <td>09-07-2021</td>
                                                            <td><button type="button" class="btn text-danger" data-toggle="modal" data-target="#tabledeleteModal">Delete</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td><a href="">Mistica, John_Physical_Checkup_Result.pdf</a></td>
                                                            <td>09-07-2021</td>
                                                            <td><button type="button" class="btn text-danger" data-toggle="modal" data-target="#tabledeleteModal">Delete</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Table -->

                                        <!-- Upload -->
                                        <div class="row" style="border:1px solid none">
                                            <div class="col-12">
                                                <form action="<?= base_url('records/uploadStudentRecord') ?>" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id_no" value="">
                                                    <div class="row">
                                                        <div class="col-md-8" style="border:1px solid none;">
                                                            <div class="form-group">
                                                                <label for="medical_file">Upload File
                                                                    <div class="d-flex justify-content-start mt-3">
                                                                        <i class="d-inline fas fa-file-upload fa-2x text-secondary" style="border:1px solid none;"></i>
                                                                        <input type="file" name="medicalFile" id="medical_file" class="form-control-file py-2 px-1"  style="border:1px solid none;">
                                                                        <!-- Validation Error -->
                                                                        <?php if (!empty(session()->getFlashdata('upload_validation'))) : ?>
                                                                            <?php if (session()->getFlashdata('upload_validation')->hasError('medical_file')) : ?>
                                                                                <span class="error text-danger">
                                                                                    <?= session()->getFlashdata('upload_validation')->getError('medical_file'); ?>
                                                                                </span>
                                                                                <script>
                                                                                    $().ready(function() {
                                                                                        $('#medical_file').addClass('border border-danger');
                                                                                    });
                                                                                </script>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="d-flex">
                                                                        <input type="text" class="form-control" id="filename" name="filename" placeholder="File name here...">
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn text-light ml-1 swalDefaultSuccess save-button-color float-right">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
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

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center mt-2">
                                    <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                    <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                    <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the record and all other information from the system</div>
                                </div><br>
                                <div class="float-right">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Delete Modal -->

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
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
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
                                <h3 class="card-title">Student Records</h3>
                            </div>
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
                        </div>
                    </div>
                </div>
                <!-- /Table -->

            </div>
        </section>
    </div>
    <!-- /.container-fluid -->

    <!-- Script -->
    <script>
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
                    url: '<?= base_url('records/fetchAllStudent') ?>',
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
            $("#studentRecordNav > a").addClass('active');

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

            // File Upload Validation Error
            <?php if (!empty(session()->getFlashdata('upload_validation'))) : ?>
                $('#viewModal').modal('show');
                retrieveData2();
                $('#viewModal').on('hidden.bs.modal', function(evt) {
                    $('.error').addClass('d-none');
                    $('input.border').removeClass('border border-danger');
                    $('select.border').removeClass('border border-danger');
                });
            <?php endif; ?>

            // Reset add modal on close
            $('#viewModal').on('hidden.bs.modal', function(evt) {
                $('#medical_file').val("");
                $('#filename').val("");
            });
        });


        // Retrieve data
        function retrieveData(id) {
            $.ajax({
                url: '<?= base_url('records/fetchLyceanById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var middle_initial = response['middle_initial'] != "" ? `${response['middle_initial']}.` : ""
                    $('#rec_idno').text(response['id_no']);
                    $('#rec_fullname').text(`${response['last_name']}, ${response['first_name']} ${middle_initial}`);
                    $('input[name=id_no]').val(response['id_no']);
                }
            });
        }
        // Retrieve data
        function retrieveData2() {
            var data = <?= session()->get('postData') ?>

            $('#medical_file').val(data['medical_file']);
            $('#filename').val(data['filename']);
        }
    </script>

    <?= $this->endSection('content') ?>