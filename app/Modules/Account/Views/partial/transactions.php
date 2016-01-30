<?php if(!empty($transactions)): ?>

    <table class="table hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Process Date</th>
            <th>Credits</th>
            <th>Type</th>
        </tr>
        </thead>

        <?php foreach($transactions as $transaction): ?>
        <tr>
            <td><?=$transaction->transaction_id?></td>
            <td><?=$transaction->processed?></td>
            <td><?=$transaction->credit_cost?></td>
            <td><?=$transaction->payment_method?></td>
        </tr>
        <?php endforeach; ?>
    </table>


    <div class="clearfix"></div>
    <div class="col-xs-12">
        <ul class="pull-right paginated-buttons pagination pagination-sm">
            <?php if(!$first):?>
                <li><a href="javascript:void(0);" data-paginate-direction="previous">&laquo; Previous</a></li>
            <?php endif;?>
            <?php if(!$last):?>
                <li>
                    <a href="javascript:void(0);" data-paginate-direction="next" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                </li>
            <?php endif;?>
        </ul>
    </div>
<?php endif; ?>