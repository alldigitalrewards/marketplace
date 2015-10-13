<div id="cart-review">
    <?php $total = 0.00; ?>
    <table class="table table-bordered table-responsive cart_summary">
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
                <?php if($product->image_processed): ?>
                <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img class="img-responsive" src="<?=$feedUrl.$product->image_full;?>" alt="Product"></a>
                <?php else: ?>
                <a href="<?=$this->baseUrl('merchandise/product/detail/'.$product->id)?>"><img class="img-responsive" src="<?=$feedUrl.'no-image.jpg'?>" alt="Product"></a>
                <?php endif; ?>
            </td>
            <td class="cart_description">
                <p class="product-name"><a href="#"><?=$product->title?></a></p>
                <p><?=$product->description?></p>
            </td>
            <td class="qty">
            <form action="<?=$this->baseUrl('merchandise/ajax/updateProductQuantity/'.$product->id)?>" data-item-alias="product-quantity-form" class="request">
                <input class="product-quantity-input form-control" type="text" name="quantity" value="<?=$product->cart_quantity?>">
            </form>
                <!--<a href="#"><i class="fa fa-caret-up"></i></a>-->
                <!--<a href="#"><i class="fa fa-caret-down"></i></a>-->
            </td>
            <td class="price">
                <span><i class="fa fa-tag"></i> <?=$quantityTotal?></span>
            </td>
            <td class="action">
                <a href="<?=$this->baseUrl('merchandise/ajax/removeFromCart/'.$product->id)?>" class="request">Delete item</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5"><strong><i class="fa fa-tag"></i> <?=$total?></strong></td>
            <td colspan="1"></td>
        </tr>
    </tfoot>    
    </table>
</div>