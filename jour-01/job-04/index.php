<?php 
function my_fizz_buzz(int $length) : array {
    $result = [];
    for ($i = 1; $i <= $length; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $result[$i] = "FizzBuzz";
        }
        else if ($i % 3 == 0) {
            $result[$i] = "Fizz";
        }
        else if ($i % 5 == 0) {
            $result[$i] = "Buzz";
        }
        else {
            $result[$i] = $i;
        }
    }

    return $result;
}

my_fizz_buzz(15) === [1, 2, "Fizz", 4, "Buzz", "Fizz", 7, 8, "Fizz", "Buzz", 11, "Fizz", 13, 14, "FizzBuzz"];
?>