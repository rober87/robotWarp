<?php
$GLOBALS['dirs'] = array(0 => 'N', 1 => 'E', 2 => 'S', 3 => 'W');
/*Starting direction. See $GLOBALS['dirs'] for a reference*/
$GLOBALS['curDir'] = 0;
/*Size of grid. Considering square grid*/
$GLOBALS['gridSize'] = 100;
/*Starting coordinates*/
$GLOBALS['startPoint'] = [50, 50];
/*Set points for obstacles*/
$GLOBALS['obstacles'] = array([48,50], [4,3]);