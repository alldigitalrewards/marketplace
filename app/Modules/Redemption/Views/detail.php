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
<div class="container bg-blue">
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

<div class="columns-container">
    <div class="container" id="columns">
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav="false" data-margin="0" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-items="1" data-autoplay="true">
                        <li><a href="<?=$this->baseUrl('marketplace/merchandise')?>"><img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" alt="slide-left"></a></li>
                        <li><a href="<?=$this->baseUrl('marketplace/merchandise')?>"><img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" alt="slide-left"></a></li>
                    </ul>
                </div>
                <!--./left silde-->
                
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="<?=$this->baseURL('resources/app/data/ads-banner.jpg');?>" alt="ads-banner"></a>
                    </div>
                </div>
                <!--./left silde-->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-6">
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
                            <div class="pb-right-column col-xs-12 col-sm-6">
                                <h1 class="product-name"><?=$product->title?></h1>
                                <div class="product-price-group">
                                    <i class="fa fa-tag"></i> <?=$product->title?>
                                </div>
                                <hr/>
                                <div class="product-desc">
                                    <?=$product->description?>
                                </div>
                                 <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart request" href="<?=$this->baseUrl('redemption/ajax/redeem/'.$product->id)?>" class="request">Redeem</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($product->related)): ?>
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">You might also like</h3>
                            <ul class="products product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                
                                <?php foreach($product->related as $relProduct): ?>
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <?php if($product->image_processed): ?>
                                            <a href="<?=$this->baseUrl('redemption/product/detail/'.$relProduct->id)?>">
                                                <img class="img-responsive" alt="product" src="<?=$feedUrl.$relProduct->image_full?>" />
                                            </a>
                                            <?php else: ?>
                                            <a href="<?=$this->baseUrl('redemption/product/detail/'.$relProduct->id)?>">
                                                <img class="img-responsive" alt="product" src="<?=$feedUrl.'no-image.jpg'?>" />
                                            </a>
                                            <?php endif; ?>
                                            <div class="add-to-cart">
                                                <a title="Redeem" class="request" href="<?=$this->baseUrl('redemption/ajax/redeem/'.$relProduct->id)?>">Redeem</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="<?=$this->baseUrl('redemption/product/detail/'.$relProduct->id)?>"><?=substr($relProduct->title,0,20)?></a></h5>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                        <!-- ./box product -->
                        <?php endif; ?>
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>