<!--Redemption Progress-->
<div class="container bg-fill-blue">
    <div class="row bs-wizard">    
        <div class="col-xs-3 bs-wizard-step active">
          <div class="text-center bs-wizard-stepnum">Redemption Code</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled">
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

<div class="container">

    <!--Redemption Code Entry Form-->
    <form action="<?=$this->baseUrl('redemption/ajax/validateCode')?>" id="redemption-code-form" class="request">
        <div id="redemption-input-wrapper">
            <h3 class="redemption-header text-center">Redeem your reward!</h3>
            <hr/>
            <div class="input-group redemption-code-input-wrapper">
                <input type="text" name="code" value="<?=$this->request->get('code','')?>" class="form-control" placeholder="Redemption Code" spellcheck="false"/>
                <span class="input-group-addon">
                    <button type="submit" class="btn btn-block">Go</button>  
                </span>
            </div>
        </div>
    </form>
    <!--./Redemption Code Entry Form-->

</div>