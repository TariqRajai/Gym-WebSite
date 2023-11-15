<?php

namespace App\Models;
use App\Models\compte;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    public function compte()
    {
        return $this->belongsTo(Compte::class, 'Id_Compte', 'IdComptes');
    }
    


}
