<?php

namespace Azay\Distributor;

//initial array of workers
// $apple = ['worker_1'=>3,'worker_2'=>1,'worker_3'=>2];
// $final_apple = ['worker_1'=>0,'worker_2'=>0,'worker_3'=>0];

class V1
{
	public static function distribute($apple, $final_apple, $random_number_generator) {
		for ($i = 1; $i <=$random_number_generator; $i++){
			//add one more to the minumum member of array
			$index = array_search(min($apple), $apple);
			//echo $index."\r\n";
			$apple[$index] ++;
			$final_apple[$index] ++;
		}
		return $final_apple;
	}
}
	