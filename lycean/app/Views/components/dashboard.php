<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<body>
    <div class="container">

        <div class="mt-5 mb-5">
            <h1 class="d-inline">Good Day </h1>
            <span class="d-inline font-weight-bold" style="font-size: 30pt;"> Vince</span>
            <h2 class="d-inline" style="font-size: 30pt;">!</h2>
        </div>

        <br>
        <div class="row mb-5">
            <!-- Consult -->
            <div class="col-md-6 d-flex justify-content-center" style="border:1px solid none">
                <div class="card shadow card1" style="max-width:32rem">

                    <div class="row mt-5" style="border:1px solid none">

                        <div class="col-7 pt-3 mt-n2 pl-4" style="border:1px solid none">
                            <span class="font-weight-bold" style="font-size: 25pt; color: #7687CD">Consult</span>
                        </div>

                        <div class="col-5 mt-n2" align="center" style="border:1px solid none">
                            <i class="fas fa-comment-medical fa-5x" style="color: #7687CD"></i>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="card-text">Feeling unwell? schedule a consultation to one of our doctor, and wait for the schedule to be sent to you. </p>
                    </div>
                    <a href="<?= base_url('consultation') ?>" class="btn text-right"><i class="fas fa-chevron-circle-right fa-2x text-secondary"></i></a>
                </div>
            </div>
            <!-- /Consult -->

            <!-- Mental Wellnes -->
            <div class="col-md-6 d-flex justify-content-center" style="border:1px solid none">
                <div class="card shadow card1" style="max-width:32rem">

                    <div class="row mt-5" style="border:1px solid none">

                        <div class="col-7 pt-3 mt-n2 pl-4" style="border:1px solid none">
                            <span class="font-weight-bold" style="font-size: 25pt; color: #CC6699">Mental Wellness</span>
                        </div>

                        <div class="col-5 mt-n2" align="center" style="border:1px solid none">
                            <i class="fas fa-brain fa-5x" style="color: #CC6699"></i>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            Need someone to talk with? schedule a consultation to one of our guidance counselor,
                            and wait for the schedule to be sent to you.
                        </p>
                    </div>
                    <a href="#" class="btn text-right"><i class="fas fa-chevron-circle-right fa-2x text-secondary"></i></a>
                </div>
            </div>
            <!-- /Mental Wellnes -->
        </div>
        <br><br>

    </div>
</body>

<?= $this->endSection('content') ?>