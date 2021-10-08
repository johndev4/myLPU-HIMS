<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">

        <div class="row mt-5" style="border:1px solid none">
            <!-- Navigation -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <a href="<?= base_url('dashboard') ?>">
                            <div class="card shadow card2" style="max-width:32rem">
                                <div class="row p-3" style="border:1px solid none">
                                    <div class="col-12 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <i class="fas fa-chevron-left fa-2x" style="color: #999999;"></i>
                                        <span class="font-weight-bold ml-1" style="font-size: 25pt; color: #999999">Home</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card shadow card2" style="max-width:32rem">
                            <div class="row p-3" style="border:1px solid none">
                                <div class="col-7 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                    <span class="font-weight-bold" style="font-size: 25pt; color: #7687CD">Consult</span>
                                </div>
                                <div class="col-5 mt-1" align="center" style="border:1px solid none">
                                    <i class="fas fa-comment-medical fa-3x" style="color: #7687CD"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="<?= base_url('mentalwellness') ?>">
                            <div class="card shadow card2" style="max-width:32rem">
                                <div class="row p-3" style="border:1px solid none">
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
                        <a href="<?= base_url('dashboard') ?>">
                            <div class="card shadow card2 py-3" style="max-width:32rem">
                                <i class="fas fa-home fa-2x" style="color: #999999"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= base_url('consultation') ?>">
                            <div class="card shadow card2 py-3" style="max-width:32rem">
                                <i class="fas fa-comment-medical fa-2x" style="color: #7687CD"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= base_url('mentalwellness') ?>">
                            <div class="card shadow card2 py-3" style="max-width:32rem">
                                <i class="fas fa-brain fa-2x" style="color: #CC6699"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Mobile Navigation -->

            <!-- Concern -->
            <div class="col-md-6 mb-3">
                <div class="card card-txtarea">
                    <!-- <div class="card-header bg-danger py-5 text-center">
                        <span class="font-weight-bold" style="font-size:18pt">What's your concern?</span>
                    </div> -->
                    <div class="card-body">
                        <div class="form-group text-center py-1">
                            <span class="font-weight-bold text-secondary" style="font-size:18pt">What's your concern?</span>
                        </div>
                        <div class="form-group">
                            <!-- <label for="FormControlTextarea" class="font-weight-normal mb-2" style="font-size: 18pt; color: rgb(116, 116, 116);">Tell the doctor your health concern.</label> -->
                            <textarea class="form-control txtarea border-0" id="FormControlTextarea" rows="5" placeholder="Tell us here..." maxlength="100"></textarea>
                            <div class="mb-2" id="count" align="right">
                                <span id="current">0</span>
                                <span id="maximum">/ 100</span>
                            </div>
                            <button type="submit" class="btn btn-block btn-default p-2">Send Request Now<i class="far fa-paper-plane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Concern -->
        </div>

        <div class="row d-flex flex-row-reverse">
            <!-- Tabs -->
            <div class="col-sm-12 col-lg-6">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-active-tab" data-toggle="pill" href="#custom-tabs-four-active" role="tab" aria-controls="custom-tabs-four-active" aria-selected="true">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-pending-tab" data-toggle="pill" href="#custom-tabs-four-pending" role="tab" aria-controls="custom-tabs-four-pending" aria-selected="false">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-rejected-tab" data-toggle="pill" href="#custom-tabs-four-rejected" role="tab" aria-controls="custom-tabs-four-rejected" aria-selected="false">Rejected</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-done-tab" data-toggle="pill" href="#custom-tabs-four-done" role="tab" aria-controls="custom-tabs-four-done" aria-selected="false">Done</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style="height: 400px; overflow-y:auto">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Active Tab -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-active" role="tabpanel" aria-labelledby="custom-tabs-four-active-tab">
                                <div class="row">
                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>8:30 am</span>
                                                <span class="text-dark ml-5">Date: </span><span>10-07-2021</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">http://localhost/myLPU-HIMS/lycean/public/consultation</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Active Tab -->

                            <!-- Pending tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-pending" role="tabpanel" aria-labelledby="custom-tabs-four-pending-tab">
                                <div class="row">
                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>---</span>
                                                <span class="text-dark ml-5">Date: </span><span>---</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">---</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Pending tab -->

                            <!-- Rejected Tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-rejected" role="tabpanel" aria-labelledby="custom-tabs-four-rejected-tab">
                                <div class="row">
                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>---</span>
                                                <span class="text-dark ml-5">Date: </span><span>---</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">---</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>

                                    <hr class="text-danger" width="100%">

                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>---</span>
                                                <span class="text-dark ml-5">Date: </span><span>---</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">---</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>

                                    <hr class="text-danger" width="100%">

                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>---</span>
                                                <span class="text-dark ml-5">Date: </span><span>---</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">---</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>

                                    <hr class="text-danger" width="100%">
                                </div>
                            </div>
                            <!-- /Rejected Tab -->

                            <!-- Done Tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-done" role="tabpanel" aria-labelledby="custom-tabs-four-done-tab">
                                <div class="row">
                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>8:30 am</span>
                                                <span class="text-dark ml-5">Date: </span><span>10-07-2021</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">http://localhost/myLPU-HIMS/lycean/public/consultation</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>

                                    <hr class="text-danger" width="100%">

                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>8:30 am</span>
                                                <span class="text-dark ml-5">Date: </span><span>10-07-2021</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">http://localhost/myLPU-HIMS/lycean/public/consultation</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>

                                    <hr class="text-danger" width="100%">

                                    <div class="col-md-12" style="border:1px solid none">
                                        <div class="float-left">
                                            <label class="d-block text-secondary mt-n1">Schedule</label>
                                            <div class="mt-n2 mb-2">
                                                <span class="text-dark">Time: </span><span>8:30 am</span>
                                                <span class="text-dark ml-5">Date: </span><span>10-07-2021</span>
                                            </div>
                                            <label class="d-block text-secondary">Meeting Link</label>
                                            <div class="mt-n2">
                                                <a href="">http://localhost/myLPU-HIMS/lycean/public/consultation</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="border:1px solid none">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default p-2">view all</button>
                                        </div>
                                    </div>

                                    <hr class="text-danger" width="100%">
                                </div>
                            </div>
                            <!-- /Done Tab -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /Tabs -->
        </div>
        <br><br><br>

    </div>
</body>

<script>
    $(document).ready(function() {
        //For Textarea character count
        $('textarea').keyup(function() {

            var characterCount = $(this).val().length,
                current = $('#current'),
                maximum = $('#maximum'),
                theCount = $('#count');

            current.text(characterCount);
            if (characterCount < 80) {
                current.css('color', '#666');
            }

            if (characterCount >= 80) {
                maximum.css('color', '#8f0001');
                current.css('color', '#8f0001');
                theCount.css('font-weight', 'bold');
            } else {
                maximum.css('color', '#666');
                theCount.css('font-weight', 'normal');
            }

        });

    });
</script>

<?= $this->endSection('content') ?>