<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Prop </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url("as/css/vendor.css"); ?>">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="<?php echo base_url("as/css/app-orange.css"); ?>">
    </script>
</head>

<body>
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        <div class="logo">
                            <span class="l l1"></span>
                            <span class="l l2"></span>
                            <span class="l l3"></span>
                            <span class="l l4"></span>
                            <span class="l l5"></span>
                        </div>        Prop
                    </h1> </header>
                <div class="error" style="<?php echo $cls;?>">
                    <?php echo $error; ?>
                </div>
                <div class="auth-content">

                    <p class="text-xs-center">LOGIN TO CONTINUE</p>
                    <form id="login-form" action="<?php echo base_url('welcome/login'); ?>" method="POST">
                        <div class="form-group"> <label for="log_username">Username</label> <input type="text" class="form-control underlined" name="log_username" id="log_username" placeholder="Your username" required> </div>
                        <div class="form-group"> <label for="log_password">Password</label> <input type="password" class="form-control underlined" name="log_password" id="log_password" placeholder="Your password" required> </div>
                        <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Login</button> </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Reference block for JS -->
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>
<script src="as/js/vendor.js"></script>
<script src="as/js/app.js"></script>
</body>

</html>