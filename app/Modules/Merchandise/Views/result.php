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
            <div class="container" id="columns">
                <!-- row -->
                <div class="row">
                    <!-- Left colunm -->
                    <div class="column col-xs-12 col-sm-3" id="left_column">
                        <!-- block filter -->
                        <div class="block left-module">
                            <p class="title_block">Filter selection</p>
                            <div class="block_content">
                                <!-- layered -->
                                <div class="layered layered-filter-price">
                                    <!-- filter categgory -->
                                    <div class="layered_subtitle">CATEGORIES</div>
                                    <div class="layered-content">
                                        <ul class="check-box-list">
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
                                    </div> 
                                    <!-- ./filter categgory -->
                                    <!-- filter price -->
                                    <div class="layered_subtitle">price</div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Min Price
                                            <input type="text" name="priceMin" class="sliderValue form-controller" data-index="0" value="<?=$priceMin?>" />  
                                        </div>
                                        <div class="col-xs-6">
                                            Max Price
                                            <input type="text" name="priceMax" class="sliderValue form-controller" data-index="1" value="<?=$priceMax?>" />
                                        </div>
                                    </div>
                                    <br/>
                                    <div id="priceRangeSlider"></div>
                                    <!--<div class="layered-content slider-range">-->
                                        
                                    <!--    <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="Credits" class="slider-range-price" data-value-min="50" data-value-max="350"></div>-->
                                    <!--    <div class="amount-range-price">Range: <i class="fa fa-tag"></i> 50 - <i class="fa fa-tag"></i> 350</div>-->
                                        
                                    <!--</div>-->
                                </div>
                                <!-- ./layered -->
        
                            </div>
                        </div>
                        <!-- ./block filter  -->
                        
                        <!-- left silide -->
                        <div class="col-left-slide left-module">
                            <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                                <li><a href="<?=$this->baseUrl('merchandise')?>"><img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" alt="slide-left"></a></li>
                                <li><a href="<?=$this->baseUrl('merchandise')?>"><img src="<?=$this->baseURL('resources/app/images/hot-picks.jpg');?>" alt="slide-left"></a></li>
                            </ul>
        
                        </div>
                        <!--./left silde-->
                    </div>
                    <!-- ./left colunm -->
                    <!-- Center colunm-->
                    <div class="center_column col-xs-12 col-sm-9" id="center_column">
                        <!-- view-product-list-->
                        <div id="view-product-list" class="view-product-list">
                            <h2 class="page-heading">
                                <span class="page-heading-title"><?=$search ?: 'Browse'?></span>
                            </h2>
                            <ul class="display-product-option">
                                <li class="view-as-grid selected">
                                    <span>grid</span>
                                </li>
                                <li class="view-as-list">
                                    <span>list</span>
                                </li>
                            </ul>
                            <!-- PRODUCT LIST -->
                            
                            <ul class="row product-list grid paginated-container">
                                
                            </ul>

                            <ul class="pull-right paginated-buttons pagination pagination-sm hide">
                                <li><a href="javascript:void(0);" data-paginate-direction="previous">&laquo; Previous</a></li>
                                <li>
                                    <a href="javascript:void(0);" data-paginate-direction="next" aria-label="Next">
                                        <span aria-hidden="true">Next &raquo;</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <!-- ./PRODUCT LIST -->
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