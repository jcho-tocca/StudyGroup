<?php


$a = '';

foreach(range(1, 10) as $val) {
    
    if($val > 5) {
        $a = substr($a, 0, -1);
    } else {
        $a .= '@';
    }
    
    echo $a.'<br />';
}

// https://paiza.io/projects/70cmGqso4IvAO-uQwEyQ5g?language=php