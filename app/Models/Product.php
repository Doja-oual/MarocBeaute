<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Product extends Model
{
    use HasFactory;
     protected $fillable=[
        'title',
        'description',
        'price',
        'discounted_price',
        'reference',
        'image',
        'qte',
        'qte_order',
        'in_stock',
        'id_sub_catg',
        'status',
     ];

     public function sub_category(){
        return $this->belongsTo(Sub_Category::class,'id_sub_catg','id');

     }
     public function users_cart(){
         return $this->belongsToMany(User::class,'carts');
          

     }

     public function tags(){
      return $this->belongsToMany(Tag::class,'produit_tag', 'produit_id');
     }
}
