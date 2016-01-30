<?php
/**
 * Modules
 */
return [

    'content/contact/complete' => 'content/contact/index/complete',
    'reward/view/(\d+)' => 'reward/view/index/$1',

    /* Reward API */
    'api/gamification/(\d+)' => 'api/gamification/index/$1',

    /* Reward API */
    'api/reward/(\d+)' => 'api/reward/index/$1',

    /* User API */

    'api/user/(\d+)' => 'api/user/index/$1',
    'api/user/(\d+)/transaction' => 'api/user/transaction/$1',
    'api/user/(\d+)/transaction/(\d+)' => 'api/user/transaction/$1/$2',
    'api/user/(\d+)/cart' => 'api/user/cart/$1',
    'api/user/(\d+)/cart/(\d+)' => 'api/user/cart/$1/$2',
    'api/user/(\d+)/sso' => 'api/user/sso/$1',


    /* Redemption API */

    'api/redemption/(\d+)' => 'api/redemption/index/$1',
    'api/redemption/([A-Za-z0-9]+)' => 'api/redemption/index/$1/pin',
//    'api/redemption/([A-Za-z0-9]+)/pin' => 'api/redemption/index/$1/pin'
];