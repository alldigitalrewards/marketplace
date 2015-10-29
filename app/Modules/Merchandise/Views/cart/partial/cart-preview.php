<a href="<?=$this->baseURL('merchandise/cart/review')?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">    
    <span class="caret"></span> <span class="glyphicon glyphicon-shopping-cart"></span> <?=count($cartItems)?> - Cart
</a>
<?php if(!empty($cartItems)): ?>
<ul class="dropdown-menu dropdown-cart" role="menu">
    <?php $i = 0; ?>
    <?php foreach($cartItems as $product): ?>
    <?php
    $i++;
    if ($i == 9) {
        break;
    }
    ?>
    <li>
        <span class="item">
            <span class="item-left">
                <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                    <?php if($product->image_processed): ?>
                    <img src="<?=$feedUrl.$product->image_thumb;?>" alt="Product">
                    <?php else: ?>
                    <img src="<?=$feedUrl.'no-image.jpg'?>" alt="Product">
                    <?php endif; ?>
                </a>
                <span class="item-info">
                    <span><?=substr($product->title, 0, 18)?><?=strlen($product->title) > 18 ? '...' : ''?></span>
                    <span><i class="fa fa-tag"></i> <?=$product->credit_cost?> X <?=$product->cart_quantity?></span>
                </span>
            </span>
            <span class="item-right">
                <a href="<?=$this->baseURL('merchandise/ajax/removeFromCart/'.$product->id)?>" class="btn btn-xs btn-danger pull-right request">x</a>
            </span>
        </span>
    </li>
    <?php endforeach; ?>
    <li class="divider"></li>
    <?php if(count($cartItems) > 8): ?>
    <li><a class="text-center" href="<?=$this->baseURL('merchandise/cart/review')?>">View All</a></li>
    <?php else: ?>
    <li><a class="text-center" href="<?=$this->baseURL('merchandise/cart/review')?>">Checkout</a></li>
    <?php endif; ?>
</ul>
<?php endif; ?>