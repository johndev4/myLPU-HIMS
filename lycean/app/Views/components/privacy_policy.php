<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-12 col-lg-3">
            <ul style="list-style: none; cursor: pointer;">
                <li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-caret-left"></i> Home</a></li>

                <li><a id="link-" style="color:rgb(0, 131, 253)"></a></li>
                <li><a id="link-" style="color:rgb(0, 131, 253)"></a></li>
                <li><a id="link-" style="color:rgb(0, 131, 253)"></a></li>
                <li><a id="link-" style="color:rgb(0, 131, 253)"></a></li>
                <li><a id="link-" style="color:rgb(0, 131, 253)"></a></li>
            </ul>
        </div>

        <div class="col-md-12 col-lg-9">


        </div>
    </div>

    <br><br><br><br>

    <!-- Scroll to Top Button-->
    <a href="#page-top" class="float">
        <i class="fa fa-angle-up my-float fa-lg"></i>
    </a>

</div>





<!-- Script -->
<script>
    $(document).ready(function() {
        $("#link-").click(function() {
            $(window).scrollTop(
                $('#section-').position().top
            );
        });
        $("#link-").click(function() {
            $(window).scrollTop(
                $('#section-').position().top
            );
        });
        $("#link-").click(function() {
            $(window).scrollTop(
                $('#section-').position().top
            );
        });
        $("#link-").click(function() {
            $(window).scrollTop(
                $('#section-').position().top
            );
        });
        $("#link-").click(function() {
            $(window).scrollTop(
                $('#section-').position().top
            );
        });
    });
</script>


<?= $this->endSection('content') ?>