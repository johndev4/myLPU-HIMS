<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- CONTENT HERE -->
<!-- CONTENT HERE -->
<!-- CONTENT HERE -->





<!-- Script -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#student_account").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= base_url('') ?>',
                contentType: ' application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // For sidebar
        $("#mainUserInformationNav").addClass('menu-open');
        $("#mainUserInformationNav > a").addClass('active');
        $("#healthpersonnelInformationNav > a").addClass('active');
    });
</script>

<?= $this->endSection('content') ?>