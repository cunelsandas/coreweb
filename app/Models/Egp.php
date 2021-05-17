<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Egp extends Model
{
    //
    protected $connection = 'db2';

    protected $table = 'egp_code';

    protected $fillable =
        ['egp_code']
    ;



}
