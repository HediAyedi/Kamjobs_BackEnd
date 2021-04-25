<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cv',
        'lettre_motivation',
        'status',
        'candidat_id',
        'emploi_id',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function critique()
    {
        return $this->hasOne(Critique::class);
    }
    public function emploi()
    {
        return $this->belongsTo(Emploi::class);
    }
}
