<?php 
$num = 3;
for($i = 0; $i < $num; $i++) {
    
    // 空白を減らしていく
    for($j = $num-1; $j > $i; $j--) {
        echo '&emsp;';
    }
	    
	// @を奇数単位で増えていく
    for($j=0; $j < (2*$i) + 1; $j++) {
	    echo '@';
	}
	
    echo "<br />";
}

$num = 2;

for($i = 0; $i < $num; $i++) {
	
	// 空白を増やしていく
    for($j = 0; $j < $i+1; $j++) {
        echo '&emsp;';
	}
	
	// @を奇数単位で減らしていく
    for($j = (2*$num)-1; $j > (2*$i); $j--) {
	    echo '@';
    }
    echo "<br />";
}

// https://paiza.io/projects/OlGEau8Q3M6lAVnQiuPRcQ?language=php


// 谷さん作品
for($i=1;$i<=5;$i++){
   $space = abs(3-$i);
    for($v=0;$v<$space;$v++){
      echo '&emsp;';
    }

    for($v=1;$v<(3- $space)*2;$v++){
      echo '@';
    }

    for($v=0;$v<$space;$v++){
      echo '&emsp;';
    }
    echo '<br>';
}
