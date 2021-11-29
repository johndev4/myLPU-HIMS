<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">

        <!-- Back Button -->
        <!-- <div class="row mt-2 mb-2" style="border:1px solid none">
            <div class="col-sm-12">
                <a href="" class="back-btn">
                    <i class="fas fa-chevron-left fa-2x font-weight-normal" style="font-size: 17pt; color: rgb(88, 88, 88); vertical-align:baseline"></i>
                    <span class="font-weight-normal ml-1" style="font-size: 20pt; color: rgb(88, 88, 88)">Back</span>
                </a>
            </div>
        </div> -->
        <!-- /Back Button -->

        <div class="row d-flex justify-content-center" style="border:1px solid none; margin-top:80px">

            <!-- <div class="col-sm-12 col-md-5" style="border:1px solid none">
                <div class="card mt-3">
                    <div class="card-header ">
                        <strong>Consultation Details</strong>
                    </div>
                    <div class="card-body">
                        <label class="d-block text-secondary">Consultation ID</label>
                        <div class="mt-n2 mb-2">
                            <span>jYUVg7t3uyw201vp</span>
                        </div>
                        <label class="d-block text-secondary">Schedule</label>
                        <div class="mt-n2 mb-2">
                            <span class="text-dark time">Time: 8:30 am</span>
                            <span class="text-dark date float-right">Date: October 11, 2021</span>
                        </div>
                        <label class="d-block text-secondary">Meeting Link</label>
                        <div class="mt-n2 mb-2">
                            <a href="" class="text-dark"><u>http://localhost/myLPU-HIMS/lycean/</u></a>
                        </div>
                        <hr>
                        <label class="d-block text-secondary">Concern</label>
                        <p class="mt-n2 mb-2">
                            Lorem ipsum abdul jakul bulbul Some quick example text to build
                            on the card title and make up the bulk of the card's content.
                        </p>
                        <label class="d-block text-secondary">Denial of Service</label>
                        <p class="mt-n2 mb-2">
                            Lorem ipsum abdul jakul bulbul Some quick example text to build
                            on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-7" style="border:1px solid none">
                
                <div class="card mt-3">
                    <div class="card-body table-responsive p-0" style="height: 256px;">
                        <table id="medicalfiles_table" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-dark">#</th>
                                    <th class="text-dark">File Name</th>
                                    <th class="text-dark">Date Added</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="">http://localhost/myLPU-HIMS/lycean/</a></td>
                                    <td> 10-11-2021</td>
                                    <td class="text-danger text-center">Delete</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div> -->


            <!-- Navigation -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12 default-nav">
                        <a href="#null" onclick="javascript:history.back ();">
                            <div class="card shadow card2" style="max-width:32rem">
                                <div class="row p-3 default-nav" style="border:1px solid none">
                                    <div class="col-12 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <i class="fas fa-chevron-left fa-2x" style="color: #999999;"></i>
                                        <span class="font-weight-bold ml-1" style="font-size: 25pt; color: #999999">Back</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row border-outside">
                    <div class="col-12 default-nav">
                        <a href="<?= site_url('consultation') ?>">
                            <div id="consultationNav" class="card shadow card2" style="max-width:32rem; border:3px solid none">
                                <div class="row p-3 default-nav">
                                    <div class="col-7 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <span class="font-weight-bold" style="font-size: 25pt; color: #7687CD">Consult</span>
                                    </div>
                                    <div class="col-5 mt-1" align="center" style="border:1px solid none">
                                        <i class="fas fa-comment-medical fa-3x" style="color: #7687CD"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 default-nav">
                        <a href="<?= site_url('mentalwellness') ?>">
                            <div id="mentalwellnessNav" class="card shadow card2 actv2" style="max-width:32rem">
                                <div class="row p-3 default-nav" style="border:1px solid none">
                                    <div class="col-7 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <span class="font-weight-bold" style="font-size: 25pt; color: #CC6699">Mental Wellness</span>
                                    </div>
                                    <div class="col-5 mt-1" align="center" style="border:1px solid none">
                                        <i class="fas fa-brain fa-3x" style="color: #CC6699"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Navigation -->

            <!-- Mobile Navigation -->
            <div class="col-md-6 hide">
                <div class="row">
                    <div class="col-4 text-center">
                        <a href="#null" onclick="javascript:history.back ();">
                            <div class="card shadow card2 py-3" style="max-width:32rem">
                                <i class="fas fa-chevron-left fa-2x" style="color: #999999"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= site_url('consultation') ?>">
                            <div id="consultationNavMob" class="card shadow card2 py-3">
                                <i class="fas fa-comment-medical fa-2x" style="color: #7687CD"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= site_url('mentalwellness') ?>">
                            <div id="mentalwellnessNavMob" class="card shadow card2 py-3 actv2">
                                <i class="fas fa-brain fa-2x" style="color: #CC6699"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Mobile Navigation -->

            <!-- Tabs -->
            <div class="col-sm-12 col-md-6">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-details-tab" data-toggle="pill" href="#custom-tabs-four-details" role="tab" aria-controls="custom-tabs-four-details" aria-selected="true">Consultation Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-documents-tab" data-toggle="pill" href="#custom-tabs-four-documents" role="tab" aria-controls="custom-tabs-four-documents" aria-selected="false">Files</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style="height: 400px; overflow-y:auto">

                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Consultation Details -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-details" role="tabpanel" aria-labelledby="custom-tabs-four-details-tab">
                                <div class="row" id="detailsTab">

                                    <div class="col-sm-12 col-md-12" style="border:1px solid none">
                                        <div class="d-block">
                                            <label class="d-inline text-secondary">Consultation ID:</label>
                                            <div class="mt-n2 mb-2 d-inline">
                                                <span> <?= $details['consultation_id'] ?> </span>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <label class="d-inline text-secondary">Date of Request:</label>
                                            <div class="mt-n2 mb-2 d-inline">
                                                <span> <?= $details['date_of_request'] ?> </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="d-block text-secondary">Schedule</label>
                                        <div class="mt-n2 mb-2">
                                            <span class="text-dark time">Time: <?= $details['time'] ?> </span>
                                            <span class="text-dark date float-right">Date: <?= $details['date'] ?> </span>
                                        </div>
                                        <label class="d-block text-secondary">Meeting Link</label>
                                        <div class="mt-n2 mb-2">
                                            <a <?= $details['meeting_link']['href'] ?> class="text-dark" target="_blank"> <?= $details['meeting_link']['text'] ?> </a>
                                        </div>
                                        <hr>
                                        <label class="d-block text-secondary">Concern</label>
                                        <p class="mt-n2 mb-2">
                                            <?= $details['concern_message'] ?>
                                        </p>
                                        <label class="d-block text-secondary">Reason for Denial</label>
                                        <p class="mt-n2 mb-2">
                                            <?= $details['rejection_message'] ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <!-- /Consultation Details -->

                            <!-- Medical Documents -->
                            <div class="tab-pane fade" id="custom-tabs-four-documents" role="tabpanel" aria-labelledby="custom-tabs-four-documents-tab">
                                <div class="row" id="documentsTab">

                                    <div class="col-sm-12 col-md-12">
                                        <table id="medicalfiles_table" class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="text-dark">#</th>
                                                    <th class="text-dark">File Name</th>
                                                    <!-- <th class="text-dark">Date Added</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?= $files ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- /Medical Documents -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /Tabs -->

        </div>

        <br><br><br><br>

    </div>
</body>





<!-- Script -->
<script>
    $('document').ready(function() {
        // For navigation
        if ('<?= $details['category'] ?>' == 'Consultation') {
            $('#consultationNav').addClass('active');
            $('#consultationNavMob').addClass('active');
        } else if ('<?= $details['category'] ?>' == 'Mental Wellness') {
            $('#mentalwellnessNav').addClass('active');
            $('#mentalwellnessNavMob').addClass('active');
        }

        // Trigger medical documents tab on TRUE
        <?php if (isset($_GET['documents']) && $_GET['documents'] == TRUE) : ?>
            $('#custom-tabs-four-documents-tab').trigger('click');
        <?php endif; ?>
    });
</script>

<?= $this->endSection('content') ?>