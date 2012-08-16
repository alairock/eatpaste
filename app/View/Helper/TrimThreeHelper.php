<?php
class TrimThreeHelper extends AppHelper {

	public function Trim($_str, $_lines = 3, $_sep = "\n") { 
    	$lines  = explode($_sep, $_str); 
    	$return = implode(array_slice($lines, 0, $_lines)); 
    	return $return; 
	}
}