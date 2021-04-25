<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'test_id',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
