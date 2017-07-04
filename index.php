<?php


require 'robot.php';
require 'utils.php';

$GLOBALS['dirs'] = array(0 => 'N', 1 => 'E', 2 => 'S', 3 => 'W');
$GLOBALS['curDir'] = 2;
$GLOBALS['gridSize'] = 100;
$GLOBALS['startPoint'] = [2, 2];


$moveArray = [];
$posX = $GLOBALS['startPoint'][0];
$posY = $GLOBALS['startPoint'][1];

echo "Enter movements. Only f, b, r or l will be processed!: ";
$string = readline("Enter movements. Only f, b, r or l will be processed!: ");
$moveArray = filterString($string);
print_r($moveArray);

$start = $GLOBALS['curDir'];
echo "Robot starts warping in position " . $posX . ", " . $posY . ", looking " . $GLOBALS['dirs'][$start] ."\n";
$crash = false;
foreach ($moveArray as $movement) {
    if ($movement == 'r' || $movement == 'l') {
        turning($movement);
        $start = $GLOBALS['curDir'];
    } else {
        if ($movement == 'f') {
            $destination = moveForward($posX, $posY, $GLOBALS['dirs'][$start]);
        } else if ($movement == 'b') {
            $destination = moveBackwards($posX, $posY, $GLOBALS['dirs'][$start]);
        }

        if (crash($destination[0], $destination[1])) {
            exit("Robot crashed in position (" . $posX . ", " . $posY . ")\n");
        } else {
            echo 'Robot moving to position (' . $destination[0] . ',' . $destination[1] . ")\n";
            $posX = $destination[0];
            $posY = $destination[1];
        }
    }
}
echo 'FINAL POSITION: ' . $posX . ', ' . $posY;
