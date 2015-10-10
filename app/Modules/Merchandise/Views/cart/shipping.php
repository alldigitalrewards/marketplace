<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            <ul class="step">
                <li><span>Review Cart</span></li>
                <li class="current-step"><span>Shipping Address</span></li>
                <li><span>Complete</span></li>
            </ul>
            <br/>
            <div class="order-detail-content">
                
                    <form action="<?=$this->baseURL('merchandise/ajax/createTransaction')?>" class="request" method="post">
                        
                        <!--<h4>Use address on file</h4>-->
                        <!--<br/>-->
                        <!--<div class="material-switch">-->
                        <!--    <input id="addressSwitch"name="on_file_address" type="checkbox"/>-->
                        <!--    <label for="addressSwitch" class="label-default"></label>-->
                        <!--</div>-->
                        
                        <!--<hr/>-->
                        
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
                            <a class="prev-btn" href="<?=$this->baseURL('merchandise/cart/review')?>">Review Cart</a>
                            <button class="next-btn" type="submit">Complete</button>
                        </div>
                        <!--<div class="padding-20">-->
                        <!--    <button class="btn btn-default pull-right" type="submmit"><i class="fa fa-check-circle"></i> Save</button>-->
                        <!--</div>-->
                    </form>
                
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->