<?php

$sample_input = 1000 ;
echo sum($sample_input);

function sum(int | string $user_input)
{
    $valid_numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $input_numbers = str_split(trim($user_input));

    $sum = 0;
    $inp_len = count($input_numbers);

    for ($i = 0; $i < $inp_len; $i++) {

        if (in_array($input_numbers[$i], $valid_numbers)) {
            $number = (int) $input_numbers[$i];

            $sum += $number;
        }

    }
    return $sum;
}