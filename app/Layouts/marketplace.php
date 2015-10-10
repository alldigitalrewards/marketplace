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
<body class="<?=$this->isHome ? 'home ' : ''?>option7">
<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <!--<div class="nav-top-links">
                <a class="first-item" href="#">Welcome to KuteShop</a>
            </div>-->
            <div class="top-bar-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
            <?php if($isLoggedIn): ?>
            <div class="bolock-cart-topbar" id="cart-block">
                <!--
                <a title="My cart" href="#">Cart<span class="count">2</span></a>
                <div class="cart-block">
                        <div class="cart-block-content">
                            <h5 class="cart-title">2 Items in my cart</h5>
                            <div class="cart-block-list">
                                <ul>
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="http://www.placehold.it/80x80" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice"><i class="fa fa-tag"></i> 40,000</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="http://www.placehold.it/80x80" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice"><i class="fa fa-tag"></i> 20,000</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                            </ul>
                            </div>
                            <div class="toal-cart">
                                <span>Total</span>
                                <span class="toal-price pull-right"><i class="fa fa-tag"></i> 40,000</span>
                            </div>
                            <div class="cart-buttons">
                                <a href="<?=$this->baseURL('merchandise/cart/review')?>" class="btn-check-out">Checkout</a>
                            </div>
                        </div>
                </div>
                -->
            </div>
            <?php endif; ?>
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
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div id="main-header">
        <div class="container main-header">
            <div class="row">
                <div class="col-xs-12 col-sm-3 logo">
                    <a href="<?=$this->baseURL();?>"><img alt="Kute Shop" src="<?=$this->baseURL('resources/app/images/logo.png');?>" /></a>
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
                                    <li class="active"><a href="<?=$this->baseUrl('merchandise')?>">Merchandise</a></li>
                                    <li class=""><a href="<?=$this->baseUrl('redemption')?>">Redemption</a></li>
                                    <!--<li class="dropdown">
                                        <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Games</a>
                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                            <li class="block-container col-sm-4">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<?=$this->baseURL('resources/app/data/men.png');?>" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">MEN'S</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Skirts</a></li>
                                                    <li class="link_container"><a href="#">Jackets</a></li>
                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                    <li class="link_container"><a href="#">Scarves</a></li>
                                                    <li class="link_container"><a href="#">Pants</a></li>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-4">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<?=$this->baseURL('resources/app/data/women.png');?>" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">WOMEN'S</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Skirts</a></li>
                                                    <li class="link_container"><a href="#">Jackets</a></li>
                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                    <li class="link_container"><a href="#">Scarves</a></li>
                                                    <li class="link_container"><a href="#">Pants</a></li>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-4">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<?=$this->baseURL('resources/app/data/kid.png');?>" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Kids</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Shoes</a></li>
                                                    <li class="link_container"><a href="#">Clothing</a></li>
                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                    <li class="link_container"><a href="#">Scarves</a></li>
                                                    <li class="link_container"><a href="#">Accessories</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- END MANIN HEADER -->
    <div class="service-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="item">
                        <a href="#">
                            <img src="<?=$this->baseUrl('resources/app/data/option7/s1.png')?>" alt="Service">
                            <span>Worldwide Delivery</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="item">
                        <a href="#">
                            <img src="<?=$this->baseUrl('resources/app/data/option7/s2.png')?>" alt="Service">
                            <span>24/7 Help Center</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="item">
                        <a href="#">
                            <img src="<?=$this->baseUrl('resources/app/data/option7/s3.png')?>" alt="Service">
                            <span>shop with confidence</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="item">
                        <a href="#">
                            <img src="<?=$this->baseUrl('resources/app/data/option7/s4.png')?>" alt="Service">
                            <span>Safe Payment</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="btn-open-mobile home-page"><i class="fa fa-bars"></i></span>
                        <span class="title-menu">Categories</span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            <?php $i = 0; ?>
                            <?php foreach($categories as $category): ?>
                            <?php $i++; ?>
                            <li<?=($i > 11) ? ' class="cat-link-orther"' : ''?>>
                                <a href="<?=$this->baseUrl('merchandise/product/result?categoryIds[]='.$category->id)?>"<?=(!empty($category->products) ? ' class="parent"' : '')?>>
                                    <!--<img class="icon-menu" alt="Funky roots" src="<?=$this->baseURL('resources/app/data/'.rand(1,15).'.png');?>">-->
                                    <?=$category->category_name?>
                                </a>
                                <?php if(!empty($category->products)): ?>
                                <div class="vertical-dropdown-menu">
                                    <div class="vertical-groups col-sm-12">
                                            <div class="mega-group col-sm-12">
                                                <h4 class="mega-group-header">
                                                    <a href="<?=$this->baseUrl('merchandise/product/result?categoryIds[]='.$category->id)?>">
                                                    <span><?=$category->category_name?></span>
                                                    </a>
                                                </h4>
                                                <div class="row mega-products">
                                                    
                                                    <?php $o = 0; ?>
                                                    <?php foreach($category->products as $product): ?>
                                                    <?php $o++; ?>
                                                    <?php if ($o > 4) {break;}?>
                                                    <div class="col-sm-3 mega-product">
                                                        <div class="product-avatar">
                                                            <?php if($product->image_processed): ?>
                                                            <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.$product->image_full;?>" alt="Product"></a>
                                                            <?php else: ?>
                                                            <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.'no-image.jpg'?>" alt="Product"></a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="product-name">
                                                            <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><?=substr($product->title,0,23)?></a>
                                                        </div>
                                                        
                                                        <div class="product-price">
                                                            <i class="fa fa-tag"></i> <?=$product->credit_cost?>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <?php endif; ?>
                            </li>
                            
                            <?php endforeach; ?>
                        </ul>
                        <div class="all-category"><span class="open-cate">All Categories</span></div>
                    </div>
                </div>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9 formsearch-option4">
                    <form class="form-inline" action="<?=$this->baseURL('merchandise/product/result')?>">
                          <div class="input-group input-serach">
                            <input class="height-40" id="product-search-bar" type="text" name="q" placeholder="Type Your Keyword..." value="<?=$search?>">
                          </div>
                          <button type="submit" class="pull-right btn-search input-group-addon margin-right-15 cancel-border"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
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
                                     <li><a class="location" href="#"><span class="address">Address:</span>2046 Blue Spruce Lane Laurel, tetxac, Orton Tolanto, Canada</a></li>
                                     <li><a class="phone" href="#"><span>Phone:</span>0200 410-369-3920</a></li>
                                     <li><a class="mobile" href="#"><span>Hotline:</span> 090 999 8686</a></li>
                                     <li><a class="email" href="#"><span>Email:</span>nfo@kutethemes.com</a></li>
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
                                 Copyright © 2015 KuteShop. All Rights Reserved. Designed by: KuteThemes
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

