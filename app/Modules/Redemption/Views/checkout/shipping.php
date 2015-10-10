<!--Redemption Progress-->
<div class="container bg-blue">
    <div class="row bs-wizard">    
        <div class="col-xs-3 bs-wizard-step complete">
          <div class="text-center bs-wizard-stepnum">Redemption Code</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step complete">
          <div class="text-center bs-wizard-stepnum">Prize Selection</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step active">
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
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            <div class="order-detail-content">
                
                    <form action="<?=$this->baseURL('redemption/ajax/createTransaction')?>" class="request" method="post">
                        
                        <div class="row">
            
                            <div class="col-lg-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" name="shipping_address[firstname]" value="<?=$user->shipping_address->firstname?>" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" name="shipping_address[lastname]" value="<?=$user->shipping_address->lastname?>" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <br/>
                        
                        <div class="row">
            
                            <div class="col-xs-12 col-md-6">
                                <select name="shipping_address[state]" class="form-control">
                                    <?=$stateOptions?>
                                </select>
                            </div>
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" name="shipping_address[city]" value="<?=$user->shipping_address->city?>" placeholder="City">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <br/>
                        
                        <div class="row">
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" name="shipping_address[zip]" placeholder="Post Code" value="<?=$user->shipping_address->zip?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" name="shipping_address[address]" placeholder="Address 1" value="<?=$user->shipping_address->address?>">
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" name="shipping_address[secondary_address]" placeholder="Address 2 (optional)" value="<?=$user->shipping_address->address?>">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <br/>
                        <div class="cart_navigation">
                            <a class="prev-btn" href="<?=$this->baseURL('redemption/product/result')?>">Pick a Different Prize</a>
                            <button class="next-btn" type="submit">Complete</button>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->