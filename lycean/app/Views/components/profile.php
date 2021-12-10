<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<body style="background: linear-gradient(250deg, #ffffff 60%, #e4e4e4 60%)">
    <div class="container">

        <!-- Back Button -->
        <div class="row mb-2" style="border:1px solid none; margin-top:35px">
            <div class="col-sm-12">
                <a href="<?= site_url('dashboard') ?>">
                    <!-- <i class="fas fa-chevron-left fa-2x font-weight-normal" style="font-size: 17pt; color: rgb(88, 88, 88); vertical-align:baseline"></i>
                    <span class="font-weight-normal ml-1" style="font-size: 20pt; color: rgb(88, 88, 88)">Back</span> -->
                    <i class="fas fa-chevron-circle-left fa-2x py-2 text-secondary"></i>
                </a>
            </div>
        </div><br><br>
        <!-- /Back Button -->

        <!-- <div class="row mb-2 mt-4">
            <div class="col-sm-12 text-left">
                <h2 class="m-0 font-weight-bold text-dark">Profile</h2>
            </div>
        </div> -->
        <br>
        <div class="row d-flex justify-content-center c-row" style="border:1px solid none;">

            <div class="card text-center shadow" style="width:610px; border-radius: 6px;">
                <div class="row">
                    <div class="col-sm-3 py-3">
                        <i class="fas fa-user-circle py-2 text-secondary" style="font-size:54pt"></i>
                        <p class="text-muted d-block mt-n1" style="font-size: 14pt;">Profile</p>
                    </div>
                    <div class="col-sm-9 py-3">
                        <p class="text-muted text-left" style="font-size: 16pt;">Name</p>
                        <h2 class="text-left mt-n2"> <?= $userInfo['first_name'] ?> <?= $userInfo['last_name'] ?> </h2>
                        <p class="text-left mt-n2" style="font-size: 12pt;">LYCEUM OF THE PHILIPPINES UNIVERSITY - CAVITE</p>

                        <hr>

                        <!-- <p class="text-left" style="font-size: 15pt;"><b class="text-muted" style="font-size: 10pt;">USERNAME: </b> <?= $username ?></p>
                        <p class="text-left mt-n3" style="font-size: 15pt;"><b class="text-muted" style="font-size: 10pt;">ID NUMBER: </b> <?= $userInfo['id_no'] ?></p> -->

                        <div class="row profile-info">
                            <div class="col-3">
                                <p class="text-left text-muted" style="font-size: 14pt;"><b>Username</b></p>
                                <p class="text-left mt-n3 text-muted" style="font-size: 14pt;"><b>ID Number</b></p>
                            </div>

                            <div class="col-9">
                                <p class="text-left" style="font-size: 14pt;"><?= $username ?></p>
                                <p class="text-left mt-n3" style="font-size: 14pt;"><?= $userInfo['id_no'] ?></p>
                            </div>
                        </div>

                        <div class="row d-inline text-left">
                            <div class="col-12 text-left ml-n2">
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#changepasswordModal">Change Password</button>
                                <!-- <a href="<?= site_url('auth/logout') ?>"><button type="button" class="btn btn-light">Logout</button></a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer py-3 profile-footer" style="background-color: #b13f48;">
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

        <!-- Change password Modal -->
        <div class="modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-4" align="left">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br>
                        <label class="mb-3 text-dark" style="font-size: 14pt;">Change Password</label>
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
                                <b>Save Changes</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Change password Modal -->
        <!-- /Modal -->

    </div>





    <!-- Script -->
    <script>
        $(document).ready(function() {
            // Bootstrap Modal for password changed status
            <?php if (session()->get('password_changed') == TRUE) : ?>
                $("#messageModal").modal('show');
            <?php endif; ?>

            // Change Password Validation Error
            <?php if (!empty(session()->get('p_validation'))) : ?>
                $('#changepasswordModal').modal('show');

                $('#changepasswordModal').on('hidden.bs.modal', function(evt) {
                    $('.error').addClass('d-none');
                    $('input.border').removeClass('border border-danger');
                    $('select.border').removeClass('border border-danger');
                });
            <?php endif; ?>

            // Reset change password modal on close
            $('#changepasswordModal').on('hidden.bs.modal', function(evt) {
                $('#current_password').val("");
                $('#password').val("");
                $('#confirm_password').val("");
            });
        });
    </script>

</body>

<br><br><br><br>


<?= $this->endSection('content') ?>