<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/plugins/images/favicon.ico">
    <title>Halaman Tidak Ditemukan</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url()?>/plugins/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>/plugins/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url()?>/plugins/css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body>
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Halaman yang dicari tidak ditemukan</h3>
                <?php if($this->session->userdata('user_login')):?>
                    <a href="<?=site_url($this->session->userdata('user_dashboard'))?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Kembali</a> 
                <?php else:?>
                    <a href="javascript:void(0)" onclick="javascript:window.history.back()" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Kembali</a>
                <?php endif;?>    
            </div>
            <footer class="footer text-center"><?=date('Y')?>  &copy; Administrator</footer>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?=base_url()?>/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>/plugins/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?=base_url()?>/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>/plugins/js/custom.min.js"></script>
</body>

</html>
