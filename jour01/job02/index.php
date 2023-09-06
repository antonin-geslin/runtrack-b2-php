<?php
function my_str_reverse(string $string) : string {
    $result = "";
    $length = 0;
    while (isset($string[$length])) {
        $length++;
    }
    for ($i = $length; $i >= 0; $i--) {
        $result .= $string[$i];
    }
    return $result;
}

my_str_reverse("Hello") === "olleH";
?>