<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'email', 'adresse', 'numerotelephone', 'sexe',
    ];

    // Relation avec les commandes


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
