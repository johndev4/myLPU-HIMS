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
                <!-- Profile Dropdown Menu -->
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




                <!-- Test -->

                <!-- <li class="nav-item dropdown dpst">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown button
                        </button>


                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                            <span class="dropdown-header">
                                <a href="">Clear all</a>
                            </span>


                            <a class="dropdown-item" href="#">
                                <div class="notifications-item"><i class="fas fa-comment-medical fa-lg"></i>
                                    <div class="text">
                                        <p>The doctor has approved your request</p>
                                        <p class="text-right">2 mins ago</p>
                                    </div>
                                </div>
                            </a>


                            <a class="dropdown-item" href="#">
                                <div class="notifications-item"><i class="fas fa-comment-medical fa-lg"></i>
                                    <div class="text">
                                        <p>You have received a medical document</p>
                                        <p class="text-right">10 mins ago</p>
                                    </div>
                                </div>
                            </a>




                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </li> -->

                <!-- Test -->




            </ul>

        </div>
    </div>
</nav>
<!-- /.navbar -->


<!-- Script -->
<script>
    $('document').ready(function() {
        // Fetch All Notifications
        var requestCount;
        $.ajax({
            url: '<?= base_url('notifications/fetchAllNotifications/' . $idNo) ?>',
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
                url: '<?= base_url('notifications/fetchAllNotifications/' . $idNo) ?>',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response['count'] != requestCount) {
                        $('#notificationList').html(response['result']);
                        requestCount = response['count'];
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