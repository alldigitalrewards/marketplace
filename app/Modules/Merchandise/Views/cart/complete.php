<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            
            <div class="order-detail-content">
                <br/>
                <div class="text-center">
                    <img src="<?=$this->baseUrl('resources/app/images/s1.png')?>" alt=""/>
                </div>
                <br/>
                <h2 class="text-center text-info">
                    Your reward is on its way!
                </h2>
                
                 <?php if(!empty($relatedProducts)): ?>
                <!-- box product -->
                <div class="page-product-box">
                    <h3 class="heading">You might also like</h3>
                    <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "15" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4},"1200":{"items":5}}'>
                        
                        <?php foreach($relatedProducts as $product): ?>
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
                
                <hr/>
                
                <a class="btn btn-default" href="<?=$this->baseURL()?>">Back to shopping</a>
                
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->