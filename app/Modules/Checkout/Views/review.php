<?php
$this->addJS([
    'resources/clamp-js/clamp.min.js'
]);
?>
<!-- page wapper-->
<div class="container" id="columns">
    <!-- row -->
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-inverse">
                        <?php if($cart): ?>

                        <form action="<?=$this->baseURL('checkout/cart/review');?>" method="post">
                            <div class="panel-heading">

                                <div class="col-xs-12">
                                    <h3><?=_("Review and complete your reward redemption below");?></h3>
                                    <hr />
                                    <br />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="panel-body">
                                <?php $i = 0; $total = 0;?>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="well">
                                            <h4><?=_("Shipping address");?></h4>
                                            <div class="row">

                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label><?=_("First name");?></label>
                                                        <input type="text" class="form-control" name="shipping_address[firstname]" value="<?= !empty($this->request->post('shipping_address')['firstname']) ? $this->request->post('shipping_address')['firstname'] : (! empty ( $shipping->firstname ) ? $shipping->firstname : ''); ?>" placeholder="<?=_("First name");?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label><?=_("Last name");?></label>
                                                        <input type="text" class="form-control" name="shipping_address[lastname]" value="<?= !empty($this->request->post('shipping_address')['lastname']) ? $this->request->post('shipping_address')['lastname'] : (! empty ( $shipping->lastname ) ? $shipping->lastname : ''); ?>" placeholder="<?=_("Last name");?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label><?=_("Address");?></label>
                                                        <input type="text" class="form-control" name="shipping_address[address]" placeholder="<?=_("Address");?>" value="<?= !empty($this->request->post('shipping_address')['address']) ? $this->request->post('shipping_address')['address'] : (! empty ( $shipping->address ) ? $shipping->address : ''); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label><?=_("Address 2");?></label>
                                                        <input type="text" class="form-control" name="shipping_address[secondary_address]" placeholder="<?=_("Address 2");?>" value="<?= !empty($this->request->post('shipping_address')['secondary_address']) ? $this->request->post('shipping_address')['secondary_address'] : (! empty ( $shipping->secondary_address ) ? $shipping->secondary_address : ''); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">


                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label><?=_("City");?></label>
                                                        <input type="text" class="form-control" name="shipping_address[city]" value="<?= !empty($this->request->post('shipping_address')['city']) ? $this->request->post('shipping_address')['city'] : (! empty ( $shipping->city ) ? $shipping->city : ''); ?>" placeholder="<?=_("City");?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label><?=_("State");?></label>

                                                        <select name="shipping_address[state]" class="form-control">
                                                            <?php $states = ['AK'=>'Alaska', 'HI'=>'Hawaii', 'CA'=>'California', 'NV'=>'Nevada', 'OR'=>'Oregon', 'WA'=>'Washington', 'AZ'=>'Arizona', 'CO'=>'Colorada', 'ID'=>'Idaho', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NM'=>'New Mexico', 'ND'=>'North Dakota', 'UT'=>'Utah', 'WY'=>'Wyoming', 'AL'=>'Alabama', 'AR'=>'Arkansas', 'IL'=>'Illinois', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'OK'=>'Oklahoma', 'SD'=>'South Dakota', 'TX'=>'Texas', 'TN'=>'Tennessee', 'WI'=>'Wisconsin', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'FL'=>'Florida', 'GA'=>'Georgia', 'IN'=>'Indiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NY'=>'New York', 'NC'=>'North Carolina', 'OH'=>'Ohio', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WV'=>'West Virginia'];?>
                                                            <?php foreach($states as $abbrev => $name) : ?>
                                                                <?php $selected = (!empty($shipping->state) && $shipping->state == $abbrev ? "selected='selected'":"");?>
                                                                <option value="<?=$abbrev;?>" <?=$selected;?>><?=$abbrev;?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-4">
                                                    <div class="form-group">
                                                        <label><?=_("Zipcode");?></label>
                                                        <input type="text" class="form-control" name="shipping_address[zip]" placeholder="<?=_("Zipcode");?>" value="<?= !empty($this->request->post('shipping_address')['zip']) ? $this->request->post('shipping_address')['zip'] : (! empty ( $shipping->zip ) ? $shipping->zip : ''); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php foreach($cart as $reward): $i++; ?>
                                            <?php $total = bcadd($total, bcmul($reward->credit_cost, $reward->cart_quantity));?>
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <h4 class="reward-name">
                                                        <strong>
                                                            <a class="truncate" href="<?=$this->baseURL('reward/view/' . $reward->id);?>"><?=$reward->title;?></a>
                                                        </strong>
                                                    </h4>
                                                    <div class="cart-description"><?=$reward->description;?></div>
                                                </div>
                                                <div class="col-xs-5">
                                                    <br />
                                                    <div class="col-xs-4 text-right">
                                                        <h6><strong><?=number_format($reward->credit_cost, 0, '', ',');?> <span class="text-muted">&times;</span></strong></h6>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <input type="text" name="quantity[<?=$reward->id;?>]" class="form-control input-sm" value="<?=$reward->cart_quantity?>">
                                                    </div>
                                                    <div class="col-xs-5 text-right">
                                                        <div class="btn-group" role="group">
                                                            <a class="btn btn-link update-quantities">
                                                                <i class="fa fa-refresh"></i>
                                                            </a>
                                                            <a class="btn btn-link" href="<?=$this->baseURL('checkout/cart/remove/' . $reward->id . '?r=' . base64_encode(urlencode($this->currentURI())));?>">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <div class="checkbox">
                                        <label>
                                            <input name="terms" <?=isset($user->approvedTerms) && $user->approvedTerms === 'on' ? 'checked="checked"':'';?> type="checkbox"><?=_("I agree to redeem for the above rewards");?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 text-right">
                                    <div class="checkbox">
                                        <label>
                                            <input name="shipping" <?=isset($user->approvedShipping) && $user->approvedShipping === 'on' ? 'checked="checked"':'';?> type="checkbox"><?=_("I confirm the shipping address above is valid");?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <div class="panel-body">

                        <div class="row">
                            <div class="col-xs-offset-6 col-xs-3 text-center pay-with-card">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4><strong><i class="fa fa-dollar"></i> <?=number_format(($total / 1000), 2, '.', ',');?></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button
                                            data-name="<?=_("Pay with card");?>"
                                            data-amount="<?=bcmul(($total / 1000), 100);?>"
                                            data-key="<?=$this->configuration->stripe->publishable_key;?>"
                                            type="submit"
                                            disabled="true"
                                            id="stripe"
                                            class="btn btn-primary">
                                            <?=_("Pay with card");?>
                                        </button>

                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-3 text-center pay-with-points">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4><strong><i class="fa fa-tag"></i> <?=$total;?></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" id="points" class="btn btn-default">
                                            <?=_("Pay with points");?>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        </div>
                        <?php else: ?>
                            <p class="alert alert-warning">
                                <?=_("Oops! You haven't added any rewards to your cart!") . ' <a href="' . $this->baseURL('reward') . '">' . _("Click here") . '</a> ' . _("to get started!") ;?>
                            </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
</div>
<!-- ./page wapper-->