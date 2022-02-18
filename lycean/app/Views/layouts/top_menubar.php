<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white py-3 fixed-top" style="background-color: #a62d38;">
    <div class="container">
        <div class="navbar-brand">
            <a href="<?= site_url('dashboard') ?>">
                <img src="<?= base_url('assets/images/navlogo.png') ?>" alt="myLPU Clinic Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-bold text-light">myLPU Clinic</span>
            </a>
        </div>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="order-1 order-md-3 navbar-nav ml-auto">
                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle fa-2x text-light mt-n1"></i>
                        <span class="text-white ml-1 uname"> <?= $fullname ?> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="<?= site_url('profile') ?>" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('auth/logout') ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>

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
                            <a href="<?= site_url('notifications/clearAll') ?>">Clear all</a>
                        </span>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav><br><br>
<!-- /.navbar -->


<!-- Script -->
<script>
    $('document').ready(function() {
        // Fetch All Notifications
        var requestCount;
        $.ajax({
            url: '<?= site_url('notifications/fetchAllNotifications/' . $idNo) ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#notificationList').html(response['result']);
                $('#notificationBadge').text(response['unreadCount']);
                requestCount = response['count'];
                badgeVisibility()
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= site_url('notifications/fetchAllNotifications/' . $idNo) ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != requestCount) {
                        $('#notificationList').html(response['result']);
                        requestCount = response['count'];

                        // Push Notification
                        if (response['notificationInfo'] != 'false') {
                            Push.Permission.request(function onGranted() {
                                Push.create("myLPU Clinic", {
                                    body: response['notificationInfo'],
                                    icon: '<?= base_url('assets/images/appicon.png') ?>',
                                    timeout: 4000,
                                    onClick: function() {
                                        window.focus();
                                        this.close();
                                    }
                                });
                            }, function onDenied() {
                                // onDenied
                            });
                        }
                    }
                    if (response['unreadCount'] != 0) {
                        $('#notificationBadge').text(response['unreadCount']);
                    }
                    badgeVisibility()
                }
            });
        }, 500);
    });

    // Hide or show notification badge depends on quantity
    function badgeVisibility() {
        if ($('#notificationBadge').text() == 0) {
            $('#notificationBadge').hide();
        } else {
            $('#notificationBadge').show();
        }
    }
</script>