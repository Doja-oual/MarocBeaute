<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory ;
    protected $fillable =[
        'user_id',
        'prod_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
