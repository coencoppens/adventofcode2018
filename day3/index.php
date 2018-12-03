<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/classes/ClaimsCollection.php';
require_once __DIR__ . '/classes/Claim.php';
require_once __DIR__ . '/input1.php';

$claims_collection = new ClaimsCollection();
$claim_strings = explode("\n", $input);
foreach ($claim_strings as $claim_string) {
    $claim = new Claim($claim_string);
    $claims_collection->add($claim);
}
d($claims_collection->getCoordinatesCountWithMultipleClaims());