<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class File extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'files';
    protected $fillable = [
        'message',
        'from_email',
        'to_email',
        'file_path',
        'size',
        'items'
    ];
}
