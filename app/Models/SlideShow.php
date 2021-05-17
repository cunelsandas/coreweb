<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class SlideShow extends Model
{
    //
    protected $connection = 'db2';

    protected $table = 'uploads';

    protected $fillable = [
        'file_name', 'table_name'
    ];

}
