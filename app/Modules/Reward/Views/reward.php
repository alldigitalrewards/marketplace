<div class="container" id="columns">
    <!-- row -->
    <div class="row">
        <!-- Reward -->
        <div class="col-xs-4">
            <!-- reward-imge-->
            <div class="reward-image">
                <div class="reward-full">
                    <?php if($reward->image_processed): ?>
                    <img width="100%" src='<?=$feedURL.$reward->image_full?>' />
                    <?php else: ?>
                    <img width="100%" src='<?=$feedURL.'no-image.jpg'?>' />
                    <?php endif; ?>
                </div>
            </div>
            <!-- reward-imge-->
        </div>
        <div class="col-xs-8">
            <h3>
                <?=$reward->title?>
                <span class="pull-right">
                    <i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?>
                </span>
            </h3>
            <hr/>
            <br />
            <div class="reward-desc">
                <?=$reward->description?>
            </div>
            <br /><br />
            <div class="pull-left">
                <a class="btn btn-default" data-toggle="modal" data-target="#termModal" href="javascript:void(0)">
                    <i class="fa fa-check"></i> <?=_("Terms");?>
                </a>
            </div>

            <a class="btn btn-primary pull-right" href="<?=$this->baseURL('checkout/cart/add/' . $reward->id . '?r=' . base64_encode(urlencode($this->currentURL())))?>">
                <i class="fa fa-shopping-cart"></i> <?=_("Add to cart");?>
            </a>
        </div>
        <!-- ./reward-->
    </div>
</div>



<?php if(isset($reward)): ?>
<div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="termModalModal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="termModal"><?=$reward->title;?> <?=_("Terms");?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <?=$reward->terms;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
