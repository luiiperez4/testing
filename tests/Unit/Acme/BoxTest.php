<?php

use App\Acme\Box;
use Tests\TestCase;

class BasicTest extends TestCase
{
    public function testHasItemInBox()
    {
        $box = new Box(['cat', 'toy', 'torch']);

        $this->assertTrue($box->has('toy'), 'Ball should be in box');
        $this->assertFalse($box->has('ball'));
    }

    /**
     * @test
     */
    public function TakeOneFromTheBox()
    {
        $box = new Box(['torch']);

        $this->assertEquals('torch', $box->takeOne());

        // Null, now the box is empty
        $this->assertNull($box->takeOne());
    }

    /**
     * @markTestSkipped
     */
    public function testStartsWithALetter()
    {
        //Arrange
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);

        //Act
        $results = $box->startsWith('t');

        //Assert
        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        $this->assertEmpty($box->startsWith('s'));
    }
}