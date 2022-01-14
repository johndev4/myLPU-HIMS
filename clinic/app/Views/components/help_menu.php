<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Help Menu</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <ul style="list-style: none; cursor: pointer;">
                        <li><a id="link-1" style="color:rgb(0, 131, 253)">Change your Password</a></li>
                        <li><a id="link-2" style="color:rgb(0, 131, 253)">Dashboard Widgets</a></li>
                        <?php if ($designation != 'Guidance Counselor') : ?>
                            <li><a id="link-3" style="color:rgb(0, 131, 253)">Records</a></li>
                        <?php endif; ?>
                        <li><a id="link-4" style="color:rgb(0, 131, 253)">Consultation</a></li>
                        <?php if ($designation != 'Guidance Counselor') : ?>
                            <li><a id="link-5" style="color:rgb(0, 131, 253)">Inventory</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-md-12 col-lg-9">
                    <h5 class="text-bold" id="section-1">Change your password</h5>
                    <ol class="text-justify">
                        <li>
                            <p>Click the user icon on the side navigation bar.</p>
                        </li>

                        <img src="<?= base_url('assets/images/help_menu/0.png') ?>" alt="1" class="img-help-drpdwn shadow" width="300">
                        <br><br><br>

                        <li>
                            <p>Click Change Password in the Profile Card.</p>
                        </li>

                        <img src="<?= base_url('assets/images/help_menu/1.png') ?>" alt="1" class="img-help shadow" width="500">
                        <br><br><br>

                        <li>
                            <p>Type your Current Password.</p>
                        </li>
                        <li>
                            <p>Type your New Password (Must have 8 or more characters with a mix of letters, numbers & symbols and must be different from the current one).</p>
                        </li>
                        <li>
                            <p>Confirm your password.</p>
                        </li>
                        <li>
                            <p>Select Change Password.</p>
                        </li>

                        <img src="<?= base_url('assets/images/help_menu/2.png') ?>" alt="1" class="img-help shadow" width="500">
                    </ol>

                    <br><br><br>

                    <h5 class="text-bold" id="section-2">Dashboard Widgets</h5>
                    <p>The Clinic Dashboard contains three widgets (Requests, Scheduled Consultations, and Records).</p>
                    <ol style="list-style: none;">
                        <li>
                            <p><b>Requests</b> – this is where you can see the number count of new requests for the consultation.</p>
                        </li>
                        <li>
                            <p><b>Scheduled Consultations</b> – this is where you can see the number of consultations that has been scheduled.</p>
                        </li>
                        <li>
                            <p><b>Records</b> – this is where you can see the overall count of records of all the Lyceans in system.</p>
                        </li>

                        <img src="<?= base_url('assets/images/help_menu/3.png') ?>" alt="1" class="img-help shadow" width="500">
                    </ol>

                    <br><br><br>

                    <?php if ($designation != 'Guidance Counselor') : ?>
                        <h5 class="text-bold" id="section-3">Records</h5>
                        <ul>
                            <li>
                                <h5>View Records</h5>
                            </li>
                        </ul>
                        <ol>
                            <li>
                                <p>On the side navigation bar, Click Records to see the dropdown menu.</p>
                            </li>
                            <li>
                                <p>Select either Student, Faculty or Staff to view the list under each records module.</p>
                            </li>

                            <img src="<?= base_url('assets/images/help_menu/4.png') ?>" alt="1" class="img-help-drpdwn shadow" width="300">
                            <br><br>

                            <li>
                                <p>Once inside the records module, you can see the list of records.</p>
                            </li>

                            <img src="<?= base_url('assets/images/help_menu/5.png') ?>" alt="1" class="img-help shadow" width="500">
                            <br><br>

                            <li>
                                <p>To fully view their records, click View.</p>
                            </li>

                            <img src="<?= base_url('assets/images/help_menu/6.0.png') ?>" alt="1" class="img-help shadow" width="500">
                            <p><b>Note:</b> You can use search to easily find an entity.</p>
                        </ol>

                        <br><br><br>

                        <ul>
                            <li>
                                <h5>Add Medical Documents</h5>
                            </li>
                        </ul>
                        <ol>
                            <li>
                                <p>Go to Records module, select an entity and click view.</p>
                            </li>

                            <img src="<?= base_url('assets/images/help_menu/6.1.png') ?>" alt="1" class="img-help shadow" width="500">
                            <br><br>

                            <li>
                                <p>Select Upload File to add Medical Documents.</p>
                            </li>
                            <li>
                                <p>You can set a custon name to the your chosen file or just directly save it.</p>
                            </li>
                        </ol>


                        <br><br><br>
                    <?php endif; ?>

                    <h5 class="text-bold" id="section-4">Consultation</h5>
                    <p>In the Consultations module, you can find here the New Requests, Scheduled Consultations, History and Report.</p>
                    <ol>
                        <img src="<?= base_url('assets/images/help_menu/7.png') ?>" alt="1" class="img-help shadow" width="500">
                        <br><br>
                    </ol>
                    <!-- New Requests -->
                    <h5 class="text-normal" id="section-4.1">New Requests</h5>
                    <p>This is where you can see the new consultation requests. You can either Accept or Reject a request depending on the concern they sent.</p>
                    <ul>
                        <li>
                            <p><u>Accept Request</u></p>
                            <ol>
                                <li>
                                    <p>When you click Accept, a field will appear where you can set the schedule and meeting link to the requesting Lycean. </p>
                                </li>

                                <img src="<?= base_url('assets/images/help_menu/8.png') ?>" alt="1" class="img-help shadow" width="500">
                                <p><b>Note:</b> An error message will appear if the schedule your sending is already taken.</p>
                            </ol>
                        </li>
                        <br>
                        <li>
                            <p><u>Reject Request</u></p>
                            <ol>
                                <li>
                                    <p>When you Reject a request, a text box will appear where you can send your reason for declining the request.</p>
                                </li>

                                <img src="<?= base_url('assets/images/help_menu/9.png') ?>" alt="1" class="img-help shadow" width="500">
                            </ol>
                        </li>
                    </ul>

                    <br>
                    <!-- Scheduled COnsultations -->
                    <h5 class="text-normal" id="section-4.2">Scheduled Consultations</h5>
                    <p>This is the section where you can find the Consultations that already has a schedule sent to the Lycean.</p>
                    <ul>
                        <li>
                            <p><u>Done</u></p>
                            <ol>
                                <li>
                                    <p>When the consultation is already finish, click the Done button. A field will appear where you can send medical documents like prescription or referral.</p>
                                </li>

                                <img src="<?= base_url('assets/images/help_menu/10.png') ?>" alt="1" class="img-help shadow" width="500">
                                <p><b>Note:</b> You can just click the “Done” button without sending any file if it’s not necessary.</p>
                            </ol>
                        </li>
                    </ul>

                    <br>
                    <!-- History -->
                    <h5 class="text-normal" id="section-4.3">History</h5>
                    <p>This is where you can see the record of the Accepted and Rejected consultations.</p>
                    <ul>
                        <img src="<?= base_url('assets/images/help_menu/11.png') ?>" alt="1" class="img-help shadow" width="500">
                    </ul>
                    <br>
                    <!-- Report -->
                    <h5 class="text-normal" id="section-4.4">Report</h5>
                    <p>This is where you can see the Report for the Weekly, Monthly, and Yearly Accepted and Rejected consultations.</p>
                    <ul>
                        <img src="<?= base_url('assets/images/help_menu/12.0.png') ?>" alt="1" class="img-help shadow" width="500">
                    </ul>

                    <?php if ($designation != 'Guidance Counselor') : ?>
                        <br><br><br>

                        <h5 class="text-bold" id="section-5">Inventory</h5>
                        <h5>Medicines: Item management</h5>
                        <ul>
                            <li>
                                <p><u>Add Item</u></p>
                                <ol>
                                    <li>
                                        <p>To add a medicine to the inventory, select Inventory > Medicines > Item Management in the side navigation bar.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/13.png') ?>" alt="1" class="img-help-drpdwn shadow" width="300">
                                    <br><br><br>

                                    <li>
                                        <p>Click the Add button inside the module. A field will appear where you can add the details</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/14.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>

                                <p><u>Modify Item</u></p>
                                <ol>
                                    <li>
                                        <p>To modify an item, select the desired item you want to edit then click Modify.</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/15.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>
                            </li>
                        </ul>

                        <h5>Medicines: Batch management</h5>
                        <ul>
                            <li>
                                <p><u>Add Batch</u></p>
                                <ol>
                                    <li>
                                        <p>Go to Batch Management > Add. A field will appear where you can add the details.</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/16.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>

                                <p><u>Modify Batch</u></p>
                                <ol>
                                    <li>
                                        <p>To modify a batch, select the desired batch you want to edit then click Modify.</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/17.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>
                            </li>
                        </ul>

                        <h5>Medicines: Stocks</h5>
                        <ul>
                            <li>
                                <p><u>Stock Out</u></p>
                                <ol>
                                    <li>
                                        <p>Go to Stocks > Stock Out. A field will appear where you can input the details.</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/18.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>
                            </li>
                        </ul>

                        <h5>Equipment</h5>
                        <ul>
                            <li>
                                <p><u>Add Equipment</u></p>
                                <ol>
                                    <li>
                                        <p>Go to Equipment > Add. A field will appear where you can add the details.</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/19.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>

                                <p><u>Modify Equipment</u></p>
                                <ol>
                                    <li>
                                        <p>To modify an Equipment, select the desired equipment you want to edit then click Modify.</p>
                                    </li>
                                    <li>
                                        <p>After filling the needed details, click Save.</p>
                                    </li>

                                    <img src="<?= base_url('assets/images/help_menu/20.png') ?>" alt="1" class="img-help shadow" width="500">
                                    <br><br><br>
                                </ol>
                            </li>
                        </ul>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button-->
    <a href="#page-top" class="float">
        <i class="fa fa-angle-up my-float fa-lg"></i>
    </a>

</div>

<!-- Script -->
<script>
    $(document).ready(function() {
        $("#link-1").on("click", function() {
            window.scroll(0, findPos(document.getElementById("section-1")));

            function findPos(obj) {
                var curtop = -20;
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
                var curtop = -30;
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
                var curtop = -30;
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
                var curtop = -30;
                if (obj.offsetParent) {
                    do {
                        curtop += obj.offsetTop;
                    } while (obj = obj.offsetParent);
                    return [curtop];
                }
            }
        });

        $("#link-5").on("click", function() {
            window.scroll(0, findPos(document.getElementById("section-5")));

            function findPos(obj) {
                var curtop = -30;
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


<?= $this->endSection('content') ?>