<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/input1.php';

class WristDevice
{
    /**
     *
     * @var array
     */
    private $box_ids = array();
    
    /**
     *
     * @var array
     */
    private $box_ids_with_letter_twice = array();
    
    /**
     *
     * @var array
     */
    private $box_ids_with_letter_thrice = array();
    
    /**
     * 
     * @param string $raw_input
     */
    public function __construct($raw_input)
    {
        $box_ids = explode("\n", $raw_input);
        $this->box_ids = $box_ids;
    }
    
    /**
     * 
     * @return int
     */
    public function getChecksum()
    {
        $this->assessBoxIds();
        $twice_occurence_count = count($this->box_ids_with_letter_twice);
        $thrice_occurence_count = count($this->box_ids_with_letter_thrice);
        return ($twice_occurence_count * $thrice_occurence_count);
    }
    
    /**
     * 
     * @return string|null
     */
    public function getCorrectBoxIds()
    {
        foreach ($this->box_ids as $box_id) {
            $box_id_characters = str_split($box_id);
            $expected = strlen($box_id);
            foreach ($this->box_ids as $candidate_id) {
                if ($candidate_id === $box_id) {
                    continue;
                }
                $candidate_characters = str_split($candidate_id);
                $matched_characters = array_intersect_assoc($box_id_characters, $candidate_characters);
                if (1 === ($expected - count($matched_characters))) {
                    return implode('', $matched_characters);
                }
            }
        }
    }
    
    /**
     * 
     */
    private function assessBoxIds()
    {
        foreach ($this->box_ids as $box_id) {
            $character_occurrences = count_chars($box_id, 1);
            $unique_character_occurrences = array_unique($character_occurrences);
            if (in_array(2, $unique_character_occurrences)) {
                $this->box_ids_with_letter_twice[] = $box_id;
            }
            if (in_array(3, $unique_character_occurrences)) {
                $this->box_ids_with_letter_thrice[] = $box_id;
            }
        }
    }
}

$wrist_device = new WristDevice($input);
d($wrist_device->getChecksum());
d($wrist_device->getCorrectBoxIds());