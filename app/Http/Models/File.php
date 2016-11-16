<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    
    public function getLengthAttribute($value)
    {
        if ($value <= 0) return 0;
        
        $s = array('B', 'Kb', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($value) / log(1024));
            
        return sprintf('%.2f '.$s[$e], ($value / pow(1024, $e)));       
    }    
}
