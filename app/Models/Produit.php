<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $fillable = ['name', 'description','reference','image', 'price', 'category_id', 'marque_id'];



    
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function marque()
    {
        return $this->belongsTo(marque::class, 'marque_id');
    }


}

    