<!-- Script-->
<script type="text/javascript" src="<?=$this->baseURL('resources/jQuery/dist/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/select2/dist/js/select2.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/bxslider-4/dist/jquery.bxslider.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/owl.carousel/dist/owl.carousel.min.js');?>"></script>

<!-- COUNTDOWN -->
<script type="text/javascript" src="<?=$this->baseURL('resources/countdown/jquery.plugin.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/countdown/jquery.countdown.min.js');?>"></script>
<!-- ./COUNTDOWN -->

<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/jquery.actual.min.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/theme-script.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/option4.js');?>"></script>

<!--Paginator-->
<script type="text/javascript" src="<?=$this->baseURL('resources/querystring.js');?>"></script>
<script type="text/javascript" src="<?=$this->baseURL('resources/paginator.js');?>"></script>
<!--./Paginator-->

<!--Request-->
<script type="text/javascript" src="<?=$this->baseURL('resources/request.js');?>"></script>
<!--./Request-->

<!--Good 'Ol Griiter :'D-->
<script type="text/javascript" src="<?=$this->baseURL('resources/jquery.gritter/js/jquery.gritter.min.js');?>"></script>
<!--./Gritter-->

<script type="text/javascript" src="<?=$this->baseURL('resources/app/js/app.js');?>"></script>

<?=$this->fetchJS()?>

</body>
</html>