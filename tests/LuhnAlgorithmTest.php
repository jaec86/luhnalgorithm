<?php

use PHPUnit\Framework\TestCase;
use Src\LuhnAlgorithm;

class LuhnAlgorithmTest extends TestCase
{
    /** @test */
    public function value_is_not_string()
    {
        $this->assertFalse(LuhnAlgorithm::validate(1234567890123456));
    }

    /** @test */
    public function value_is_not_numeric()
    {
        $this->assertFalse(LuhnAlgorithm::validate('abcdefghijklmnop'));
    }

    /** @test */
    public function value_is_numeric_but_length_not_16()
    {
        $this->assertFalse(LuhnAlgorithm::validate('12345678901234567'));
    }

    /** @test */
    public function value_is_not_valid()
    {
        $this->assertFalse(LuhnAlgorithm::validate('4012888888881882'));
    }

    /** @test */
    public function value_is_valid()
    {
        $this->assertTrue(LuhnAlgorithm::validate('4012888888881881'));
    }
}