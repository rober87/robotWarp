<?php


function moveForward($posX, $posY, $dir)
{
    echo "At position (" . $posX . "," . $posY . ")\n";
    switch ($dir) {
        case 'N':
            $end = [$posX, $posY - 1];
            return $end;
            break;
        case 'E':
            $end = [$posX + 1, $posY];
            return $end;
            break;
        case 'S':
            $end = [$posX, $posY + 1];
            return $end;
            break;
        case 'W':
            $end = [$posX - 1, $posY];
            return $end;
            break;
    }
}

function moveBackwards($posX, $posY, $dir)
{
    echo "At position (" . $posX . ',' . $posY . ")\n";
    switch ($dir) {
        case 'N':
            $end = [$posX, $posY + 1];
            return $end;
            break;
        case 'E':
            $end = [$posX - 1, $posY];
            return $end;
            break;
        case 'S':
            $end = [$posX, $posY - 1];
            return $end;
            break;
        case 'W':
            $end = [$posX + 1, $posY];
            return $end;
            break;
    }
}

function turning($command)
{
    if ($command == 'r') {
        $current = $GLOBALS['curDir'];
        $dirs = $GLOBALS['dirs'];
        $GLOBALS['curDir'] = (($current + 1) % 4);
        echo "Robot turning right from " . $dirs[$current] . ", now facing " . $dirs[$GLOBALS['curDir']] . "\n";
    } else {
        $current = $GLOBALS['curDir'];
        $dirs = $GLOBALS['dirs'];
        $GLOBALS['curDir'] = (($current + 3) % 4);
        echo "Robot turning left from " . $dirs[$current] . ", now facing " . $dirs[$GLOBALS['curDir']] . "\n";
    }
}

function crash($posX, $posY)
{
    $obstacles = $GLOBALS['obstacles'];
    foreach ($obstacles as $obs){
        if (($obs[0] == $posX) && ($obs[1] == $posY)){
            return true;
        }
    }
    return false;
}

function outOfBounds($posX, $posY) {
    if ($posX <= 0 || $posX >= $GLOBALS['gridSize'] || $posY <= 0 || $posY >= $GLOBALS['gridSize']) {
        return true;
    }else {
        return false;
    }
}
