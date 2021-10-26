<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Batch Management</h1>
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
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-boxes"></i></span>
                        <span class="info-box-text text-black-50">Add Batch</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Modal-Add-Batch -->
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
                                        <label for="add_productid" class="col-form-label">Batch ID</label>
                                        <input type="text" class="form-control" id="" name="productid" value="">
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_department" class="col-form-label">Product Name</label>
                                        <select class="form-control" id="add_department" name="department">
                                            <option value="" selected="selected">---Select---</option>
                                            <option value="">RiteMEd - Cefuroxime 250mg</option>
                                            <option value="">Pfizer - Paracetamol 50mg</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_productid" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" id="" name="productid" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_productid" class="col-form-label">Expiration</label>
                                        <input type="Date" class="form-control" id="" name="productid" value="">
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Modal-Add-Batch -->

            <!-- Modify Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Medicine Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label">Batch ID</label>
                                        <input type="text" class="form-control" id="" name="" value="A0001" disabled>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_department" class="col-form-label">Product Name</label>
                                        <select class="form-control" id="add_department" name="department" disabled>
                                            <option value="" selected="selected">---Select---</option>
                                            <option value="">RiteMEd - Cefuroxime 250mg</option>
                                            <option value="">Pfizer - Paracetamol 50mg</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_firstname" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" id="" name="" value="100">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_middleinit" class="col-form-label">Expiration</label>
                                        <input type="date" class="form-control" id="" name="" maxlength="1" value="Antibacterial">
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
            <!-- /Modal -->

            <!-- Table -->
            <div class="card">
                <div class="card-header inventory-header">
                    <h3 class="card-title">Batch</h3>
                </div>

                <div class="card-body">
                    <table id="batches_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Batch ID</th>
                                <th>Product Name</th>
                                <th>Stock</th>
                                <th>Expiration</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DATA HERE -->
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /Table -->


        </div>
    </section>
</div>

<!-- Script -->
<script>
    $(document).ready(function() {
        // For sidebar
        $("#mainInventoryNav").addClass('menu-open');
        $("#mainInventoryNav > a").addClass('active');
        $("#batchNav > a").addClass('active');
        $("#medicineNav").addClass('menu-open');
        $("#medicineNav > a").addClass('active');

        // For datatable
        $("#batches_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= base_url('inventory/fetchAllBatches') ?>',
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
<!-- /Script -->

<?= $this->endSection('content') ?>