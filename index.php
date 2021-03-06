<?php


require 'robot.php';
require 'utils.php';
require 'top.php';


$moveArray = [];
$movKey=array('f' => 'forward', 'b' => 'backwards');
$posX = $GLOBALS['startPoint'][0];
$posY = $GLOBALS['startPoint'][1];
$destination = null;

echo "Enter movements. Only f, b, r or l will be processed!: ";
$string = readline("Enter movements. Only f, b, r or l will be processed!: ");
$moveArray = filterString($string);

$direction = $GLOBALS['curDir'];
echo "Robot starts warping in position " . $posX . ", " . $posY . ", looking " . $GLOBALS['dirs'][$direction] ."\n";
$crash = false;
foreach ($moveArray as $movement) {
    if ($movement == 'r' || $movement == 'l') {
        turning($movement);
        $direction = $GLOBALS['curDir'];
    } else {
        if ($movement == 'f') {
            $destination = moveForward($posX, $posY, $GLOBALS['dirs'][$direction]);
        } else if ($movement == 'b') {
            $destination = moveBackwards($posX, $posY, $GLOBALS['dirs'][$direction]);
        }
        else {
            $destination = null;
        }

        if ($destination != null){
            if (crash($destination[0], $destination[1])) {
                exit("Robot crashed in position (" . $destination[0] . ", " . $destination[1] . ")\n" .
                "Last position recorded is (" . $posX . "," . $posY . ")\n");
            } else if (outOfBounds($destination[0], $destination[1])) {
                exit("Robot out of bounds, last position recorded is " . $posX . ", " . $posY . ")\n");
            } else {
                echo "Robot moving " . $movKey[$movement] . " to position (" . $destination[0] . ',' . $destination[1] . ")\n";
                $posX = $destination[0];
                $posY = $destination[1];
            }
        }
    }
}
echo "FINAL POSITION: (" . $posX . ", " . $posY . ")\n";
