<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/jquery.gritter/css/jquery.gritter.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/bootstrap/dist/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/font-awesome/css/font-awesome.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/select2/dist/css/select2.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/bxslider-4/dist/jquery.bxslider.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/owl.carousel/dist/assets/owl.carousel.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/owl.carousel/dist/assets/owl.theme.default.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/jquery-ui/themes/base/all.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/app/css/animate.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/app/css/reset.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/app/css/style.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/app/css/responsive.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/app/css/option7.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=$this->baseURL('resources/app/css/custom.css');?>" />
    <?=$this->fetchCSS()?>
    <title>Marketplace</title>
</head>
<body class="<?=$this->baseURL() == $this->currentURL() ? 'home ' : ''?>option7">
<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="top-bar-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
            <div id="user-info-top" class="user-info pull-right">
                <?php if($isLoggedIn): ?>
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="<?=$this->baseURL('account/home');?>">Settings</a></li>
                        <li><a href="<?=$this->baseURL('account/home/logout');?>">Logout</a></li>
                        <!--<li><a href="<?=$this->baseURL('merchandise/product/wishlist');?>">Wishlists</a></li>-->
                        <!--<li><a href="<?=$this->baseURL('merchandise/product/compare');?>">Compare</a></li>-->
                    </ul>
                </div>
                <?php else: ?>
                <a href="<?=$this->baseURL('account/home/login');?>">Login</a>
                <?php endif; ?>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div id="main-header">
        <div class="container main-header">
            <div class="row">
                <div class="col-xs-12 col-sm-3 logo logo-redemption">
                    <a href="<?=$this->baseURL();?>"><img alt="" src="<?=$this->baseURL('resources/app/images/logo.png');?>" /></a>
                </div>
                <div id="main-menu" class="col-sm-12 col-md-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class=""><a href="<?=$this->baseUrl('merchandise')?>">Merchandise</a></li>
                                    <li class="active"><a href="<?=$this->baseUrl('redemption')?>">Redemption</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- END MANIN HEADER -->
</div>
<!-- end header -->
<?=$this->view?>
<!-- Footer -->
<footer id="footer2">
     <div class="footer-top">
         <div class="container">
             <div class="row">
                 <div class="col-sm-3">
                     <div class="footer-logo">
                         <a href="#"><img src="<?=$this->baseURL('resources/app/images/logo.png');?>" alt="Logo"></a>
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-6">
                     <div class="footer-menu">       
                         <ul>
                             <li><a href="#">About Us</a></li>
                             <li><a href="#">Affiliates</a></li>
                             <li><a href="#">Careers</a></li>
                             <li><a href="#">Privacy Plocy</a></li>
                             <li><a href="#">Terms of Use</a></li>
                             <li><a href="#">Contact Us</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-3">
                     <div class="form-newsletter">
                         <input placeholder="Please enter your email" class="form-newsletter-input" type="text">
                         <button class="form-newsletter-button">OK</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- footer paralax-->
     <div class="footer-row">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-6 col-md-3">
                         <div class="widget-container widget-contact-info">
                             <h3 class="widget-title">Infomation</h3>
                             <div class="widget-body">
                                 <ul>
                                     <li><a class="mobile" href="#"><span>Hotline:</span> 090 999 8686</a></li>
                                     <li><a class="phone" href="#"><span>Phone:</span> 866-551-5794</a></li>
                                     <li><a class="email" href="#"><span>Email:</span>support@alldigitalrewards.com</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-3 col-md-2">
                         <div class="widget-container">
                             <h3 class="widget-title">COMPANY</h3>
                             <div class="widget-body">
                                 <ul>
                                     <li><a href="#">About Us</a></li>
                                     <li><a href="#">Testimonials</a></li>
                                     <li><a href="#">Affiliate Program</a></li>
                                     <li><a href="#">Terms & Conditions</a></li>
                                     <li><a href="#">Contact Us</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-3 col-md-2">
                         <div class="widget-container">
                             <h3 class="widget-title">my account</h3>
                             <div class="widget-body">
                                 <ul>
                                     <li><a href="#">My Orders</a></li>
                                     <li><a href="#">My Credit Slips</a></li>
                                     <li><a href="#">My Addresses</a></li>
                                     <li><a href="#">My Personal Info</a></li>
                                     <li><a href="#">Specials</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-md-2">
                         <div class="widget-container">
                             <h3 class="widget-title">SUPPORT</h3>
                             <div class="widget-body">
                                 <ul>
                                     <li><a href="#">Payments</a></li>
                                     <li><a href="#">Saved Cards</a></li>
                                     <li><a href="#">Shipping Free</a></li>
                                     <li><a href="#">Cancellation</a></li>
                                     <li><a href="#">Support Online</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-md-3">
                         <div class="widget-container">
                             <h3 class="widget-title">Let's Socialize</h3>
                             <div class="widget-body">
                                 <div class="footer-social">
                                     <ul>
                                         <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                         <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                         <li><a class="vk" href="#"><i class="fa fa-vk"></i></a></li>
                                         <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                         <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="widget-container">
                             <h3 class="widget-title">payment</h3>
                             <div class="widget-body">
                                 <img src="<?=$this->baseURL('resources/app/data/option7/payment.png');?>" alt="Payment">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     <div class="footer-bottom">
             <div class="container">
                 <div class="footer-bottom-wapper">
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="footer-coppyright">
                                 Copyright &copy; <?=date('Y');?> All Digital Rewards. All Rights Reserved.
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     <!-- ./footer paralax-->
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>

<script>
    var baseURL = '<?=$this->baseURL()?>';
</script>

<script type="text/javascript" src="<?=$this->baseURL('resources/jQuery/dist/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/select2/dist/js/select2.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/bxslider-4/dist/jquery.bxslider.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/owl.carousel/dist/owl.carousel.min.js');?>"></script>

<!-- COUNTDOWN -->
<script type="text/javascript" src="<?=$this->baseURL('resources/countdown/jquery.plugin.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/countdown/jquery.countdown.min.js');?>"></script>
<!-- ./COUNTDOWN -->

<!--Paginator-->
<script type="text/javascript" src="<?=$this->baseURL('resources/querystring.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/zewa-paginator/paginator.js');?>"></script>
<!--./Paginator-->

<!--Request-->
<script type="text/javascript" src="<?=$this->baseURL('resources/request.js');?>"></script>
<!--./Request-->

<!--Good 'Ol Griiter :'D-->
<script type="text/javascript" src="<?=$this->baseURL('resources/jquery.gritter/js/jquery.gritter.min.js');?>"></script>
<!--./Gritter-->

<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/jquery.actual.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/option4.js');?>"></script>
<?=$this->fetchJS()?>
<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/theme-script.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/app.js');?>"></script>

</body>
</html>