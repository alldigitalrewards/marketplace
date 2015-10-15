<?php if(!empty($rewards)): ?>
<ul class="thumbnail-list">
    <?php foreach($rewards as $product): ?>
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
<?php endif; ?>