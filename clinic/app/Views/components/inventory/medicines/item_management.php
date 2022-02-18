<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Item Management</h1>
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
                        <span class="info-box-text text-black-50">Add</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Modal-Add-Inventory -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('inventory/addMedicine') ?>" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_productid" class="col-form-label">Item ID</label>
                                        <input type="text" class="form-control" id="add_productid" name="product_id" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('product_id')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('product_id'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_productid').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_manufacturer" class="col-form-label">Manufacturer</label>
                                        <input type="text" class="form-control" id="add_manufacturer" name="manufacturer" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('manufacturer')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('manufacturer'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_manufacturer').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_genericname" class="col-form-label">Generic Name</label>
                                        <input type="text" class="form-control" id="add_genericname" name="generic_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('generic_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('generic_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_genericname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_manufacturer" class="col-form-label">Brand Name</label>
                                        <input type="text" class="form-control" id="add_brandname" name="brand_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('brand_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('brand_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_brandname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_drugclass" class="col-form-label">Drug Class</label>
                                        <input type="text" class="form-control" id="add_drugclass" name="drug_class" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('drug_class')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('drug_class'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_drugclass').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_dosage" class="col-form-label">Dosage</label>
                                        <input type="text" class="form-control" id="add_dosage" name="dosage" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('dosage')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('dosage'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_dosage').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Save</button>
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
                                <form action="" method="get" id="delete_form">
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
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Item Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="modify_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="modify_productid" class="col-form-label">Item ID</label>
                                        <input type="text" class="form-control" id="mod_productid" name="product_id" value="" readonly="readonly">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('product_id')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('product_id'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_productid').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_manufacturer" class="col-form-label">Manufacturer</label>
                                        <input type="text" class="form-control" id="mod_manufacturer" name="manufacturer" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('manufacturer')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('manufacturer'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_manufacturer').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_genericname" class="col-form-label">Generic Name</label>
                                        <input type="text" class="form-control" id="mod_genericname" name="generic_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('generic_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('generic_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_genericname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_genericname" class="col-form-label">Brand Name</label>
                                        <input type="text" class="form-control" id="mod_brandname" name="brand_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('brand_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('brand_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_brandname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="mod_drugclass" class="col-form-label">Drug Class</label>
                                        <input type="text" class="form-control" id="mod_drugclass" name="drug_class" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('drug_class')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('drug_class'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_drugclass').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="mod_dosage" class="col-form-label">Dosage</label>
                                        <input type="text" class="form-control" id="mod_dosage" name="dosage" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('dosage')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('dosage'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_dosage').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Save</button>
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
                    <h3 class="card-title">Items</h3>
                </div>

                <div class="card-body">
                    <table id="medicines_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Manufacturer</th>
                                <th>Generic Name</th>
                                <th>Brand Name</th>
                                <th>Drug Class</th>
                                <th>Dosage</th>
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
<!-- /.container-fluid -->

<!-- Script -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#medicines_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('inventory/fetchAllMedicines') ?>',
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
        $("#mainInventoryNav").addClass('menu-open');
        $("#mainInventoryNav > a").addClass('active');
        $("#invmngtNav > a").addClass('active');
        $("#medicineNav").addClass('menu-open');
        $("#medicineNav > a").addClass('active');

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
            retrieveData('<?= session()->get('product_id') ?>', {
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
            retrieveData('<?= session()->get('product_id') ?>', {
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
            $('#add_productid').val("");
            $('#add_manufacturer').val("");
            $('#add_genericname').val("");
            $('#add_brandname').val("");
            $('#add_drugclass').val("");
            $('#add_dosage').val("");
        });
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_productid').val(data['product_id']);
            $('#' + obj['modalType'] + '_manufacturer').val(data['manufacturer']);
            $('#' + obj['modalType'] + '_genericname').val(data['generic_name']);
            $('#' + obj['modalType'] + '_brandname').val(data['brand_name']);
            $('#' + obj['modalType'] + '_drugclass').val(data['drug_class']);
            $('#' + obj['modalType'] + '_dosage').val(data['dosage']);
        } else {
            $.ajax({
                url: '<?= site_url('inventory/fetchMedicineById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#mod_productid').val(response['product_id']);
                    $('#mod_manufacturer').val(response['manufacturer']);
                    $('#mod_genericname').val(response['generic_name']);
                    $('#mod_brandname').val(response['brand_name']);
                    $('#mod_drugclass').val(response['drug_class']);
                    $('#mod_dosage').val(response['dosage']);

                    resId = response['product_id'];
                }
            });
        }

        $('#modify_form').attr(
            'action',
            '<?= site_url('inventory/modifyMedicine') ?>/' + id
        );
        $('#delete_form').attr(
            'action',
            '<?= site_url('inventory/deleteMedicine') ?>/' + id
        );
    }
</script>
<!-- /Script -->




<?= $this->endSection('content') ?>