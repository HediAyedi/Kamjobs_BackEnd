<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nbre_annee',
        'nom_entreprise',
        'poste',
        'description',
        'date_debut',
        'date_fin',
        'site_web',
        'cv_id',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
