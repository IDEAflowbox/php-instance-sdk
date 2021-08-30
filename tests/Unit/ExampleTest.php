<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testExample(): void
    {
        $subject = 'example';
        $this->assertEquals('example', $subject, 'Two strings are equal');
    }
}
