<?php

$a = '09:00';
$b = '13:00';

// convert the strings to unix timestamps
$a = strtotime($a);
$b = strtotime($b);

// loop over every hour (3600sec) between the two timestamps
for($i = 0; $i < $b - $a; $i += 3600) {
  // add the current iteration and echo it
  $t = date('H:i', $a + $i);
  $f = date('H:i', strtotime($t) + 3600);
  echo $t.' - '.$f.'<br>';
}


?>