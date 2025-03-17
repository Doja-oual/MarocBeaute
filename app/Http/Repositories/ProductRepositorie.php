<?php
namespace App\Http\Repositories;
use App\Http\Repositories\ProductRepositorieInterface;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuninate\Database\Eloquent\Collection;

class ProductRepositorie implements ProductRepositorieInterface{

    public function getById($id)
    {
        return Product::findOrFail($id);
    }
     public function getInfoProduct($id, $userId)
     {
        return Product::select('products.*')
        ->selectSub(function($query) use ($userId){
            $query->select('id')
            ->from('wishlists')
            ->whereColumn('wishlists.prod_id', 'products.id')
            ->where('wishlists.user_id',$userId)
            ->limit(1);
        } ,'wishlist_id')->selectSub(function($query) use ($userId){
            $query->select('id')
            ->from('carts')
            ->whereColumn('carts.product_id', 'products.id')
            ->where('carts.user_id',$userId)
            ->limit(1);
        },'cart_id' )
        ->where('id',$id)
        ->with('sub_category.category')
        ->dba_firstkeyOrFail();
     }

     public function create(array $data)
     {
        return Product::create($data);
     }

     public function getAll()
     {
        return Product::with('sub_category.category')->paginate(10);

     }

     public function update($id, array $data)
     {
        $product= $this->getById($id);
        $product->update($data);
        return $product;
     }

     public function delete($id)
     {
        $product=$this->getById($id);
        $product->delete();
     }

     public function popular($userId){
        return Product::select('products.*')
        ->selectSub(function ($query) use ($userId) {
            $query->select('id')
            ->from('wishlists')
            ->whereColumn('wishlists.prod_id', 'products.id')
            ->where('wishlists.user_id', $userId)
            ->limit(1);
        }, 'wishlist_id')
        ->selectSub(function ($query) use ($userId) {
            $query->select('id')
            ->from('carts')
            ->whereColumn('carts.product_id', 'products.id')
            ->where('carts.user_id', $userId)
            ->limit(1);
        }, 'cart_id')
        ->with('sub_category')->orderBy('qte_order','desc')->take(6)->get();  
    }


}