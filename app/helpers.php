<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function get_files_path($infohash)
{
    for($i = 0;$i < 6;$i++)
    {
        $t = substr($infohash, 0, 2);
        $infohash = substr($infohash, 2);
        
        $sub_dir[] = $t;
    }
    
    $sub_dir[] = $infohash;
    $path = implode('/', $sub_dir);
    return '/'.$path;
}

function size_format($value)
{
    if ($value <= 0) {
        $e = 0;
    } else {
        $s = array('B', 'Kb', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($value) / log(1024));        
    }

    return sprintf('%.2f '.$s[$e], ($value / pow(1024, $e)));       
}
