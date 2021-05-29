<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacementAnswer extends Model
{

    public $table = 'placement_answers';

    public $fillable = [
        'placement_question_id',
        'answer',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\PlacementQuestion');
    }
}
