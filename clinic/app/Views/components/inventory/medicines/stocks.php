<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Stocks</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Stock out -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#stockoutModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-unlink"></i></span>
                        <span class="info-box-text text-black-50">Stock Out</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Stock out Modal -->
            <div class="modal fade" id="stockoutModal" tabindex="-1" role="document" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Stock</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('inventory/stockOut') ?>" method="get" id="stockout_form">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="out_productname" class="col-form-label">Product</label>
                                        <select class="form-control" id="out_productname" name="product_name">
                                            <!-- OPTIONS HERE -->
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('out_validation'))) : ?>
                                            <?php if (session()->get('out_validation')->hasError('product_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('out_validation')->getError('product_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#out_productname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="" class="col-form-label">Batch</label>
                                        <select class="form-control" id="out_batchid" name="batch_id">
                                            <!-- OPTIONS HERE -->
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('out_validation'))) : ?>
                                            <?php if (session()->get('out_validation')->hasError('batch_id')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('out_validation')->getError('batch_id'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#out_batchid').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="out_stockout" class="col-form-label">Stock Out</label>
                                        <input type="number" class="form-control" id="out_stockout" name="stock_out" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('out_validation'))) : ?>
                                            <?php if (session()->get('out_validation')->hasError('stock_out')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('out_validation')->getError('stock_out'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#out_stockout').addClass('border border-danger');
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
            <!-- Stock out Modal -->

            <!-- Insufficent stock Modal -->
            <div class="modal fade" id="insufficientStockModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-warning"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Insuffient Stock</div>
                                <div class="mt-3" style="font-size: 12pt;">The quantity you are trying to deduct is greater than the current stock available.</div>
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
            <!-- /Insufficent stock Modal -->
            <!-- /Modal -->

            <!-- Tabs -->
            <div class="col-sm-12 col-md-12">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-batch-tab" data-toggle="pill" href="#custom-tabs-four-batch" role="tab" aria-controls="custom-tabs-four-batch" aria-selected="true">Stocks by Batch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-productname-tab" data-toggle="pill" href="#custom-tabs-four-productname" role="tab" aria-controls="custom-tabs-four-productname" aria-selected="false">Stocks by Item</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style=" overflow-y:auto">

                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Batch Table -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-batch" role="tabpanel" aria-labelledby="custom-tabs-four-batch-tab">

                                <!-- Table -->
                                <table id="stocksbybatch_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Batch ID</th>
                                            <th>Product Name</th>
                                            <th>Stock In</th>
                                            <th>Stock Out</th>
                                            <th>Stock Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->

                            </div>
                            <!-- /Accepted Table -->

                            <!-- Rejected Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-productname" role="tabpanel" aria-labelledby="custom-tabs-four-productname-tab">

                                <!-- Table -->
                                <table id="stocks_table" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Stock In</th>
                                            <th>Stock Out</th>
                                            <th>Expired</th>
                                            <th>Stock Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA HERE -->
                                    </tbody>
                                </table>
                                <!-- /Table -->

                            </div>
                            <!-- /Rejected Table -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /Tabs -->
        </div>
    </section>
</div>





<!-- Script -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#stocksbybatch_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('inventory/fetchStockManagementByBatch') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
        $("#stocks_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('inventory/fetchStockManagement') ?>',
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
        $("#stocksNav > a").addClass('active');
        $("#medicineNav").addClass('menu-open');
        $("#medicineNav > a").addClass('active');

        // Fetch all medicine product name using ajax
        $.ajax({
            url: '<?= site_url('inventory/fetchAllMedicineProductName') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#out_productname').html(response);
            }
        });

        // Fetch batch by product id using ajax
        $('#out_batchid').prop('disabled', true);
        $.ajax({
            url: '<?= site_url('inventory/fetchBatchByProductID') ?>/' + $('#out_productname').val(),
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#out_batchid').html(response);
            }
        });
        $('#out_productname').on('input', function() {
            if ($('#out_productname').val() == '') {
                $('#out_batchid').prop('disabled', true);
            } else {
                $('#out_batchid').prop('disabled', false);
            }
            $.ajax({
                url: '<?= site_url('inventory/fetchBatchByProductID') ?>/' + $('#out_productname').val(),
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#out_batchid').html(response);
                }
            });
        });

        // Reset stock out modal on close
        $('#stockoutModal').on('hidden.bs.modal', function(evt) {
            $('#out_stockout').val("");
            $('#out_batchid').val("");
            $('#out_productname').val("");
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

        // Stock Out Validation Error
        <?php if (!empty(session()->get('out_validation'))) : ?>
            setTimeout(function() {
                retrieveData('', {
                    error: true,
                    modalType: "out"
                });
            }, 500);
            $('#stockoutModal').modal('show');
            $('#stockoutModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Insufficient Stock
        <?php if (!empty(session()->get('insufficient_stock'))) : ?>
            <?php if (session()->get('insufficient_stock') == TRUE) : ?>
                setTimeout(function() {
                    retrieveData('', {
                        error: true,
                        modalType: "out"
                    });
                }, 500);
                $('#stockoutModal').modal('show');
                setTimeout(function() {
                    $('#insufficientStockModal').modal('show');
                }, 500);
            <?php endif; ?>
        <?php endif; ?>
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_stockout').val(data['stock_out']);
            $('#' + obj['modalType'] + '_productname').val(data['product_name']);
            $('#out_batchid').prop('disabled', false);
            $.ajax({
                url: '<?= site_url('inventory/fetchBatchByProductID') ?>/' + $('#out_productname').val(),
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#out_batchid').html(response);
                }
            });
            setTimeout(function() {
                $('#' + obj['modalType'] + '_batchid').val(data['batch_id']);
            }, 500);
        }
    }
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>