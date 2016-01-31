<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="welcome-area">
                <p><span class="x2 blue"><?=_("Welcome");?></span> <?=_("to your Reward Marketplace");?></p>
                <?php if($user): ?>
                    <p><?=_("Your current balance is");?> <strong><?=number_format($user->credits, 0, '', ',');?></strong></p>
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn btn-block btn-default" href="<?=$this->baseURL('account');?>"><?=_("My Account");?></a>
                        </div>
                        <div class="col-xs-6">
                            <a class="btn btn-block btn-default" href="<?=$this->baseURL('account/authenticate');?>"><?=_("Logout");?></a>
                        </div>
                    </div>

                <?php else:?>
                    <p><a data-toggle="modal" data-target="#loginModal" href="#"><?=_("Click here to login and view your balance");?></a></p>
                <?php endif;?>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <div class="welcome-stationary">
                <img alt="" class="pull-right" src="<?=$this->baseURL('resources/app/images/slider2.jpg');?>" />
            </div>
        </div>
    </div>
</div>
<br /><br />

<div class="container featured-spots">
    <div class="row">
        <div class="col-sm-4 text-center">
            <img src="<?=$this->baseURL('resources/app/images/kindle-fire.jpg');?>" />
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=$this->baseURL('resources/app/images/roku.jpg');?>" />
        </div>
        <div class="col-sm-4 text-center">
            <img src="<?=$this->baseURL('resources/app/images/movie-popcorn.jpg');?>" />
        </div>
    </div>
</div>
<div class="container featured-rewards">
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#featured-rewards" aria-controls="featured-rewards" role="tab" data-toggle="tab"><?=_("Featured Rewards");?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="featured-rewards">
                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <img class="anchor-image pull-right" src="<?=$this->baseURL('resources/app/images/featured-products-spot-1.jpg');?>" />
        </div>
    </div>
</div>
<br /><br />
<div class="container featured-rewards">
    <div class="row">
        <div class="col-sm-3">
            <img class="anchor-image" src="<?=$this->baseURL('resources/app/images/electronics-category-spot.jpg');?>" />
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#electronics" aria-controls="electronics" role="tab" data-toggle="tab"><?=_("Electronics");?></a></li>
                        <li role="presentation"><a href="#sound" aria-controls="sound" role="tab" data-toggle="tab"><?=_("Sound");?></a></li>
                        <li role="presentation"><a href="#tablet" aria-controls="tablet" role="tab" data-toggle="tab"><?=_("Tablets");?></a></li>
                        <li role="presentation"><a href="#tv" aria-controls="tv" role="tab" data-toggle="tab"><?=_("TV's");?></a></li>
                        <li role="presentation"><a href="#entertainment" aria-controls="entertainment" role="tab" data-toggle="tab"><?=_("Entertainment");?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="electronics">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="sound">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="tablet">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="tv">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="entertainment">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br /><br />
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 text-center">
            <img src="<?=$this->baseURL('resources/app/images/featured-bottom-spot-1.jpg');?>" />
        </div>
        <div class="col-xs-12 col-sm-6 text-center">
            <img src="<?=$this->baseURL('resources/app/images/featured-bottom-spot-2.jpg');?>" />
        </div>
    </div>
</div>

<br /><br />
<div class="container featured-rewards">
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#travel" aria-controls="travel" role="tab" data-toggle="tab"><?=_("Travel");?></a></li>
                        <li role="presentation"><a href="#luggage" aria-controls="luggage" role="tab" data-toggle="tab"><?=_("Luggage");?></a></li>
                        <li role="presentation"><a href="#cameras" aria-controls="cameras" role="tab" data-toggle="tab"><?=_("Cameras");?></a></li>
                        <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab"><?=_("Accessories");?></a></li>
                        <li role="presentation"><a href="#bags" aria-controls="bags" role="tab" data-toggle="tab"><?=_("Bags");?></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="travel">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="luggage">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="cameras">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="accessories">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="product-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="bags">

                            <div class="row">
                                <?php if(!empty($featured)): ?>
                                    <?php shuffle($featured); foreach($featured as $reward): ?>
                                        <div class="col-sm-3 item">
                                            <div class="img-container">
                                                <a href="<?=$this->baseURL('reward/view/'.$reward->id)?>">
                                                    <?php if($reward->image_processed): ?>
                                                        <img src="<?=$feedURL.$reward->image_full;?>" alt="Reward">
                                                    <?php else: ?>
                                                        <img src="<?=$feedURL.'no-image.jpg'?>" alt="Reward">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <h5 class="truncate"><a href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title?></a></h5>
                                            <div class="reward-price">
                                                <span class="normal-price"><i class="fa fa-tag"></i> <?=number_format($reward->credit_cost, 0, '', ',');?></span>
                                            </div>
                                            <a title="Add to cart" href="<?=$this->baseURL('checkout/cart/add/'.$reward->id)?>" class="btn btn-block btn-default">
                                                <i class="fa fa-shopping-cart"></i><?=_("Add to cart");?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <p class="alert alert-info"><?=_("No rewards are available at this time");?></p>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <img class="anchor-image pull-right" src="<?=$this->baseURL('resources/app/images/travel-category-spot.jpg');?>" />
        </div>
    </div>
</div>

<br /><br />
<div class="container featured-rewards">
    <div class="row">
        <div class="col-xs-12 text-center">
            <a href="<?=$this->baseURL('#');?>">
                <img src="<?=$this->baseURL('resources/app/images/homegoods-spot.jpg');?>" />
            </a>
        </div>
    </div>
</div>