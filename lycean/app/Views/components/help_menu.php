<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<<<<<<< HEAD

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
=======
<div class="container">
    <br><br>
    <div class="row">
        <div class="col-12 col-md-2">
            <ol>
                <li>Sample1</li>
                <li> Sample2</li>
                <li>Sample3</li>
            </ol>
        </div>

        <div class="col-12 col-md-10">
            <h5>Change your password</h5>
            <ol class="text-justify">
                <li>
                    <p>Click the user icon on the top navigation bar and select Profile in the dropdown menu</p>
                </li>

                <img src="<?= base_url('assets/images/help_menu/1.png') ?>" alt="1" class="shadow" width="300">
                <br><br><br>

                <li>
                    <p>Type your Current Password</p>
                </li>
                <li>
                    <p>Type your New Password (Must have 8 or more characters with a mix of letters, numbers & symbols and must be different from the current one).</p>
                </li>
                <li>
                    <p>Confirm your password</p>
                </li>
                <li>
                    <p>Select Change Password</p>
                </li>

                <img src="<?= base_url('assets/images/help_menu/2.png') ?>" alt="1" class="shadow" width="500">
            </ol>

            <br><br><br>
>>>>>>> 8b99f166302b4151df5c0da7dc789e4c4c242c93

            <h5>Request for Consultation</h5>
            <ol>
                <li>
                    <p>On your Home Page, you can either choose Consult or Mental Wellness.
                    </p>
                </li>
                <li>
                    <p>Once inside either of the modules, select from one of the available doctor/guidance counselors in the dropdown menu.
                    </p>
                </li>
                <li>
                    <p>Write your concern on the text box provided
                    </p>
                </li>
                <li>
                    <p>Select Send Request Now
                    </p>
                </li>

                <img src="<?= base_url('assets/images/help_menu/4.png') ?>" alt="1" class="shadow" width="500">
            </ol>
            
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>