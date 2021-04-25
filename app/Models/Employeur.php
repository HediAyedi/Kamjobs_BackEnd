<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employeur extends User
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'nom_entreprise',
        'description_entreprise',
        'matricule',
        'site_web',
        'adresse',
        'telephone',
        'logo',
        'verifie',
        'active',
    ];



    public function secteurActivite()
    {
        return $this->hasOne(SecteurActivite::class);
    }
    public function emplois()
    {
        return $this->hasMany(Emploi::class);
    }
    public function candidatures()
    {
        return $this->hasManyThrough(Candidature::class, Emploi::class);
    }
}
