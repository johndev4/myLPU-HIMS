<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?= csrf_meta() ?>
    <title>myLPU HIMS: <?= $page_title ?></title>

    <!-- Webapp Icon -->
    <link rel="icon" href="<?= base_url('assets/images/appicon.png') ?>" type="image/png" sizes="16x16">
    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/help-menu.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js') ?>"></script>

</head>

<body id="page-top" style=" background: linear-gradient(110deg, #ffffff 60%, #e4e4e4 60%);">
    <!-- Navbar -->
    <nav class="navbar navbar-light py-3 fixed-top" style="background-color: #a62d38;">
        <div class="container">
            <a href="<?= site_url('login') ?>" class="navbar-brand">
                <img src="<?= base_url('assets/images/navlogo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                <span class="brand-text font-weight-bold text-light">myLPU Clinic</span>
            </a>
        </div>
    </nav>
    <!-- /.navbar -->

    <br><br>

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <ul style="list-style: none; cursor: pointer;">
                    <li><a href="<?= site_url('login') ?>"><i class="fas fa-caret-left"></i> Home</a></li>

                    <li><a id="link-1" style="color:rgb(0, 131, 253)">Change your Password</a></li>
                    <li><a id="link-2" style="color:rgb(0, 131, 253)">Request for Consultation</a></li>
                    <li><a id="link-3" style="color:rgb(0, 131, 253)">Consultation Status Tabs</a></li>
                    <li><a id="link-4" style="color:rgb(0, 131, 253)">View/Download Medical Files</a></li>
                </ul>
            </div>

            <div class="col-md-12 col-lg-9">
                <h5 class="text-bold" id="section-1">Change your password</h5>
                <ol class="text-justify">
                    <li>
                        <p>Click the user icon on the top navigation bar and select Profile in the dropdown menu</p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/1.png') ?>" alt="1" class="img-help-drpdwn shadow" width="300">
                    <br><br><br>

                    <li>
                        <p>Click Change Password in the Profile Card.</p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/0.png') ?>" alt="1" class="img-help shadow" width="500">
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

                    <img src="<?= base_url('assets/images/help_menu/2.png') ?>" alt="1" class="img-help shadow" width="500">
                </ol>

                <br><br><br>

                <h5 class="text-bold" id="section-2">Request for Consultation</h5>
                <ol>
                    <li>
                        <p>On your Home Page, you can either choose Consult or Mental Wellness.
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/3.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br><br>
                    <li>
                        <p>Once inside either of the modules, select from one of the available doctor/guidance counselors in the dropdown menu.
                        </p>
                    </li>
                    <li>
                        <p>Write your concern on the text box provided (Limited to 250 characters only).</p>
                    </li>
                    <li>
                        <p>Select Send Request Now
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/4.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br>
                    <p><b>Note:</b> You can’t send a request if you have an active or pending request.</p>
                </ol>

                <br><br><br>

                <h5 class="text-bold" id="section-3">Consultation Status Tabs</h5>

                <p>There are 4 Status Tabs under each consultation modules: Active, Pending, Rejected, and Done.</p>

                <ul style="list-style: none;">
                    <li>
                        <p>
                            <b>Pending</b> – you have already requested but your request is not yet accepted.
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/5.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br><br>

                    <li>
                        <p>
                            <b>Active</b> – your request is already accepted, and the schedule is sent to you.
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/6.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br><br>

                    <li>
                        <p>
                            <b>Rejected</b> – your request is declined depending on the concern you sent.
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/7.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br><br>

                    <li>
                        <p>
                            <b>Done</b> – finished consultation will go here, and this is where you can view the medical files sent to you after the consultation (Ex. Prescription/Referral).
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/8.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br>
                    <p><b>Note:</b> The view all button under each status tab will allow you to view all the details on each status of your consultation.</p>
                    <br>

                    <li>
                        <p>
                            <b>Cancelled</b> – your cancelled request will go in this tab section.
                        </p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/9.png') ?>" alt="1" class="img-help shadow" width="500">
                </ul>

                <br><br><br>

                <h5 class="text-bold" id="section-4">View/Download Files</h5>
                <ol>
                    <li>
                        <p>
                            To view the files sent to you, go to Consultation/Mental Wellness module.</p>
                    </li>
                    <li>
                        <p>Navigate to Consultation Tabs, Go to Done > View > Files tab.</p>
                    </li>

                    <img src="<?= base_url('assets/images/help_menu/8.png') ?>" alt="1" class="img-help shadow" width="500">
                    <br><br>
                    <img src="<?= base_url('assets/images/help_menu/10.png') ?>" alt="1" class="img-help shadow" width="500">
                </ol>
            </div>
        </div>

        <br><br><br><br>

        <!-- Scroll to Top Button-->
        <a href="#page-top" class="float" id="page-to-top">
            <i class="fa fa-angle-up my-float fa-lg"></i>
        </a>
    </div>

    <!-- Footer -->
    <footer class="row page-footer fixed-bottom justify-content-center bg-light py-3" style="text-align: center;">
        <div class="text-secondary"> <strong>Copyright &copy;<?= date('Y') ?></strong>
            All rights reserved.
        </div>
        <div>
            <span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('terms') ?>">Terms & Conditions</a></span>
            <span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('privacy') ?>">Privacy Policy</a></span>
            <span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('help') ?>">Help</a></span>
            <br>
        </div>
    </footer>
    <!-- Footer -->

    <!-- Script -->
    <script>
        $(document).ready(function() {
            // Hide & Show page-to-top button
            window.onscroll = function() {
                if (pageYOffset >= 300) {
                    document.getElementById('page-to-top').style.visibility = "visible"
                } else {
                    document.getElementById('page-to-top').style.visibility = "hidden"
                }
            };

            // Scroll to sections
            $("#link-1").on("click", function() {
                window.scroll(0, findPos(document.getElementById("section-1")));

                function findPos(obj) {
                    var curtop = -90;
                    if (obj.offsetParent) {
                        do {
                            curtop += obj.offsetTop;
                        } while (obj = obj.offsetParent);
                        return [curtop];
                    }
                }
            });

            $("#link-2").on("click", function() {
                window.scroll(0, findPos(document.getElementById("section-2")));

                function findPos(obj) {
                    var curtop = -90;
                    if (obj.offsetParent) {
                        do {
                            curtop += obj.offsetTop;
                        } while (obj = obj.offsetParent);
                        return [curtop];
                    }
                }
            });

            $("#link-3").on("click", function() {
                window.scroll(0, findPos(document.getElementById("section-3")));

                function findPos(obj) {
                    var curtop = -90;
                    if (obj.offsetParent) {
                        do {
                            curtop += obj.offsetTop;
                        } while (obj = obj.offsetParent);
                        return [curtop];
                    }
                }
            });

            $("#link-4").on("click", function() {
                window.scroll(0, findPos(document.getElementById("section-4")));

                function findPos(obj) {
                    var curtop = -90;
                    if (obj.offsetParent) {
                        do {
                            curtop += obj.offsetTop;
                        } while (obj = obj.offsetParent);
                        return [curtop];
                    }
                }
            });
        });
    </script>

</body>

</html>