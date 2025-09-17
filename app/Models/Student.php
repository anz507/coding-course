<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function media()
    {
        return $this->hasOne(Media::class, 'object_id', 'id')
            ->where('object_type', 'student_picture');
    }
}
