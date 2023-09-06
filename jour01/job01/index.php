<?php 
function my_str_search (string $needle, string $haystack) : int {
    $counter = 0;
    for ($i = 0; $i < strlen($haystack); $i++) {
        if ($haystack[$i] == $needle) {
            $counter+=1;
        }
    }
    return $counter;
}


my_str_search("a", "La Plateforme") === 2;
?>