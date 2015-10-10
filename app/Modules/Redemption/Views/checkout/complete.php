<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            
            <ul class="step">
                <li><span>Shipping Address</span></li>
                <li class="current-step"><span>Complete</span></li>
            </ul>
            <br/>
            <div class="order-detail-content">
                
                <br/>
                <div class="text-center">
                    <img src="<?=$this->baseUrl('resources/app/data/option7/s1.png')?>" alt=""/>
                </div>
                <br/>
                <h2 class="text-center text-info">
                    Your reward is on its way!
                </h2>
                
                <hr/>
                
                <div class="row">
                    
                    <div class="col-xs-12 col-md-7">
                        <div class="row">
                            <div class="col-xs-5">
                                <img src="<?=$feedUrl.$product->image_full?>" alt=""/>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="redemption-header">
                                    <?=substr($product->title,0,40)?>
                                    <?php if(strlen($product->title) > 40): ?>
                                    ...
                                    <?php endif; ?>
                                </h3>
                                <hr/>
                                <?=$product->description?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-5">
                        
                        <div class="row">
            
                            <div class="col-lg-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input disabled type="text" class="form-control" name="firstname" value="<?=$user->shipping_address->firstname?>" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input disabled type="text" class="form-control" name="lastname" value="<?=$user->shipping_address->lastname?>" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <br/>
                        
                        <div class="row">
            
                            <div class="col-xs-12 col-md-6">
                                <select disabled name="state" class="form-control">
                                    <?=$stateOptions?>
                                </select>
                            </div>
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input disabled type="text" class="form-control" name="city" value="<?=$user->shipping_address->city?>" placeholder="City">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <br/>
                        
                        <div class="row">
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="control-group">
                                    <div class="controls">
                                        <input disabled type="text" class="form-control" name="zip" placeholder="Post Code" value="<?=$user->shipping_address->zip?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input disabled type="text" class="form-control" name="address" placeholder="Address 1" value="<?=$user->shipping_address->address?>">
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input disabled type="text" class="form-control" name="secondary_address" placeholder="Address 2 (optional)" value="<?=$user->shipping_address->address?>">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->