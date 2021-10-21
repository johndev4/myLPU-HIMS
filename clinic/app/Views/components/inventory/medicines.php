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

                <!-- Batch Management -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3">
                        <span class="info-box-icon text-black-50"><i class="fas fa-boxes"></i></span>
                        <span class="info-box-text text-black-50">Batch</span>
                    </button>
                </div>



            </div>

            <!-- Modal -->
            <!-- Modal-Add-Inventory -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Medicine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label">SKU</label>
                                        <input type="text" class="form-control" id="" name="id_no" value="">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_lastname" class="col-form-label">Manufacturer</label>
                                        <input type="text" class="form-control" id="" name="last_name" value="">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_firstname" class="col-form-label">Generic Name</label>
                                        <input type="text" class="form-control" id="" name="first_name" value="">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_middleinit" class="col-form-label">Drug Class</label>
                                        <input type="text" class="form-control" id="" name="middle_initial" value="" maxlength="1">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="#add_username" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" id="" name="username" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="#add_username" class="col-form-label">Expiration Date</label>
                                        <input type="date" class="form-control" id="" name="username" value="">
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_department" class="col-form-label">Availability</label>
                                        <select class="form-control" id="add_department" name="department">
                                            <option value="" selected="selected">---Choose Status---</option>
                                            <option value="COECSA">Available</option>
                                            <option value="CITHM">Unavailable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Save</button>
                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Modal-Add-Inventory -->

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the medicine from the inventory</div>
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
            <!-- /Delete Modal -->

            <!-- Modify Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Inventory Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label">SKU</label>
                                        <input type="text" class="form-control" id="" name="" value="A0001">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_lastname" class="col-form-label">Manufacturer</label>
                                        <input type="text" class="form-control" id="" name="" value="RiteMed">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_firstname" class="col-form-label">Generic Name</label>
                                        <input type="text" class="form-control" id="" name="" value="Cefuroxime 250mg">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_middleinit" class="col-form-label">Drug Class</label>
                                        <input type="text" class="form-control" id="" name="" maxlength="1" value="Antibacterial">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="#add_username" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" id="" name="" value="50" disabled>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="#add_username" class="col-form-label">Expiration Date</label>
                                        <input type="date" class="form-control" id="" name="" value="">
                                    </div>


                                    <div class="col-6 form-group">
                                        <label for="#add_username" class="col-form-label">Stock In</label>
                                        <input type="number" class="form-control" id="" name="" value="0">
                                    </div>

                                    <div class="col-6 form-group">
                                        <label for="#add_username" class="col-form-label">Stock Out</label>
                                        <input type="number" class="form-control" id="" name="" value="0">
                                    </div>









                                    <div class="col-12 form-group">
                                        <label for="add_department" class="col-form-label">Availability</label>
                                        <select class="form-control" id="" name="">
                                            <option value="" selected="selected">---Choose Status---</option>
                                            <option value="Available">Available</option>
                                            <option value="Unavailable">Unavailable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Save</button>
                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modify Modal -->



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
                                <td class="text-center"><span class="bg-danger p-1 rounded text-xs">Unavailable</span></td>
                                <td align="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modifyModal">Modify</button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0002</td>
                                <td>Pfizer</td>
                                <td>Biogesic 50mg</td>
                                <td>Analgesic</td>
                                <td>100</td>
                                <td>09/22/21</td>
                                <td class="text-center"><span class="bg-success p-1 rounded text-xs">Available</span></td>
                                <td align="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modifyModal">Modify</button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </td>
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
        $("#mainInventoryNav").addClass('menu-open');
        $("#mainInventoryNav > a").addClass('active');
        $("#medicineNav > a").addClass('active');


    });
</script>
<!-- /Script -->




<?= $this->endSection('content') ?>