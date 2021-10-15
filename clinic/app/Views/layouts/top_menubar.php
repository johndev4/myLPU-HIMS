<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown dpst">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell fa-lg text-light"></i>
                <span class="text-white ml-1 notification">Notification</span>
                <span class="badge badge-danger navbar-badge" id="notificationBadge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                <div id="notificationList" style="height: 410px; overflow-y:auto">
                    <!-- NOTIFICATIONS HERE -->
                </div>

                <span class="dropdown-header">
                    <a href="<?= base_url('notifications/clearAll') ?>">Clear all</a>
                </span>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->