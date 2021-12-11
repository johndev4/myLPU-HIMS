<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- CONTENT HERE -->
<!-- CONTENT HERE -->
<!-- CONTENT HERE -->





<!-- SCRIPT -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#systemlogs_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('useraccounts/fetchAllLogs') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });
    });
</script>

<?= $this->endSection('content') ?>