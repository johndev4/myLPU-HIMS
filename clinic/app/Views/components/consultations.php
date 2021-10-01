<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">

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

                <div id="scheduledSection" class="row mt-3 justify-content-center pb-3" style="border: 1px solid none;">
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

        // Fetch All Scheduled Consultations
        $.ajax({
            url: '<?= base_url('consultations/fetchAllScheduledConsultations') ?>',
            type: 'get',
            dataType: 'html',
            success: function(response) {
                $('#scheduledSection').html(response);
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('consultations/fetchAllScheduledConsultations') ?>',
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#scheduledSection').html(response);
                }
            });
        }, 500);
    });
</script>

<?= $this->endSection('content') ?>