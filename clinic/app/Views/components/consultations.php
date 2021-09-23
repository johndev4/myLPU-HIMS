<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Consultations</h1>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- row -->
        <div class="row mb-n4">
            <!-- Scheduled Request -->
            <div class="col-md-8 overflow-auto" style="height:100vh; min-height:580px; border: 1px solid none; background-color:white">
                <div class="row mt-3 justify-content-center pb-3" style="border: 1px solid none;">

                    <div class="col-xl-6 mb-4" style="border:1px solid none">
                        <h4 class="text-black-50 d-inline">Scheduled Consultations</h4>
                    </div>
                    <!-- Switch -->
                    <div class="col-xl-6  mb-3 pt-1" align="right" style="border:1px solid none">
                        <div class="d-inline" style="border:1px solid none">
                            <label class="text-secondary">Available</label>
                        </div>
                        <label class="switch" style="border:1px solid none">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <!-- /Switch -->

                    <div class="mr-3">
                        <div class="card" style="width: 23rem;">
                            <!-- <div class="card-header bg-danger"></div> -->
                            <div class="card-body">
                                <h4 class="d-inline float-left text-secondary font-weight-light">#1</h4>
                                <span class="d-inline float-right text-primary request-type">Consultation</span>
                                <br><br>
                                <div>
                                    <h5 class="d-inline font-weight-bold" style="font-size: 15pt;">John Rafel Mistica</h5>
                                </div>
                                <div class="text-secondary mb-2"> 2018-2-02126</div>
                                <span class="mb-2 text-secondary d-inline" style="font-size: 12pt;">
                                    <div class="font-weight-bold d-inline">Schedule:</div> Sept 12, 2021, 8:30 PM
                                </span>

                                <a href="#" class="btn text-primary d-block mt-3 accept-button">Done</a>
                            </div>
                        </div>
                    </div>
                    <div class="mr-3">
                        <div class="card" style="width: 23rem;">
                            <!-- <div class="card-header bg-danger"></div> -->
                            <div class="card-body">
                                <h4 class="d-inline float-left text-secondary font-weight-light">#2</h4>
                                <span class="d-inline float-right text-primary request-type">Mental Wellness</span>
                                <br><br>
                                <div>
                                    <h5 class="d-inline font-weight-bold" style="font-size: 15pt;">Chris Jover De Leon</h5>
                                </div>
                                <div class="text-secondary mb-2"> 2018-2-09666</div>
                                <span class="mb-2 text-secondary d-inline" style="font-size: 12pt;">
                                    <div class="font-weight-bold d-inline">Schedule:</div> Sept 12, 2021, 8:50 PM
                                </span>

                                <a href="#" class="btn text-primary d-block mt-3 accept-button">Done</a>
                            </div>
                        </div>
                    </div>
                    <div class="mr-3">
                        <div class="card" style="width: 23rem;">
                            <!-- <div class="card-header bg-danger"></div> -->
                            <div class="card-body">
                                <h4 class="d-inline float-left text-secondary font-weight-light">#3</h4>
                                <span class="d-inline float-right text-primary request-type">Consultation</span>
                                <br><br>
                                <div>
                                    <h5 class="d-inline font-weight-bold" style="font-size: 15pt;">Jade Anne Kristel Vale</h5>
                                </div>
                                <div class="text-secondary mb-2"> 2018-2-07852</div>
                                <span class="mb-2 text-secondary d-inline" style="font-size: 12pt;">
                                    <div class="font-weight-bold d-inline">Schedule:</div> Sept 12, 2021, 9:10 PM
                                </span>

                                <a href="#" class="btn text-primary d-block mt-3 accept-button">Done</a>
                            </div>
                        </div>
                    </div>
                    <div class="mr-3">
                        <div class="card" style="width: 23rem;">
                            <!-- <div class="card-header bg-danger"></div> -->
                            <div class="card-body">
                                <h4 class="d-inline float-left text-secondary font-weight-light">#4</h4>
                                <span class="d-inline float-right text-primary request-type">Consultation</span>
                                <br><br>
                                <div>
                                    <h5 class="d-inline font-weight-bold" style="font-size: 15pt;">Vince Cruz</h5>
                                </div>
                                <div class="text-secondary mb-2"> 2018-2-02186</div>
                                <span class="mb-2 text-secondary d-inline" style="font-size: 12pt;">
                                    <div class="font-weight-bold d-inline">Schedule:</div> Sept 12, 2021, 9:30 PM
                                </span>

                                <a href="#" class="btn text-primary d-block mt-3 accept-button">Done</a>
                            </div>
                        </div>
                    </div>
    
                </div>

            </div>
            <!-- /Scheduled Request -->

            <!-- Requests -->
            <div class="col-md-4 overflow-auto" style="height:100vh; min-height:580px; border-left:solid; border-color:rgb(204, 204, 204);">
                <div class="row pb-3">
                    <h4 class="text-black-50 mt-3 ml-2 mb-4">New Requests</h4>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <div>
                                    <span class="card-title mb-2" style="font-size: 12pt;">Sept 12, 2021, 8:38 PM</span>
                                    <span class="d-inline float-right text-primary request-type">Consultation</span>
                                </div>
                                <div class="card-text"><span class="font-weight-bold">John Rafael MIstica</span></div>
                                <div class="card-text"><span>2018-2-01212</span></div>
                                <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn text-primary d-block accept-button">Accept</a>
                                <a href="#" class="btn d-block text-secondary font-weight-bold reject-button">Reject</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <div>
                                    <span class="card-title mb-2" style="font-size: 12pt;">Sept 12, 2021, 8:00 PM</span>
                                    <span class="d-inline float-right text-primary request-type">Mental Wellness</span>
                                </div>
                                <div class="card-text"><span class="font-weight-bold">Chris Jover De Leon</span></div>
                                <div class="card-text"><span>2018-2-01862</span></div>
                                <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn text-primary d-block accept-button">Accept</a>
                                <a href="#" class="btn d-block text-secondary font-weight-bold reject-button">Reject</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <div>
                                    <span class="card-title mb-2" style="font-size: 12pt;">Sept 12, 2021, 7:48 PM</span>
                                    <span class="d-inline float-right text-primary request-type">Consultation</span>
                                </div>
                                <div class="card-text"><span class="font-weight-bold">Jade Anne Kristel Vale</span></div>
                                <div class="card-text"><span>2018-2-01987</span></div>
                                <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="btn text-primary d-block accept-button">Accept</a>
                                <a href="#" class="btn d-block text-secondary font-weight-bold reject-button">Reject</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /Requests -->

        </div><!-- /row -->


    </section><br>
</div><!-- /.content-wrapper -->





<!-- Script -->
<script>
    $(document).ready(function() {
        // For sidebar
        $("#consultationNav > a").addClass('active');
    });
</script>

<?= $this->endSection('content') ?>