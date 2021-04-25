<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'langue',
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
    public function emplois()
    {
        return $this->belongsToMany(Emploi::class);
    }
}
