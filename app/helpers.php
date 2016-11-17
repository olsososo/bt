<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function get_files_path($infohash)
{
    $sub_dir = ['/'];
    for($i = 0;$i <= 6;$i++)
    {
        $t = substr($infohash, 0, 2);
        $infohash = substr($infohash, 2);
        
        $sub_dir[] = $t;
    }
    
    $sub_dir[] = $infohash;
    $path = implode('/', $sub_dir);
    return $path;
}
