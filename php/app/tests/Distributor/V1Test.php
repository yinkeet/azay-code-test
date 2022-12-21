<?php

use PHPUnit\Framework\TestCase;
use Azay\Distributor\V1;

class V1Test extends TestCase
{
    public function testThatFruitArraysMatch()
    {
        $apple = ['worker_1'=>3,'worker_2'=>1,'worker_3'=>2];
        $final_apple = ['worker_1'=>0,'worker_2'=>0,'worker_3'=>0];
        $given_rand_num = 4;

        $result = V1::distribute($apple, $final_apple, $given_rand_num);

        $expected_result = ['worker_1'=>1,'worker_2'=>2,'worker_3'=>1];

        $this->assertEquals(json_encode($result), json_encode($expected_result));

    }

    public function testPerformace() {
        $this->expectNotToPerformAssertions();

        $apple = ['worker_1'=>3,'worker_2'=>1,'worker_3'=>2];
        $final_apple = ['worker_1'=>0,'worker_2'=>0,'worker_3'=>0];
        $given_rand_num = 4;

        $startTime = microtime(true);

        for ($i=0 ; $i<1000000 ; $i++) {
            V1::distribute($apple, $final_apple, $given_rand_num);
        }

        echo "V1 Distribute Time:  " . number_format(( microtime(true) - $startTime), 4) . " Seconds\n";
    }
}