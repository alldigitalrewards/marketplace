<!-- page wapper-->
<div class="columns-container">
    <div class="container">
        <div class="order-detail-content">
            <div id="cart-review">
                <hr/>
                 <h3 class="text-center">
                     Your cart is loading <i class="fa fa-spinner fa-pulse"></i>
                 </h3>
                 <hr/>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="btn btn-default" href="<?=$this->baseURL()?>">Continue shopping</a>
                </div>
                <div class="col-xs-6 text-right">
                    <?php if($shipping_required === true) : ?>
                    <a id="previewPageNext" class="btn btn-default<?=$emptyCart ? ' hide' : ''?>" href="<?=$this->baseURL('merchandise/cart/shipping')?>">Continue to Shipping Address</a>
                    <?php else:?>
                        <form action="<?=$this->baseURL('merchandise/ajax/createTransaction')?>" class="request" method="post">
                            <button class="btn btn-default" type="submit">Complete</button>
                        </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<!-- ./page wapper-->