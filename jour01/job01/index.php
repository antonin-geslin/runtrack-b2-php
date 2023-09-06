<?php 
function my_str_search (string $needle, string $haystack) : int {
    $length = 0;
    while (isset($haystack[$length])) {
        $length++;
    }
    $counter = 0;
    for ($i = 0; $i < $length; $i++) {
        if ($haystack[$i] == $needle) {
            $counter+=1;
        }
    }
    return $counter;
}


my_str_search("a", "La Plateforme") === 2;
?>