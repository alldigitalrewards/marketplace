<?php
$this->addJS([
    'resources/jquery-ui/jquery-ui.min.js',
    'resources/app/js/merchandise/result.js'
]);
?>
<!--Redemption Progress-->
<div class="container bg-fill-blue">
    <div class="row bs-wizard">    
        <div class="col-xs-3 bs-wizard-step complete">
          <div class="text-center bs-wizard-stepnum">Redemption Code</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step active">
          <div class="text-center bs-wizard-stepnum">Prize Selection</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled">
          <div class="text-center bs-wizard-stepnum">Shipping Address</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled">
          <div class="text-center bs-wizard-stepnum">Place Order</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
    </div>
</div>
<!--./Redemption Progress-->

<div class="product-listing"
     data-paginate-alias="product-listing"
     data-paginate-cache="600"
     data-paginate-pulse="false"
     data-paginate-type="traditional"
     data-paginate-container=""
     data-paginate-touchy="400"
     data-paginate-query-prefix="product"
     data-paginate-per-page="9"
     data-paginate-url="<?=$this->baseURL('redemption/ajax/searchProducts');?>">
        <div class="paginated-search group-border-dashed">
        
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- Center colunm-->
                    <div class="center_column col-xs-12" id="center_column">
                        <!-- view-product-list-->
                        <div id="view-product-list" class="view-product-list">
                            
                            <ul class="row product-list grid paginated-container"></ul>
                                
                            <ul class="pull-right paginated-buttons pagination pagination-lg hide">
                                <li><a href="#" data-paginate-direction="previous">« Previous</a></li>
                                <li>
                                  <a href="#" data-paginate-direction="next" aria-label="Next">
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