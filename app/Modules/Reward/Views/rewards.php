<div class="product-listing"
     data-paginate-alias="product-listing"
     data-paginate-cache="600"
     data-paginate-pulse="false"
     data-paginate-type="traditional"
     data-paginate-container=""
     data-paginate-touchy="400"
     data-paginate-query-prefix="reward"
     data-paginate-page="<?=$this->request->get('rewardPage', 0);?>"
     data-paginate-per-page="12"
     data-paginate-url="<?=$this->baseURL('reward/view');?>">
        <div class="paginated-search">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-xs-12 col-sm-2 search-area">
                    <h4><?=_("Points");?></h4>
                    <input type="hidden" name="minPrice" value="<?=(!empty($minPrice) ? $minPrice : '');?>" />
                    <input type="hidden" name="maxPrice" value="<?=(!empty($maxPrice) ? $maxPrice : '');?>" />
                    <ul class="price-list">
                        <li>
                            <a <?=($maxPrice === false ? 'class="active"' : '');?> href="<?=$this->baseURL('reward/view');?>"><?=_("All");?></a>
                        </li>
                        <li>
                            <a <?=($maxPrice == 25000 ? 'class="active"' : '');?> href="<?=$this->baseURL('reward/view?minPrice=0&maxPrice=25000');?>">1 &mdash; 25,000</a>
                        </li>
                        <li>
                            <a <?=($maxPrice == 50000 ? 'class="active"' : '');?> href="<?=$this->baseURL('reward/view?minPrice=25000&maxPrice=50000');?>">25,000 &mdash; 50,000</a>
                        </li>
                        <li>
                            <a <?=($maxPrice == 100000 ? 'class="active"' : '');?> href="<?=$this->baseURL('reward/view?minPrice=50000&maxPrice=100000');?>">50,000 &mdash; 100,000</a>
                        </li>
                        <li>
                            <a <?=($minPrice == 100000 ? 'class="active"' : '');?> href="<?=$this->baseURL('reward/view?minPrice=100000');?>">100,000+</a>
                        </li>
                    </ul>

                    <?php if(!empty($categories)): ?>
                    <br /><br />
                    <h4><?=_("Categories");?></h4>
                    <ul class="category-list">
                        <?php foreach($categories as $category): ?>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="category-selector" <?=(in_array($category->id, $categoryIds) ? 'checked':'');?> value="<?=$category->id?>" name="categoryIds[<?=$category->id;?>]" />
                                        <?=$category->category_name?>
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-10">
                    <!-- view-product-list-->
                    <div class="view-reward-list">
                        <div class="row">
                            <div class="col-xs-12">

                                <h4 class="blue"><?=!empty($search) ? _('Rewards matching: ') . $search : _('Rewards');?></h4>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <input id="product-search-bar" name="title" class="form-control" placeholder="<?=_("Search");?>" value="<?=(!empty($search) ? $search : '')?>"/>
                                                </div>
                                                <div class="col-xs-4 text-right">
                                                    <div class="btn-group">
                                                        <a href="#" id="list" class="btn btn-default btn-sm">
                                                            <span class="fa fa-fw fa-list"></span>
                                                        </a>
                                                        <a href="#" id="grid" class="btn btn-default btn-sm">
                                                            <span class="fa fa-fw fa-th"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row reward-list list-group paginated-container">
                                    <i class="loader fa fa-circle-o-notch fa-fw fa-5x fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./view-product-list-->
                </div>
            </div>
            <!-- ./row-->
        </div>

    </div>
</div>