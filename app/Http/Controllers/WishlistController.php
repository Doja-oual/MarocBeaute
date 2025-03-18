<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
class WishlistController extends Controller
{
   public function index($id){
    try{
        $user=User::findOrFail($id);
        if($user){
           $wishlists=Wishlist::select('wishlists.*')
           ->selectSub(function($query){
            $query->select('id')
            ->from('products')
            ->whereColumn('products.id', 'wishlists.prod_id')
            ->limit(1);
         },'id_prod')
         ->selectSub(function ($query) {
            $query->select('id')
                ->from('carts')
                ->whereColumn('carts.product_id', 'wishlists.prod_id')
                ->limit(1);
        }, 'cart_id')
        ->where('user_id',$user->id)->with('product.sub_category.category')
        ->paginate(10);

        if(count($wishlists)>0){
            return view('wishlist.index', compact('wishlists'));

        }
        else{
            return view('wishlist.empty', [
                'message' => 'Products in wishlist Not found'
            ]);
        }
        }
        else{
            return view('errors.user-not-found',['message'=>'User Not found']);

        }
    }   catch(Exception $e){
        return view('errors.error', [
            'message' => $e->getMessage()
        ]);
    }
   }

   public function destroy($id){

    try{
        $wishlists= Wishlist::findOrFail($id);
        if($wishlists){
            $userId = $wishlists->user_id;
            $wishlists->delete();
            return redirect()->route('wishlist.index', ['id' => $userId])
            ->with('success', 'Product deleted from wishlist');
         }
            else return redirect()->back()
            ->with('error', 'Product not found in wishlist');
       }catch (Exception $e) {
        return redirect()->back()
            ->with('error', $e->getMessage());
    }
        
    }

    public function store(Request $request){
        try{
            $form=$request->validate([
                'user_id' => 'required|numeric|exists:users,id',
                'prod_id' => 'required|numeric|exists:products,id', 
            ]);
            Wishlist::create([
                'user_id'=>$form['user_id'],
                'prod_id'=>$form['prod_id'],
            ]);
            return redirect()->back()->with('success', 'Product added to wishlist');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function count($userid){
        try{
            $count=Wishlist::where('user_id',$userid)->count();
            return view('whishlist.count',['count'=>$count]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
   }

