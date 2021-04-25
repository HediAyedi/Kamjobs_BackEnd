<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'niveau_experience',
        'niveau_education',
        'status',
        'salaire',
        'nbre_annee',
        'candidat_id',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function emploiTypes()
    {
        return $this->belongsToMany(EmploiType::class);
    }
    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }
    public function domaines()
    {
        return $this->belongsToMany(Domaine::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
