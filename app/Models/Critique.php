<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critique extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'critique',
        'visible',
        'candidature_id',
    ];

    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
}
