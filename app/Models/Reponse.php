<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'response',
        'correct',
        'selected',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
