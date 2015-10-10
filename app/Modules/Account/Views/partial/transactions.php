<?php if(!empty($transactions)): ?>
<?php foreach($transactions as $transaction): ?>
<tr>
    <td><?=$transaction->transaction_id?></td>
    <td><?=$transaction->processed?></td>
    <td><?=$transaction->credit_cost?></td>
    <td><?=$transaction->payment_method?></td>
</tr>
<?php endforeach; ?>
<?php endif; ?>