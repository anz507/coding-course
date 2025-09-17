<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'object_id',
        'object_type',
        'path',
        'filename',
        'mimetype',
    ];
}
