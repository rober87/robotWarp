<?php


function moveForward($posX, $posY, $dir)
{
    echo 'At position [', $posX . ',' . $posY . "]\n";
    echo 'move forward facing ', $dir, "\n";
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
    echo 'At position [', $posX . ',' . $posY . "]\n";
    echo 'move backwards facing ', $dir, "\n";
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
        echo $current . "\n";
        $dirs = $GLOBALS['dirs'];
        $GLOBALS['curDir'] = ($current % 4) + 1;
        echo $current . "\n";
        echo 'turning ' . $command . ' from ' . $dirs[$current] . ', now facing ', $dirs[$GLOBALS['curDir']] . "\n";
    } else {
        $current = $GLOBALS['curDir'];
        echo $current . "\n";
        $dirs = $GLOBALS['dirs'];
        $GLOBALS['curDir'] = (($current + 3) % 4);
        echo $current . "\n";
        echo 'turning ' . $command . ' from ' . $dirs[$current] . ', now facing ', $dirs[$GLOBALS['curDir']] . "\n";
    }
}

function crash($posX, $posY)
{
    if ($posX < 0 || $posY < 0)
        return true;
    else return false;
}
