<?php
$this->addCSS([
    'resources/fancybox/source/jquery.fancybox.css'
]);
$this->addJS([
    'resources/elevatezoom/jquery.elevateZoom-2.2.3.min.js',
    'resources/fancybox/source/jquery.fancybox.js'
]);
?>
<!--Redemption Progress-->
<div class="container bg-fill-blue">
    <div class="row bs-wizard">    
        <div class="col-xs-3 bs-wizard-step complete">
          <div class="text-center bs-wizard-stepnum">Redemption Code</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step active">
          <div class="text-center bs-wizard-stepnum">Prize Selection</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled">
          <div class="text-center bs-wizard-stepnum">Shipping Address</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled">
          <div class="text-center bs-wizard-stepnum">Place Order</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
    </div>
</div>
<!--./Redemption Progress-->

<div class="container">
    <!-- row -->
    <div class="row">
        <!-- Left colunm -->
        <div class="col-xs-3">
            <a href="<?=$this->baseURL('merchandise/home')?>">
                <img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" class="img-responsive" alt="ads-banner">
            </a>
        </div>
        <!-- ./left colunm -->
        <!-- Center colunm-->
        <div class="col-xs-9">
            <!-- Product -->
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <!-- product-imge-->
                    <div class="product-image">
                        <div class="product-full">
                            <?php if($product->image_processed): ?>
                            <img id="product-zoom" src='<?=$feedUrl.$product->image_full?>' data-zoom-image="<?=$feedUrl.$product->image_full?>"/>
                            <?php else: ?>
                            <img id="product-zoom" src='<?=$feedUrl.'no-image.jpg'?>' data-zoom-image="<?=$feedUrl.'no-image.jpg'?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- product-imge-->
                </div>
                <br/>
                <div class="col-xs-12 col-sm-6">
                    <h1 class="product-name"><?=$product->title?></h1>
                    <div class="product-price-group">
                        <i class="fa fa-tag"></i> <?=$product->title?>
                    </div>
                    <hr/>
                    <div class="product-desc">
                        <?=$product->description?>
                    </div>
                    <hr/>
                    <a class="btn btn-default pull-right request" href="<?=$this->baseUrl('merchandise/ajax/redeem/'.$product->id)?>" class="request">
                        <i class="fa fa-shopping-cart"></i> Redeem
                    </a>
                </div>
            </div>
            <!-- Product -->
        </div>
        <!-- ./ Center colunm -->
    </div>
    <!-- ./row-->
</div>