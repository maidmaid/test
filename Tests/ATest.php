<?php

class ATest extends PHPUnit_Framework_TestCase
{
    public function testA()
    {
        $this->assertEquals('a', 'a');
    }

    public function testB()
    {
        $this->assertEquals('a', 'b');
    }
}
