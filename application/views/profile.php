<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Profile</title>

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

            $v_account = $this->Crudmod->user_group('user_role', 'privilage_tag', 'view_account', 'user_group_id', $user_group_id);
            ?>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('home'); ?>" class=""><i
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
                                    <h4 class="page-title">Profile </h4>
                                    <ol class="breadcrumb">
                                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                        <li class="active">Profile</li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                        <?php
                        if ($this->session->flashdata('success') == null) {
                            $alert_success = "hidden";
                        } else {
                            $alert_success = "alert alert-success";
                        }

                        if ($this->session->flashdata('error') == null) {
                            $alert_danger = "hidden";
                        } else {
                            $alert_danger = "alert alert-danger";
                        }
                        ?>
                        <div class="<?php echo $alert_success; ?>">
                            <i class="fa fa-check-circle"></i>
                            <?= null != $this->session->flashdata('success') ? $this->session->flashdata('success') : "" ?>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div>
                        <div class="<?php echo $alert_danger; ?>">
                            <i class="fa fa-exclamation-circle"></i>
                            <?= null != $this->session->flashdata('error') ? $this->session->flashdata('error') : "" ?>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default card-box table-responsive">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Account Details</h3>
                                    </div>

                                    <div class="panel-body" id="edit-user-group">
                                        <div class="min-h">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a class="btn-default" href="#<?php echo $user_id; ?>Details" aria-controls="<?php echo $user_id; ?>Details" role="tab" data-toggle="tab">
                                                        Details
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="#<?php echo $user_id; ?>Update" aria-controls="<?php echo $user_id; ?>Update" role="tab" data-toggle="tab">
                                                        Payments
                                                    </a>
                                                </li>
                                            </ul>

                                            <?php
                                            foreach ($user_details as $user_details_row) {
                                                $first_name = $user_details_row->firstname;
                                                $last_name = $user_details_row->lastname;
                                            }
                                            ?>

                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="<?php echo $user_id; ?>Details">
                                                    <form method="post" action="<?php echo base_url('home/edit_user'); ?>" id="">
                                                        <input type="hidden" name="uid" id="uid" value="<?php echo $user_id; ?>"/>
                                                        <div class="form-group">
                                                            <label for="firstname">First Name</label>
                                                            <input value="<?php echo $first_name; ?>" type="text" class="form-control" name="firstname" id="firstname" required="" placeholder="First Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input value="<?php echo $last_name; ?>" type="text" class="form-control" name="lastname" id="lastname" required="" placeholder="Last Landlord">
                                                        </div>
                                                        <div class="modal-footer">                                                                   
                                                            <button type="submit" class="btn btn-success ">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="<?php echo $user_id; ?>Update">

                                                    <div class = "dataTables_wrapper form-inline dt-bootstrap no-footer" id = "datatable-buttons_wrapper">
                                                        <?php if (count($payment_details) > 0) {
                                                            ?>
                                                            <table aria-describedby="datatable-buttons_info" role="grid" id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th aria-label="Amount: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Amount in (Ksh.)</th>
                                                                        <th aria-label="Payment Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Payment Status</th>
                                                                        <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($payment_details as $payment_details_row):
                                                                        $payment__id = $payment_details_row->payment_id;
                                                                        $payment__id__two = urlencode(base64_encode($payment__id));
                                                                        $payment__due = $payment_details_row->amount_due;

                                                                        if ($payment_details_row->payment_status == 0) {
                                                                            $payment_status = "Not paid";
                                                                        } elseif ($payment_details_row->payment_status == 1) {
                                                                            $payment_status = "Paid";
                                                                        } else {
                                                                            $payment_status = "Undefined";
                                                                        }
                                                                        ?>
                                                                        <tr class="odd" role="row">
                                                                            <td tabindex="0" class="sorting_1"><?php echo number_format($payment__due); ?></td>
                                                                            <td><?php echo $payment_status; ?></td>
                                                                            <td>
                                                                                <a href="#<?php echo $payment__id__two; ?>" data-toggle="modal" data-target="#<?php echo $payment__id__two; ?>Modal" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- Modal -->
                                                                    <div class="modal fade" id="<?php echo $payment__id__two; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="buildingModalLabel">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                    <h4 class="modal-title" id="myModalLabel">Make a Payment</h4>
                                                                                    <?php if ($payment_details_row->payment_status == 0) {
                                                                                        ?>
                                                                                        <br/><br/>
                                                                                        <button type="button" class="btn btn-lg btn-success">M-Pesa</button>
                                                                                        <button type="button" class="btn btn-lg btn-default">Upload Statement</button>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <br/><br/>
                                                                                        <div class="alert alert-success">
                                                                                            <i class="fa fa-check-circle"></i>
                                                                                            You have already paid for this lease.
                                                                                        </div>
                                                                                    <?php }
                                                                                    ?>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        <?php } else { ?>
                                                            <table class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th aria-label="Amount: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Amount</th>
                                                                        <th aria-label="Payment Status: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Payment Status</th>
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
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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