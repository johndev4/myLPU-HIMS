<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Inventory</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Add Inventory -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#addModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-plus"></i></span>
                        <span class="info-box-text text-black-50">Add Inventory</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Modal-Add-Inventory -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Add Medicine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('useraccounts/addStudentAccount') ?>" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label">ID No.</label>
                                        <input type="text" class="form-control" id="add_idno" name="id_no" value="">
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="add_lastname" class="col-form-label">Last Name</label>
                                        <input type="text" class="form-control" id="add_lastname" name="last_name" value="">
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="add_firstname" class="col-form-label">First Name</label>
                                        <input type="text" class="form-control" id="add_firstname" name="first_name" value="">
                                    </div>
                                    <div class="col-2 form-group">
                                        <label for="add_middleinit" class="col-form-label">M.I.</label>
                                        <input type="text" class="form-control" id="add_middleinit" name="middle_initial" value="" maxlength="1">
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#add_username" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" id="add_username" name="username" value="">
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
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn bg-dark swalDefaultSuccess button-color">Add</button>
                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Modal-Add-Inventory -->
            <!-- /Modal -->

            <!-- Table -->
            <div class="card">
                <div class="card-header inventory-header">
                    <h3 class="card-title">Medicine</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Manufacturer</th>
                                <th>Generic Name</th>
                                <th>Drug Class</th>
                                <th>Stock</th>
                                <th>Expiration</th>
                                <th>Availability</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A0001</td>
                                <td>RiteMed</td>
                                <td>Cefuroxime 250mg</td>
                                <td>Antibacterial</td>
                                <td>50</td>
                                <td>09/22/21</td>
                                <td class="text-center"><span class="bg-danger p-1 rounded">Anne available</span></td>
                                <td>
                                    <button type="button" class="btn btn-default">Modify</button>
                                    <button type="button" class="btn btn-default">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0002</td>
                                <td>Pfizer</td>
                                <td>Biogesic 50mg</td>
                                <td>Analgesic</td>
                                <td>100</td>
                                <td>09/22/21</td>
                                <td class="text-center"><span class="bg-success p-1 rounded">Available</span></td>
                                <td></td>
                            </tr>
                            </tfoot>
                    </table>
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
        // For datatable
        $("#example1").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // For sidebar
        $("#mainUserAccountNav").addClass('menu-open');
        $("#mainUserAccountNav > a").addClass('active');
        $("#inventoryNav > a").addClass('active');


    });
</script>
<!-- /Script -->




<?= $this->endSection('content') ?>