<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="m-0 font-weight-normal text-black-50 d-inline">Consultation Report |</h1>
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

            </div>

            <!-- Tabs -->
            <div class="col-sm-12 col-md-12">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-weekly-tab" data-toggle="pill" href="#custom-tabs-four-weekly" role="tab" aria-controls="custom-tabs-four-weekly" aria-selected="true">Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-monthly-tab" data-toggle="pill" href="#custom-tabs-four-monthly" role="tab" aria-controls="custom-tabs-four-monthly" aria-selected="false">Monthly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-yearly-tab" data-toggle="pill" href="#custom-tabs-four-yearly" role="tab" aria-controls="custom-tabs-four-yearly" aria-selected="false">Yearly</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style=" overflow-y:auto">

                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Weekly Table -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-weekly" role="tabpanel" aria-labelledby="custom-tabs-four-weekly-tab">

                                <span class="d-block mb-2" style="font-size: 10pt;">Filter by:</span>

                                <div class="row form-group d-inline">
                                    <span for="" class="ml-2">Year</span>
                                    <select class="col-sm-12 col-md-2 form-control d-inline weekly-yr" id="" name="">
                                        <option value="" selected="selected">---</option>
                                        <option value="">2020</option>
                                        <option value="">2021</option>
                                    </select>

                                    <span for="" class="">Month</span>
                                    <select class="col-sm-12 col-md-2 form-control d-inline weekly-mnth" id="" name="">
                                        <option value="" selected="selected">---</option>
                                        <option value="">january</option>
                                        <option value="">February</option>
                                        <option value="">September</option>
                                    </select>
                                </div>

                                <div class="form-group d-inline">
                                
                                </div>
                                <br><br>

                                <!-- Table -->
                                <table id="weeklyTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Accepted Consultations</th>
                                            <th>Rejected Consultations</th>
                                            <th>Week</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>15</td>
                                            <td>3</td>
                                            <td>Week 1</td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>0</td>
                                            <td>Week 2</td>
                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td>8</td>
                                            <td>Week 3</td>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>Week 4</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /Weekly table -->

                            <!-- Monthly Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-monthly" role="tabpanel" aria-labelledby="custom-tabs-four-monthly-tab">
                                <h1>Monthly</h1>
                                <!-- Table -->
                                <table id="monthlyTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Accepted Consultations</th>
                                            <th>Rejected Consultations</th>
                                            <th>Week</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>8</td>
                                            <td>0</td>
                                            <td>January</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>5</td>
                                            <td>February</td>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>1</td>
                                            <td>March</td>
                                        </tr>
                                        <tr>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>April</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /Monthly Table -->

                            <!-- Yearly Table -->
                            <div class="tab-pane fade" id="custom-tabs-four-yearly" role="tabpanel" aria-labelledby="custom-tabs-four-yearly-tab">
                                <h1>Yearly</h1>
                                <!-- Table -->
                                <table id="yearlyTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Accepted Consultations</th>
                                            <th>Rejected Consultations</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>100</td>
                                            <td>39</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td>153</td>
                                            <td>2020</td>
                                        </tr>
                                        <tr>
                                            <td>125</td>
                                            <td>15</td>
                                            <td>2021</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /Yearly Table -->
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
        $("#yearlyTable").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: false,
        });

        $("#monthlyTable").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: false,
        });

        $("#weeklyTable").DataTable({
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