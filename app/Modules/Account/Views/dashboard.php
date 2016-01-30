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