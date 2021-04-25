<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pays',
        'governat',
        'ville',
        'adresse',
        'code_postal',
        'profile_id',
    ];
}
