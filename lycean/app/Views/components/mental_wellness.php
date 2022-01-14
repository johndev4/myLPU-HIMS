<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">

        <!-- Modal -->
        <!-- Cancel Request Modal -->
        <div class="modal fade" id="cancelrequestModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2">
                            <span class="info-box-icon text-warning"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                            <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                            <div class="mt-1 font-weight-normal text-secondary">This will cancel your request</div>
                        </div><br>
                        <div class="float-right">
                            <button type="button" class="btn" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-default swalDefaultSuccess" id="cancelYes" data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Cancel Rewuest Modal -->
        <!-- /Modal -->

        <div class="row consult-row" style="border:1px solid none; margin-top:80px">
            <!-- Navigation -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12 default-nav">
                        <a href="<?= site_url('dashboard') ?>">
                            <div class="card shadow card2" style="max-width:32rem; border:3px solid none">
                                <div class="row p-3 default-nav">
                                    <div class="col-7 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <span class="font-weight-bold" style="font-size: 25pt; color: #999999">Home</span>
                                    </div>
                                    <div class="col-5 mt-1" align="center" style="border:1px solid none">
                                        <i class="fas fa-home fa-3x" style="color: #999999"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row border-outside">
                    <div class="col-12 default-nav">
                        <a href="<?= site_url('consultation') ?>">
                            <div class="card shadow card2" style="max-width:32rem; border:3px solid none">
                                <div class="row p-3 default-nav">
                                    <div class="col-7 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <span class="font-weight-bold" style="font-size: 25pt; color: #7687CD">Consult</span>
                                    </div>
                                    <div class="col-5 mt-1" align="center" style="border:1px solid none">
                                        <i class="fas fa-comment-medical fa-3x" style="color: #7687CD"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 default-nav">
                        <a href="<?= site_url('mentalwellness') ?>">
                            <div class="card shadow card2 actv2 active" style="max-width:32rem; border:3px solid none">
                                <div class="row p-3 default-nav" style="border:1px solid none">
                                    <div class="col-7 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <span class="font-weight-bold" style="font-size: 25pt; color: #CC6699">Mental Wellness</span>
                                    </div>
                                    <div class="col-5 mt-1" align="center" style="border:1px solid none">
                                        <i class="fas fa-brain fa-3x" style="color: #CC6699"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Navigation -->

            <!-- Mobile Navigation -->
            <div class="col-md-6 hide">
                <div class="row">
                    <div class="col-4 text-center">
                        <a href="<?= site_url('dashboard') ?>">
                            <div class="card shadow card2 py-3" style="max-width:32rem">
                                <i class="fas fa-home fa-2x" style="color: #999999"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= site_url('consultation') ?>">
                            <div class="card shadow card2 py-3">
                                <i class="fas fa-comment-medical fa-2x" style="color: #7687CD"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= site_url('mentalwellness') ?>">
                            <div class="card shadow card2 py-3 actv2 active">
                                <i class="fas fa-brain fa-2x" style="color: #CC6699"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Mobile Navigation -->

            <!-- Concern -->
            <div class="col-md-6 mb-3">
                <div class="card card-txtarea">
                    <!-- <div class="card-header bg-danger py-5 text-center">
                        <span class="font-weight-bold" style="font-size:18pt">What's your concern?</span>
                    </div> -->
                    <div class="card-body">
                        <div class="form-group text-center">
                            <span class="font-weight-bold text-secondary" style="font-size:18pt">Consultation Request</span>
                        </div>
                        <div class="form-group">
                            <!-- <label for="FormControlTextarea" class="font-weight-normal mb-2" style="font-size: 18pt; color: rgb(116, 116, 116);">Tell the doctor your health concern.</label> -->
                            <form action="<?= site_url('mentalwellness/sendConsultation') ?>" method="post" id="">

                                <div class="form-group mb-4" style="border:1px solid none">
                                    <label for="select_doctor" class="col-form-label required text-secondary">Guidance Counselor</label>
                                    <select class="form-control" id="online_guidanceCounselor" name="consultation_guidancecounselor" required="required">
                                        <!-- ONLINE GUIDANCE COUNSELOR HERE -->
                                    </select>
                                </div>

                                <label class="col-form-label required text-secondary">Tell us your concern</label>
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <textarea class="form-control txtarea border-0" id="message_consultation" name="consultation_message" rows="5" placeholder="Write it here..." maxlength="250" required="required"></textarea>
                                <div class="mb-2" id="count" align="right">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 250</span>
                                </div>

                                <button type="submit" class="btn btn-block btn-default p-2" id="sendBtn_consultation">Send Request Now<i class="far fa-paper-plane ml-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Concern -->
        </div>

        <div class="row d-flex flex-row-reverse">
            <!-- Tabs -->
            <div class="col-sm-12 col-lg-6">
                <div class="card card-danger card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-active-tab" data-toggle="pill" href="#custom-tabs-four-active" role="tab" aria-controls="custom-tabs-four-active" aria-selected="true">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-pending-tab" data-toggle="pill" href="#custom-tabs-four-pending" role="tab" aria-controls="custom-tabs-four-pending" aria-selected="false">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-rejected-tab" data-toggle="pill" href="#custom-tabs-four-rejected" role="tab" aria-controls="custom-tabs-four-rejected" aria-selected="false">Rejected</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-done-tab" data-toggle="pill" href="#custom-tabs-four-done" role="tab" aria-controls="custom-tabs-four-done" aria-selected="false">Done</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-cancelled-tab" data-toggle="pill" href="#custom-tabs-four-cancelled" role="tab" aria-controls="custom-tabs-four-cancelled" aria-selected="false">Cancelled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style="height: 400px; overflow-y:auto">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- Active Tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-active" role="tabpanel" aria-labelledby="custom-tabs-four-active-tab">
                                <div class="row" id="activeContent">
                                    <!-- ACTIVE CONSULTATION HERE -->
                                </div>
                            </div>
                            <!-- /Active Tab -->

                            <!-- Pending tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-pending" role="tabpanel" aria-labelledby="custom-tabs-four-pending-tab">
                                <div class="row" id="pendingContent">
                                    <!-- PENDING CONSULTATION HERE -->
                                </div>
                            </div>
                            <!-- /Pending tab -->

                            <!-- Rejected Tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-rejected" role="tabpanel" aria-labelledby="custom-tabs-four-rejected-tab">
                                <div class="row" id="rejectedContent">
                                    <!-- REJECTED CONSULTATION HERE -->
                                </div>
                            </div>
                            <!-- /Rejected Tab -->

                            <!-- Done Tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-done" role="tabpanel" aria-labelledby="custom-tabs-four-done-tab">
                                <div class="row" id="doneContent">
                                    <!-- DONE CONSULTATION HERE -->
                                </div>
                            </div>
                            <!-- /Done Tab -->

                            <!-- Cancelled Tab -->
                            <div class="tab-pane fade" id="custom-tabs-four-cancelled" role="tabpanel" aria-labelledby="custom-tabs-four-cancelled-tab">
                                <div class="row" id="cancelledContent">
                                    <!-- Cancelled CONSULTATION HERE -->
                                </div>
                            </div>
                            <!-- /Cancelled Tab -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /Tabs -->
        </div>
        <br><br><br><br>

    </div>
