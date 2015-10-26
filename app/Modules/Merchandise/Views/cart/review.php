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
                    <a id="previewPageNext" class="request btn btn-default<?=$emptyCart ? ' hide' : ''?>" href="<?=$this->baseURL('merchandise/cart/next')?>"><?=$shippingRequired === true ? 'Next':'Complete';?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<!-- ./page wapper-->