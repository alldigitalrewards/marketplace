<?php if(!empty($products)): ?>
<ul class="thumbnail-list">
    <?php foreach($products as $product): ?>
    <li>
        <a href="<?=$this->baseUrl('redemption/product/detail/'.$product->id)?>">
            <?php if($product->image_processed): ?>
            <img src="<?=$feedUrl.$product->image_full;?>" alt="Product">
            <?php else: ?>
            <img src="<?=$feedUrl.'no-image.jpg'?>" alt="Product">
            <?php endif; ?>
        </a>
        <h5><?=substr($product->title,0,18)?></h5>
        <a 
            title="Redeem"
            href="<?=$this->baseUrl('redemption/ajax/redeem/'.$product->id)?>" 
            class="btn request">
            <i class="fa fa-shopping-cart"></i> Redeem
        </a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>