<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($userid){
        try{
            $user=User::findOrFail($userid);
            $carts=Cart::where('user_id',$user->id)->with('product.sub_category.category')->get();
             return view('cart.index',['carts'=>$carts,'user'=>$user]);

        }catch(Exception $e){
            return view('cart.error',['error'=>$e->getMessage()]);
        }
    }

    public function count($userId)
    {
        try{
            $count=Cart::where('user_id',$userId)->count();
            return view('cart.count',['count'=>$count]);
        }catch(Exception $e){
            return view('cart.error',['error'=>$e->getMessage()]);

        }
    }

    public function store(Request $request){
        try{
            $form=$request->validate([
                'user_id'=>'required|numeric|exists:users,id',
            'product_id'=>'required|numeric|exists:products,id' ,
            ]);
            Cart::create($form);
            return view('cart,index',
            ['carts'=> Cart::where('user_id',$form['user_id'])->with('product.sub_category.category')->get(),
            'user' => User::find($form['user_id']),
             'success' => 'Produit ajouté au panier !']);
        }catch(Exception $e){
            return view('cart.error',['error'=>$e->getMessage()]);

        }
    }

    public function destroy($id){
        try{
            $cart=Cart::findOrFail($id);
            $user_id=$cart->user_id;
            $cart->delete();
             return view('cart.index',['carts'=>Cart::where('user_id',$user_id)]);

        }catch(Exception $e){
            return view('cart.error',['error'=>$e->getMessage()]);

        }
    }
}
