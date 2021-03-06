<?php

/**
* Session
*
* The session can be set as file for file based sessions
* or database for database driven sessions.
*/
return [
    'interface' => 'file',
    'securityCode' => '0123ABC',
    'expiration' => 7200,
    'flashdataId' => '_z_session_flashdata',
    'lockToUserAgent' => false,
    'lockToIP' => false,
    'gcProbability' => 1,
    'gcDivisor' => 100,
    'tableName' => 'Session',
//    'domain'    => '.vagrantshare.com',
    'domain'    => 'marketplace.client'
];