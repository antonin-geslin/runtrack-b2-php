<?php 
function my_closet_to_zero(array $array) : int {
    $result = 0;
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        if ($i == 0) {
            $result = $array[$i];
        } elseif (abs($array[$i]) < abs($result)) {
            $result = $array[$i];
        }
    }
    return $result;
}



my_closet_to_zero([2, -1, 5, 23, 21, 9]) === -1;
my_closet_to_zero([234, -142, 512, 1223, 451, -59]) === -59;
?>