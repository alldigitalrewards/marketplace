<?php $total = 0.00; ?>
<?php $count = empty($cartItems) ? 0 : count($cartItems); ?>
<a title="My cart" href="#">Cart<span class="count"><?=$count?></span></a>
<div class="cart-block">
    <div class="cart-block-content">
        <h5 class="cart-title"><?=$count?> Items in my cart</h5>
        <div class="cart-block-list">
            <ul>
            <?php if(!empty($cartItems)): ?>
            <?php foreach($cartItems as $product): ?>
            <?php $quantityTotal = 0.00 ?>
            <?php for($i = 0; $i < $product->cart_quantity; $i++): ?>
            <?php $total = bcadd($total, $product->credit_cost, 2); ?>
            <?php $quantityTotal = bcadd($quantityTotal, $product->credit_cost, 2); ?>
            <?php endfor; ?>
             <li class="product-info">
                <div class="p-left">
                    <a href="<?=$this->baseUrl('merchandise/ajax/removeFromCart/'.$product->id)?>" class="remove_link request"></a>
                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                    <?php if($product->image_processed): ?>
                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img class="img-responsive" src="<?=$feedUrl.$product->image_full;?>" alt="Product"></a>
                    <?php else: ?>
                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img class="img-responsive" src="<?=$feedUrl.'no-image.jpg'?>" alt="Product"></a>
                    <?php endif; ?>
                    </a>
                </div>
                <div class="p-right">
                    <p class="p-name"><?=$product->title?></p>
                    <p class="p-rice"><i class="fa fa-tag"></i> <?=$quantityTotal?></p>
                    <p>
                        Qty: 
                        <form action="<?=$this->baseUrl('merchandise/ajax/updateProductQuantity/'.$product->id)?>" data-item-alias="product-quantity-form" class="request">
                            <input class="product-quantity-input form-control input-sm" type="text" name="quantity" value="<?=$product->cart_quantity?>">
                        </form>
                    </p>
                </div>
            </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li>Oops, there isn't anything in your cart!</li>
            <?php endif; ?>
        </ul>
        </div>
        <div class="toal-cart">
            <span>Total</span>
            <span class="toal-price pull-right"><i class="fa fa-tag"></i> <?=$total?></span>
        </div>
        <hr/>
        <div class="toal-cart">
            <span>You Have</span>
            <span class="toal-price pull-right"><i class="fa fa-tag"></i> <?=$userCredits?></span>
        </div>
        <div class="cart-buttons">
            <a href="<?=$this->baseURL('merchandise/cart/review')?>" class="btn-check-out">Checkout</a>
        </div>
    </div>
</div>