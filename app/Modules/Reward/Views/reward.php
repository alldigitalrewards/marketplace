<div class="container" id="columns">
    <!-- row -->
    <div class="row">
        <!-- Reward -->
        <div class="col-xs-4">
            <!-- reward-imge-->
            <div class="reward-image">
                <div class="reward-full">
                    <?php if($reward->image_processed): ?>
                    <img src='<?=$feedURL.$reward->image_full?>' data-zoom-image="<?=$feedURL.$reward->image_full?>"/>
                    <?php else: ?>
                    <img src='<?=$feedURL.'no-image.jpg'?>' data-zoom-image="<?=$feedURL.'no-image.jpg'?>"/>
                    <?php endif; ?>
                </div>
            </div>
            <!-- reward-imge-->
        </div>
        <div class="col-xs-8">
            <h3><?=$reward->title?></h3>
            <hr/>
            <br />
            <div class="reward-desc">
                <?=$reward->description?>
            </div>
            <br /><br />
            <span class="label label-success x2 pull-left">
                <i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?>
            </span>
            <a class="btn btn-primary pull-right" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>">
                <i class="fa fa-shopping-cart"></i> <?=_("Add to cart");?>
            </a>
        </div>
        <!-- ./reward-->
    </div>
</div>