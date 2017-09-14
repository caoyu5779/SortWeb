<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    //object转换为array
    public static function object_2_array($object)
    {
        $object = json_decode(json_encode($object), true);

        return $object;
    }
}
