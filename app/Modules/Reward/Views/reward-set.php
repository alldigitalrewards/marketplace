<?php if(!empty($rewards)): ?>
    <?php foreach($rewards as $reward): ?>
        <div class="col-sm-3 item">
            <div class="img-container">
                <a href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>">
                    <?php if($reward->image_processed): ?>
                    <img src="<?=$feedURL.$reward->image_full;?>" />
                    <?php else: ?>
                    <img src="<?=$feedURL.'no-image.jpg'?>" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="meta-container">
                <h5 class="truncate"><a href="#"><?=$reward->title;?></a></h5>
                <div class="description">
                    <hr/>
                    <br />
                    <div class="reward-desc">
                        <?=$reward->description?>
                    </div>
                    <br /><br />
                </div>
            <span class="label label-success x2 pull-left">
                <i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?>
            </span>
                <a class="btn btn-primary pull-right" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>">
                    <i class="fa fa-shopping-cart"></i> <span class="add-to-cart"><?=_("Add to cart");?></span>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="clearfix"></div>
    <div class="col-xs-12">
        <ul class="pull-right paginated-buttons pagination pagination-sm">
            <?php if(!$first):?>
            <li><a href="javascript:void(0);" data-paginate-direction="previous">&laquo; Previous</a></li>
            <?php endif;?>
            <?php if(!$last):?>
            <li>
                <a href="javascript:void(0);" data-paginate-direction="next" aria-label="Next">
                    <span aria-hidden="true">Next &raquo;</span>
                </a>
            </li>
            <?php endif;?>
        </ul>
    </div>
<?php else:?>
    <div class="col-xs-12">
        <p class="alert alert-info"><?=_("No rewards have been found for your search criteria. Please try again");?></p>
    </div>
<?php endif; ?>