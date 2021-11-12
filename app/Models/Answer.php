<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public $table = 'answers';

    public $fillable = [
        'question_id',
        'answer',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
