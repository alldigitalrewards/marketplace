<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            
            <ul class="step">
                <li><span>Review Cart</span></li>
                <li><span>Shipping Address</span></li>
                <li class="current-step"><span>Complete</span></li>
            </ul>
            <br/>
            <div class="order-detail-content">
                
                <br/>
                <div class="text-center">
                    <img src="<?=$this->baseUrl('resources/app/data/option7/s1.png')?>" alt=""/>
                </div>
                <br/>
                <h2 class="text-center text-info">
                    Your reward is on its way!
                </h2>
                
                 <?php if(!empty($relatedProducts)): ?>
                <!-- box product -->
                <div class="page-product-box">
                    <h3 class="heading">You might also like</h3>
                    <ul class="products product-list owl-carousel" data-dots="false" data-loop="true" data-nav="true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                        
                        <?php foreach($relatedProducts as $relProduct): ?>
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
                
                <hr/>
                
                <div class="cart_navigation">
                    <a class="prev-btn" href="<?=$this->baseURL()?>">Back to shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->