<!DOCTYPE html>
<html>
<head>
    <title>Marketplace</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Plugin Styles-->
    <link rel="stylesheet" href="<?=$this->baseURL('resources/jquery.gritter/css/jquery.gritter.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/bootstrap/dist/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/font-awesome/css/font-awesome.min.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/select2/dist/css/select2.min.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/bxslider-4/dist/jquery.bxslider.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/owl.carousel/dist/assets/owl.carousel.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/owl.carousel/dist/assets/owl.theme.default.min.css');?>" />
    <link rel="stylesheet" href="<?=$this->baseURL('resources/jquery-ui/themes/base/all.css');?>" />
    
    <!--Application Styles-->
    <link rel="stylesheet" href="<?=$this->baseURL('resources/app/css/style2.css');?>" />
    
    <!--Custom Styles-->
    <link rel="stylesheet" href="<?=$this->baseURL('resources/app/css/custom.css');?>" />
    
    <!--Page-specific Styles-->
    <?=$this->fetchCSS()?>
</head>
<body class="<?=$this->baseURL() == $this->currentURL() ? 'home ' : ''?>">

<!--Navigation-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo-link" href="<?=$this->baseURL();?>">
        <img alt="" src="<?=$this->baseURL('resources/app/images/logo.png');?>" />
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?=$this->baseUrl('merchandise/product')?>">Merchandise</a></li>
            <li><a href="<?=$this->baseUrl('redemption/product')?>">Redemption</a></li>
        </ul>
      
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" 
                class="dropdown-toggle" 
                data-toggle="dropdown" 
                role="button" 
                aria-haspopup="true" 
                aria-expanded="false">
                   <span class="caret"></span>
                   My Account
               </a>
              <ul class="dropdown-menu">
                <li><a href="<?=$this->baseUrl('merchandise/cart/review')?>">Review Cart</a></li>
                <li><a href="<?=$this->baseUrl('account/home')?>">Settings</a></li>
                <li><a href="<?=$this->baseUrl('account/home/logout')?>">Logout</a></li>
              </ul>
            </li>
        </ul>
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--./Navigation-->

<!--Product search-->
<div class="container">
    <form action="<?=$this->baseURL('merchandise/product/result')?>">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-6">
                
                <div class="input-group">
                    <input 
                        id="product-search-bar" 
                        name="q" 
                        class="form-control input-md" 
                        placeholder="Search Products..."
                        value="<?=$search?>"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-md" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
                  
            </div>
        </div>
    </form>
</div>
<!--./Product Search-->

<br/>

<!--Services-->
<div class="container">
            
    <div class="row bg-fill">
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <img src="<?=$this->baseUrl('resources/app/images/s1.png')?>" alt="Service">
                <span>Worldwide Delivery</span>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <img src="<?=$this->baseUrl('resources/app/images/s2.png')?>" alt="Service">
                <span>24/7 Help Center</span>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <img src="<?=$this->baseUrl('resources/app/images/s3.png')?>" alt="Service">
                <span>shop with confidence</span>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <img src="<?=$this->baseUrl('resources/app/images/s4.png')?>" alt="Service">
                <span>Safe Payment</span>
            </a>
        </div>
    </div>    
            
</div>
<!--./Services-->

<br/>

<?=$this->view?>

<!-- Footer -->
<footer class="bg-fill">
    <!-- footer paralax-->
    <div class="footer-row">
     <div class="container">
         <div class="row">
             <div class="col-sm-6 col-md-3">
                 <h3>INFORMATION</h3>
                 <ul>
                     <li><a class="location" href="#"><span class="address">Address:</span>349 Lake Havasu Ave South Suite 104</a></li>
                     <li><a class="phone" href="#"><span>Phone:</span> 866-551-5794</a></li>
                     <li><a class="email" href="#"><span>Email:</span>support@alldigitalrewards.com</a></li>
                 </ul>
             </div>
             <div class="col-sm-3">
                 <h3>COMPANY</h3>
                 <ul>
                     <li><a href="#">About Us</a></li>
                     <li><a href="#">Testimonials</a></li>
                     <li><a href="#">Affiliate Program</a></li>
                     <li><a href="#">Terms & Conditions</a></li>
                     <li><a href="#">Contact Us</a></li>
                 </ul>
             </div>
             <div class="col-sm-3">
                 <h3>MY ACCOUNT</h3>
                 <ul>
                     <li><a href="#">My Orders</a></li>
                     <li><a href="#">My Credit Slips</a></li>
                     <li><a href="#">My Addresses</a></li>
                     <li><a href="#">My Personal Info</a></li>
                     <li><a href="#">Specials</a></li>
                 </ul>
             </div>
             <div class="col-sm-6 col-md-3">
                 <h3>SUPPORT</h3>
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
    </div>
</footer>

<script>
    var baseURL = '<?=$this->baseURL()?>';
</script>

<!-- Application Dependencies-->
<script src="<?=$this->baseURL('resources/jquery/dist/jquery.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/select2/dist/js/select2.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/bxslider-4/dist/jquery.bxslider.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/owl.carousel/dist/owl.carousel.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/countdown/jquery.plugin.js');?>"></script>
<script src="<?=$this->baseURL('resources/countdown/jquery.countdown.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/jquery.actual/jquery.actual.min.js');?>"></script>
<script src="<?=$this->baseURL('resources/querystring.js');?>"></script>
<script src="<?=$this->baseURL('resources/zewa-paginator/paginator.js');?>"></script>
<script src="<?=$this->baseURL('resources/request.js');?>"></script>
<script src="<?=$this->baseURL('resources/jquery.gritter/js/jquery.gritter.min.js');?>"></script>

<!--Application Theme Scripts-->
<script src="<?=$this->baseURL('resources/app/js/theme-script.js');?>"></script>

<!--Application Logic Scripts-->
<script src="<?=$this->baseURL('resources/app/js/app.js');?>"></script>

<!--Page-Specific Scripts-->
<?=$this->fetchJS()?>
</body>
</html>