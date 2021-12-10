<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="<?= base_url('assets/images/navlogo.png') ?>" alt="Logo" class="brand-image">
        <span class="brand-text font-weight-normal text-light">myLPU HIMS</span>
        <hr style="margin-bottom:-10px; margin-top:13px;">
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- User Profile -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="<?= site_url('profile') ?>">
                    <i class="fas fa-user-circle fa-2x nav-icon text-light"></i>
                </a>
            </div>
            <div class="info">
                <a href="<?= site_url('profile') ?>">
                    <span class="text-light"><?= $fullname ?></span>
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
                    <a href="<?= site_url('dashboard') ?>" class="nav-link selector">
                        <i class="fas fa-tachometer-alt nav-icon text-light"></i>
                        <p class="text-light">
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Records -->
                <?php if ($designation !== 'Guidance Counselor') : ?>
                    <li class="nav-item" id="mainUserRecordNav">
                        <a href="#" class="nav-link selector ">
                            <i class="fa fa-file-medical-alt nav-icon text-light"></i>
                            <p class="text-light">
                                Records
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- Student -->
                            <li id="studentRecordNav" class="nav-item">
                                <a href="<?= site_url('records/student') ?>" class="nav-link selector">
                                    <i class="far fa-circle nav-icon text-light"></i>
                                    <p class="text-light">
                                        Student
                                    </p>
                                </a>
                            </li>

                            <!-- Faculty -->
                            <li id="facultyRecordNav" class="nav-item">
                                <a href="<?php echo site_url('records/faculty') ?>" class="nav-link selector">
                                    <i class="far fa-circle nav-icon text-light"></i>
                                    <p class="text-light">
                                        Faculty
                                    </p>
                                </a>
                            </li>

                            <!-- Staff -->
                            <li id="staffRecordNav" class="nav-item">
                                <a href="<?php echo site_url('records/staff') ?>" class="nav-link selector">
                                    <i class="far fa-circle nav-icon text-light"></i>
                                    <p class="text-light">
                                        Staff
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Consultation -->
                <li id="consultationNav" class="nav-item">
                    <a href="<?= site_url('consultations') ?>" class="nav-link selector">
                        <i class="fas fa-comment-medical nav-icon text-light"></i>
                        <p class="text-light">
                            Consultations
                        </p>
                    </a>
                </li>

                <!-- Inventory -->
                <?php if ($designation !== 'Guidance Counselor') : ?>
                    <li class="nav-item" id="mainInventoryNav">
                        <a href="#" class="nav-link selector ">
                            <i class="fa fa-pills nav-icon text-light"></i>
                            <p class="text-light">
                                Inventory
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- Medicines -->
                            <li id="medicineNav" class="nav-item">
                                <a href="" class="nav-link selector">
                                    <i class="far fa-circle nav-icon text-light"></i>
                                    <p class="text-light">
                                        Medicines
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <!-- Item Management -->
                                    <li id="invmngtNav" class="nav-item">
                                        <a href="<?= site_url('inventory/medicines/items') ?>" class="nav-link selector">
                                            <i class="fas fa-caret-right nav-icon text-light"></i>
                                            <p class="text-light">
                                                Item Management
                                            </p>
                                        </a>
                                    </li>

                                    <!-- Batch Manaegement -->
                                    <li id="batchNav" class="nav-item">
                                        <a href="<?= site_url('inventory/medicines/batches') ?>" class="nav-link selector">
                                            <i class="fas fa-caret-right nav-icon text-light"></i>
                                            <p class="text-light">
                                                Batch Management
                                            </p>
                                        </a>
                                    </li>

                                    <!-- Stocks Management -->
                                    <li id="stocksNav" class="nav-item">
                                        <a href="<?= site_url('inventory/medicines/stocks') ?>" class="nav-link selector">
                                            <i class="fas fa-caret-right nav-icon text-light"></i>
                                            <p class="text-light">
                                                Stocks
                                            </p>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <!-- Equipment -->
                            <li id="equipmentNav" class="nav-item">
                                <a href="<?= site_url('inventory/equipments') ?>" class="nav-link selector">
                                    <i class="far fa-circle nav-icon text-light"></i>
                                    <p class="text-light">
                                        Equipment
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Help Menu -->
                <li id="helpmenuNav" class="nav-item">
                    <a href="<?= site_url('help') ?>" class="nav-link selector">
                        <i class="fas fa-info-circle nav-icon text-light"></i>
                        <p class="text-light">
                            Help Menu
                        </p>
                    </a>
                </li>

                <!-- Logout -->
                <li id="" class="nav-item selector logout mt-5 mb-5">
                    <a href="<?= site_url('auth/logout') ?>" class="nav-link">
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