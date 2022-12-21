<?php

use PHPUnit\Framework\TestCase;
use Azay\Distributor\V2;

class V2Test extends TestCase
{
    public function testThatFruitArraysMatch()
    {
        $apple = array(
            0 =>
            array(
                'worker_after' => 2,
                'worker' => 2,
                'counter' => 0,
                'name' => 'worker_2',
                'type' => 'Apple',
            ),
            1 =>
            array(
                'worker_after' => 3,
                'worker' => 3,
                'counter' => 0,
                'name' => 'worker_3',
                'type' => 'Apple',
            ),
            2 =>
            array(
                'worker_after' => 4,
                'worker' => 4,
                'counter' => 0,
                'name' => 'worker_1',
                'type' => 'Apple',
            ),
        );

        $given_rand_num = 4;

        $result = V2::distribute($apple, $given_rand_num);

        $expected_result = array(
            0 =>
            array(
                'worker_after' => 5,
                'worker' => 3,
                'counter' => 2,
                'name' => 'worker_3',
                'type' => 'Apple',
            ),
            1 =>
            array(
                'worker_after' => 4,
                'worker' => 2,
                'counter' => 2,
                'name' => 'worker_2',
                'type' => 'Apple',
            ),
            2 =>
            array(
                'worker_after' => 4,
                'worker' => 4,
                'counter' => 0,
                'name' => 'worker_1',
                'type' => 'Apple',
            ),
        );


        $this->assertEquals(json_encode($result), json_encode($expected_result));

    }

    public function testPerformace() {
        $this->expectNotToPerformAssertions();

        $apple = array(
            0 =>
            array(
                'worker_after' => 2,
                'worker' => 2,
                'counter' => 0,
                'name' => 'worker_2',
                'type' => 'Apple',
            ),
            1 =>
            array(
                'worker_after' => 3,
                'worker' => 3,
                'counter' => 0,
                'name' => 'worker_3',
                'type' => 'Apple',
            ),
            2 =>
            array(
                'worker_after' => 4,
                'worker' => 4,
                'counter' => 0,
                'name' => 'worker_1',
                'type' => 'Apple',
            ),
        );

        $given_rand_num = 4;

        $startTime = microtime(true);

        for ($i=0 ; $i<1000000 ; $i++) {
            V2::distribute($apple, $given_rand_num);
        }

        echo "V2 Distribute Time:  " . number_format(( microtime(true) - $startTime), 4) . " Seconds\n";
    }
}