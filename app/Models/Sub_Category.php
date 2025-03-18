<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = 'sub_categories';
    
    protected $fillable = ['name', 'category_id', 'image'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}