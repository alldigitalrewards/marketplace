<?php
$this->addCSS([
    'resources/fancybox/source/jquery.fancybox.css'
]);
$this->addJS([
    'resources/elevatezoom/jquery.elevateZoom-2.2.3.min.js',
    'resources/fancybox/source/jquery.fancybox.js'
]);
?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="col-xs-12 col-sm-3">
                <!-- Categories -->
                <h3>Categories</h3>
                <ul class="nav nav-pills nav-stacked">
                <?php if(!empty($categories)): ?>
                <?php $i = 0; ?>
                <?php foreach($categories as $category): ?>
                    <?php 
                    $i++;
                    if($i > 9) {
                        break;
                    }
                    ?>
                    <li role="presentation">
                        <a 
                        href="<?=$this->baseUrl('merchandise/product/result?categoryIds[]='.$category->id)?>">
                            <?=$category->category_name?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
                </ul>
                <!-- ./Categories -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="col-xs-12 col-sm-9">
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
                            <div class="col-xs-12 col-sm-6">
                                <h3><?=$product->title?></h3>
                                <hr/>
                                <div class="product-price-group">
                                    <i class="fa fa-tag"></i> <?=$product->title?>
                                </div>
                                <hr/>
                                <div class="product-desc">
                                    <?=$product->description?>
                                </div>
                                <hr/>
                                <a class="btn btn-default request" href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>" class="request">
                                    <i class="fa fa-shopping-cart"></i> Add to cart
                                </a>
                            </div>
                        </div>
                        <?php if(!empty($product->related)): ?>
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">You might also like</h3>
                            <hr/>
                            <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "15" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4},"1200":{"items":5}}'>
                        
                                <?php foreach($product->related as $product): ?>
                                <li>
                                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                                        <?php if($product->image_processed): ?>
                                        <img src="<?=$feedUrl.$product->image_full;?>" alt="Product">
                                        <?php else: ?>
                                        <img src="<?=$feedUrl.'no-image.jpg'?>" alt="Product">
                                        <?php endif; ?>
                                    </a>
                                    <h5><?=substr($product->title,0,18)?></h5>
                                    <a 
                                        title="Add to cart"
                                        href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>" 
                                        class="btn request">
                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                    </a>
                                    <div class="product-price">
                                        <i class="fa fa-tag"></i> 
                                        <span class="normal-price"><?=$product->credit_cost?></span>
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