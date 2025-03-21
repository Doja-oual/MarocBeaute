<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Tag extends Model
{
    
    protected $fillable=['nom'];

    public function produits(){
        return $this->belongsToMany(Product::class,'produit_tag');
    }
}
