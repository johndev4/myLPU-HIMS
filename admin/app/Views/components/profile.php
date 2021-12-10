<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">Profile</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <!-- User Profile -->
                <div class="col-md-5 col-sm-6 col-12 my-2">

                    <!-- Profile Image -->
                    <div class="card card-outline shadow">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <i class="fas fa-user-circle fa-5x nav-icon text-secondary"></i>
                            </div>

                            <h3 class="profile-username text-center"><?= $username ?></h3>
                            <p class="text-muted text-center">Username</p>

                            <form action="<?= site_url('profile/updateUsername') ?>" method="post">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <input type="text" class="form-control" id="p_username" placeholder="Username" name="username">
                                <!-- Validation Error -->
                                <?php if (!empty(session()->get('u_validation'))) : ?>
                                    <span class="error text-danger">
                                        <?= session()->get('u_validation')->getError('username'); ?>
                                    </span>
                                    <script>
                                        $().ready(function() {
                                            $('#p_username').addClass('border border-danger');
                                            $('#p_username').val('<?= session()->get('postData')['username'] ?>');
                                        });
                                    </script>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-danger btn-block mt-3 mb-5 swalDefaultSuccess">
                                    <b>Change Username</b></button>
                            </form>

                            <form action="<?= site_url('profile/updatePassword') ?>" method="post">
                                <span class="p-2 d-block mb-2" style="background-color:rgb(223, 223, 223); border-radius:4px;">
                                <b>Note:</b> You will be logged out after changing your password</span>

                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <input type="password" class="form-control mb-2 mt-2" id="current_password" placeholder="Current Password" name="current_password">
                                <!-- Validation Error & Incorrect Current Password -->
                                <?php if (!empty(session()->get('p_validation')) or !empty(session()->get('invalid_password'))) : ?>
                                    <?php if (!empty(session()->get('p_validation')) && session()->get('p_validation')->hasError('current_password')) : ?>
                                        <span class="error text-danger">
                                            <?= session()->get('p_validation')->getError('current_password'); ?>
                                        </span>
                                        <script>
                                            $().ready(function() {
                                                $('#current_password').addClass('border border-danger');
                                                $('#current_password').val('<?= session()->get('postData')['current_password'] ?>');
                                                $('#password').val('<?= session()->get('postData')['password'] ?>');
                                                $('#confirm_password').val('<?= session()->get('postData')['confirm_password'] ?>');
                                            });
                                        </script>
                                    <?php elseif (!empty(session()->get('invalid_password'))) : ?>
                                        <span class="error text-danger">
                                            <?= session()->get('invalid_password') ?>
                                        </span>
                                        <script>
                                            $().ready(function() {
                                                $('#current_password').addClass('border border-danger');
                                                $('#current_password').val('<?= session()->get('postData')['current_password'] ?>');
                                                $('#password').val('<?= session()->get('postData')['password'] ?>');
                                                $('#confirm_password').val('<?= session()->get('postData')['confirm_password'] ?>');
                                            });
                                        </script>
                                    <?php endif; ?>
                                <?php endif; ?>


                                <input type="password" class="form-control mb-2" id="password" placeholder="New Password" name="password">
                                <!-- Validation Error -->
                                <?php if (!empty(session()->get('p_validation'))) : ?>
                                    <?php if (session()->get('p_validation')->hasError('password')) : ?>
                                        <span class="error text-danger">
                                            <?= session()->get('p_validation')->getError('password'); ?>
                                        </span>
                                        <script>
                                            $().ready(function() {
                                                $('#current_password').val('<?= session()->get('postData')['current_password'] ?>');
                                                $('#password').addClass('border border-danger');
                                                $('#password').val('<?= session()->get('postData')['password'] ?>');
                                            });
                                        </script>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                                <!-- Validation Error -->
                                <?php if (!empty(session()->get('p_validation'))) : ?>
                                    <?php if (session()->get('p_validation')->hasError('confirm_password')) : ?>
                                        <span class="error text-danger">
                                            <?= session()->get('p_validation')->getError('confirm_password'); ?>
                                        </span>
                                        <script>
                                            $().ready(function() {
                                                $('#current_password').val('<?= session()->get('postData')['current_password'] ?>');
                                                $('#confirm_password').addClass('border border-danger');
                                                $('#confirm_password').val('<?= session()->get('postData')['confirm_password'] ?>');
                                            });
                                        </script>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-danger btn-block mt-3 swalDefaultSuccess">
                                    <b>Change Password</b></button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <!-- Message Modal -->
            <div class="modal fade" id="messageModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body p-4" align="center">
                            <i class="fas fa-check-circle"></i>
                            <label>
                                <h5>Password changed successfully!</h5>
                            </label><br>
                            You will now be logged out.
                            <br><br>
                            <div align="center">
                                <a href="<?= site_url('auth/logout') ?>">
                                    <button type="button" class="btn btn-danger swalDefaultSuccess" id="continueLogout">Continue</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Message Modal -->
            <!-- /Modal -->

        </div>
    </section>
</div><!-- /.container-fluid -->

<!-- Sweetalert -->
<script>
    $('document').ready(function() {
        // Sweet Alert for success staus
        <?php if (session()->get('success') !== null) : ?>
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

        // Bootstrap Modal for password changed status
        <?php if (session()->get('password_changed') == TRUE) : ?>
            $("#messageModal").modal('show');
        <?php endif; ?>
    });
</script>

<?= $this->endSection('content') ?>