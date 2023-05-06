<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['lecture', 'year', 'department', 'teacher', 'review_easy', 'review_comment'];
}
