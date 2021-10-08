<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white py-3" style="background-color: #a62d38;">
    <div class="container">
        <div class="navbar-brand">
            <img src="<?= base_url('assets/images/icon 2.png') ?>" alt="myLPU Clinic Logo" class="brand-image" style="opacity: .8">
            <span class="brand-text font-weight-bold text-light">myLPU Clinic</span>
        </div>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

            <!-- Right navbar links navbar-no-expand -->
            <ul class="order-1 order-md-3 navbar-nav ml-auto">
                <!-- Dropdown Modal -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle fa-2x text-light mt-n1"></i>
                        <span class="text-white ml-1 uname"> <?= $fullname ?> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="<?= base_url('profile') ?>" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>

                <!-- Usernmame -->
                <!-- <li>
                    <div class="nav-link ml-n4" data-toggle="dropdown" href="#">
                      
                    </div>
                </li> -->
                <!-- /Usernmame -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown dpst">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell fa-lg text-light"></i>
                        <span class="text-white ml-1 notification">Notification</span>
                        <!-- Notification Badge-->
                        <span class="badge badge-danger navbar-badge">15</span>
                        <!-- /Notification Badge-->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">12 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-comment-medical mr-2"></i> 4 Mental wellness request
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-stethoscope mr-2"></i> 8 Consultation requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- /.navbar -->