<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Game extends Eloquent
{


    public function isGuarded($key)
    {
        return false;
    }

}




