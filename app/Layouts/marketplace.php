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

$user = $this->request->session('user');
//var_dump($user);die();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Marketplace</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Page-specific Styles-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
            <form action="<?=$this->baseURL('reward/view')?>">
                <div class="input-group">
                    <input id="product-search-bar" name="title" class="form-control" placeholder="<?=_("Search rewards...");?>" value="<?=(!empty($search) ? $search : '')?>"/>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <?=_("Search");?>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <?php if($user): ?>
        <div class="col-xs-2 text-right">
            <br /><br />
            <?=_("Welcome");?> <a href="<?=$this->baseURL('account');?>"><strong><?=$user->firstname;?></strong></a> <br />
            <?=_("Balance");?>: <strong><?=number_format($user->credits, 0, '', ',');?></strong>
        </div>
        <?php else:?>
            <div class="col-xs-2">
            </div>
        <?php endif;?>
        <div class="col-xs-2 text-right">
            <br /><br />
            <a href="javascript:void(0);" class="cart" data-container="body" data-toggle="popover" data-placement="bottom"><?=_("View Cart");?> <i class="fa fa-fw fa-shopping-cart"></i></a>
            <br />
            <a href="<?=$this->baseURL('checkout/cart/review');?>"><?=_("Checkout Now");?></a>
        </div>
    </div>

</div>
<div class="container-fluid">
    <div class="gray-bg">
        <div class="container">

            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"><?=_("Toggle navigation");?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" >
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_("Categories");?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php $j = 0; foreach($categories as $category) : $j++; ?>
                                <li><a href="<?=$this->baseURL('reward?categoryIds[]=' . $category->id);?>"><?=$category->category_name;?></a></li>
                                <?php if($j > 7): break; endif; ?>
                                <?php endforeach; ?>
                                <li><a href="<?=$this->baseURL('reward');?>"><?=_("View All");?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="<?=$this->baseURL();?>"><?=_("Home");?></a></li>
                        <li><a href="<?=$this->baseURL('reward');?>"><?=_("Marketplace");?></a></li>
                        <li><a href="<?=$this->baseURL('content/faq');?>"><?=_("FAQ");?></a></li>
                        <li><a href="<?=$this->baseURL('content/contact');?>"><?=_("Contact Us");?></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </nav>

        </div>
    </div>
</div><!--/.container-fluid -->

<div class="container">
    <?php if($this->request->getFlashdata('notice')):?>
        <?php $notice = $this->request->getFlashdata('notice');?>
        <div class="row">
            <div class="col-xs-12">
                <p class="alert alert-<?=$notice->type;?>"><?=$notice->message;?></p>
            </div>
        </div>
    <?php endif;?>
</div>


<?=$this->view?>

<br /><br />
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h5><strong><?=_("Membership Rewards General Terms");?></strong></h5>
            <p>
                <small>
                    <?=_("When using your prepaid credit card or points for products through My Account Marketplace Rewards Program you are purchasing directly from a merchant, not from the sponsor who issued your card or points. Participating merchants determine (i) product prices and availability, (ii) offers, promotions and applicable restrictions, (iii) estimated shipping and (iv) estimated tax, all of which are subject to change at any time without notice and are only confirmed in the order confirmation email sent by the merchant.");?>
                </small>
            </p>
            <p>
                <small>
                    <?=_("All offers are valid until 12/31/16 unless otherwise stated on the reward redemption web pages. My Account Marketplace in its sole discretion reserves the right to modify and/or terminate any offer, at any time, for any reason. For accounts that qualify, My Account Prepaid cards or reward points will be deducted for the purchase, including estimated shipping/handling and applicable taxes. Please note: The debit and credit may not appear on your My Account transaction summary for 24 hours.  My Account Marketplace Members that are not in good standing are not eligible to redeem prepaid cards or points.");?>
                </small>
            </p>
            <p>
                <small>
                    <?=_("Terms and Conditions for the My Account Marketplace Rewards program apply. Visit myaccountmarketplace.com/terms or call XXX for more information. Participating partners and available rewards are subject to change without notice.");?>
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
                        <li><a href="<?=$this->baseURL('content/contact');?>"><?=_("Contact Us");?></a></li>
                        <li><a href="<?=$this->baseURL('content/privacy');?>"><?=_("Privacy Policy");?></a></li>
                        <li><a href="<?=$this->baseURL('content/terms');?>"><?=_("Terms");?></a></li>
                        <li><a href="<?=$this->baseURL('content/about');?>"><?=_("About Us");?></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p class="text-right">&copy; <?=date('Y');?> <?=_("All Digital Rewards.");?> <?=_("All Rights Reserved");?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php if(!$user): ?>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myloginModal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myloginModal"><?=_("Login to your account");?></h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="login">

                            <div class="col-xs-6">
                                <div class="well">
                                    <?php $redirect = $this->request->get('r', base64_encode(urlencode($this->currentURI())));?>
                                    <form action="<?=$this->baseURL('account/authenticate?r=' . $redirect);?>" method="post">
                                        <div class="form-group">
                                            <label for="email_address" class="control-label"><?=_("Email Address");?></label>
                                            <input type="text" class="form-control" id="email_address" name="email_address">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label"><?=_("Password");?></label>
                                            <input type="password" class="form-control" id="password" name="password" />
                                        </div>
