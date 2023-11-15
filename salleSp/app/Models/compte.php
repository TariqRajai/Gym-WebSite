<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

  /******* */

class compte extends Authenticatable
{
    use HasFactory;
         protected $table='comptes';
         protected $primaryKey = 'IdComptes';
public $incrementing = false;

        protected $fillable = [
        'email',
        'password',
        'nom',
        'prenom',
        'tele',
        'cni',
        'image',
        'gender',
        'id_sport',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        /**

     * Interact with the user's first name.

     *

     * @param  string  $value

     * @return \Illuminate\Database\Eloquent\Casts\Attribute

     */

     
}
