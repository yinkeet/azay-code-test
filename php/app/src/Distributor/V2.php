<?php

namespace Azay\Distributor;

class V2 
{
	public static function distribute(array $fruit, $random_number_generator) {
		while ($random_number_generator != 0) {
			sort($fruit); //sort the array each time to get second(min) and min
			$first = $fruit[0]['worker_after'];
			$second = $fruit[1]['worker_after'];
			$gap = ($second - $first) + 1;
			if ($random_number_generator <= $gap) {
	
				$gap = $random_number_generator;
			}
			$index = array_search(min($fruit), $fruit);
			//echo $index."\r\n";
			$fruit[$index]['worker_after'] += $gap;
			$fruit[$index]['counter'] += $gap;
	
			$random_number_generator = $random_number_generator - $gap;
		}
		return $fruit;
	}
}