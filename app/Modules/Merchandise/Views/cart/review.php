<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            <ul class="step">
                <li class="current-step"><span>Review Cart</span></li>
                <li><span>Shipping Address</span></li>
                <li><span>Complete</span></li>
            </ul>
            <br/>
            <div class="order-detail-content">
                <div id="cart-review">
                    <hr/>
                     <h3 class="text-center">
                         Your cart is loading <i class="fa fa-spinner fa-pulse"></i>
                     </h3>
                     <hr/>
                </div>
                <div class="cart_navigation">
                    <a class="prev-btn" href="<?=$this->baseURL()?>">Continue shopping</a>
                    <?php if($shipping_required === true) : ?>
                    <a id="previewPageNext" class="next-btn<?=$emptyCart ? ' hide' : ''?>" href="<?=$this->baseURL('merchandise/cart/shipping')?>">Shipping Address</a>
                    <?php else:?>
                        <form action="<?=$this->baseURL('merchandise/ajax/createTransaction')?>" class="request" method="post">
                            <button class="next-btn" type="submit">Complete</button>
                        </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->