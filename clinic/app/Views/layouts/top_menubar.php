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
                <i class="far fa-bell fa-lg text-secondary"></i>
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
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
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
                                Push.create("myLPU HIMS", {
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