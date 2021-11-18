<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<!-- <body> -->
<div class="container">

    <div class="mb-5 greet-container" style="margin-top: 70px;">
        <h1 class="d-inline greeting"></h1>
        <span class="d-inline font-weight-bold" style="font-size: 30pt;"> <?= $firstname ?> </span>
        <h2 class="d-inline exclamation">!</h2>
    </div>

    <br>
    <div class="row mb-5">
        <!-- Consult -->
        <div class="col-md-6 d-flex justify-content-center" style="border:1px solid none">
            <a href="<?= site_url('consultation') ?>" class="text-dark">
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
                    <a href="<?= site_url('consultation') ?>" class="btn text-right"><i class="fas fa-chevron-circle-right fa-2x text-secondary"></i></a>
                </div>
            </a>
        </div>
        <!-- /Consult -->

        <!-- Mental Wellnes -->
        <div class="col-md-6 d-flex justify-content-center" style="border:1px solid none">
            <a href="<?= site_url('mentalwellness') ?>" class="text-dark">
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
                    <a href="<?= site_url('mentalwellness') ?>" class="btn text-right"><i class="fas fa-chevron-circle-right fa-2x text-secondary"></i></a>
                </div>
            </a>
        </div>
        <!-- /Mental Wellnes -->
    </div>
    <br><br>

</div>
<!-- </body> -->





<!-- SCRIPT -->
<script>
    $(document).ready(function() {
        if ('<?= date('H') ?>' >= 0 && '<?= date('H') ?>' <= 11) {
            $('.greeting').text("Good morning ")
        } else if ('<?= date('H') ?>' >= 12 && '<?= date('H') ?>' <= 17) {
            $('.greeting').text("Good afternoon ")
        } else if ('<?= date('H') ?>' >= 18 && '<?= date('H') ?>' <= 24) {
            $('.greeting').text("Good evening ")
        }
    });
</script>

<?= $this->endSection('content') ?>