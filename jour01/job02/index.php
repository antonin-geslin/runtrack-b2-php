<?php
function my_str_reverse(string $string) : string {
    $result = "";
    for ($i = strlen($string); $i >= 0; $i--) {
        $result .= $string[$i];
    }
    return $result;
}

my_str_reverse("Hello") === "olleH";
?>