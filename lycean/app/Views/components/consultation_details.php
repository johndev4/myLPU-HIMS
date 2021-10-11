<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">

        <!-- Back Button -->
        <div class="row mt-2 mb-2" style="border:1px solid none">
            <div class="col-sm-12">
                <a href="<?= base_url('dashboard') ?>" class="back-btn">
                    <i class="fas fa-chevron-left fa-2x font-weight-normal" style="font-size: 17pt; color: rgb(88, 88, 88); vertical-align:baseline"></i>
                    <span class="font-weight-normal ml-1" style="font-size: 20pt; color: rgb(88, 88, 88)">Back</span>
                </a>
            </div>
        </div>
        <!-- /Back Button -->

        <div class="row d-flex justify-content-center mt-3" style="border:1px solid none">


            <div class="col-sm-12 col-md-5" style="border:1px solid none">

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

                <!-- Table -->
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
                <!-- /Table -->


            </div>


        </div>

        <br><br><br><br>




















































    </div>
</body>

<?= $this->endSection('content') ?>