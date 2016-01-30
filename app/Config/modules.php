<?php

/**
 * Modules
 */
return [
    'defaultModule' => 'Home',
    'Home' => [
        'defaultController' => 'Controller',
        'defaultMethod' => 'index'
    ],
    'Reward' => [
        'defaultController' => 'View',
        'defaultMethod' => 'index'
    ],
    'Account' => [
        'defaultController' => 'Home',
        'defaultMethod' => 'index'
    ],
    'Redemption' => [
        'defaultController' => 'Product',
        'defaultMethod' => 'index'
    ],
    'Transaction' => [
        'defaultController' => 'View',
        'defaultMethod' => 'index'
    ],
    'Content' => [
        'defaultController' => 'About',
        'defaultMethod' => 'index'
    ]
];