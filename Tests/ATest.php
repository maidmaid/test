<?php

require __DIR__.'/../Z.php';

class ATest extends PHPUnit_Framework_TestCase
{
    public function testA()
    {
        $this->assertEquals('a', 'a');
    }

    public function testB()
    {
        $this->assertEquals('b', 'b');
    }

    public function testZ()
    {
        $z = new Z();

        $this->assertEquals($z->z1(), 1);
    }
}
