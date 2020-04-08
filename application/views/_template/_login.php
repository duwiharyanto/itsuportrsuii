<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url()?>/plugins/images/favicon.ico">
    <title>Login User</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url()?>/plugins/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url()?>/plugins/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url()?>/plugins/css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">           
            <div class="white-box" style="margin-top: 20px">
                <div class="text-center box-title m-b-20">
                    <img src="<?=base_url('/plugins/images/arraymotion.png')?>" style="height: 94px;width: 94px">
                </div>
                <?php if($this->session->flashdata('error')):?>
                <div class="alert alert-danger alert-dismissable ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Username Salah
                </div>                    
                <?php endif;?>
                <form class="form-horizontal form-material" method="POST" id="loginform" action="<?=base_url($onsubmit)?>">                   
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="password" class="form-control" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Lupa password?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="javascript:void(0)" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?= base_url()?>/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>/plugins/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?= base_url()?>/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url()?>/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url()?>/plugins/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url()?>/plugins/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()?>/plugins/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?= base_url()?>/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
