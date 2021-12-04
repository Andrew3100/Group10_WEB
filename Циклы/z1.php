<?php

for ($i = 0; $i < 5000000; $i++) {
    $r = rand(1,1000000);
    echo $i + $r;
    echo '<br>';
}


