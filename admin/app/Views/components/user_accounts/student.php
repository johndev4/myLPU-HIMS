<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-black-50">User Accounts</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <!-- Add record -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#addModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-plus"></i></span>
                        <span class="info-box-text text-black-50">Add User</span>
                    </button>
                </div>
                <!-- Delete all Button -->
                <div class="col-md-3 col-12 mb-3">
                    <button type="button" class="btn btn-block btn-default shadow p-3" data-toggle="modal" data-target="#deleteallModal">
                        <span class="info-box-icon add-record text-black-50"><i class="fas fa-trash"></i></span>
                        <span class="info-box-text text-black-50">Delete all data</span>
                    </button>
                </div>
            </div>

            <!-- Modals  -->

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('useraccounts/addStudentAccount') ?>" method="get" id="add_form">
                                <input type="hidden" name="role" value="student">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="add_idno" class="col-form-label required">ID No.</label>
                                        <input type="text" class="form-control" id="add_idno" name="id_no" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('id_no')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('id_no'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_idno').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#add_username" class="col-form-label required">Username</label>
                                        <input type="text" class="form-control" id="add_username" name="username" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('username')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('username'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_username').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_lastname" class="col-form-label required">Last Name</label>
                                        <input type="text" class="form-control" id="add_lastname" name="last_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('last_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('last_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_lastname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_firstname" class="col-form-label required">First Name</label>
                                        <input type="text" class="form-control" id="add_firstname" name="first_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('first_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('first_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_firstname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_middlename" class="col-form-label required">Middle Name</label>
                                        <input type="text" class="form-control" id="add_middlename" name="middle_name" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('middle_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('middle_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_middlename').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_gender" class="col-form-label">Gender</label>
                                        <select class="form-control" id="add_gender" name="gender">
                                            <option value="" selected="selected">---Select Gender---</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('gender')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('gender'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_gender').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="add_birthdate" class="col-form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="add_birthdate" name="birth_date" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('birth_date')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('birth_date'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_birthdate').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_height" class="col-form-label">Height</label>
                                        <input type="text" class="form-control" id="add_height" name="height" placeholder="in feet or inches">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('height')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('height'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_height').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_weight" class="col-form-label">Weight</label>
                                        <input type="text" class="form-control" id="add_weight" name="weight" placeholder="in pounds" value="">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('weight')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('weight'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_weight').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="add_bloodtype" class="col-form-label">Blood-type</label>
                                        <select class="form-control" id="add_bloodtype" name="blood_type">
                                            <option value="" selected="selected">---Blood Type---</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('blood_type')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('blood_type'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_bloodtype').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="add_department" class="col-form-label required">Department</label>
                                        <select class="form-control" id="add_department" name="department">
                                            <option value="" selected="selected">---Choose Department---</option>
                                            <optgroup label="International High School">
                                                <option value="Junior High School">Junior High School (Grade 7-10)</option>
                                                <option value="Senior High School">Senior High School (Grades 11-12) </option>
                                            <optgroup label="Undergraduate School">
                                                <option value="College of Allied Medical Sciences">College of Allied Medical Sciences</option>
                                                <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                                                <option value="College of Business Administration">College of Business Administration</option>
                                                <option value="College of Engineering, Computer Studies and Architecture">College of Engineering, Computer Studies and Architecture</option>
                                                <option value="College of Fine Arts and Design">College of Fine Arts and Design</option>
                                                <option value="College of International Tourism and Hospitality Management">College of International Tourism and Hospitality Management</option>
                                                <option value="College of Nursing">College of Nursing</option>
                                            <optgroup label="Law">
                                                <option value="College of Law">College of Law</option>
                                            <optgroup label="Graduate School">
                                                <option value="Claro M. Recto Academy of Advanced Studies">Claro M. Recto Academy of Advanced Studies</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('add_validation'))) : ?>
                                            <?php if (session()->get('add_validation')->hasError('department')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('add_validation')->getError('department'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#add_department').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer float-right pb-3">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Add Modal -->

            <!-- Modify Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-secondary" id="">Account Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="get" id="modify_form">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="mod_idno" class="col-form-label required">ID No.</label>
                                        <input type="text" class="form-control" id="mod_idno" name="id_no" readonly="readonly">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('id_no')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('id_no'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_idno').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="#mod_username" class="col-form-label required">Username</label>
                                        <input type="text" class="form-control" id="mod_username" name="username">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('username')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('username'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_username').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_lastname" class="col-form-label required">Last Name</label>
                                        <input type="text" class="form-control" id="mod_lastname" name="last_name">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('last_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('last_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_lastname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_firstname" class="col-form-label required">First Name</label>
                                        <input type="text" class="form-control" id="mod_firstname" name="first_name">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('first_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('first_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_firstname').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_middlename" class="col-form-label required">Middle Name</label>
                                        <input type="text" class="form-control" id="mod_middlename" name="middle_name">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('middle_name')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('middle_name'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_middlename').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="mod_gender" class="col-form-label">Gender</label>
                                        <select class="form-control" id="mod_gender" name="gender">
                                            <option value="" selected="selected">---Select Gender---</option>
                                            <option value="Male" selected="selected">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('gender')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('gender'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_gender').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="mod_birthdate" class="col-form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="mod_birthdate" name="birth_date">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('birth_date')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('birth_date'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_birthdate').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_height" class="col-form-label">Height</label>
                                        <input type="text" class="form-control" id="mod_height" name="height" placeholder="in feet or inches">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('height')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('height'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_height').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_weight" class="col-form-label">Weight</label>
                                        <input type="text" class="form-control" id="mod_weight" name="weight" placeholder="in pounds">
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('weight')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('weight'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_weight').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mod_bloodtype" class="col-form-label">Blood-type</label>
                                        <select class="form-control" id="mod_bloodtype" name="blood_type">
                                            <option value="" selected="selected">---Blood Type---</option>
                                            <option value="A+" selected="selected">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('blood_type')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('blood_type'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_bloodtype').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="mod_department" class="col-form-label required">Department</label>
                                        <select class="form-control" id="mod_department" name="department">
                                            <option value="" selected="selected">---Choose Department---</option>
                                            <optgroup label="International High School">
                                                <option value="Junior High School">Junior High School (Grade 7-10)</option>
                                                <option value="Senior High School">Senior High School (Grades 11-12) </option>
                                            <optgroup label="Undergraduate School">
                                                <option value="College of Allied Medical Sciences">College of Allied Medical Sciences</option>
                                                <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                                                <option value="College of Business Administration">College of Business Administration</option>
                                                <option value="College of Engineering, Computer Studies and Architecture">College of Engineering, Computer Studies and Architecture</option>
                                                <option value="College of Fine Arts and Design">College of Fine Arts and Design</option>
                                                <option value="College of International Tourism and Hospitality Management">College of International Tourism and Hospitality Management</option>
                                                <option value="College of Nursing">College of Nursing</option>
                                            <optgroup label="Law">
                                                <option value="College of Law">College of Law</option>
                                            <optgroup label="Graduate School">
                                                <option value="Claro M. Recto Academy of Advanced Studies">Claro M. Recto Academy of Advanced Studies</option>
                                        </select>
                                        <!-- Validation Error -->
                                        <?php if (!empty(session()->get('mod_validation'))) : ?>
                                            <?php if (session()->get('mod_validation')->hasError('department')) : ?>
                                                <span class="error text-danger">
                                                    <?= session()->get('mod_validation')->getError('department'); ?>
                                                </span>
                                                <script>
                                                    $().ready(function() {
                                                        $('#mod_department').addClass('border border-danger');
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="footer pb-3 float-right">
                                    <button type="submit" class="btn text-light swalDefaultSuccess button-color">Update</button>
                                    <button type="button" class="btn btn-danger button-width" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Modify Modal -->

            <!-- Reset Modal -->
            <div class="modal fade" id="resetModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will reset the password to default</div>
                            </div><br>
                            <form action="" method="get" id="reset_form">
                                <div class="float-right mt-1">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Reset Modal -->

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently remove the account from the system</div>
                            </div><br>
                            <form action="" method="get" id="delete_form">
                                <div class="float-right mt-1">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Delete Modal -->

            <!-- Delete all Modal -->
            <div class="modal fade" id="deleteallModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:350px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2">
                                <span class="info-box-icon text-danger"><i class="fas fa-3x fa-exclamation-circle"></i></span>
                                <div class="mt-3 font-weight-bold" style="font-size: 14pt;">Are you sure?</div>
                                <div class="mt-1 font-weight-normal text-secondary">This will permanently wipe out all of the accounts from the system</div>
                            </div><br>
                            <form action="" method="get" id="deleteall_form">
                                <input type="hidden" name="role" value="student">
                                <div class="float-right mt-1">
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger swalDefaultSuccess ">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /Delete all Modal -->

            <!-- /Modals -->

            <!-- Table -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-header record-header">
                            <h3 class="card-title">Students</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="accounts_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th style="width:150px;"></th>
                                    </tr>
                                </thead>
                                <!-- TBODY HERE -->
                                <tfoot>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div>
    </section>
</div><!-- /.container-fluid -->





<!-- Script -->
<script>
    $(document).ready(function() {
        // For datatable
        $("#accounts_table").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            processing: true,
            searching: true,
            ajax: {
                type: 'post',
                url: '<?= site_url('useraccounts/fetchAllLycean/student') ?>',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }
        });

        // For sidebar
        $("#mainUserAccountNav").addClass('menu-open');
        $("#mainUserAccountNav > a").addClass('active');
        $("#studentAccountNav > a").addClass('active');

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

        // Add Validation Error
        <?php if (!empty(session()->get('add_validation'))) : ?>
            $('#addModal').modal('show');
            retrieveData('<?= session()->get('id_no') ?>', {
                error: true,
                modalType: "add"
            });
            $('#addModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Modify Validation Error
        <?php if (!empty(session()->get('mod_validation'))) : ?>
            $('#modifyModal').modal('show');
            retrieveData('<?= session()->get('id_no') ?>', {
                error: true,
                modalType: "mod"
            });
            $('#modifyModal').on('hidden.bs.modal', function(evt) {
                $('.error').addClass('d-none');
                $('input.border').removeClass('border border-danger');
                $('select.border').removeClass('border border-danger');
            });
        <?php endif; ?>

        // Reset add modal on close
        $('#addModal').on('hidden.bs.modal', function(evt) {
            $('#add_idno').val("");
            $('#add_username').val("");
            $('#add_lastname').val("");
            $('#add_firstname').val("");
            $('#add_middlename').val("");
            $('#add_gender').val("");
            $('#add_birthdate').val("");
            $('#add_height').val("");
            $('#add_weight').val("");
            $('#add_bloodtype').val("");
            $('#add_department').val("");
        });

        // On ID No. Input
        $('#add_idno').on('input', function() {
            $.ajax({
                url: '<?= site_url('useraccounts/fetchLyceanInfoById') ?>/' + $('#add_idno').val(),
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != '') {
                        $('#add_lastname').val(response['last_name']);
                        $('#add_firstname').val(response['first_name']);
                        $('#add_middlename').val(response['middle_name']);
                        $('#add_gender').val(response['gender']);
                        $('#add_birthdate').val(response['birth_date']);
                        $('#add_height').val(response['height']);
                        $('#add_weight').val(response['weight']);
                        $('#add_bloodtype').val(response['blood_type']);
                        $('#add_department').val(response['department']);
                    }
                }
            });
        });

        // Set Delete All Modal Form
        $('#deleteall_form').attr(
            'action',
            '<?= site_url('useraccounts/deleteAllStudentAccounts') ?>'
        );
    });

    // Retrieve data
    function retrieveData(id, obj = {
        error: false,
        modalType: null
    }) {
        if (obj['error'] === true) {
            var data = <?= session()->get('getData') ?>

            $('#' + obj['modalType'] + '_idno').val(data['id_no']);
            $('#' + obj['modalType'] + '_username').val(data['username']);
            $('#' + obj['modalType'] + '_lastname').val(data['last_name']);
            $('#' + obj['modalType'] + '_firstname').val(data['first_name']);
            $('#' + obj['modalType'] + '_middlename').val(data['middle_name']);
            $('#' + obj['modalType'] + '_gender').val(data['gender']);
            $('#' + obj['modalType'] + '_birthdate').val(data['birth_date']);
            $('#' + obj['modalType'] + '_height').val(data['height']);
            $('#' + obj['modalType'] + '_weight').val(data['weight']);
            $('#' + obj['modalType'] + '_bloodtype').val(data['blood_type']);
            $('#' + obj['modalType'] + '_department').val(data['department']);
        } else {
            $.ajax({
                url: '<?= site_url('useraccounts/fetchLyceanById') ?>/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#mod_idno').val(response['id_no']);
                    $('#mod_username').val(response['username']);
                    $('#mod_lastname').val(response['last_name']);
                    $('#mod_firstname').val(response['first_name']);
                    $('#mod_middlename').val(response['middle_name']);
                    $('#mod_gender').val(response['gender']);
                    $('#mod_birthdate').val(response['birth_date']);
                    $('#mod_height').val(response['height']);
                    $('#mod_weight').val(response['weight']);
                    $('#mod_bloodtype').val(response['blood_type']);
                    $('#mod_department').val(response['department']);

                    resId = response['id_no'];
                }
            });
        }

        $('#modify_form').attr(
            'action',
            '<?= site_url('useraccounts/modifyStudentAccount') ?>/' + id
        );
        $('#delete_form').attr(
            'action',
            '<?= site_url('useraccounts/deleteStudentAccount') ?>/' + id
        );
        $('#reset_form').attr(
            'action',
            '<?= site_url('useraccounts/resetStudentAccount') ?>/' + id
        );
    }
</script>

<?= $this->endSection('content') ?>