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
    private $claim_count_per_coordinate = array();
    
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
                $coordinate = $x . '.' . $y;
                if (!isset($this->claim_count_per_coordinate[$coordinate])) {
                    $this->claim_count_per_coordinate[$coordinate] = 0;
                }
                $this->claim_count_per_coordinate[$coordinate] += 1;
            }
        }
    }
    
    /**
     * 
     * @return int
     */
    public function getCoordinatesCountWithMultipleClaims()
    {
        $claim_count_per_coordinate = $this->claim_count_per_coordinate;
        foreach ($claim_count_per_coordinate as $coordinate => $count) {
            if (1 >= $count) {
                unset($claim_count_per_coordinate[$coordinate]);
            }
        }
        return count($claim_count_per_coordinate);
    }
}
