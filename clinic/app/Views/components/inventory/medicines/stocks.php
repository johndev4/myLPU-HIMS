<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Stock Management</h1>
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
            <div class="modal fade" id="stockoutModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Stock Management</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="stockout_form">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="out_stockout" class="col-form-label">Stock Out</label>
                                        <input type="number" class="form-control" id="out_stockout" name="stock_out" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="out_productname" class="col-form-label">Product Name</label>
                                        <select class="form-control" id="out_productname" name="product_name">
                                            <option value="" selected="selected">---</option>
                                            <option value=''>RiteMed - Cefuroxime 250mg</option>
                                            <option value=''>Pfizer - Biogesic 500mg</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="" class="col-form-label">Batch ID</label>
                                        <select class="form-control" id="out_batchid" name="batch_id">
                                            <option value="" selected="selected">---</option>
                                            <option value=''>B01</option>
                                            <option value=''>B02</option>
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
            <!-- Stock out Modal -->

            <!-- Insufficent stock Modal -->




            <!-- /Insufficent stock Modal -->

            <!-- /Modal -->

            <!-- Table -->
            <!-- <div class="card">
                <div class="card-header inventory-header">
                    <h3 class="card-title">Stocks</h3>
                </div>

                <div class="card-body">
                </div>

            </div> -->
            <!-- /Table -->

            <!-- Tabs -->
            <div class="col-sm-12 col-md-12">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-batch-tab" data-toggle="pill" href="#custom-tabs-four-batch" role="tab" aria-controls="custom-tabs-four-batch" aria-selected="true">Stocks by Batch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-productname-tab" data-toggle="pill" href="#custom-tabs-four-productname" role="tab" aria-controls="custom-tabs-four-productname" aria-selected="false">Stocks by Product name</a>
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
                url: '<?= base_url('inventory/fetchStockManagementByBatch') ?>',
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
                url: '<?= base_url('inventory/fetchStockManagement') ?>',
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

        // Reset stock out modal on close
        $('#stockoutModal').on('hidden.bs.modal', function(evt) {
            $('#out_stockout').val("");
            $('#out_batchid').val("");
            $('#out_productname').val("");
        });

        // Fetch all medicine product name using ajax
        $.ajax({
            url: '<?= base_url('inventory/fetchAllMedicineProductName') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#add_productname').html(response);
                $('#mod_productname').html(response);
            }
        });
    });
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>