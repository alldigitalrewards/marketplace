<div id="cart-review">
    <?php $total = 0.00; ?>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th width="14%" class="cart_product">Product</th>
            <th width="40%">Description</th>
            <th width="14%">Qty</th>
            <th width="13%">Total</th>
            <th width="5%" class="action"><i class="fa fa-trash-o"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($cartItems)): ?>
        <?php foreach($cartItems as $product): ?>
        <?php $quantityTotal = 0.00 ?>
        <?php for($i = 0; $i < $product->cart_quantity; $i++): ?>
        <?php $total = bcadd($total, $product->credit_cost, 2); ?>
        <?php $quantityTotal = bcadd($quantityTotal, $product->credit_cost, 2); ?>
        <?php endfor; ?>
        <tr>
            <td class="cart_product">
                <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                    <?php if($product->image_processed): ?>
                    <img class="img-responsive" src="<?=$feedUrl.$product->image_full;?>" alt="Product">
                    <?php else: ?>
                    <img class="img-responsive" src="<?=$feedUrl.'no-image.jpg'?>" alt="Product">
                    <?php endif; ?>
                </a>
            </td>
            <td class="cart_description">
                <p class="product-name">
                    <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>">
                        <?=$product->title?>
                    </a>
                </p>
                <p><?=$product->description?></p>
            </td>
            <td class="qty">
            <form action="<?=$this->baseUrl('merchandise/ajax/updateProductQuantity/'.$product->id)?>" data-item-alias="product-quantity-form" class="request">
                <input class="product-quantity-input form-control" type="text" name="quantity" value="<?=$product->cart_quantity?>">
            </form>
            </td>
            <td class="price">
                <span><i class="fa fa-tag"></i> <?=$quantityTotal?></span>
            </td>
            <td class="action text-center">
                <a href="<?=$this->baseUrl('merchandise/ajax/removeFromCart/'.$product->id)?>" class="request">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <strong>Total: <i class="fa fa-tag"></i> <?=$total?></strong>
            </td>
        </tr>
    </tfoot>    
    </table>
</div>