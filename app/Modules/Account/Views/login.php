<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                <div class="col-sm-6">
                        
                    <form action="<?=$this->baseUrl('account/ajax/create')?>" class="request">
                        <div class="box-authentication">
                            
                            <h3>Create an account</h3>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="firstname">First Name</label>
                                    <input id="lastname" name="firstname" type="text" class="form-control full-width">
                                </div>
                                <div class="col-xs-6">
                                    <label for="lastname">Last Name</label>
                                    <input id="lastname" name="lastname" type="text" class="form-control full-width">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="email_register">Email address</label>
                                    <input id="email_register" name="email_address" type="text" class="form-control full-width">
                                </div>
                                <div class="col-xs-6">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control full-width">
                                </div>
                            </div>
                            
                            <!--<div class="row">-->
                            <!--    <div class="col-xs-6">-->
                            <!--        <label for="address">Address</label>-->
                            <!--        <input id="address" name="address" type="text" class="form-control full-width">-->
                            <!--    </div>-->
                            <!--    <div class="col-xs-6">-->
                            <!--        <label for="city" name="password_confirmation">City</label>-->
                            <!--        <input id="city" name="city" type="text" class="form-control full-width">-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <!--<div class="row">-->
                            <!--    <div class="col-xs-6"><!--TODO: Make this a dropdown!!!-->
                            <!--        <label for="state">State</label>-->
                            <!--        <input id="state" name="state" type="text" class="form-control full-width">-->
                            <!--    </div>-->
                            <!--    <div class="col-xs-6">-->
                            <!--        <label for="zip" name="zip">Zip</label>-->
                            <!--        <input id="zip" name="zip" type="text" class="form-control full-width">-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <!--<div class="row">-->
                            <!--    <div class="col-xs-6">-->
                            <!--        <label for="state">Phone</label>-->
                            <!--        <input id="state" name="phone" type="text" class="form-control full-width">-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <button class="button"><i class="fa fa-user"></i> Create an account</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="<?=$this->baseUrl('account/ajax/authenticate')?>" class="request">
                        <div class="box-authentication">
                            <h3>Already registered?</h3>
                            <label for="email_login">Email address</label>
                            <input id="email_login" type="email" name="email_address" class="form-control">
                            <label for="password_login">Password</label>
                            <input id="password_login" type="password" name="password" class="form-control">
                            <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                            <button class="button"><i class="fa fa-lock"></i> Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->