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
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="exampleModalLabel">Records</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="row">
                                <div class="col-12 form-group mb-n3">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    John Rafael P. Mistica
                                </div>
                                <div class="col-12 form-group mb-n3">
                                    <label for="recipient-name" class="col-form-label">ID number:</label>
                                    2018-2-02126
                                </div>
                                <div class="col-12 form-group">
                                    <label for="recipient-name" class="col-form-label">Department:</label>
                                    COECSA
                                </div>
                                <div class="col-12 form-group overflow-auto records-border">

                                    <!-- Table -->
                                    <div class="card-body p-0">
                                        <table class="table table-sm">
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
                                    <!-- /Table -->

                                </div>
                                <br><br><br><br>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Upload File</label>
                                        <input type="file" class="form-control-file " id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4 mb-n4">
                                    <div class="form-group float-right">
                                        <button type="button" class="btn btn-secondary d-flex flex-row swalDefaultSuccess" data-dismiss="modal">save</button>
                                    </div>
                                </div>
                            </form>
                            <div class="footer float-right pb-3">

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

<!-- Page specific script -->
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
                url: '<?= base_url('records/fetchAllFaculty') ?>',
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

    });
</script>

<?= $this->endSection('content') ?>