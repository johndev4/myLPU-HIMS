<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">

        <div class="row consult-row" style="border:1px solid none; margin-top:80px">
            <!-- Navigation -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12 default-nav">
                        <a href="<?= base_url('dashboard') ?>">
                            <div class="card shadow card2" style="max-width:32rem">
                                <div class="row p-3 default-nav" style="border:1px solid none">
                                    <div class="col-12 pt-2 mt-n2 pl-4" style="border:1px solid none">
                                        <i class="fas fa-chevron-left fa-2x" style="color: #999999;"></i>
                                        <span class="font-weight-bold ml-1" style="font-size: 25pt; color: #999999">Back</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row border-outside">
                    <div class="col-12 default-nav">
                        <a href="<?= base_url('consultation') ?>">
                            <div class="card shadow card2 active" style="max-width:32rem; border:3px solid none">
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
                        <a href="<?= base_url('mentalwellness') ?>">
                            <div class="card shadow card2" style="max-width:32rem; border:3px solid none">
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
                        <a href="<?= base_url('dashboard') ?>">
                            <div class="card shadow card2 py-3" style="max-width:32rem">
                                <i class="fas fa-chevron-left fa-2x" style="color: #999999"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= base_url('consultation') ?>">
                            <div class="card shadow card2 py-3 active">
                                <i class="fas fa-comment-medical fa-2x" style="color: #7687CD"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="<?= base_url('mentalwellness') ?>">
                            <div class="card shadow card2 py-3">
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
                            <form action="<?= base_url('consultation/sendConsultation') ?>" method="post" id="">

                                <div class="form-group mb-4" style="border:1px solid none">
                                    <label for="select_doctor" class="col-form-label required text-secondary">Doctor</label>
                                    <select class="form-control" id="online_doctor" name="consultation_doctor" required="required">
                                        <!-- ONLINE DOCTORS HERE -->
                                    </select>
                                </div>

                                <label class="col-form-label required text-secondary">Tell us your concern</label>
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <textarea class="form-control txtarea border-0" id="message_consultation" name="consultation_message" rows="5" placeholder="Write it here..." maxlength="100" required="required"></textarea>
                                <div class="mb-2" id="count" align="right">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 100</span>
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
            if (characterCount < 80) {
                current.css('color', '#666');
            }

            if (characterCount >= 80) {
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
            url: '<?= base_url('consultation/fetchActiveConsultation') ?>',
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
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultation/fetchActiveConsultation') ?>',
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
        }, 500);
        // Fetch Pending Consultation
        var pendingCount;
        $.ajax({
            url: '<?= base_url('consultation/fetchPendingConsultation') ?>',
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
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultation/fetchPendingConsultation') ?>',
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
        }, 500);
        // Fetch Rejected Consultation
        var rejectCount;
        $.ajax({
            url: '<?= base_url('consultation/fetchRejectedConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#rejectedContent').html(response['result']);
                rejectCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultation/fetchRejectedConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != rejectCount) {
                        $('#rejectedContent').html(response['result']);
                        rejectCount = response['count'];
                    }
                }
            });
        }, 500);
        // Fetch Done Consultation
        var doneCount;
        $.ajax({
            url: '<?= base_url('consultation/fetchDoneConsultation') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#doneContent').html(response['result']);
                doneCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultation/fetchDoneConsultation') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != doneCount) {
                        $('#doneContent').html(response['result']);
                        doneCount = response['count'];
                    }
                }
            });
        }, 500);

        // Fetch all online doctors
        var onlineCount;
        $.ajax({
            url: '<?= base_url('consultation/fetchOnlineHealthPersonnels') ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#online_doctor').html(response['result']);
                onlineCount = response['count'];
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultation/fetchOnlineHealthPersonnels') ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != onlineCount) {
                        $('#online_doctor').html(response['result']);
                        onlineCount = response['count'];
                    }
                }
            });
        }, 500);
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
    <?php elseif (session()->get('error') !== null) : ?>
        // Sweet Alert for error staus
        var Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: true,
        });
        Toast.fire({
            icon: 'warning',
            title: '<?= session()->get('error'); ?>'
        });
    <?php endif; ?>
</script>

<?= $this->endSection('content') ?>