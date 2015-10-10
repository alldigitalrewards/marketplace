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
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">CATEGORIES</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <?php if(!empty($categories)): ?>
                                    <?php foreach($categories as $category): ?>
                                    <li>
                                        <a href="<?=$this->baseUrl('merchandise/product/result?categoryIds[]='.$category->id)?>">
                                            <span><?=$category->category_name?></span>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav="false" data-margin="0" data-autoplayTimeout="1000" data-autoplayHoverPause="true" data-items="1" data-autoplay="true">
                        <li><a href="<?=$this->baseUrl('merchandise')?>"><img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" alt="slide-left"></a></li>
                        <li><a href="<?=$this->baseUrl('merchandise')?>"><img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" alt="slide-left"></a></li>
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
                                        <a class="btn-add-cart request" href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>" class="request">Add to cart</a>
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
                                            <?php if($relProduct->image_processed): ?>
                                            <a href="<?=$this->baseUrl('merchandise/product/detail/'.$relProduct->id)?>">
                                                <img class="img-responsive" src="<?=$feedUrl.$relProduct->image_full;?>" alt="Product">
                                            </a>
                                            <?php else: ?>
                                            <a href="<?=$this->baseUrl('merchandise/product/detail/'.$relProduct->id)?>">
                                                <img class="img-responsive" src="<?=$feedUrl.'no-image.jpg'?>" alt="Product">
                                            </a>
                                            <?php endif; ?>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" class="request" href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$relProduct->id)?>">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="<?=$this->baseUrl('merchandise/product/detail/'.$relProduct->id)?>"><?=substr($relProduct->title,0,20)?></a></h5>
                                            <div class="content_price">
                                                <span class="price product-price"><i class="fa fa-tag"></i> <?=$relProduct->credit_cost?></span>
                                            </div>
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