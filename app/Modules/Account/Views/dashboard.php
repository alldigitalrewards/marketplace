<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="welcome-area">
                <p><span class="x2 blue"><?=_("Welcome");?></span> <?=_("to your Reward Marketplace");?></p>
                <?php if($user): ?>
                    <p><?=_("Your current balance is");?> <strong><?=number_format($user->credits, 0, '', ',');?></strong></p>
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn btn-block btn-default" href="<?=$this->baseURL('account');?>"><?=_("My Account");?></a>
                        </div>
                        <div class="col-xs-6">
                            <a class="btn btn-block btn-default" href="<?=$this->baseURL('account/authenticate');?>"><?=_("Logout");?></a>
                        </div>
                    </div>

                <?php else:?>
                    <p><a data-toggle="modal" data-target="#loginModal" href="#"><?=_("Click here to login and view your balance");?></a></p>
                <?php endif;?>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <div class="welcome-stationary">
                <img alt="" class="pull-right" src="<?=$this->baseURL('resources/app/images/slider2.jpg');?>" />
            </div>
        </div>
    </div>
</div>
<br /><br />
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content">
            
            <!--Account Settings Form-->
            <!--Transactions-->
        <div class="row">

            <h3><?=_("Transactions");?></h3>
            <hr/>

            <div class="col-xs-12">

                <div id="transactions"
                     data-paginate-alias="transactions"
                     data-paginate-cache="600"
                     data-paginate-pulse="false"
                     data-paginate-type="traditional"
                     data-paginate-per-page="15"
                     data-paginate-container=""
                     data-paginate-touchy="400"
                     data-paginate-query-prefix="transaction"
                     data-paginate-url="<?=$this->baseURL('transaction/view');?>">

                    <div class="paginated-container">
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
<!-- ./page wapper-->