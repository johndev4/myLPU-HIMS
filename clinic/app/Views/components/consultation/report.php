<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-normal text-black-50 d-inline">Report |</h1>
                    <span class="d-inline"><a href="<?= base_url('consultations') ?>">Back</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Modal -->
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
                    <h3 class="card-title">Report</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Number</th>
                                <th>Student Name</th>
                                <th>Department</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2019-2-69266</td>
                                <td>John Rafael Mistica</td>
                                <td>COECSA</td>
                                <td>10-25-2021</td>
                            </tr>
                            <tr>
                                <td>2019-2-0236</td>
                                <td>Jade Anne Kristel Vale</td>
                                <td>COECSA</td>
                                <td>10-25-2021</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /Table -->

        </div>
    </section>
</div>
<!-- /.container-fluid -->

<script>
    $(document).ready(function() {
        // For datatable
        $("#example1").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            buttons: ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // For sidebar
        $("#consultationNav > a").addClass('active');

    });
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>