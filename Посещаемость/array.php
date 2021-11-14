<?php


$cells_addr = array('A', 'B', 'C', 'D', 'E',
                    'F', 'G', 'H', 'I', 'J',
                    'K', 'L', 'M', 'N', 'O',
                    'P', 'Q', 'R',  'S', 'T',
                    'U', 'V', 'W', 'X', 'Y',
                    'Z',);
$cells = $cells_addr;
$i = 0;
while ($cells[count($cells) - 1] != 'AG') {
        $cells[] = $cells_addr[0].$cells_addr[$i];
        $i++;
}


