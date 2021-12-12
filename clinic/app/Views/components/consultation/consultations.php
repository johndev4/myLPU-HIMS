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
                    <form action="" method="get" id="accept_form">
                        <input type="hidden" name="consultation_no">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="accept_meetingdate" class="col-form-label required">Date</label>
                                <input type="date" class="form-control" id="accept_meetingdate" name="meeting_date" value="" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <label for="accept_meetingtime" class="col-form-label required">Time</label>
                                <input type="time" class="form-control" id="accept_meetingtime" name="meeting_time" value="" required="required">
                            </div>
                            <div class="col-12 form-group">
                                <label for="accept_meetinglink" class="col-form-label required">Meeting Link</label>
                                <input type="url" class="form-control border-top-0 border-left-0 border-right-0" id="accept_meetinglink" name="meeting_link" value="" required="required" placeholder="Paste link here..." style="border-radius: 0;">
                            </div>
                        </div>

                        <div class="footer float-right pb-3">
                            <button type="submit" class="btn text-light swalDefaultSuccess button-color">Send</button>
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
                    <form action="" method="get" id="reject_form">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="reject_rejectionmessage" class="col-form-label required" style="font-size: 16pt;">Message</label>
                                <textarea class="form-control rounded-3 txtarea border-0" id="reject_rejectionmessage" name="rejection_message" rows="10" placeholder="Type here..." maxlength="300" required="required"></textarea>
                                <div id="count" align="right">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 300</span>
                                </div>
                            </div>
                        </div>

                        <div class="footer float-right pb-3">
                            <button type="submit" class="btn text-light swalDefaultSuccess button-color">Send</button>
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
                    <form action="" method="post" id="done_form" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="form-group files">
                                    <label style="font-size: 16pt;">Upload File </label>
                                    <input type="file" class="form-control" id="done_medicalfiles" name="medicalfiles[]" multiple="multiple">
                                </div>
                            </div>
                        </div>
                        <!-- Validation Error -->
                        <?php if (!empty(session()->get('upload_validation'))) : ?>
                            <?php if (!empty(session()->get('upload_validation')['medicalfiles'])) : ?>
                                <span class="error text-danger">
                                    <?= session()->get('upload_validation')['medicalfiles']; ?>
                                </span>
                                <script>
                                    $().ready(function() {
                                        $('#done_medicalfiles').addClass('border border-danger');
                                    });
                                </script>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="footer float-right pb-3">
                            <button type="button" class="btn text-light swalDefaultSuccess button-color" id="doneSubmit" data-toggle="modal">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Done Modal -->

    <!-- Time Schedule Validation Error Modal -->
    <?php if (!empty(session()->get('timeschedule_validation'))) : ?>
        <div class="modal fade" id="timeScheduleErrorModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2">
                            <span class="info-box-icon text-warning"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                            <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Uh Oh!</div>
                            <div class="mt-3" style="font-size: 12pt;"><?= session()->get('timeschedule_validation')->getError('meeting_time') ?></div>
                        </div><br>
                        <div class="">
                            <form action="" method="get" id="done_form_prompt">
                                <button type="button" class="btn btn-light btn-block" data-dismiss="modal" style="border-color: rgb(223, 223, 223);">Ok</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $().ready(function() {
                $('#timeScheduleErrorModal').modal('show');
            });
        </script>
    <?php endif; ?>
    <!-- /Time Schedule Validation Error Modal -->

    <!-- Prompt for done w/o file -->
    <div class="modal fade" id="donepromptModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-2">
                        <span class="info-box-icon text-warning"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                        <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                        <div class="mt-1 font-weight-normal text-secondary">Proceed without sending any medical file</div>
                    </div><br>
                    <div class="float-right">
                        <form action="" method="get" id="done_form_prompt">
                            <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-light swalDefaultSuccess" style="border-color: rgb(223, 223, 223);">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Prompt for done w/o file -->
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
                            <span class="d-inline" style="font-size: 12pt;"><a href="<?= site_url('consultations/history') ?>">History</a></span>
                            <span class="text-secondary d-inline">/</span>
                            <span class="d-inline" style="font-size: 12pt;"><a href="<?= site_url('consultations/report') ?>">Report</a></span>
                            <span class="text-secondary mr-2 ml-2 d-inline">|</span>
                            <label class="text-secondary">Available</label>
                        </div>
                        <label class="switch" style="border:1px solid none">
                            <input type="checkbox" id="available">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <!-- /Switch -->
                </div>

                <div id="scheduledSection" class="row d-flex justify-content-center pb-3" style="border: 1px solid none;">
                    <!-- SCHEDULED CONSULTATIONS CARD HERE -->
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
            url: '<?= site_url('consultations/fetchAllRequestConsultations') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#newRequestSection').html(response['result']);
                requestCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= site_url('consultations/fetchAllRequestConsultations') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != requestCount) {
                        $('#newRequestSection').html(response['result']);
                        requestCount = response['count'];
                    }
                }
            });
        }, 1000);
        // Fetch All Scheduled Consultations
        var scheduledCount;
        $.ajax({
            url: '<?= site_url('consultations/fetchAllScheduledConsultations') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#scheduledSection').html(response['result']);
                scheduledCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= site_url('consultations/fetchAllScheduledConsultations') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != scheduledCount) {
                        $('#scheduledSection').html(response['result']);
                        scheduledCount = response['count'];
                    }
                }
            });
        }, 1000);

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

        <?php if (session()->get('success') !== null) : ?>
            // Sweet Alert for success staus
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: '<?= session()->get('success'); ?>'
            });
        <?php endif; ?>

        // File Upload Validation Error
        <?php if (!empty(session()->get('upload_validation'))) : ?>
            $('#doneModal').modal('show');
            done('<?= session()->get('consultationNo') ?>');
            $('#doneModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Reset add modal on close
        $('#acceptModal').on('hidden.bs.modal', function(evt) {
            $('#accept_meetingdate').val("");
            $('#accept_meetingtime').val("");
            $('#accept_meetinglink').val("");
        });
        $('#rejectModal').on('hidden.bs.modal', function(evt) {
            $('#reject_rejectionmessage').val("");
        });
        $('#doneModal').on('hidden.bs.modal', function(evt) {
            $('#done_medicalfiles').val("");
        });

        // Available Toggler State
        <?php if (session()->get('available') == TRUE) : ?>
            $('#available').prop('checked', true);
        <?php elseif (session()->get('available') == FALSE) : ?>
            $('#available').prop('checked', false);
        <?php endif; ?>

        // Set online status state on input
        $('#available').on('input', function() {
            if ($('#available').prop('checked') == true) {
                $.ajax({
                    url: '<?= site_url('consultations/setOnlineStatusState') ?>/' + true,
                    type: 'get'
                });
            } else {
                $.ajax({
                    url: '<?= site_url('consultations/setOnlineStatusState') ?>/' + false,
                    type: 'get'
                });
            }
        });

        // Done prompt on no file upload
        $('#doneSubmit').click(function() {
            if (document.getElementById("done_medicalfiles").files.length == 0)
                $('#donepromptModal').modal('show');
            else
                $('#done_form').submit();
        });
    });

    // On accept new request, set action value
    function accept(id) {
        $('#accept_form').prop('action', "<?= site_url('consultations/acceptConsultationById') ?>/" + id);
    }
    // On reject new request, set action value
    function reject(id) {
        $('#reject_form').prop('action', "<?= site_url('consultations/rejectConsultationById') ?>/" + id);
    }
    // On done, set action value
    function done(id) {
        $('#done_form').prop('action', "<?= site_url('consultations/uploadMedicalFilesById') ?>/" + id);
        $('#done_form_prompt').prop('action', "<?= site_url('consultations/setConsultationToDone') ?>/" + id);
    }

    <?php if (!empty(session()->get('validation_error'))) : ?>
        // Sweet Alert for validation error
        var Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: true,
        });
        Toast.fire({
            icon: 'warning',
            title: '<?= session()->get('validation_error'); ?>'
        });
    <?php endif; ?>

    // Multiple modal scroll
    $('body').on('hidden.bs.modal', function() {
        if ($('.modal.show').length > 0) {
            $('body').addClass('modal-open');
        }
    });
</script>

<?= $this->endSection('content') ?>