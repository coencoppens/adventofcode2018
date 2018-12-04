<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * File ClaimsCollection.php
 *
 * PHP version 5.3
 *
 * @category  PHP
 * @package   AdventOfCode - Day 3
 * @author    Coen Coppens <coen@kadolijst.nl>
 * @copyright 2018 Kadolijst
 * @license   http://www.kadolijst.nl No License
 * @version   1.0
 * @link      http://www.kadolijst.nl
 * @since     03-12-2018
 */

/**
 * ClaimsCollection
 *
 * PHP version 5.3
 *
 * @category  PHP
 * @package   AdventOfCode - Day 3
 * @author    Coen Coppens <coen@kadolijst.nl>
 * @copyright 2018 Kadolijst
 * @license   http://www.kadolijst.nl No License
 * @version   1.0
 * @link      http://www.kadolijst.nl
 * @since     03-12-2018
 */
class ClaimsCollection
{
    /**
     *
     * @var array Claim[]
     */
    private $claims = array();
    
    /**
     *
     * @var array
     */
    private $claims_per_coordinate = array();
    
    /**
     * 
     * @param Claim $claim
     */
    public function add(Claim $claim)
    {
        $claim_id = $claim->getId();
        $this->claims[$claim_id] = $claim;
        for ($x = $claim->getMinX(); $x <= $claim->getMaxX(); $x++) {
            for ($y = $claim->getMinY(); $y <= $claim->getMaxY(); $y++) {
                $coordinate = $x . ',' . $y;
                // Multidimensional array causes memory issues
                if (!isset($this->claims_per_coordinate[$coordinate])) {
                    $this->claims_per_coordinate[$coordinate] = array();
                }
                $this->claims_per_coordinate[$coordinate][] = $claim_id;
            }
        }
    }
    
    /**
     * 
     * @return int
     */
    public function getCoordinatesWithMultipleClaims()
    {
        $claims_per_coordinate = $this->claims_per_coordinate;
        foreach ($claims_per_coordinate as $coordinate => $claim_ids) {
            if (1 >= count($claim_ids)) {
                unset($claims_per_coordinate[$coordinate]);
            }
        }
        return $claims_per_coordinate;
    }
    
    /**
     * 
     * @return array
     */
    public function getClaimIdsWithoutOverlap()
    {
        $claims_per_coordinate = $this->claims_per_coordinate;
        $claim_ids = $this->claims;
        foreach ($claims_per_coordinate as $coordinate => $coordinate_claim_ids) {
            if (1 !== count($coordinate_claim_ids)) {
                foreach ($coordinate_claim_ids as $coordinate_claim_id) {
                    unset($claim_ids[$coordinate_claim_id]);
                }
            }
        }
        return array_keys($claim_ids);
    }
}
