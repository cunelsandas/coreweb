<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Style extends Model
{
    //
    protected $connection = 'db2';

    protected $table = 'settings';

    protected $fillable =
        ['bg_col']
    ;



}
