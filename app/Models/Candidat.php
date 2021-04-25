<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Candidat extends User
{
    use HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'verifie',
    ];

    public function cv()
    {
        return $this->hasOne(Cv::class);
    }
    public function profile()
    {
        return $this->hasOneThrough(Profile::class, Cv::class);
    }
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    public function critiques()
    {
        return $this->hasManyThrough(Critique::class, Candidature::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
