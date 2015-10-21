<!-- page wapper-->
    <div class="container">
                
        <form action="<?=$this->baseURL('merchandise/transaction/create')?>" class="request" method="post">

            <div class="row">

                <div class="col-lg-6">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="shipping_address[firstname]" value="<?=( ! empty ( $user->shipping_address->firstname ) ? $user->shipping_address->firstname:'') ?>" placeholder="First Name">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="shipping_address[lastname]" value="<?=( ! empty ( $user->shipping_address->lastname ) ? $user->shipping_address->lastname:'') ?>" placeholder="Last Name">
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
                            <input type="text" class="form-control" name="shipping_address[city]" value="<?=( ! empty ( $user->shipping_address->city ) ? $user->shipping_address->city:'') ?>" placeholder="City">
                        </div>
                    </div>
                </div>
                
            </div>
            
            <br/>
            
            <div class="row">
                
                <div class="col-xs-12 col-md-6">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="shipping_address[zip]" placeholder="Post Code" value="<?=( ! empty ( $user->shipping_address->zip ) ? $user->shipping_address->zip:'') ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control" name="shipping_address[address]" placeholder="Address 1" value="<?=( ! empty ( $user->shipping_address->address ) ? $user->shipping_address->address:'') ?>">
                            </div>
                        </div>  
                    </div>
                    <div class="col-xs-6">
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control" name="shipping_address[secondary_address]" placeholder="Address 2 (optional)" value="<?=( ! empty ( $user->shipping_address->address ) ? $user->shipping_address->address:'') ?>">
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
        </div>
        
        <br/>
        
        <div class="row">
            <div class="col-xs-6">
                <a class="btn btn-default" href="<?=$this->baseURL()?>">Continue shopping</a>
            </div>
            <div class="col-xs-6 text-right">
                <button class="btn btn-default" type="submit">Complete</button>
            </div>
        </div>
        
        <br/>
        
    </form>
            
</div>
<!-- ./page wapper-->