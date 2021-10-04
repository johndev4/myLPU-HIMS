<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">

    <!-- Modal -->
    <!-- Accept Modal -->
    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('') ?>" method="get" id="">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="add_idno" class="col-form-label required">Date</label>
                                <input type="date" class="form-control" id="date_idno" name="date" value="">
                            </div>
                            <div class="col-6 form-group">
                                <label for="add_idno" class="col-form-label required">Time</label>
                                <input type="time" class="form-control" id="time_idno" name="time" value="">
                            </div>
                            <div class="col-12 form-group">
                                <label for="add_idno" class="col-form-label required">Meeting Link</label>
                                <input type="text" class="form-control border-top-0 border-left-0 border-right-0" id="link_idno" name="link" value="" placeholder="Paste link here..." style="border-radius: 0;">
                            </div>
                        </div>

                        <div class="footer float-right pb-3">
                            <button type="submit" class="btn text-light swalDefaultSuccess button-color">Send</button>
                            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Accept Modal -->

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('') ?>" method="get" id="">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="reject_idno" class="col-form-label required" style="font-size: 16pt;">Message</label>
                                <textarea class="form-control rounded-3 txtarea border-0" id="FormControlTextarea" rows="10" placeholder="Type here..." maxlength="300" autofocus></textarea>
                                <div id="count" align="right">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 300</span>
                                </div>
                            </div>
                        </div>

                        <div class="footer float-right pb-3">
                            <button type="submit" class="btn text-light swalDefaultSuccess button-color">Send</button>
                            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Reject Modal -->

    <!-- Done Modal -->
    <div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('') ?>" method="get" id="">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <form method="post" action="#" id="#">
                                    <div class="form-group files">
                                        <label style="font-size: 16pt;">Upload File </label>
                                        <input type="file" class="form-control" multiple="">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="footer float-right pb-3">
                            <button type="submit" class="btn text-light swalDefaultSuccess button-color">Send</button>
                            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Done Modal -->
    <!-- /Modal -->

    <!-- Main content -->
    <section class="content">

        <!-- row -->
        <div class="row mb-n4">
            <!-- Scheduled Request -->
            <div class="col-md-8 overflow-auto" style="height:100vh; min-height:580px; border: 1px solid none; background-color:white">
                <div class="row mt-3 mx-2">
                    <div class="col-xl-6 mb-4" style="border:1px solid none">
                        <h4 class="text-black-50 d-inline">Scheduled Consultations</h4>
                    </div>
                    <!-- Switch -->
                    <div class="col-xl-6  mb-3 pt-1" align="right" style="border:1px solid none">
                        <div class="d-inline" style="border:1px solid none">
                            <label class="text-secondary">Available</label>
                        </div>
                        <label class="switch" style="border:1px solid none">
                            <input id="available" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <!-- /Switch -->
                </div>

                <div id="scheduledSection" class="row d-flex justify-content-center pb-3" style="border: 1px solid none;">
                    <!-- SCHEDULED CONSULTATIONS CARD HERE -->

                    <!-- <div class="px-2">
                        <div class="card">
                            <div class="card-body sched">
                                <h4 class="d-inline float-left text-secondary font-weight-light">#1</h4>
                                <span class="d-inline float-right text-primary request-type"> Consulation </span>
                                <br><br>
                                <div>
                                    <h5 class="d-inline font-weight-bold" style="font-size: 15pt;"> John Rafael Mistica </h5>
                                </div>
                                <div class="text-secondary mb-2"> 2018-8-6658 </div>
                                <span class="mb-2 text-secondary d-inline" style="font-size: 12pt;">
                                    <span class="font-weight-bold d-inline">Schedule:</span> 7:27
                                </span>

                                <a href="#" class="btn text-primary d-block mt-3 accept-button" data-target="#doneModal" data-toggle="modal">Done</a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
            <!-- /Scheduled Request -->

            <!-- Requests -->
            <div class="col-md-4 overflow-auto mymedia" style="height:100vh; min-height:580px; border-left:solid; border-color:rgb(204, 204, 204);">
                <h4 class="text-black-50 mt-3 ml-2 mb-4">New Requests</h4>
                <div id="newRequestSection" class="row">
                    <!-- REQUEST CONSULTATIONS CARD HERE -->
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
        var requestCount;
        $.ajax({
            url: '<?= base_url('consultations/fetchAllRequestConsultations') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#newRequestSection').html(response['result']);
                requestCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultations/fetchAllRequestConsultations') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != requestCount) {
                        $('#newRequestSection').html(response['result']);
                        requestCount = response['count'];
                    }
                }
            });
        }, 500);

        // Fetch All Scheduled Consultations
        var scheduledCount;
        $.ajax({
            url: '<?= base_url('consultations/fetchAllScheduledConsultations') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#scheduledSection').html(response['result']);
                scheduledCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultations/fetchAllScheduledConsultations') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != scheduledCount) {
                        $('#scheduledSection').html(response['result']);
                        scheduledCount = response['count'];
                    }
                }
            });
        }, 500);

        //For Textarea character count
        $('textarea').keyup(function() {

            var characterCount = $(this).val().length,
                current = $('#current'),
                maximum = $('#maximum'),
                theCount = $('#count');

            current.text(characterCount);
            if (characterCount < 250) {
                current.css('color', '#666');
            }

            if (characterCount >= 250) {
                maximum.css('color', '#8f0001');
                current.css('color', '#8f0001');
                theCount.css('font-weight', 'bold');
            } else {
                maximum.css('color', '#666');
                theCount.css('font-weight', 'normal');
            }

        });

        //Upload file





    });
</script>

<?= $this->endSection('content') ?>