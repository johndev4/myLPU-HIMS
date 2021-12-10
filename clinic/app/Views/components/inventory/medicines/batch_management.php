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
                        <span class="info-box-text text-black-50">Add</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Modal-Add-Batch -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Batch</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('inventory/addBatch') ?>" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_batchid" class="col-form-label">Batch ID</label>
                                        <input type="text" class="form-control" id="add_batchid" name="batch_id" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('batch_id')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('batch_id'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_batchid').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_productname" class="col-form-label">Product Name</label>
                                        <select class="form-control" id="add_productname" name="product_name">
                                            <!-- OPTIONS HERE -->
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('product_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('product_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_productname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_stockin" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" id="add_stockin" name="stock_in" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('stock_in')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('stock_in'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_stockin').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_expirationdate" class="col-form-label">Expiration</label>
                                        <input type="Date" class="form-control" id="add_expirationdate" name="expiration_date" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('expiration_date')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('expiration_date'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_expirationdate').addClass('border border-danger');
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
            </div><!-- /Modal-Add-Batch -->

            <!-- Modify Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Batch Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="modify_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="mod_batchid" class="col-form-label">Batch ID</label>
                                        <input type="text" class="form-control" id="mod_batchid" name="batch_id" value="" readonly="readonly">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('batch_id')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('batch_id'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_batchid').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="mod_productname" class="col-form-label">Product Name</label>
                                        <select class="form-control" id="mod_productname" name="product_name">
                                            <!-- OPTIONS HERE -->
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('product_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('product_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_productname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="mod_stockin" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" id="mod_stockin" name="stock_in" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('stock_in')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('stock_in'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_stockin').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="mod_expirationdate" class="col-form-label">Expiration</label>
                                        <input type="date" class="form-control" id="mod_expirationdate" name="expiration_date" maxlength="1" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('expiration_date')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('expiration_date'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_expirationdate').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
                                <th>Expiration</th>
                                <th>Date Added</th>
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
        // For datatable
        $("#batches_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('inventory/fetchAllBatches') ?>',
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
        $("#batchNav > a").addClass('active');
        $("#medicineNav").addClass('menu-open');
        $("#medicineNav > a").addClass('active');

        // Fetch all medicine product name using ajax
        $.ajax({
            url: '<?= site_url('inventory/fetchAllMedicineProductName') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#add_productname').html(response);
                $('#mod_productname').html(response);
            }
        });

        // Reset add modal on close
        $('#addModal').on('hidden.bs.modal', function(evt) {
            $('#add_batchid').val("");
            $('#add_productname').val("");
            $('#add_stockin').val("");
            $('#add_expirationdate').val("");
        });

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
            retrieveData('<?= session()->get('batch_id') ?>', {
                error: true,
                modalType: "add"
            });
            $('#addModal').modal('show');
            $('#addModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Modify Validation Error
        <?php if (!empty(session()->getFlashdata('mod_validation'))) : ?>
            setTimeout(function() {
                retrieveData('<?= session()->get('batch_id') ?>', {
                    error: true,
                    modalType: "mod"
                });
            }, 500);
            $('#modifyModal').modal('show');
            $('#modifyModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_batchid').val(data['batch_id']);
            $('#' + obj['modalType'] + '_productname').val(data['product_name']);
            $('#' + obj['modalType'] + '_stockin').val(data['stock_in']);
            $('#' + obj['modalType'] + '_expirationdate').val(data['expiration_date']);
        } else {
            $.ajax({
                url: '<?= site_url('inventory/fetchBatchById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#mod_batchid').val(response['batch_id']);
                    $('#mod_productname').val(response['product_name']);
                    $('#mod_stockin').val(response['stock_in']);
                    $('#mod_expirationdate').val(response['expiration_date']);

                    resId = response['batch_id'];
                }
            });
        }

        $('#modify_form').attr(
            'action',
            '<?= site_url('inventory/modifyBatch') ?>/' + id
        );
        $('#delete_form').attr(
            'action',
            '<?= site_url('inventory/deleteBatch') ?>/' + id
        );
    }
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>