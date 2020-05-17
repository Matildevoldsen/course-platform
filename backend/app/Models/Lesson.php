<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
