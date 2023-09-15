<?php 
function my_array_sort(array $arrayToSort, string $order) : array {
    $length = 0;
    foreach ($arrayToSort as $element) {
        $length++;
    }
    if ($order == "ASC") {
        for ($i = 0; $i < $length - 1 ; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $length ; $j++) {
                if ($arrayToSort[$j] < $arrayToSort[$minIndex]) {
                    $minIndex = $j;
                }
            }
            if ($minIndex !== $i) {
                $temp = $arrayToSort[$i];
                $arrayToSort[$i] = $arrayToSort[$minIndex];
                $arrayToSort[$minIndex] = $temp;
            }
        }
    } elseif ($order == "DESC") {
        for ($i = 0; $i < $length - 1; $i++) {
            $maxIndex = $i;
            for ($j = $i + 1; $j < $length ; $j++) {
                if ($arrayToSort[$j] > $arrayToSort[$maxIndex]) {
                    $maxIndex = $j;
                }
            }
            if ($maxIndex !== $i) {
                $temp = $arrayToSort[$i];
                $arrayToSort[$i] = $arrayToSort[$maxIndex];
                $arrayToSort[$maxIndex] = $temp;
            }
        }
    }
    return $arrayToSort;
}

my_array_sort([2, 24, 12, 7, 34], "ASC") === [2, 7, 12, 24, 34];
my_array_sort([8, 5, 23, 89, 6, 10], "DESC") === [89, 23, 10, 8, 6, 5];

?>