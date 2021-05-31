<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantAnswer extends Model
{

    public $table = 'applicant_answers';

    public $fillable = [
        'placement_applicant_id',
        'placement_question_id',
        'type',
        'answer',
        'score',
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Models\PlacementApplicant', 'placement_applicant_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\PlacementQuestion', 'placement_question_id');
    }
}
