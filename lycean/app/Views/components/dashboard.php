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
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center" style="border:1px solid none">
                <div class="card shadow">

                    <div class="row mt-5" style="border:1px solid none">

                        <div class="col-7 pt-3 mt-n2 pl-4" style="border:1px solid none">
                            <span class="font-weight-bold" style="font-size: 25pt;">Consult</span>
                        </div>

                        <div class="col-5 mt-n2" align="center" style="border:1px solid none">
                            <i class="fas fa-comment-medical fa-5x"></i>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="card-text">Feeling unwell? schedule a consultation to one of our doctor, and wait for the schedule to be sent to you. </p>
                        <a href="#" class="btn float-right"><i class="fas fa-chevron-circle-right fa-2x"></i></a>
                    </div>

                </div>
            </div>


            <div class="col-md-6 d-flex justify-content-center" style="border:1px solid none">
                <div class="card shadow">

                    <div class="row mt-5" style="border:1px solid none">

                        <div class="col-7 pt-3 mt-n2 pl-4" style="border:1px solid none">
                            <span class="font-weight-bold" style="font-size: 25pt;">Mental Wellness</span>
                        </div>

                        <div class="col-5 mt-n2" align="center" style="border:1px solid none">
                            <i class="fas fa-brain fa-5x"></i>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            Need someone to talk with? schedule a consultation to one of our guidance counselor,
                            and wait for the schedule to be sent to you.
                        </p>
                        <a href="#" class="btn float-right"><i class="fas fa-chevron-circle-right fa-2x"></i></a>
                    </div>

                </div>
            </div>

        </div>

        <br><br><br><br><br><br><br>


    </div>
</body>

<?= $this->endSection('content') ?>