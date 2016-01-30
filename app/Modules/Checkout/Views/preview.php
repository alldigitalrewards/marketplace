<?php if($cart): ?>
<?php $i = 0;?>
    <div class="cart-preview">
        <?php foreach($cart as $reward): $i++; ?>
            <div class="row no-gutter cart-listing">
                <div class="col-xs-3">
                    <a href="<?=$this->baseUrl('reward/view/' . $reward->id)?>">
                        <?php if($reward->image_processed): ?>
                            <img src="<?=$feedURL . $reward->image_thumb;?>" alt="Reward">
                        <?php else: ?>
                            <img src="<?=$feedURL . 'no-image.jpg'?>" alt="Product">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="truncate" href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title;?></a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-3">
                            &times; <?=$reward->cart_quantity?>
                        </div>

                        <div class="col-xs-7 text-right">
                            <i class="fa fa-tag"></i> <?=number_format(bcmul($reward->credit_cost, $reward->cart_quantity), 0, '', ',');?>
                        </div>

                        <div class="col-xs-2">
                                <a href="<?=$this->baseURL('checkout/cart/remove/' . $reward->id);?>" class="btn btn-xs btn-danger pull-right">&times;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php if($i == 5): break; endif;?>
        <?php endforeach; ?>
        <br />
        <?php if($i == 2): ?>
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-block btn-default" href="<?=$this->baseURL('checkout/cart/checkout')?>"><?=_("View All");?></a>
                </div>
            </div>
        <?php endif; ?>
        <a href="<?=$this->baseURL('checkout/cart/review');?>" class="btn btn-block btn-primary"><?=_("Checkout");?></a>
    </div>
<?php endif; ?>