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
                <!-- Add Inventory -->
                <!-- <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#addModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-boxes"></i></span>
                        <span class="info-box-text text-black-50">Add Batch</span>
                    </button>
                </div> -->
            </div>

            <!-- Modal -->
            <!-- Modify Modal -->
            <div class="modal fade" id="stockoutModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Stock Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label">Stock Out</label>
                                        <input type="number" class="form-control" id="" name="" value="0">
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
                    <h3 class="card-title">Stocks</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Batch ID</th>
                                <th>Product Name</th>
                                <th>Stock In</th>
                                <th>Stock Out</th>
                                <th>Expired</th>
                                <th>Stock Available</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A0001</td>
                                <td>RiteMed - Cefuroxime 250mg</td>
                                <td>100</td>
                                <td>50</td>
                                <td>0</td>
                                <td>50</td>
                                <td align="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#stockoutModal">Stock Out</button>
                                    <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteModal">Delete</button> -->
                                </td>
                            </tr>
                            <tr>
                                <td>A0002</td>
                                <td>Pfizer - Biogesic 50mg</td>
                                <td>50</td>
                                <td>5</td>
                                <td>0</td>
                                <td>45</td>
                                <td align="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#stockoutModal">Stock Out</button>
                                    <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteModal">Delete</button> -->
                                </td>
                            </tr>
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
        $("#stocksNav > a").addClass('active');
        $("#medicineNav").addClass('menu-open');
        $("#medicineNav > a").addClass('active');

    });
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>