<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['slug', 'title', 'description', 'is_private'];

    protected $dates = ['created_at', 'updated_at'];
    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}
