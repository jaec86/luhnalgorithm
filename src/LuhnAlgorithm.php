<?php

namespace Src;

class LuhnAlgorithm
{
    public static function validate($value)
    {
        // Check if the $value is string. It doesn't say in the requirements but a leading zero would throw an exception.
        // Check if the $value contains only numbers. White spaces are not allowed either.
        // Check if the $value has exactly 16 digits.
        if (is_string($value) AND is_numeric($value) AND strlen($value) === 16) {
            
            // Split the $value digits and reverse the array
            $result = array_reverse(str_split($value));

            $result = array_map(function ($key, $value) {
                // Double the value of every second digit beginning from the right.
                if ($key & 1) {
                    $value *= 2;

                    // If the doubled digit is greater than 9, substract 9 from the doubled digit.
                    return $value > 9 ? $value - 9 : $value;
                }

                // Just in case multiply it by one so it would cast to integer.
                return $value * 1;

            }, array_keys($result), $result); // array_map doesn't show as the array keys so instead pass an array with the keys and the reversed array

            return array_sum($result) % 10 === 0; // The remainder when the sum is divided by 10 is 0 return true, esle false
        }

        return false;
    }
}