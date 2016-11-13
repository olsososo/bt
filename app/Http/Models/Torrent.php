<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Torrent extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', $value);
    }
    
    public function getLengthAttribute($value)
    {
        $s = array('B', 'Kb', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($value) / log(1024));

        return sprintf('%.2f '.$s[$e], ($value / pow(1024, $e)));       
    }
}
