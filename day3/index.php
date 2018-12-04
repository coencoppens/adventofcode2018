<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/classes/ClaimsCollection.php';
require_once __DIR__ . '/classes/Claim.php';
require_once __DIR__ . '/input1.php';
//require_once __DIR__ . '/test1.php';

$claims_collection = new ClaimsCollection();
$claim_strings = explode("\n", $input);
ini_set('memory_limit', -1); // no limit
foreach ($claim_strings as $claim_string) {
    $claim = new Claim($claim_string);
    $claims_collection->add($claim);
}
d(count($claims_collection->getCoordinatesWithMultipleClaims()));
d($claims_collection->getClaimIdsWithoutOverlap());