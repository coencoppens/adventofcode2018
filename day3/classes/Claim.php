<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * File Claim.php
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
 * Claim
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
class Claim
{
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var int
     */
    private $offset_x;
    
    /**
     *
     * @var int
     */
    private $offset_y;
    
    /**
     *
     * @var int
     */
    private $x;
    
    /**
     *
     * @var int
     */
    private $y;
    
    /**
     * 
     * @param string $claim
     */
    public function __construct($claim)
    {
        $claim_parts = explode(' ', $claim);
        $this->id = (int) str_replace('#', '', $claim_parts[0]);
        
        $offsets = explode(',', $claim_parts[2]);
        $this->offset_x = (int) $offsets[0];
        $this->offset_y = (int) str_replace(':', '', $offsets[1]);
        
        $dimensions = explode('x', $claim_parts[3]);
        $this->x = (int) $dimensions[0];
        $this->y = (int) $dimensions[1];
    }
    
    /**
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * 
     * @return int
     */
    public function getMinX()
    {
        return $this->offset_x;
    }
    
    /**
     * 
     * @return int
     */
    public function getMaxX()
    {
        return (($this->offset_x + $this->x) - 1);
    }
    
    /**
     * 
     * @return int
     */
    public function getMinY()
    {
        return $this->offset_y;
    }
    
    /**
     * 
     * @return int
     */
    public function getMaxY()
    {
        return (($this->offset_y + $this->y) - 1);
    }
}
