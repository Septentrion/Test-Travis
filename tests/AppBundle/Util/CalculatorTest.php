<?php

// Tests/AppBundle/Util/CalculatorTest.php
namespace Tests\AppBundle\Util;

use AppBundle\Util\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }

    public function testMult()
    {
        $calc = new Calculator();
        $result = $calc->mult(30, 2);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(60, $result);
    }

        public function testDiv()
        {
            $calc = new Calculator();
            $result = $calc->div(30, 2);

            // assert that your calculator added the numbers correctly!
            $this->assertEquals(15, $result);
        }
}
