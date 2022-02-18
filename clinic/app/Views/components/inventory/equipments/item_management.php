<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Equipment</h1>
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

                <!-- Return -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#returnModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-undo-alt"></i></span>
                        <span class="info-box-text text-black-50">Return</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Modal-Add-Inventory -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Equipment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('inventory/addEquipment') ?>" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_productid" class="col-form-label">Product ID</label>
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
                                    <div class="col-8 form-group">
                                        <label for="add_productname" class="col-form-label">Product Name</label>
                                        <input type="text" class="form-control" id="add_productname" name="product_name" value="">
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
                                    <div class="col-4 form-group">
                                        <label for="add_qty" class="col-form-label">Quantity</label>
                                        <input type="number" class="form-control" id="add_qty" name="qty" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('qty')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('qty'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_qty').addClass('border border-danger');
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
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the equipment from the inventory</div>
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
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Equipment Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="modify_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="mod_productid" class="col-form-label">Product ID</label>
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
                                    <div class="col-8 form-group">
                                        <label for="mod_productname" class="col-form-label">Product Name</label>
                                        <input type="text" class="form-control" id="mod_productname" name="product_name" value="">
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
                                    <div class="col-4 form-group">
                                        <label for="mod_qty" class="col-form-label">Quantity</label>
                                        <input type="number" class="form-control" id="mod_qty" name="qty" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('qty')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('qty'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_qty').addClass('border border-danger');
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

            <!-- Return Modal -->
            <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Return</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('inventory/returnEquipment') ?>" method="get" id="return_form">
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label for="return_productname" class="col-form-label">Product</label>
                                        <select class="form-control" id="return_productname" name="product_name">
                                            <!-- OPTIONS HERE -->
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('return_validation'))) : ?>
                                            <?php if (session()->get('return_validation')->hasError('product_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('return_validation')->getError('product_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#return_productname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="return_qty" class="col-form-label">Quantity</label>
                                        <input type="number" class="form-control" id="return_qty" name="qty" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('return_validation'))) : ?>
                                            <?php if (session()->get('return_validation')->hasError('qty')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('return_validation')->getError('qty'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#return_qty').addClass('border border-danger');
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
            <!-- /Return Modal -->

            <!-- Insufficent quantity Modal -->
            <div class="modal fade" id="insufficientQuantityModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-warning"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Insuffient Quantity</div>
                                <div class="mt-3" style="font-size: 12pt;">The quantity you are trying to deduct is greater than the current quantity.</div>
                                <div class="mt-1 font-weight-normal text-secondary"></div>
                            </div><br>
                            <div class="">
                                <form action="" method="get" id="">
                                    <button type="button" class="btn btn-light btn-block" data-dismiss="modal" style="border-color: rgb(223, 223, 223);">Ok</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Insufficent quantity Modal -->

            <!-- /Modal -->

            <!-- Table -->
            <div class="card">
                <div class="card-header inventory-header">
                    <h3 class="card-title">Equipment</h3>
                </div>

                <div class="card-body">
                    <table id="equipments_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
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
<!-- /.container-fluid -->

<!-- Script -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#equipments_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('inventory/fetchAllEquipments') ?>',
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
        $("#equipmentNav > a").addClass('active');

        // Fetch all equipment product name using ajax
        $.ajax({
            url: '<?= site_url('inventory/fetchAllEquipmentProductName') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#return_productname').html(response);
            }
        });

        // Reset add modal on close
        $('#addModal').on('hidden.bs.modal', function(evt) {
            $('#add_productid').val("");
            $('#add_productname').val("");
            $('#add_qty').val("");
        });

        // Reset return modal on close
        $('#returnModal').on('hidden.bs.modal', function(evt) {
            $('#return_productname').val("");
            $('#return_qty').val("");
        });

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
            retrieveData('<?= session()->get('product_id') ?>', {
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
        <?php if (!empty(session()->get('mod_validation'))) : ?>
            retrieveData('<?= session()->get('product_id') ?>', {
                error: true,
                modalType: "mod"
            });
            $('#modifyModal').modal('show');
            $('#modifyModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Return Validation Error
        <?php if (!empty(session()->getFlashdata('return_validation'))) : ?>
            setTimeout(function() {
                retrieveData2();
            }, 500);
            $('#returnModal').modal('show');
            $('#returnModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Insufficient Quantity
        <?php if (!empty(session()->get('insufficient_quantity'))) : ?>
            <?php if (session()->get('insufficient_quantity') == TRUE) : ?>
                setTimeout(function() {
                    retrieveData2();
                }, 1000);
                $('#returnModal').modal('show');
                setTimeout(function() {
                    $('#insufficientQuantityModal').modal('show');
                }, 500);
            <?php endif; ?>
        <?php endif; ?>
    });

    // Retrieve data
    function retrieveData(id = null, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_productid').val(data['product_id']);
            $('#' + obj['modalType'] + '_productname').val(data['product_name']);
            $('#' + obj['modalType'] + '_qty').val(data['qty']);
        } else {
            $.ajax({
                url: '<?= site_url('inventory/fetchEquipmentById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#mod_productid').val(response['product_id']);
                    $('#mod_productname').val(response['product_name']);
                    $('#mod_qty').val(response['qty']);

                    resId = response['product_id'];
                }
            });
        }

        $('#modify_form').attr(
            'action',
            '<?= site_url('inventory/modifyEquipment') ?>/' + id
        );
        $('#delete_form').attr(
            'action',
            '<?= site_url('inventory/deleteEquipment') ?>/' + id
        );
    }

    function retrieveData2() {
        var data = <?= session()->get('getData') ?>

        $('#return_productname').val(data['product_name']);
        $('#return_qty').val(data['qty']);
    }
</script>
<!-- /Script -->




<?= $this->endSection('content') ?>