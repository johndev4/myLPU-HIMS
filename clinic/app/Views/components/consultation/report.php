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
                                    <select name="select" class="col-sm-12 col-md-2 form-control d-inline weekly-yr" id="dropdownYear">
                                        <!-- <option value="" selected="selected">---</option> -->
                                    </select>

                                    <span for="" class="month-label">Month</span>
                                    <select class="col-sm-12 col-md-2 form-control d-inline weekly-mnth" id="" name="">
                                        <option value="" selected="selected">---</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
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

                                <span class="d-block mb-2" style="font-size: 10pt;">Filter by:</span>

                                <div class="row form-group d-inline">
                                    <span for="" class="ml-2">Year</span>
                                    <select name="select" class="col-sm-12 col-md-2 form-control d-inline weekly-yr" id="mnthlydropdownYear">
                                        <!-- <option value="" selected="selected">---</option> -->
                                    </select>
                                </div>
                                <br><br>

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

        // For weekly year combobox
        $('#dropdownYear').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            var x = "---";

            for (var i = 0; i < 50; i++) {
                if ((year + i) == current) {
                    $(this).append('<option selected value="' + (x) + '">' + (x) + '</option>');
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
                } else {
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
                }
            }
        })

        // For monthly year combobox
        $('#mnthlydropdownYear').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            var x = "---";

            for (var i = 0; i < 50; i++) {
                if ((year + i) == current) {
                    $(this).append('<option selected value="' + (x) + '">' + (x) + '</option>');
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
                } else {
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
                }
            }
        })

    });
</script>
<!-- /Script -->

<?= $this->endSection('content') ?>