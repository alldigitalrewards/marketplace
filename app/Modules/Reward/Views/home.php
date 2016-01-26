
<br/>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-3">
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
        </div>
        <div class="col-xs-12 col-md-9">
            <div id="home-slider">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                          <li><img alt="" src="<?=$this->baseURL('resources/app/images/slider1.jpg');?>"/></li>
                          <li><img alt="" src="<?=$this->baseURL('resources/app/images/slider1.jpg');?>"/></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Home slideder-->

<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="banner-opacity"><a href="#"><img src="<?=$this->baseUrl('resources/app/images/b1.jpg')?>" alt="Banner"></a></div>
        </div>
        <div class="col-xs-6">
            <div class="banner-opacity"><a href="#"><img src="<?=$this->baseUrl('resources/app/images/b2.jpg')?>" alt="Banner"></a></div>
        </div>
    </div>
</div>

<?php if ( ! empty ( $hotPicks ) ) : ?>
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
                        
                        <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "15" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4},"1200":{"items":5}}'>
                            
                            <?php foreach($hotPicks as $product): ?>
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
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- ./Hot deals -->
<?php endif; ?>

<div class="box-products fashion">
    <div class="container">
        <div class="box-product-head">
            <div class="box-product-head-left">
                <div class="box-title">
                    <span class="icon"><img src="<?=$this->baseUrl('resources/app/images/i1.png')?>" alt="icon"></span>
                    <span class="text">Featured</span>
                </div>
            </div>
            <div class="box-product-head-right"></div>
        </div>
        <div class="box-produts-content">
            <div class="block-product-right">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                        <?php if(!empty($featuredProducts)): ?>
                        <ul class="thumbnail-list">
                            <?php foreach($featuredProducts as $product): ?>
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
                        <?php else: ?>
                        No products are avialable at this time
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>