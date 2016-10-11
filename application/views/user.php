<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Users</title>


        <link href="<?php echo base_url("assets/plugins/switchery/switchery.min.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/core.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/components.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/pages.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/menu.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/multiselect/css/multi-select.css"); ?>"  rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("assets/plugins/select2/select2.css"); ?>" rel="stylesheet" type="text/css" />
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
                                    <a href="#" class="active"><i class="fa fa-user"></i> <span> Users </span>
                                        <i class="fa fa-chevron-right pull-right"></i> 
                                    </a>
                                    <ul class="list-unstyled">
                                        <li class="active"><a href="<?php echo base_url('home/user'); ?>">Users</a></li>
                                        <li class=""><a href="<?php echo base_url('home/usergroup'); ?>">User Groups</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($a_property > 0 || $e_property > 0 || $v_property > 0) { ?>
                                <li class="has_sub">
                                    <a href="#" class=""><i class="fa fa-home"></i><span> Properties </span> 
                                        <i class="fa fa-chevron-right pull-right"></i> 
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url('home/category'); ?>">Categories</a></li>
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
                                    <button type="button" data-toggle="modal" data-target="#userGroupModal" class="btn btn-primary pull-right"><i class="fa fa-plus"></i></button>
                                    <h4 class="page-title">Users </h4>
                                    <ol class="breadcrumb">
                                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                        <li class="active">Users</li>
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

                        <!-- user Group Modal -->
                        <div class="modal fade" id="userGroupModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="userModalLabel"><i class="fa fa-edit"></i> Add User</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo base_url('home/create_user'); ?>" id="adduser">
                                            <input type="hidden" name="uid" id="uid" value="<?php echo $user_id; ?>">
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="ufname">First name</label>
                                                    <input type="text" class="form-control" name="ufname" id="ufname" required="" placeholder="First name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="ulname">Last name</label>
                                                    <input type="text" class="form-control" name="ulname" id="ulname" required="" placeholder="Last name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="usname">Username</label>
                                                <input type="text" class="form-control" name="usname" id="usname" required="" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="usgroup">User Group</label>
                                                <select name="usgroup" id="usgroup" required="" class="form-control" placeholder="Choose user group">
                                                    <optgroup label="You can only one">
                                                        <?php
                                                        if (count($user_groups) > 0) {
                                                            foreach ($user_groups as $user_groups_row):
                                                                $user_group_id = $user_groups_row->user_group_id;
                                                                $user_group_name = $user_groups_row->name;
                                                                ?>
                                                                <option value="<?php echo $user_group_id; ?>"><?php echo $user_group_name; ?></option>

                                                                <?php
                                                            endforeach;
                                                        }
                                                        ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="uemail">Username</label>
                                                <input type="text" class="form-control" name="uemail" id="uemail" required="" placeholder="Email address">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default card-box table-responsive">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-users"></i> Users</h3>
                                    </div>

                                    <div class="panel-body">
                                        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable-buttons_wrapper">
                                            <?php if (count($users) > 0) { ?>
                                                <table aria-describedby="datatable-buttons_info" role="grid" id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
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
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/multiselect/js/jquery.multi-select.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-quicksearch/jquery.quicksearch.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/select2/select2.min.js"); ?>" type="text/javascript"></script>


        <!-- Datatables-->
        <script src="<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.bootstrap.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.buttons.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/buttons.bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/jszip.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/pdfmake.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/vfs_fonts.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/buttons.html5.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/buttons.print.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.fixedHeader.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.keyTable.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.responsive.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/responsive.bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.scroller.min.js"); ?>"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url("assets/pages/datatables.init.js"); ?>"></script>

        <!-- Sweet Alert  -->
        <script src="<?php echo base_url("assets/plugins/sweetalert/dist/sweetalert.min.js"); ?>"></script>



        <!-- Custom main Js -->
        <script src="<?php echo base_url("assets/js/jquery.core.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery.app.js"); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable({ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true});
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            });
            TableManageButtons.init();

        </script>
        <script>
            jQuery(document).ready(function () {

                //advance multiselect start
                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                                $selectableSearch = that.$selectableUl.prev(),
                                $selectionSearch = that.$selectionUl.prev(),
                                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                .on('keydown', function (e) {
                                    if (e.which === 40) {
                                        that.$selectableUl.focus();
                                        return false;
                                    }
                                });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                .on('keydown', function (e) {
                                    if (e.which == 40) {
                                        that.$selectionUl.focus();
                                        return false;
                                    }
                                });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });

            });
        </script>


    </body>
</html>