<?php if(!empty($transactions)): ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><?=_("Type");?></th>
            <th><?=_("Reward");?></th>
            <th><?=_("Date");?></th>
            <th><?=_("Cost");?></th>
            <th><?=_("View");?></th>
        </tr>
        </thead>

        <?php foreach($transactions as $transaction): ?>
            <tr>
                <td>
                    <?php switch($transaction->payment_method): case 'redemption';?>
                        <?=_('Redemption'); ?>
                        <?php break; case 'point': ?>
                        <?=_('Marketplace'); ?>
                        <?php break; case 'game': ?>
                        <?=_('Gameplay'); ?>
                        <?php break; endswitch; ?>
                </td>
                <td><?=$transaction->rewards?></td>
                <td><?=$transaction->processed?></td>
                <td>
                    <?php if($transaction->payment_method == 'point'):?>
                        <i class="fa fa-dollar"></i><?=number_format($transaction->credit_cost / 1000, 2, '.', ',');?>
                    <?php endif;?>
                </td>
                <td><a data-target="#transactionModal" data-toggle="modal" href="<?=$this->baseURL('transaction/view/' .$transaction->transaction_id);?>" class="btn btn-default btn-sm"><?=_("View");?></a></td>
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

<?php else: ?>
    <p class="alert alert-warning"><?=_("Oops! It seems you haven't redeemed any rewards yet! Start browsing the rewards marketplace to begin!");?></p>
<?php endif; ?>