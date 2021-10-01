<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">


        <div class="row my-5" style="border:1px solid none">

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
                    <div class="col-md-12">
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
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card shadow card-txtarea" style="border: 3px solid grey">
                    <!-- <div class="card-header bg-danger py-5 text-center">
                        <span class="font-weight-bold" style="font-size:18pt">What's your concern?</span>
                    </div> -->
                    <div class="card-body">

                        <div class="form-group text-center py-3">
                            <span class="font-weight-bold text-secondary" style="font-size:18pt">What's your concern?</span>
                        </div>
                        <div class="form-group">
                            <!-- <label for="FormControlTextarea" class="font-weight-normal mb-2" style="font-size: 18pt; color: rgb(116, 116, 116);">Tell the doctor your health concern.</label> -->
                            <textarea class="form-control rounded-3 txtarea mb-2 border-0" id="FormControlTextarea" rows="5" placeholder="Tell us here..." style="border-radius: 0px; background-color:rgb(238, 238, 238)"></textarea>
                            <button type="submit" class="btn btn-block btn-default p-2" style="border-radius: 10px; background-color:#a62d38; color:white">Send Request Now<i class="fas fa-long-arrow-alt-right ml-2"></i></button>
                        </div>

                        <!-- <hr class="mt-4">

                        <div class="form-group">
                            <label class="font-weight-normal mb-2" style="font-size: 18pt; color: rgb(116, 116, 116);">Schedule:</label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-normal mb-2" style="font-size: 18pt; color: rgb(116, 116, 116);">Meeting Link:</label>
                        </div> -->
                    </div>
                </div>

                <!-- <div class="card shadow" style="border-radius: 5px; border-left: 10px solid black">
                    <div class="card-body mb-n4">
                        <label>Schedule</label>
                        <div class="form-group">
                         <label class="text-secondary">Date:</label><span> 09-30-21</span>
                         <label class="text-secondary float-right">Time:<span class="font-weight-normal"> 9:30am</span></label>
                        </div>
                    </div>
                </div>
                <div class="card shadow" style="border-radius: 5px; border-left: 10px solid black">
                    <div class="card-body mb-n4">
                        <div class="form-group">
                         <label class="text-secondary d-block">Meeting Link:</label>
                         <a href=""> <u>http://localhost/myLPU-HIMS/lycean/public/consultation</u></a>
                         <i class="far fa-copy float-right fa-2x mt-n2"></i>
                        </div>
                    </div>
                </div> -->



            </div>











        </div>


    </div>
</body>

<?= $this->endSection('content') ?>