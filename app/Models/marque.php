<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marque extends Model
{
    use HasFactory;

    protected $table = 'marques';

    
    protected $fillable = ['nom', 'description'];



    public function produits()
    {
        return $this->hasMany(Produit::class, 'marque_id');
    }
    

}
