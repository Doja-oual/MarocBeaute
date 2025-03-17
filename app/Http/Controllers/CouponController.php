<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Exception;

class CouponController extends Controller
{

    public function index(){
        try{
            $coupons=Coupon::all();
            return view('coupon.index',['coupons'=>$coupons]);
        }catch (Exception $e) {
            return view('coupon.error', ['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request){
        try{
            $form=$request->validate([
                'code'=>'required|string|unique:coupons,code',
                'percentage' => 'required|integer',
                'expire' => 'required|date',
                'count_use' => 'required|integer',
            ]);
            Coupon::create($form);
            return redirect()->route('coupon.index')->with('success','Coupon ajoute avec succes!');

        } catch (Exception $e) {
            return view('coupon.error', ['error' => $e->getMessage()]);
        }
    }
        public function destroy($id)
        {
            try{
                $coupon= Coupon::findOrFail($id);
                $coupon->delete();
                return redirect()->route('coupon.index')->with('success','Coupon supprime avec succes');

            } catch (Exception $e) {
            return view('coupon.error', ['error' => $e->getMessage()]);
        }
        }

        public function update(Request $request ,$id){
             try{
                $form=$request->validate([
                    'code' => 'required|string|unique:coupons,code,' . $id . ',id',
                    'percentage' => 'required|integer',
                    'expire' => 'required|date',
                    'count_use' => 'required|integer',
                ]);
                $coupon= Coupon::findOrFail($id);
                $coupon->update($form);
                return redirect()->route('coupon.index')->with('success','Coupon mis a jour avec succes');
             } catch (Exception $e) {
                return view('coupon.error', ['error' => $e->getMessage()]);
            }
        }
        public function verify(Request $request){
            try{
                $coupon=Coupon::where('code',$request->code)->firstOrFail();

                if($coupon->count_use>0){
                    if($coupon->expire<now()){
                        return redirect()->back()->with('error','Le coupon a expiré');

                    }else{
                        $coupon ->count_use--;
                        $coupon->save();
                        return redirect()->back()->with('success','Coupon valide,réduction de ' . $coupon->percentage . '% appliquée');
                    }
                    }else{
                        return redirect()->back()->with('error','Le nombre d\'utilisations est atteint.');

                    }
                } catch (Exception $e) {
                    return redirect()->back()->with('error','Code de coupon non valide.');
                }
            }
        }
    

    
