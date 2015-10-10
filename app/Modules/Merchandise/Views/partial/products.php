<?php if(!empty($products)): ?>
    <?php foreach($products as $product): ?>
    <li class="col-sx-12 col-sm-4">
        <div class="product-container">
            <div class="left-block">
                <?php if($product->image_processed): ?>
                <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                    <img class="img-responsive" style="width: auto; height: 200px;" src="<?=$feedUrl.$product->image_full;?>" alt="Product">
                </a>
                <?php else: ?>
                <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                    <img class="img-responsive" style="width: auto; height: 200px;" src="<?=$feedUrl.'no-image.jpg'?>" alt="Product">
                </a>
                <?php endif; ?>
                <div class="add-to-cart">
                    <a 
                        title="Add to Cart" 
                        class="request" 
                        href="<?=$this->baseUrl('merchandise/ajax/addToCart/'.$product->id)?>">Add to Cart</a>
                </div>
            </div>
            <div class="right-block">
                <h5 class="product-name"><a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id);?>"><?=substr($product->title,0,20)?></a></h5>

                <div class="content_price">
                    <i class="fa fa-tag"><?=$product->credit_cost?></i>
                </div>
                <div class="info-orther">
                    <!--<p>Item Code: #453217907</p>-->
                    <p class="availability">Availability: <span><?=$product->quantity ? 'In Stock' : 'Out of stock'?></span></p>
                    <div class="product-desc">
                        <?=$product->description?>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<?php endif; ?>