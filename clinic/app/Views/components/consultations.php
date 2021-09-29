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

                </div>

            </div>
            <!-- /Scheduled Request -->

            <!-- Requests -->
            <div class="col-md-4 overflow-auto mymedia" style="height:100vh; min-height:580px; border-left:solid; border-color:rgb(204, 204, 204);">
                <h4 class="text-black-50 mt-3 ml-2 mb-4">New Requests</h4>
                <div id="newRequestSection" class="row">
                    <!-- REQUEST CARD HERE -->
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

        // Fetch All New Request Consultations
        $.ajax({
            url: '<?= base_url('consultations/fetchAllRequestConsultations') ?>',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#newRequestSection').html(response);
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultations/fetchAllRequestConsultations') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#newRequestSection').html(response);
                }
            });
        }, 500);
    });
</script>

<?= $this->endSection('content') ?>