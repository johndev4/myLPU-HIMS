<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="<?= base_url('assets/images/sidebar_icon.png') ?>" alt="Logo" class="brand-image">
        <span class="brand-text font-weight-normal text-light">myLPU HIMS</span>
        <hr style="margin-bottom:-10px; margin-top:13px;">
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- User Profile -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user-circle fa-2x nav-icon text-light"></i>
            </div>
            <div class="info">
                <a href="<?= base_url('profile') ?>">
                    <span class="text-light" id="username"></span>
                </a>
            </div>
        </div>
        <hr style="margin-top:-15px">

        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <!-- Dashboard -->
                <li id="dashboardNav" class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link selector">
                        <i class="fas fa-tachometer-alt nav-icon text-light"></i>
                        <p class="text-light">
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- User Accounts -->
                <li class="nav-item" id="mainUserAccountNav">
                    <a href="#" class="nav-link selector">
                        <i class="fa fa-users nav-icon text-light"></i>
                        <p class="text-light">
                            User Accounts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Student -->
                        <li id="studentAccountNav" class="nav-item">
                            <a href="<?= base_url('useraccounts/student') ?>" class="nav-link selector">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p class="text-light">
                                    Student
                                </p>
                            </a>
                        </li>

                        <!-- Faculty -->
                        <li id="facultyAccountNav" class="nav-item">
                            <a href="<?php echo base_url('useraccounts/faculty') ?>" class="nav-link selector">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p class="text-light">
                                    Faculty
                                </p>
                            </a>
                        </li>

                        <!-- Staff -->
                        <li id="staffAccountNav" class="nav-item">
                            <a href="<?php echo base_url('useraccounts/staff') ?>" class="nav-link selector">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p class="text-light">
                                    Staff
                                </p>
                            </a>
                        </li>

                        <!-- Clinic Staff -->
                        <li id="healthpersonnelAccountNav" class="nav-item">
                            <a href="<?php echo base_url('useraccounts/healthpersonnel') ?>" class="nav-link selector">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p class="text-light">
                                    Clinic Staff
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Logout -->
                <li id="" class="nav-item selector logout mt-5">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon text-light"></i>
                        <p class="text-light">
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    // Get profile firstname
    $('document').ready(function() {
        $.ajax({
            type: 'get',
            url: "<?= base_url('profile/getFirstname') ?>",
            contentType: 'text/html; charset=UTF-8',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {
                $('#username').text(response);
            }
        });
    });
</script>