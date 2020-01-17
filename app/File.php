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
        'compressed_file_path',
        'compressed_file_size',
        'compressed_file_items'
    ];
}
