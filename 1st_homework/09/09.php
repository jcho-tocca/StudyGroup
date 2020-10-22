<?php 

$a = '@';

foreach(range(1, 10) as $val) {
	
	echo $a.'<br />';
    
    if($val == 5) {
		$a = '@';
    } else {
		$a .= '@';
    }
}

// https://paiza.io/projects/I-smR7YG1_Ti4d1546dNhg