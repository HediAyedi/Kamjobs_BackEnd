<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emploi_type',
    ];

    public function cvs()
    {
        return $this->belongsToMany(Cv::class);
    }
    public function emplois()
    {
        return $this->belongsToMany(Emploi::class);
    }
}
