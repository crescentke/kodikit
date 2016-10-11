<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="">
            <div class="pull-left">
                <button class="button-menu-mobile open-left">
                    <i class="md md-menu"></i>
                </button>
                <span class="clearfix"></span>
            </div>

            <?php
            $logged_in_as = $this->Crudmod->s_where_one("user_group", "user_group_id", $user_group_id);
            foreach ($logged_in_as as $logged_in_as_row) {
                $logged = $logged_in_as_row->name;
            }
            ?>
            <div class="pull-left hidden-lg hidden-md">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-bars"></i>
                </button>
                <span class="clearfix"></span>
            </div>
            <ul style="margin-left: -30px;" class="nav navbar-nav hidden-xs hidden-sm">
                <li>
                    <a>Logged in as <i class="fa fa-cog"></i> <?php echo $logged; ?></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="hidden-xs hidden-sm">
                    <a href="mailto:help@kodikit.com" class=""><i
                            class="fa fa-question-circle"></i><span> Help </span></a>
                </li>
                <li><a href="<?php echo base_url('home/logout'); ?>"> <i class="fa fa-power-off"></i> Logout </a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>