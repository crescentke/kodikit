<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Edit Property</title>


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
                                        <li class=""><a href="<?php echo base_url('home/user'); ?>">Users</a></li>
                                        <li class=""><a href="<?php echo base_url('home/usergroup'); ?>">User Groups</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($a_property > 0 || $e_property > 0 || $v_property > 0 || $c_property > 0) { ?>
                                <li class="has_sub">
                                    <a href="#" class="active"><i class="fa fa-home"></i><span> Properties </span> 
                                        <i class="fa fa-chevron-right pull-right"></i> 
                                    </a>
                                    <ul class="list-unstyled">
                                        <?php if ($a_property > 0 || $e_property > 0) { ?>
                                            <li><a href="<?php echo base_url('home/category'); ?>">Categories</a></li>
                                        <?php } ?>
                                        <li class="active"><a href="<?php echo base_url('home/property'); ?>">Properties</a></li>
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
                        foreach ($property as $property_row) {
                            $property__id = $property_row->property_id;
                            $property__id__one = urlencode(base64_encode($property__id));
                            $property__name = $property_row->name;
                            $property__category = $property_row->category;
                            $property__address = $property_row->address;
                            $property__agency = $property_row->agency;

                            $current_landlord = $this->Crudmod->s_where_one('user', 'user_id', $property_row->landlord);
                            foreach ($current_landlord as $current_landlord_row) {
                                $landlord__username = $current_landlord_row->username;
                                $landlord__userid = $current_landlord_row->user_id;
                            }
                        }
                        ?>
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Properties </h4>
                                    <ol class="breadcrumb">
                                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                        <li><a href="<?php echo base_url('home/property'); ?>">Properties</a></li>
                                        <li class="active"><?php echo $property__name; ?></li>
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
                                        <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Property</h3>
                                    </div>

                                    <div class="panel-body" id="edit-user-group">
                                        <div class="min-h">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a class="btn-default" href="#<?php echo $property__id; ?>Details" aria-controls="<?php echo $property__id; ?>Details" role="tab" data-toggle="tab">
                                                        Details
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="#<?php echo $property__id; ?>Update" aria-controls="<?php echo $property__id; ?>Update" role="tab" data-toggle="tab">
                                                        Buildings
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="<?php echo $property__id; ?>Details">
                                                    <form method="post" action="<?php
                                                    if ($a_property < 0 || $e_property < 0) {
                                                        echo base_url('home/update_property');
                                                    } else {
                                                        
                                                    }
                                                    ?>" id="">
                                                        <input type="hidden" name="vid" id="vid" value="<?php echo $property__id__one; ?>">
                                                        <input type="hidden" name="plandlord_id" id="plandlord_id" value="<?php echo $landlord__userid; ?>">
                                                        <input type="hidden" name="uid" id="uid" value="<?php echo $user_id; ?>">
                                                        <div class="form-group">
                                                            <label for="pname">Property Name</label>
                                                            <input value="<?php echo $property__name; ?>" type="text" class="form-control" name="pname" id="pname" required="" placeholder="Property Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pcategory">Property Category</label>
                                                            <select name="pcategory" id="pcategory" required="" class="form-control" placeholder="Choose property category">
                                                                <optgroup label="You can only one">
                                                                    <option value="<?php echo $property__category; ?>"><?php echo $property__category; ?></option>
                                                                    <?php
                                                                    if (count($property_group) > 0) {
                                                                        foreach ($property_group as $property_group_row):
                                                                            $property_group_name = $property_group_row->name;
                                                                            ?>
                                                                            <option value="<?php echo $property_group_name; ?>"><?php echo $property_group_name; ?></option>

                                                                            <?php
                                                                        endforeach;
                                                                    }else {
                                                                        ?>
                                                                        <option disabled="">No records found!</option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="plandlord">Property Landlord</label>
                                                            <input value="<?php echo $landlord__username; ?>" type="text" class="form-control" name="plandlord" id="plandlord" required="" placeholder="Property Landlord">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paddress">Location</label>
                                                            <input value="<?php echo $property__address; ?>" type="text" class="form-control" name="paddress" id="paddress" required="" placeholder="Location">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <?php
                                                            if ($a_property > 0 || $e_property > 0) {
                                                                ?>                                                                    
                                                                <button type="submit" class="btn btn-success ">Save changes</button>
                                                                <?php
                                                            } else {
                                                                
                                                            }
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="<?php echo $property__id; ?>Update">
                                                    <?php if ($a_property > 0 || $e_property > 0) { ?>

                                                        <a href="#new-building"  data-toggle="modal" data-target="#buildingModal">Create a new building</a>
                                                        <br/> <br/>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="buildingModal" tabindex="-1" role="dialog" aria-labelledby="buildingModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel">Create a new Building</h4>
                                                                    </div>
                                                                    <form method="post" action="<?php echo base_url("home/create_building"); ?>">
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="propid" id="propid" value="<?php echo $property__id; ?>">
                                                                            <div class="form-group">
                                                                                <label for="bname">Building Name</label>
                                                                                <input type="text" class="form-control" name="bname" id="bname" placeholder="Building Name" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="bhouses">Number of Houses</label>
                                                                                <input type="number" class="form-control" name="bhouses" id="bhouses" placeholder="Number of Houses" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class = "dataTables_wrapper form-inline dt-bootstrap no-footer" id = "datatable-buttons_wrapper">
                                                        <?php if (count($buildings) > 0) {
                                                            ?>
                                                            <table aria-describedby="datatable-buttons_info" role="grid" id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th aria-label="Building Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Building Name</th>
                                                                        <th aria-label="Number of Houses: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Number of Houses</th>
                                                                        <th aria-label="Action: activate to sort column ascending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($buildings as $buildings_row):
                                                                        $building__id = $buildings_row->building_id;
                                                                        $building__id__two = urlencode(base64_encode($building__id));
                                                                        $buildig__name = $buildings_row->name;
                                                                        $number__of__houses = $buildings_row->number_of_houses;
                                                                        ?>
                                                                        <tr class="odd" role="row">
                                                                            <td tabindex="0" class="sorting_1"><?php echo $buildig__name; ?></td>
                                                                            <td><?php echo $number__of__houses; ?></td>
                                                                            <td>
                                                                                <a href="<?php echo base_url('home/updatebuilding/' . $building__id__two); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                                            </td>
                                                                        </tr>

                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        <?php } else { ?>
                                                            <table class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th aria-label="Building Name: activate to sort column descending" aria-sort="ascending" style="width: 140px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting_asc">Building Name</th>
                                                                        <th aria-label="Number of Houses: activate to sort column ascending" style="width: 236px;" colspan="1" rowspan="1" aria-controls="datatable-buttons" tabindex="0" class="sorting">Number of Houses</th>
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