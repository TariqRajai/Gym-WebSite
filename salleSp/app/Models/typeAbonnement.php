<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeAbonnement extends Model
{
    use HasFactory;
    protected $table = 'type_abonnements';
    protected $primaryKey = 'CodeAbo';


        protected $fillable = [
                'LibelleAbo','DureeMois',

    ];
}