<!--                                        <div class="checkbox">-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" name="remember" id="remember"> --><?//=_("Remember me");?>
<!--                                            </label>-->
<!--                                            <p class="help-block">(--><?//=_("This is a private computer");?><!--)</p>-->
<!--                                        </div>-->
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-lock"></i> <?=_("Sign In");?></button>
<!--                                        <button type="button" class="btn btn-default btn-block forgot-pass"><i class="fa fa-question"></i> --><?//=_("Forgot password");?><!--</button>-->
                                    </form>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <p class="lead"><?=_("Create an account now, and");?> <span class="text-info"><?=_("get started saving");?></span></p>
                                <ul class="list-unstyled" style="line-height: 2">
                                    <li><span class="fa fa-check text-info"></span> <?=_("See all your orders");?></li>
                                    <li><span class="fa fa-check text-info"></span> <?=_("Fast checkout");?></li>
                                    <li><span class="fa fa-check text-info"></span> <?=_("Get the latest promotions");?></li>

                                    <!--                                <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>-->
                                </ul>
                                <a href="#register" aria-controls="register" role="tab" data-toggle="tab" class="btn btn-default btn-block"><i class="fa fa-check"></i> <?=_("Sign up now!");?></a>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="register">

                            <div class="col-xs-6">
                                <div class="well">
                                    <form action="<?=$this->baseURL('account/create?r=' . base64_encode(urlencode($this->currentURI())));?>" method="post">
                                        <div class="form-group">
                                            <label for="firstname"><?=_("First Name");?></label>
                                            <input id="lastname" name="firstname" type="text" class="form-control full-width">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname"><?=_("Last Name");?></label>
                                            <input id="lastname" name="lastname" type="text" class="form-control full-width">
                                        </div>
                                        <div class="form-group">
                                            <label for="email_register"><?=_("Email Address");?></label>
                                            <input id="email_register" name="email_address" type="text" class="form-control full-width">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><?=_("Password");?></label>
                                            <input id="password" name="password" type="password" class="form-control full-width">
                                        </div>

                                        <br />
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-lock"></i> <?=_("Sign up");?></button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <p class="lead"><?=_("You're one click from your");?> <span class="text-info"><?=_("rewards");?></span></p>
                                <p><?=_("With your reward marketplace, you will have access to premium name brand rewards, and cash rewards alike!");?></p>
                                <a href="#login" aria-controls="login" role="tab" data-toggle="tab" class="btn btn-default btn-block"><?=_("Cancel");?></a>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if($cart): ?>
<div class="cart-content hide">

    <?php $i = 0;?>
    <div class="cart-preview">
        <?php foreach($cart as $reward): $i++; ?>
            <div class="row no-gutter cart-listing">
                <div class="col-xs-3">
                    <a href="<?=$this->baseUrl('reward/view/' . $reward->id)?>">
                        <?php if($reward->image_processed): ?>
                            <img src="<?=$feedURL . $reward->image_thumb;?>" alt="Reward">
                        <?php else: ?>
                            <img src="<?=$feedURL . 'no-image.jpg'?>" alt="Product">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="truncate" href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title;?></a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-3">
                            &times; <?=$reward->cart_quantity?>
                        </div>

                        <div class="col-xs-7 text-right">
                            <i class="fa fa-tag"></i> <?=number_format(bcmul($reward->credit_cost, $reward->cart_quantity), 0, '', ',');?>
                        </div>

                        <div class="col-xs-2">
                            <a href="<?=$this->baseURL('checkout/cart/remove/' . $reward->id);?>" class="btn btn-xs btn-danger pull-right">&times;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php if($i == 5): break; endif;?>
        <?php endforeach; ?>
        <br />
        <?php if($i == 5): ?>
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-block btn-default" href="<?=$this->baseURL('checkout/cart/checkout')?>"><?=_("View All");?></a>
                </div>
            </div>
        <?php endif; ?>
        <a href="<?=$this->baseURL('checkout/cart/review');?>" class="btn btn-block btn-primary"><?=_("Checkout");?></a>
    </div>
</div>
<?php else: ?>

    <div class="modal modal-info fade ajax-modal" id="transactionModal">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php endif; ?>

<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    var baseURL = '<?=$this->baseURL()?>';
</script>
<!--Page-Specific Scripts-->
<?=$this->fetchJS()?>
</body>
</html>