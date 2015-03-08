<?php

require './../vendor/autoload.php';

class Test extends PHPUnit_Framework_TestCase
{
    public function testA()
    {
        $this->assertEquals('a', 'a');
    }
}
