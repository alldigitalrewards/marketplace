<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content">
            
            <!--Account Settings Form-->
                        
            <div class="row">
                
                <h3 class="padding-20">Account Settings</h3>
                <hr/>
                
                <form method="post" action="<?=$this->baseUrl('account/ajax/update');?>" class="request">
                    <fieldset>
                
                        <div class="col-lg-6">
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?=$user->firstname?>">
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?=$user->lastname?>">
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control" name="email_address" placeholder="Email Address" value="<?=$user->email_address?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="control-group">
                                <div class="controls">
                                    <input type="password" class="form-control" name="new_password" placeholder="New Password" value="">
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm New Password" value="">
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="password" class="form-control" name="current_password" placeholder="Current Password" value="">
                                </div>
                            </div>
                            <br/>
                        </div>
                    </fieldset>
                    <br/>
                    <div class="padding-20">
                        <button class="btn btn-default pull-right" type="submmit"><i class="fa fa-check-circle"></i> Save</button>
                    </div>
                </form>
            </div>
        
        <!--./Account Settings Form-->
        
        <!--Transactions-->
        <?php if($noTransactions): ?>
        <div class="row">
            <div class="col-xs-12">
                <h3 class="padding-20">Recent Transactions</h3>
                <hr/>
                <p class="alert alert-warning">There are no transactions available for this account</p>
            </div>
        </div>
        <?php else: ?>
        <div class="row">
            
            <h3 class="padding-20">Recent Transactions</h3>
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
                     data-paginate-url="<?=$this->baseURL('account/ajax/fetchTransactions');?>">

                    <table class="table hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Process Date</th>
                                <th>Credits</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody class="paginated-container">
                        </tbody>
                    </table>

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
            </div>
                
        </div>
        <?php endif; ?>
        <!--./Transactions-->
        
    </div>
</div>
<!-- ./page wapper-->