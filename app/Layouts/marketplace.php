<?php
$this->addCSS([
    'resources/jquery.gritter/css/jquery.gritter.css',
    'resources/bootstrap/dist/css/bootstrap.min.css',
    'resources/font-awesome/css/font-awesome.min.css',
    'resources/select2/dist/css/select2.min.css',
    'resources/bxslider-4/dist/jquery.bxslider.css',
    'resources/owl.carousel/dist/assets/owl.carousel.css',
    'resources/owl.carousel/dist/assets/owl.theme.default.min.css',
    'resources/jquery-ui/themes/base/all.css',
    'resources/app/css/style.css',
    'resources/app/css/custom.css'
], 'prepend');

$this->addJS([
    'resources/jquery/dist/jquery.min.js',
    'resources/bootstrap/dist/js/bootstrap.min.js',
    'resources/select2/dist/js/select2.min.js',
    'resources/bxslider-4/dist/jquery.bxslider.min.js',
    'resources/owl.carousel/dist/owl.carousel.min.js',
    'resources/countdown/jquery.plugin.js',
    'resources/countdown/jquery.countdown.min.js',
    'resources/jquery.actual/jquery.actual.min.js',
    'resources/querystring.js',
    'resources/zewa-paginator/paginator.js',
    'resources/request.js',
    'resources/jquery.gritter/js/jquery.gritter.min.js',
    'resources/app/js/theme-script.js',
    'resources/app/js/app.js'
], 'prepend');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Marketplace</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Page-specific Styles-->
    <?=$this->fetchCSS()?>
</head>
<body class="<?=$this->baseURL() == $this->currentURL() ? 'home ' : ''?>">

<div class="container">

    <div class="row">
        <div class="col-xs-3">
            <a class="logo-link" href="<?=$this->baseURL();?>">
                <img alt="" src="<?=$this->baseURL('resources/app/images/logo.png');?>" />
            </a>
        </div>
        <div class="col-xs-5">
            <br /><br />
            <form action="<?=$this->baseURL('merchandise/product/result')?>">
                <div class="input-group">
                    <input id="product-search-bar" name="q" class="form-control" placeholder="Search rewards..." value="<?=(!empty($search) ? $search : '')?>"/>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <?=_("Search");?>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-xs-2">
            <br /><br />
            Welcome Zech <br />
            Balance: $0.00
        </div>
        <div class="col-xs-2">
            <br /><br />
            View Cart <i class="fa fa-fw fa-shopping-cart"></i> <br />
            Checkout Now
        </div>
    </div>

</div>
<div class="container-fluid">
    <div class="gray-bg">
        <div class="container">

            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" >
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="<?=$this->baseURL();?>">Home</a></li>
                        <li><a href="<?=$this->baseURL('reward');?>">Marketplace</a></li>
                        <li><a href="<?=$this->baseURL('#');?>">How It Works</a></li>
                        <li><a href="<?=$this->baseURL('#');?>">Contact Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </nav>

        </div>
    </div>
</div><!--/.container-fluid -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="welcome-area">
                <p><span class="x2 blue">Welcome</span> to your My Account Marketplace</p>
                <p>Your current balance is: $0.00</p>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <div class="welcome-stationary">
                <img alt="" class="pull-right" src="<?=$this->baseURL('resources/app/images/slider2.jpg');?>" />
            </div>
        </div>
    </div>
</div>

<br /><br />

<?=$this->view?>

<br /><br />
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h5><strong>Membership Rewards General Terms</strong></h5>
            <p>
                <small>
                    When using your prepaid credit card or points for products through My Account Marketplace Rewards Program you are purchasing directly from a merchant, not from the sponsor who issued your card or points. Participating merchants determine (i) product prices and availability, (ii) offers, promotions and applicable restrictions, (iii) estimated shipping and (iv) estimated tax, all of which are subject to change at any time without notice and are only confirmed in the order confirmation email sent by the merchant.
                </small>
            </p>
            <p>
                <small>
                    All offers are valid until 12/31/16 unless otherwise stated on the reward redemption web pages. My Account Marketplace in its sole discretion reserves the right to modify and/or terminate any offer, at any time, for any reason. For accounts that qualify, My Account Prepaid cards or reward points will be deducted for the purchase, including estimated shipping/handling and applicable taxes. Please note: The debit and credit may not appear on your My Account transaction summary for 24 hours.  My Account Marketplace Members that are not in good standing are not eligible to redeem prepaid cards or points.
                </small>
            </p>
            <p>
                <small>
                    Terms and Conditions for the My Account Marketplace Rewards program apply. Visit myaccountmarketplace.com/terms or call XXX for more information. Participating partners and available rewards are subject to change without notice.
                </small>
            </p>
        </div>
    </div>
</div>
<br /><br />
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-8">
                    <ul>
                        <li><a href="<?=$this->baseURL('#');?>">Contact Us</a></li>
                        <li><a href="<?=$this->baseURL('#');?>">Privacy Policy</a></li>
                        <li><a href="<?=$this->baseURL('#');?>">Terms</a></li>
                        <li><a href="<?=$this->baseURL('#');?>">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p class="text-right">&copy; <?=date('Y');?> All Digital Rewards. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    var baseURL = '<?=$this->baseURL()?>';
</script>

<!--Page-Specific Scripts-->
<?=$this->fetchJS()?>
</body>
</html>