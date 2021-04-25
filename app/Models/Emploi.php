<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genre',
        'experience',
        'niveau_education',
        'description_emploi',
        'exigence_emploi',
        'etat',
        'employeur_id',
    ];

    public function langues()
    {
        return $this->belongsToMany(Langue::class);
    }
    public function emploiTypes()
    {
        return $this->belongsToMany(EmploiType::class);
    }
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}
