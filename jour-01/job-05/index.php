<?php 
function my_is_prime(int $number) : bool {
    if ($number <= 1) {
        return false;
    }

    if ($number <= 3) {
        return true;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

my_is_prime(3) === true;
my_is_prime(12) === false;
?>