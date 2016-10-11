<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Edit User</title>


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

                        <?php
                        foreach ($user as $user_row) {
                            $user__id = $user_row->user_id;
                            $user__id__one = urlencode(base64_encode($user__id));
                            $user__name = $user_row->username;
                            $user__fname = $user_row->firstname;
                            $user__lname = $user_row->lastname;
                            $user__email = $user_row->email;
                            

                            if ($user_group_id == 1) {
                                $user_groups = $this->Crudmod->s_tbl('user_group');
                            } else {
                                $user_groups = $this->Crudmod->s_where_not('user_group', 'user_group_id', 1);
                            }
                            
                            $current_group = $this->Crudmod->s_where_one('user_group', 'user_group_id', $user_row->user_group_id);
                            foreach ($current_group as $current_group_row){
                                $user__group__name = $current_group_row->name;
                                $user__group__id = $current_group_row->user_group_id;
                            }
                            
                            if ($user_row->status == 1) {
                                $user__status = "Active";
                                $user__status_value = 1;
                            } else {                                
                                $user__status = "Inactive";
                                $user__status_value = 0;
                            }
                        }
                        ?>
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <ul class="nav nav-tabs pull-right" role="tablist">
                                        <li role="presentation" class="active">
                                            <a class="btn-default" href="#<?php echo $user__id; ?>Details" aria-controls="<?php echo $user__id; ?>Details" role="tab" data-toggle="tab">
                                                <i class="fa fa-info"></i>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#<?php echo $user__id; ?>Update" aria-controls="<?php echo $user__id; ?>Update" role="tab" data-toggle="tab">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="page-title">Users </h4>
                                    <ol class="breadcrumb">
                                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                        <li><a href="<?php echo base_url('home/user'); ?>">Users</a></li>
                                        <li class="active"><?php echo $user__name;?></li>
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
                                        <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit User</h3>
                                    </div>

                                    <div class="panel-body" id="edit-user-group">
                                        <div>

                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="<?php echo $user__id; ?>Details">
                                                    <form method="post" action="<?php echo base_url('home/update_user'); ?>" id="adduser">
                                                        <input type="hidden" name="ur" id="ur" value="<?php echo $url_seg;?>">
                                                        <input type="hidden" name="vid" id="vid" value="<?php echo $viewed_id; ?>">
                                                        <input type="hidden" name="vmail" id="vmail" value="<?php echo $user__email; ?>">
                                                        <input type="hidden" name="vusername" id="vusername" value="<?php echo $user__name; ?>">
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="ufname">First name</label>
                                                                <input value="<?php echo $user__fname;?>" type="text" class="form-control" name="ufname" id="ufname" required="" placeholder="First name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="ulname">Last name</label>
                                                                <input value="<?php echo $user__lname;?>" type="text" class="form-control" name="ulname" id="ulname" required="" placeholder="Last name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="usname">Username</label>
                                                            <input value="<?php echo $user__name;?>" type="text" class="form-control" name="usname" id="usname" required="" placeholder="Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="usgroup">User Group</label>
                                                            <select name="usgroup" id="usgroup" required="" class="form-control" placeholder="Choose user group">
                                                                <optgroup label="You can only one">
                                                                    <option value="<?php echo $user__group__id;?>"><?php echo $user__group__name;?></option>
                                                                    <?php
                                                                    if (count($user_groups) > 0) {
                                                                        foreach ($user_groups as $user_groups_row):
                                                                            $def_user_group_id = $user_groups_row->user_group_id;
                                                                            $def_user_group_name = $user_groups_row->name;
                                                                            ?>
                                                                            <option value="<?php echo $def_user_group_id; ?>"><?php echo $def_user_group_name; ?></option>

                                                                            <?php
                                                                        endforeach;
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uemail">Email</label>
                                                            <input value="<?php echo $user__email;?>" type="text" class="form-control" name="uemail" id="uemail" required="" placeholder="Email address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ustatus">User Status</label>
                                                            <select name="ustatus" id="ustatus" required="" class="form-control" placeholder="Choose user status">
                                                                <optgroup label="You can only one">
                                                                    <option value="<?php echo $user__status_value;?>"><?php echo $user__status;?></option>
                                                                    <option value="<?php echo 1; ?>">Active</option>
                                                                    <option value="<?php echo 0; ?>">Inactive</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="<?php echo $user__id; ?>Update">

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