</body>





<!-- Script -->
<script>
    $(document).ready(function() {
        //For Textarea character count
        $('textarea').keyup(function() {
            var characterCount = $(this).val().length,
                current = $('#current'),
                maximum = $('#maximum'),
                theCount = $('#count');

            current.text(characterCount);
            if (characterCount < 230) {
                current.css('color', '#666');
            }

            if (characterCount >= 230) {
                maximum.css('color', '#8f0001');
                current.css('color', '#8f0001');
                theCount.css('font-weight', 'bold');
            } else {
                maximum.css('color', '#666');
                theCount.css('font-weight', 'normal');
            }
        });

        // Fetch Active Consultation
        var activeCount;
        $.ajax({
            url: '<?= site_url('mentalwellness/fetchActiveConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#activeContent').html(response['result']);
                activeCount = response['count'];

                if (activeCount != 0) {
                    $('#custom-tabs-four-active-tab').trigger('click');
                }

                if (activeCount == 0 && pendingCount == 0) {
                    $('#custom-tabs-four-done-tab').trigger('click');
                }
            }
        });
        // Fetch Pending Consultation
        var pendingCount;
        $.ajax({
            url: '<?= site_url('mentalwellness/fetchPendingConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#pendingContent').html(response['result']);
                pendingCount = response['count'];

                if (pendingCount != 0) {
                    $('#custom-tabs-four-pending-tab').trigger('click');
                }

                if (activeCount == 0 && pendingCount == 0) {
                    $('#custom-tabs-four-done-tab').trigger('click');
                }
            }
        });
        // Fetch Rejected Consultation
        var rejectCount;
        $.ajax({
            url: '<?= site_url('mentalwellness/fetchRejectedConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#rejectedContent').html(response['result']);
                rejectCount = response['count'];
            }
        });
        // Fetch Done Consultation
        var doneCount;
        $.ajax({
            url: '<?= site_url('mentalwellness/fetchDoneConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#doneContent').html(response['result']);
                doneCount = response['count'];
            }
        });
        // Fetch Cancelled Consultation
        var cancelledCount;
        $.ajax({
            url: '<?= site_url('mentalwellness/fetchCancelledConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#cancelledContent').html(response['result']);
                cancelledCount = response['count'];
            }
        });

        // Fetch all online doctors
        var onlineCount;
        $.ajax({
            url: '<?= site_url('mentalwellness/fetchOnlineHealthPersonnels') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#online_guidanceCounselor').html(response['result']);
                onlineCount = response['count'];
            }
        });

        // Set Interval
        setInterval(function() {
            // Fetch Active Consultation
            $.ajax({
                url: '<?= site_url('mentalwellness/fetchActiveConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != activeCount) {
                        $('#activeContent').html(response['result']);
                        activeCount = response['count'];

                        if (activeCount != 0) {
                            $('#custom-tabs-four-active-tab').trigger('click');
                        }

                        if (activeCount == 0 && pendingCount == 0) {
                            $('#custom-tabs-four-done-tab').trigger('click');
                        }
                    }
                }
            });
            // Fetch Pending Consultation
            $.ajax({
                url: '<?= site_url('mentalwellness/fetchPendingConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != pendingCount) {
                        $('#pendingContent').html(response['result']);
                        pendingCount = response['count'];

                        if (pendingCount != 0) {
                            $('#custom-tabs-four-pending-tab').trigger('click');
                        }

                        if (activeCount == 0 && pendingCount == 0) {
                            $('#custom-tabs-four-done-tab').trigger('click');
                        }
                    }
                }
            });
            // Fetch Rejected Consultation
            $.ajax({
                url: '<?= site_url('mentalwellness/fetchRejectedConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != rejectCount) {
                        $('#rejectedContent').html(response['result']);
                        rejectCount = response['count'];
                    }
                }
            });
            // Fetch Done Consultation
            $.ajax({
                url: '<?= site_url('mentalwellness/fetchDoneConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != doneCount) {
                        $('#doneContent').html(response['result']);
                        doneCount = response['count'];
                    }
                }
            });
            // Fetch Cancelled Consultation
            $.ajax({
                url: '<?= site_url('mentalwellness/fetchCancelledConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != doneCount) {
                        $('#cancelledContent').html(response['result']);
                        cancelledCount = response['count'];
                    }
                }
            });

            // Fetch all online guidance counselor
            $.ajax({
                url: '<?= site_url('mentalwellness/fetchOnlineHealthPersonnels') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != onlineCount) {
                        $('#online_guidanceCounselor').html(response['result']);
                        onlineCount = response['count'];
                    }
                }
            });
        }, 3000);
    });

    // On cancel request
    function cancelRequest(id) {
        $.ajax({
            url: '<?= site_url('mentalwellness/cancelRequest/') ?>' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        // Sweet Alert for success staus
        var Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: true,
            timer: false
        });
        Toast.fire({
            icon: 'success',
            title: 'Cancelled'
        });
    }

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
    <?php elseif (session()->get('error') !== null) : ?>
        // Sweet Alert for error staus
        var Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: true,
            timer: 3000
        });
        Toast.fire({
            icon: 'warning',
            title: '<?= session()->get('error'); ?>'
        });
    <?php endif; ?>
</script>

<?= $this->endSection('content') ?>