<?php

if (!function_exists('array_map_key')) {

    function array_map_key(callable $callable, array $array) : array
    {
        $resultArray = [];
        $i = 0;
        foreach ($array as $key => $value) {
            $newKey = $callable($value, $key, $i);
            if (!is_scalar($newKey)) {
                throw new \TypeError('Callback must return scalar type data');
            }
            $resultArray[$newKey] = $value;
            $i++;
        }
        return $resultArray;
    }

}
