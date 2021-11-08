<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<br>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-2  py-5">
            <a href="">Home</a><br>
            <a href="">Terms of Use</a><br>
            <a href="">Privacy Policy</a>
        </div>
        <div class="col-md-10">
            <iframe src="<?= base_url('assets/images/Help_Menu.pdf#toolbar=0') ?>" frameborder="0" width="100%" height="670px">
            </iframe>
        </div>
    </div>
</div> -->

<a href="<?= base_url('dashboard') ?>" class="float">
    <i class="fa fa-caret-left fa-2x my-float"></i>
</a>

<div class="embed-responsive embed-responsive-16by9">
    <iframe src="<?= base_url('assets/images/Help_Menu.pdf#toolbar=0') ?>" frameborder="0">
    </iframe>
</div>



<?= $this->endSection('content') ?>