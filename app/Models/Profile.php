<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'civilite',
        'motivation',
        'telephone',
        'image',
        'date_naissance',
        'cv_id',
    ];

    public function langues()
    {
        return $this->belongsToMany(Langue::class);
    }
    public function adresse()
    {
        return $this->hasOne(Adresse::class);
    }
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
