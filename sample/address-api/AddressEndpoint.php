<?php

// Run on console:
// php -f .\sample\address-api\AddressEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\AddressClient;
use BlockCypher\Rest\ApiContext;

/*
$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    $apiContexts['sdk_config']->getCredential()->getAccessToken();,
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);
*/

$addressClient = new AddressClient($apiContexts['sdk_config']);
$address = $addressClient->get('1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD');

ResultPrinter::printResult("Get Address", "Address", $address->getAddress(), null, $address);
