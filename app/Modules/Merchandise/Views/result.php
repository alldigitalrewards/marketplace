<?php
$this->addJS([
    'resources/jquery-ui/jquery-ui.min.js',
    'resources/app/js/merchandise/result.js'
]);
?>
<div class="product-listing"
     data-paginate-alias="product-listing"
     data-paginate-cache="600"
     data-paginate-pulse="false"
     data-paginate-type="traditional"
     data-paginate-container=""
     data-paginate-touchy="400"
     data-paginate-query-prefix="reward"
     data-paginate-per-page="9"
     data-paginate-url="<?=$this->baseURL('merchandise/ajax/searchRewards');?>">
        <div class="paginated-search group-border-dashed">
        <input type="hidden" name="rewardTitle" value="<?=$search?>">
        
        <div class="columns-container">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- Left colunm -->
                    <div class="col-xs-12 col-sm-3">
                        <h3>Categories</h3>
                        <hr/>
                        <ul class="category-list">
                            <?php if(!empty($categories)): ?>
                            <?php $i = 0; ?>
                            <?php foreach($categories as $category): ?>
                            <?php $i++; ?>
                            <li>
                                <input 
                                    type="checkbox" 
                                    class="category-selector"
                                    id="cat-<?=$i?>" 
                                    <?php 
                                    if(in_array($category->id,$categoryIds)) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="<?=$category->id?>"
                                    name="categoryIds[<?=$i?>]" 
                                />
                                <label for="cat-<?=$i?>">
                                <span class="button"></span>
                                <?=$category->category_name?>
                                <span class="count">
                                <?php if(empty($category->products)): ?>
                                (X)
                                <?php endif; ?>
                                </span>
                                </label>
                            </li>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <i>No categories are available at the momment</i>
                            <?php endif; ?>
                        </ul>
                        <!-- ./filter categgory -->
                        <hr/>
                        <!-- Filter Price -->
                        <div class="row">
                            <div class="col-xs-6">
                                Min Price
                                <input type="text" name="priceMin" class="sliderValue form-control" data-index="0" value="<?=$priceMin?>" />  
                            </div>
                            <div class="col-xs-6">
                                Max Price
                                <input type="text" name="priceMax" class="sliderValue form-control" data-index="1" value="<?=$priceMax?>" />
                            </div>
                        </div>
                        <br/>
                        <div id="priceRangeSlider"></div>
                        <br/>
                        <!--./Filter Price-->
                    </div>
                    <!-- ./left colunm -->
                    <!-- Center colunm-->
                    <div class="col-xs-12 col-sm-9">
                        <!-- view-product-list-->
                        <div id="view-product-list" class="view-product-list">
                            
                            <h3><?=$search ?: 'Search'?></span></h3>
                            <hr/>
                            
                            <ul class="row product-list grid paginated-container"></ul>

                            <ul class="pull-right paginated-buttons pagination pagination-sm hide">
                                <li><a href="javascript:void(0);" data-paginate-direction="previous">&laquo; Previous</a></li>
                                <li>
                                    <a href="javascript:void(0);" data-paginate-direction="next" aria-label="Next">
                                        <span aria-hidden="true">Next &raquo;</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <div class="clearfix"></div>
                            
                        </div>
                        <!-- ./view-product-list-->
                    </div>
                    <!-- ./ Center colunm -->
                </div>
                <!-- ./row-->
            </div>
        </div>
    </div>
</div>