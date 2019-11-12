<?php

// Run on console:
// php -f .\sample\block-api\BlockHashEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\BlockClient;
use BlockCypher\Rest\ApiContext;



$blockClient = new BlockClient($apiContexts['sdk_config']);
$block = $blockClient->get('0000000000000000189bba3564a63772107b5673c940c16f12662b3e8546b412');

ResultPrinter::printResult("Get Block", "Block", $block->getHash(), null, $block);
