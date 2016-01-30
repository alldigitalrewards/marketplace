<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?=_("Transaction");?>: <?=$transaction->transaction_id;?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-6">
            <?=_("Type");?>:
            <?php switch($transaction->payment_method): case 'point': ?>
                <strong><?=_('Marketplace')?></strong>
                <?php break;case 'redemption' : ?>
                <strong><?=_('Gameplay Redemption')?></strong>
                <?php break;case 'game': ?>
                <strong><?=_('Gameplay')?></strong>
            <?php endswitch;?>
            <br/>
            <?=_("Transaction ID");?>: <strong><?= $transaction->transaction_id ;?></strong><br />
            <?=_("Processed");?>: <strong><?= $transaction->date ;?></strong><br />
        </div>
        <div class="col-xs-6">
            <?php if( ! empty ( $transaction->shipping_address ) ):?>
                <address>
                    <strong><?=$transaction->shipping_address->firstname;?> <?=$transaction->shipping_address->lastname;?></strong><br>
                    <?=$transaction->shipping_address->address;?> <?=$transaction->shipping_address->secondary_address;?><br>
                    <?=$transaction->shipping_address->city;?>, <?=$transaction->shipping_address->state;?> <?=$transaction->shipping_address->zip;?><br>
                </address>
            <?php endif;?>
        </div>
    </div>

    <table class="table table-responsive table-striped table-hover table-info">
        <thead>
        <th width="70%"><?=_("Title");?></th>
        <?php if($transaction->payment_method != 'redemption'):?>
            <th width="10%"><?=_("Points");?></th>
        <?php endif;?>
        </thead>
        <tbody>
        <?php foreach($transaction->items as $item):?>
            <tr>
                <td><?=$item->title;?>
                    <?php if(!empty($item->redeemed) && $item->redeemed == 'no'):?>
                        [ <a href="<?=$this->baseURL('redemption?code='.$item->pin);?>"><?=_("Redeem");?></a> ]
                    <?php endif;?>
                </td>
                <?php if($transaction->payment_method != 'redemption'):?>
                    <td><?=number_format($item->credit_cost, 0);?></td>
                <?php endif;?>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-sm pull-left" data-dismiss="modal"><?=_("Close");?></button>
    <?php if($transaction->payment_method != 'redemption'):?>

        <label class="pull-right">
            <strong><?=_("Total");?></strong>:
        <span class="alert alert-success" style="padding:5px ">
            <?=number_format($transaction->credit_cost, 0);?>
        </span>
        </label>

    <?php endif;?>
</div>