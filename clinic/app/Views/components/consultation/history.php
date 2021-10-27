<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="m-0 font-weight-normal text-black-50 d-inline">Consultation History |</h1>
                    <span class="d-inline"><a href="<?= base_url('consultations') ?>">Back</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Clear History-->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#clearModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-trash"></i></span>
                        <span class="info-box-text text-black-50">Clear History</span>
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Clear Modal -->
            <div class="modal fade" id="clearModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="height: 300px;">
                        <div class="modal-header font-weight-bold text-secondary">
                            Consultation History
                        </div>

                        <div class="modal-body">

                            <form action="" method="get" id="add_form">
                                <input type="hidden" name="role" value="">
                                <div class="row">
                                    <div class="col-12 form-group mb-n1">
                                        <span>Time range:</span>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="" class="col-form-label">From</label>
                                        <input type="date" class="form-control" id="" name="" value="">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="" class="col-form-label">To</label>
                                        <input type="date" class="form-control" id="" name="" value="">
                                    </div>
                                    <div class="col-12 form-group mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Clear all consultation history
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right mt-2">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Clear Data</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Clear Modal -->
            <!-- /Modal -->

            <!-- Tabs -->
            <div class="col-sm-12 col-md-12">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-accepted-tab" data-toggle="pill" href="#custom-tabs-four-accepted" role="tab" aria-controls="custom-tabs-four-accepted" aria-selected="true">Accepted</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-rejected-tab" data-toggle="pill" href="#custom-tabs-four-rejected" role="tab" aria-controls="custom-tabs-four-rejected" aria-selected="false">Rejected</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style=" overflow-y:auto">

                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Accepted Table -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-accepted" role="tabpanel" aria-labelledby="custom-tabs-four-accepted-tab">

                                <!-- Table -->
                                <table id="acceptedTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Student Name</th>
                                            <th>Department</th>
                                            <th>Consultation Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2019-2-69266</td>
                                            <td>John Rafael Mistica</td>
                                            <td>COECSA</td>
                                            <td>10-26-2021</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modifyModal">view</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2019-2-0236</td>
                                            <td>Jade Anne Kristel Vale</td>
                                            <td>COECSA</td>
                                            <td>10-26-2021</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modifyModal">view</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /Table -->

                            </div>
                            <!-- /Accepted Table -->

                            <!-- Rejected Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-rejected" role="tabpanel" aria-labelledby="custom-tabs-four-rejected-tab">

                                <!-- Table -->
                                <table id="rejectedTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Student Name</th>
                                            <th>Department</th>
                                            <th>Consultation Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2019-2-69266</td>
                                            <td>John Rafael Mistica</td>
                                            <td>COECSA</td>
                                            <td>10-26-2021</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modifyModal">view</button>
                                            </td>
                                        </tr>
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
<!-- /.container-fluid -->

<script>
    $(document).ready(function() {
        // For datatable
        $("#acceptedTable").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: false,
        });

        $("#rejectedTable").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: false,
        });

        // For sidebar
        $("#consultationNav > a").addClass('active');

    });
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>