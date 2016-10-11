<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Prop</title>

        <link href="<?php echo base_url("assets/plugins/switchery/switchery.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/core.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/components.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/pages.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/menu.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon.ico"); ?>">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <div class="brand">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span> 
                                <span class="l l3"></span> 
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> 
                            <span>Prop Manager</span> 
                        </div>
                    </div>
                </div>

                <!-- Navbar -->
                <?php $this->view('navbar'); ?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            $u_group = $this->Crudmod->user_group('user_role', 'privilage_tag', 'edit_group', 'user_group_id', $user_group_id);
            $v_users = $this->Crudmod->user_group('user_role', 'privilage_tag', 'view_user', 'user_group_id', $user_group_id);
            $e_users = $this->Crudmod->user_group('user_role', 'privilage_tag', 'edit_user', 'user_group_id', $user_group_id);
            $a_users = $this->Crudmod->user_group('user_role', 'privilage_tag', 'add_user', 'user_group_id', $user_group_id);

            $a_property = $this->Crudmod->user_group('user_role', 'privilage_tag', 'add_property', 'user_group_id', $user_group_id);
            $e_property = $this->Crudmod->user_group('user_role', 'privilage_tag', 'edit_property', 'user_group_id', $user_group_id);
            $v_property = $this->Crudmod->user_group('user_role', 'privilage_tag', 'view_property', 'user_group_id', $user_group_id);
            $c_property = $this->Crudmod->user_group('user_role', 'privilage_tag', 'comment_property', 'user_group_id', $user_group_id);

            $v_lease = $this->Crudmod->user_group('user_role', 'privilage_tag', 'view_lease', 'user_group_id', $user_group_id);
            $a_lease = $this->Crudmod->user_group('user_role', 'privilage_tag', 'add_lease', 'user_group_id', $user_group_id);

            $v_account = $this->Crudmod->user_group('user_role', 'privilage_tag', 'view_account', 'user_group_id', $user_group_id);
            ?>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('home'); ?>" class=" subdrop"><i
                                        class="fa fa-dashboard"></i><span> Dashboard </span></a>
                            </li>

                            <?php if ($u_group > 0 || $v_users > 0 || $a_users > 0 || $e_users > 0) { ?>
                                <li class="has_sub">
                                    <a href="#" class=""><i class="fa fa-user"></i> <span> Users </span>
                                        <i class="fa fa-chevron-right pull-right"></i> 
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url('home/user'); ?>">Users</a></li>
                                        <li><a href="<?php echo base_url('home/usergroup'); ?>">User Groups</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($a_property > 0 || $e_property > 0 || $v_property > 0 || $c_property > 0) { ?>
                                <li class="has_sub">
                                    <a href="#" class=""><i class="fa fa-home"></i><span> Properties </span> 
                                        <i class="fa fa-chevron-right pull-right"></i> 
                                    </a>
                                    <ul class="list-unstyled">
                                        <?php if ($a_property > 0 || $e_property > 0) { ?>
                                            <li><a href="<?php echo base_url('home/category'); ?>">Categories</a></li>
                                        <?php } ?>
                                        <li><a href="<?php echo base_url('home/property'); ?>">Properties</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($v_lease > 0) { ?>
                                <li>
                                    <a href="<?php echo base_url('lease'); ?>" class="">
                                        <i class="fa fa-gift"></i>
                                        <span> Leases </span> 
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if ($v_account > 0) { ?>
                                <li class="has_sub">
                                    <a href="#" class=""><i class="fa fa-money"></i><span> Accounts </span>
                                        <i class="fa fa-chevron-right pull-right"></i> 
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url('home/receivable'); ?>">Receivable</a></li>
                                        <li><a href="<?php echo base_url('home/payable'); ?>">Payable</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <li class="text-muted menu-title">More Options</li>

                            <li>
                                <a href="mailto:help@kodikit.com" class=""><i
                                        class="fa fa-info"></i><span> Help </span></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>


                    <div class="clearfix"></div>
                </div>

                <div class="user-detail">
                    <div class="dropup">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img
                                src="<?php echo base_url("assets/images/users/avatar-2.jpg"); ?>" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('home/profile'); ?>"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="<?php echo base_url('home/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>

                    <h5 class="m-t-0 m-b-0">My Profile</h5>
                    <p class="text-muted m-b-0">
                        <small><i class="fa fa-circle text-success"></i> <span>Online</span></small>
                    </p>
                </div>
            </div>
            <!-- Left Sidebar End --> 

            <?php
            ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <button type="button" class="btn btn-default pull-right"><i class="fa fa-refresh"></i></button>
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb">
                                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                        <?php
                        $admin_dash = $this->Crudmod->user_group('user_role', 'privilage_tag', 'admin_dash', 'user_group_id', $user_group_id);
                        $tenant_dash = $this->Crudmod->user_group('user_role', 'privilage_tag', 'tenant_dash', 'user_group_id', $user_group_id);
                        $landlord_dash = $this->Crudmod->user_group('user_role', 'privilage_tag', 'landlord_dash', 'user_group_id', $user_group_id);
                        $agent_dash = $this->Crudmod->user_group('user_role', 'privilage_tag', 'agent_dash', 'user_group_id', $user_group_id);
                        ?>

                        <?php if ($admin_dash > 0) {
                            ?>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Properties</span>
                                            <span class="info-box-number"><?php echo $total_property; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-xs-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Leases</span>
                                            <span class="info-box-number"><?php echo $total_lease; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Members</span>
                                            <span class="info-box-number"><?php echo $total_members; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-users"></i> Users</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-inline dt-bootstrap no-footer">
                                                <?php if (count($users) > 0) { ?>
                                                    <table aria-describedby="datatable-" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Username: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Username</th>
                                                                <th aria-label="User Group: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">User Group</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($users as $users_row):
                                                                $user_id_two = urlencode(base64_encode($users_row->user_group_id));
                                                                $user_name = $users_row->username;
                                                                $user_group_id = $users_row->user_group_id;
                                                                $user_status_q = $users_row->status;

                                                                $user_group_name_q = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_group_id);
                                                                foreach ($user_group_name_q as $user_group_name_q_row) {
                                                                    $user_group_name = $user_group_name_q_row->name;
                                                                }

                                                                if ($user_status_q == 1) {
                                                                    $user_status = "Active";
                                                                } else {
                                                                    $user_status = "Inactive";
                                                                }
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $user_name; ?></td>
                                                                    <td><?php echo $user_group_name; ?></td>
                                                                    <td><?php echo $user_status; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('home/updateuser/' . $user_id_two); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Username: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Username</th>
                                                                <th aria-label="User Group: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">User Group</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Properties -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-home"></i> Properties</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($properties) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Property Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Property Name</th>
                                                                <th aria-label="Category: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Category</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($properties as $properties_row):
                                                                $property_id = $properties_row->property_id;
                                                                $property_id_two = urlencode(base64_encode($properties_row->property_id));
                                                                $property_name = $properties_row->name;
                                                                $property_category = $properties_row->category;
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $property_name; ?></td>
                                                                    <td><?php echo $property_category; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('home/updateproperty/' . $property_id_two); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Property Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Property Name</th>
                                                                <th aria-label="Category: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Category</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Leases -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-gift"></i> Leases</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($leases) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($leases as $leases_row):
                                                                $lease_id = $leases_row->lease_id;
                                                                $lease_id_two = urlencode(base64_encode($lease_id));
                                                                $tenantid = $leases_row->tenant_id;
                                                                $landlordid = $leases_row->landlord_id;
                                                                $lease_status = $leases_row->lease_status;
                                                                $lease_start = $leases_row->lease_start;
                                                                $lease_end = $leases_row->lease_end;
                                                                $lease_rent = $leases_row->rent;
                                                                $lease_deposit = $leases_row->deposit;

                                                                $tenant_name = $this->Crudmod->s_where_one('user', 'user_id', $tenantid);
                                                                foreach ($tenant_name as $tenant_name_row) {
                                                                    $tenant_user_name = $tenant_name_row->username;
                                                                }

                                                                $landlord_name = $this->Crudmod->s_where_one('user', 'user_id', $landlordid);
                                                                foreach ($landlord_name as $landlord_name_row) {
                                                                    $landlord_user_name = $landlord_name_row->username;
                                                                }

                                                                $user_group_name_q = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_group_id);
                                                                foreach ($user_group_name_q as $user_group_name_q_row) {
                                                                    $user_group_name = $user_group_name_q_row->name;
                                                                }
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $tenant_user_name; ?></td>
                                                                    <td tabindex="0" class="sorting_1"><?php echo $landlord_user_name; ?></td>
                                                                    <td><?php echo $lease_id_two; ?></td>
                                                                    <td><?php echo $lease_status; ?></td>
                                                                    <td>
                                                                        <a href="#" data-toggle="modal" data-target="#<?php echo $lease_id; ?>leaseEditModal"  class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                    <!-- user Group Modal -->
                                                            <div class="modal fade" id="<?php echo $lease_id; ?>leaseEditModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $lease_id; ?>leaseEditModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="userModalLabel"><i class="fa fa-edit"></i> Update a Lease</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php
                                                                            if ($a_lease > 0) {
                                                                                ?>
                                                                                <form method="post" action="<?php echo base_url('home/update_lease'); ?>" id="updateLease">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="number" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo $lease_rent; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="number" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo $lease_deposit; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit" class="btn btn-success">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <form method="post" action="" id="">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="text" disabled="" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo number_format($lease_rent); ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="text" disabled="" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo number_format($lease_deposit); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" disabled="" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer"> </div>
                                                                                </form>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } elseif ($agent_dash > 0) {
                            ?>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Properties</span>
                                            <span class="info-box-number"><?php echo $total_property; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-xs-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Leases</span>
                                            <span class="info-box-number"><?php echo $total_lease; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Members</span>
                                            <span class="info-box-number"><?php echo $total_members; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-users"></i> Users</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-inline dt-bootstrap no-footer">
                                                <?php if (count($users) > 0) { ?>
                                                    <table aria-describedby="datatable-" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Username: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Username</th>
                                                                <th aria-label="User Group: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">User Group</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($users as $users_row):
                                                                $user_id_two = urlencode(base64_encode($users_row->user_group_id));
                                                                $user_name = $users_row->username;
                                                                $user_group_id = $users_row->user_group_id;
                                                                $user_status_q = $users_row->status;

                                                                $user_group_name_q = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_group_id);
                                                                foreach ($user_group_name_q as $user_group_name_q_row) {
                                                                    $user_group_name = $user_group_name_q_row->name;
                                                                }

                                                                if ($user_status_q == 1) {
                                                                    $user_status = "Active";
                                                                } else {
                                                                    $user_status = "Inactive";
                                                                }
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $user_name; ?></td>
                                                                    <td><?php echo $user_group_name; ?></td>
                                                                    <td><?php echo $user_status; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('home/updateuser/' . $user_id_two); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Username: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Username</th>
                                                                <th aria-label="User Group: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">User Group</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Properties -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-home"></i> Properties</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($properties) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Property Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Property Name</th>
                                                                <th aria-label="Category: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Category</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($properties as $properties_row):
                                                                $property_id = $properties_row->property_id;
                                                                $property_id_two = urlencode(base64_encode($properties_row->property_id));
                                                                $property_name = $properties_row->name;
                                                                $property_category = $properties_row->category;
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $property_name; ?></td>
                                                                    <td><?php echo $property_category; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('home/updateproperty/' . $property_id_two); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Property Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Property Name</th>
                                                                <th aria-label="Category: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Category</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Leases -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-gift"></i> Leases</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($leases) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($leases as $leases_row):
                                                                $lease_id = $leases_row->lease_id;
                                                                $lease_id_two = urlencode(base64_encode($lease_id));
                                                                $tenantid = $leases_row->tenant_id;
                                                                $landlordid = $leases_row->landlord_id;
                                                                $lease_status = $leases_row->lease_status;
                                                                $lease_start = $leases_row->lease_start;
                                                                $lease_end = $leases_row->lease_end;
                                                                $lease_rent = $leases_row->rent;
                                                                $lease_deposit = $leases_row->deposit;

                                                                $tenant_name = $this->Crudmod->s_where_one('user', 'user_id', $tenantid);
                                                                foreach ($tenant_name as $tenant_name_row) {
                                                                    $tenant_user_name = $tenant_name_row->username;
                                                                }

                                                                $landlord_name = $this->Crudmod->s_where_one('user', 'user_id', $landlordid);
                                                                foreach ($landlord_name as $landlord_name_row) {
                                                                    $landlord_user_name = $landlord_name_row->username;
                                                                }

                                                                $user_group_name_q = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_group_id);
                                                                foreach ($user_group_name_q as $user_group_name_q_row) {
                                                                    $user_group_name = $user_group_name_q_row->name;
                                                                }
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $tenant_user_name; ?></td>
                                                                    <td tabindex="0" class="sorting_1"><?php echo $landlord_user_name; ?></td>
                                                                    <td><?php echo $lease_id_two; ?></td>
                                                                    <td><?php echo $lease_status; ?></td>
                                                                    <td>
                                                                        <a href="#" data-toggle="modal" data-target="#<?php echo $lease_id; ?>leaseEditModal"  class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                    <!-- user Group Modal -->
                                                            <div class="modal fade" id="<?php echo $lease_id; ?>leaseEditModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $lease_id; ?>leaseEditModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="userModalLabel"><i class="fa fa-edit"></i> Update a Lease</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php
                                                                            if ($a_lease > 0) {
                                                                                ?>
                                                                                <form method="post" action="<?php echo base_url('home/update_lease'); ?>" id="updateLease">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="number" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo $lease_rent; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="number" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo $lease_deposit; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit" class="btn btn-success">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <form method="post" action="" id="">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="text" disabled="" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo number_format($lease_rent); ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="text" disabled="" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo number_format($lease_deposit); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" disabled="" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer"> </div>
                                                                                </form>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } elseif ($landlord_dash > 0) {
                            ?>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Properties</span>
                                            <span class="info-box-number"><?php echo $total_property; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-xs-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Leases</span>
                                            <span class="info-box-number"><?php echo $total_lease; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Properties -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-home"></i> Properties</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($properties) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Property Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Property Name</th>
                                                                <th aria-label="Category: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Category</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($properties as $properties_row):
                                                                $property_id = $properties_row->property_id;
                                                                $property_id_two = urlencode(base64_encode($properties_row->property_id));
                                                                $property_name = $properties_row->name;
                                                                $property_category = $properties_row->category;
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $property_name; ?></td>
                                                                    <td><?php echo $property_category; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('home/updateproperty/' . $property_id_two); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Property Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Property Name</th>
                                                                <th aria-label="Category: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Category</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Leases -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-gift"></i> Leases</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($leases) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($leases as $leases_row):
                                                                $lease_id = $leases_row->lease_id;
                                                                $lease_id_two = urlencode(base64_encode($lease_id));
                                                                $tenantid = $leases_row->tenant_id;
                                                                $landlordid = $leases_row->landlord_id;
                                                                $lease_status = $leases_row->lease_status;
                                                                $lease_start = $leases_row->lease_start;
                                                                $lease_end = $leases_row->lease_end;
                                                                $lease_rent = $leases_row->rent;
                                                                $lease_deposit = $leases_row->deposit;

                                                                $tenant_name = $this->Crudmod->s_where_one('user', 'user_id', $tenantid);
                                                                foreach ($tenant_name as $tenant_name_row) {
                                                                    $tenant_user_name = $tenant_name_row->username;
                                                                }

                                                                $landlord_name = $this->Crudmod->s_where_one('user', 'user_id', $landlordid);
                                                                foreach ($landlord_name as $landlord_name_row) {
                                                                    $landlord_user_name = $landlord_name_row->username;
                                                                }

                                                                $user_group_name_q = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_group_id);
                                                                foreach ($user_group_name_q as $user_group_name_q_row) {
                                                                    $user_group_name = $user_group_name_q_row->name;
                                                                }
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $tenant_user_name; ?></td>
                                                                    <td tabindex="0" class="sorting_1"><?php echo $landlord_user_name; ?></td>
                                                                    <td><?php echo $lease_id_two; ?></td>
                                                                    <td><?php echo $lease_status; ?></td>
                                                                    <td>
                                                                        <a href="#" data-toggle="modal" data-target="#<?php echo $lease_id; ?>leaseEditModal"  class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                    <!-- user Group Modal -->
                                                            <div class="modal fade" id="<?php echo $lease_id; ?>leaseEditModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $lease_id; ?>leaseEditModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="userModalLabel"><i class="fa fa-edit"></i> Update a Lease</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php
                                                                            if ($a_lease > 0) {
                                                                                ?>
                                                                                <form method="post" action="<?php echo base_url('home/update_lease'); ?>" id="updateLease">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="number" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo $lease_rent; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="number" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo $lease_deposit; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit" class="btn btn-success">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <form method="post" action="" id="">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="text" disabled="" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo number_format($lease_rent); ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="text" disabled="" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo number_format($lease_deposit); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" disabled="" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer"> </div>
                                                                                </form>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } elseif ($tenant_dash > 0) {
                            ?>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Due</span>
                                            <span class="info-box-number">KSh. <?php echo $paydue; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-xs-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Leases</span>
                                            <span class="info-box-number"><?php echo $total_lease; ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Leases -->
                                    <div class="panel panel-default card-box table-responsive">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-gift"></i> Leases</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="">
                                                <?php if (count($leases) > 0) { ?>
                                                    <table aria-describedby="" role="grid" id="" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($leases as $leases_row):
                                                                $lease_id = $leases_row->lease_id;
                                                                $lease_id_two = urlencode(base64_encode($lease_id));
                                                                $tenantid = $leases_row->tenant_id;
                                                                $landlordid = $leases_row->landlord_id;
                                                                $lease_status = $leases_row->lease_status;
                                                                $lease_start = $leases_row->lease_start;
                                                                $lease_end = $leases_row->lease_end;
                                                                $lease_rent = $leases_row->rent;
                                                                $lease_deposit = $leases_row->deposit;

                                                                $tenant_name = $this->Crudmod->s_where_one('user', 'user_id', $tenantid);
                                                                foreach ($tenant_name as $tenant_name_row) {
                                                                    $tenant_user_name = $tenant_name_row->username;
                                                                }

                                                                $landlord_name = $this->Crudmod->s_where_one('user', 'user_id', $landlordid);
                                                                foreach ($landlord_name as $landlord_name_row) {
                                                                    $landlord_user_name = $landlord_name_row->username;
                                                                }

                                                                $user_group_name_q = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_group_id);
                                                                foreach ($user_group_name_q as $user_group_name_q_row) {
                                                                    $user_group_name = $user_group_name_q_row->name;
                                                                }
                                                                ?>
                                                                <tr class="odd" role="row">
                                                                    <td tabindex="0" class="sorting_1"><?php echo $tenant_user_name; ?></td>
                                                                    <td tabindex="0" class="sorting_1"><?php echo $landlord_user_name; ?></td>
                                                                    <td><?php echo $lease_id_two; ?></td>
                                                                    <td><?php echo $lease_status; ?></td>
                                                                    <td>
                                                                        <a href="#" data-toggle="modal" data-target="#<?php echo $lease_id; ?>leaseEditModal"  class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                    </td>
                                                                    <!-- user Group Modal -->
                                                            <div class="modal fade" id="<?php echo $lease_id; ?>leaseEditModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $lease_id; ?>leaseEditModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="userModalLabel"><i class="fa fa-edit"></i> Update a Lease</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php
                                                                            if ($a_lease > 0) {
                                                                                ?>
                                                                                <form method="post" action="<?php echo base_url('home/update_lease'); ?>" id="updateLease">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="number" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo $lease_rent; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="number" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo $lease_deposit; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit" class="btn btn-success">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <form method="post" action="" id="">
                                                                                    <input type="hidden" name="lid" id="lid" value="<?php echo $lease_id; ?>">
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lstart">Lease Start</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lstart" id="lstart" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_start; ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lend">Lease End</label>
                                                                                            <input type="date" disabled="" class="form-control" name="lend" id="lend" required="" placeholder="YYYY-MM-DD" value="<?php echo $lease_end; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-group">
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="lrent">Rent</label>
                                                                                            <input type="text" disabled="" class="form-control" name="lrent" id="lrent" required="" placeholder="Rent" value="<?php echo number_format($lease_rent); ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label for="ldeposit">Deposit</label>
                                                                                            <input type="text" disabled="" class="form-control" name="ldeposit" id="ldeposit" required="" placeholder="Deposit" value="<?php echo number_format($lease_deposit); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lstatus">Lease Status</label>
                                                                                        <select name="lstatus" disabled="" id="lstatus" required="" class="form-control" placeholder="Choose status">
                                                                                            <optgroup label="You can only one">
                                                                                                <option value="<?php echo $lease_status; ?>" selected=""><?php echo $lease_status; ?></option>
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Inactive">Inactive</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer"> </div>
                                                                                </form>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr role="row">
                                                                <th aria-label="Tenant: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Tenant</th>
                                                                <th aria-label="Landlord: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Landlord</th>
                                                                <th aria-label="Lease ID: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Lease ID</th>
                                                                <th aria-label="Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Status</th>
                                                                <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" colspan="6">No results!</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

                <?php $this->view('footer'); ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/detect.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/fastclick.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery.slimscroll.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery.blockUI.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/waves.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/wow.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery.nicescroll.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery.scrollTo.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/switchery/switchery.min.js"); ?>"></script>



        <!-- Sweet Alert  -->
        <script src="<?php echo base_url("assets/plugins/sweetalert/dist/sweetalert.min.js"); ?>"></script>



        <!-- Custom main Js -->
        <script src="<?php echo base_url("assets/js/jquery.core.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery.app.js"); ?>"></script>


    </body>
</html>