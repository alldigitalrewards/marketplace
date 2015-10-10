<?php $this->isHome = true; ?>
<!-- Home slideder -->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="header-top-right-wapper">
                    <div class="homeslider">
                        <div class="content-slide">
                            <ul id="contenhomeslider">
                              <li><img alt="" src="<?=$this->baseURL('resources/app/data/slider1.jpg');?>"/></li>
                              <li><img alt="" src="<?=$this->baseURL('resources/app/data/slider1.jpg');?>"/></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Home slideder-->
<!-- top banner -->
<div class="group-banner4">
    <div class="container">
        <ul class="list-banner">
            <li>
                <div class="banner-opacity"><a href="#"><img src="<?=$this->baseUrl('resources/app/data/b1.jpg')?>" alt="Banner"></a></div>
            </li>
            <li>
                <div class="banner-opacity"><a href="#"><img src="<?=$this->baseUrl('resources/app/data/b2.jpg')?>" alt="Banner"></a></div>
            </li>
        </ul>
    </div>
</div>
<!-- ./top banner -->
<!-- Hot deals -->
<div class="hot-deals-row">
    <div class="container">
        <div class="hot-deals-box">
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2">
                    <div class="hot-deals-tab">
                        <div class="hot-deals-title vertical-text">
                            <span>h</span>
                            <span>o</span>
                            <span>t</span>
                            <span class="yellow">p</span>
                            <span class="yellow">i</span>
                            <span class="yellow">c</span>
                            <span class="yellow">k</span>
                            <span class="yellow">s</span>
                        </div>
                         <div class="hot-deals-tab-box">
                            <div class="box-count-down">
                                <span class="countdown-lastest" data-y="2019" data-m="9" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-10 col-lg-10 hot-deals-tab-content-col">
                    
                    <div class="hot-deals-tab-content tab-container">
                        <ul class="products owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "15" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4},"1200":{"items":5}}'>
                            
                            <?php foreach($hotPicks as $product): ?>
                            <li class="product">
                                <div class="product-container">
                                    <div class="product-image">
                                        <?php if($product->image_processed): ?>
                                        <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.$product->image_full;?>" alt="Product"></a>
                                        <?php else: ?>
                                        <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.'no-image.jpg'?>" alt="Product"></a>
                                        <?php endif; ?>
                                        <div class="group-tool-button">
                                            <a class="cart request" href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>">cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name"><a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><?=substr($product->title,0,23)?></a></h5>

                                        <div class="box-price">
                                            <span class="product-price"><i class="fa fa-tag"></i> <?=$product->credit_cost?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                            
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- ./Hot deals -->

<div class="box-products fashion">
    <div class="container">
        <div class="box-product-head">
            <div class="box-product-head-left">
                <div class="box-title">
                    <span class="icon"><img src="<?=$this->baseUrl('resources/app/data/option7/i1.png')?>" alt="icon"></span>
                    <span class="text">Featured</span>
                </div>
            </div>
            <div class="box-product-head-right">
                <ul class="box-tabs nav-tab">
                    <li class="active"><a data-toggle="tab" href="#tab-1">Best sellers</a></li>
                    <?php if(!empty($featuredProducts)): ?>
                    <li><a data-toggle="tab" href="#tab-2">Most Reviews</a></li>
                    <?php endif; ?>
                </ul>
                <div id="elevator-1" class="floor-elevator">
                    <a href="#elevator-1" class="btn-elevator up fa fa-angle-up"></a>
                    <a href="#elevator-2" class="btn-elevator down fa fa-angle-down"></a>
                </div>
            </div>
        </div>
        <div class="box-produts-content">
            <div class="block-product-left">
                <div class="block-sub-cat owl-carousel" data-items="1" data-nav="true" data-loop="true" data-dots="false">
                    <ul class="list-cat">
                        <li><a href="#">Summer Dresses</a></li>
                        <li><a href="#">Casual Dresses</a></li>
                        <li><a href="#">Blouses</a></li>
                        <li><a href="#">Skirts</a></li>
                        <li><a href="#">Jumpsuits</a></li>
                        <li><a href="#">T-Shirts</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Bikinis</a></li>
                        <li><a href="#">Sunglasses</a></li>
                        <li><a href="#">Scarves</a></li>
                        <li><a href="#">Coats & Jackets</a></li>
                        <li><a href="#">Hosiery & Socks</a></li>
                        <li><a href="#">Hair Accessories</a></li>
                        <li><a href="#">Jeans</a></li>
                    </ul>
                    <ul class="list-cat">
                        <li><a href="#">Summer Dresses</a></li>
                        <li><a href="#">Casual Dresses</a></li>
                        <li><a href="#">Blouses</a></li>
                        <li><a href="#">Skirts</a></li>
                        <li><a href="#">Jumpsuits</a></li>
                        <li><a href="#">T-Shirts</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Bikinis</a></li>
                        <li><a href="#">Sunglasses</a></li>
                        <li><a href="#">Scarves</a></li>
                        <li><a href="#">Coats & Jackets</a></li>
                        <li><a href="#">Hosiery & Socks</a></li>
                        <li><a href="#">Hair Accessories</a></li>
                        <li><a href="#">Jeans</a></li>
                    </ul>
                </div>
                <div class="block-box-products-banner banner-img">
                    <a href="#"><img src="<?=$this->baseUrl('resources/app/data/b3.jpg')?>" alt="Banner"></a>
                </div>
            </div>
            <div class="block-product-right">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                        <?php if(!empty($featuredProducts)): ?>
                        <ul class="products">
                            <?php foreach($featuredProducts as $product): ?>
                            <li class="product">
                                <div class="product-image">
                                    <?php if($product->image_processed): ?>
                                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.$product->image_full;?>" alt="Product"></a>
                                    <?php else: ?>
                                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.'no-image.jpg'?>" alt="Product"></a>
                                    <?php endif; ?>
                                    <div class="group-tool-button">
                                        <a class="cart request" href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>">cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name"><a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><?=substr($product->title,0,23)?></a></h5>
                                    <div class="box-price">
                                        <span class="product-price"><i class="fa fa-tag"></i> <?=$product->credit_cost?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        No products are avialable at this time
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($featuredProducts)): ?>
                    <div id="tab-2" class="tab-panel">
                        <ul class="products">
                            <?php foreach($featuredProducts as $product): ?>
                            <li class="product">
                                <div class="product-image">
                                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img src="<?=$feedUrl.$product->image_full;?>" alt="Product"></a>
                                    <div class="group-tool-button">
                                        <a class="cart request" href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>">cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name"><a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><?=substr($product->title,0,23)?></a></h5>
                                    <div class="box-price">
                                        <span class="product-price"><i class="fa fa-tag"></i> <?=$product->credit_cost?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>