<?php

setcookie('user','exit',time() - 10000*24, "/");
echo "<script>window.location.replace('index1.php');</script>";
