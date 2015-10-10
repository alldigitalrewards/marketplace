<?php if(!empty($products)): ?>
    <?php foreach($products as $product): ?>
    <li class="col-sx-12 col-sm-4">
        <div class="product-container">
            <div class="left-block">
                <?php if($product->image_processed): ?>
                <a href="<?=$this->baseUrl('redemption/product/detail/'.$product->id)?>">
                    <img class="img-responsive" alt="product" src="<?=$feedUrl.$product->image_full?>" />
                </a>
                <?php else: ?>
                <a href="<?=$this->baseUrl('redemption/product/detail/'.$product->id)?>">
                    <img class="img-responsive" alt="product" src="<?=$feedUrl.'no-image.jpg'?>" />
                </a>
                <?php endif; ?>
                <div class="add-to-cart">
                    <a title="Redeem" class="request" href="<?=$this->baseUrl('redemption/ajax/redeem/'.$product->id)?>">Redeem</a>
                </div>
            </div>
            <div class="right-block">
                <h5 class="product-name"><a href="<?=$this->baseUrl('redemption/product/detail/'.$product->id)?>"><?=substr($product->title,0,20)?></a></h5>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<?php endif; ?>