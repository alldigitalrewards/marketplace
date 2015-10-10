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
                    <a id="previewPageNext" class="next-btn<?=$emptyCart ? ' hide' : ''?>" href="<?=$this->baseURL('merchandise/cart/shipping')?>">Shipping Address</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->