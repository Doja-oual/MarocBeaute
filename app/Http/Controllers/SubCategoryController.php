<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Categoy;
use App\Models\Category;
use Exception;

class SubCategoryController extends Controller
{
    public function index(){
        $sub_category= Sub_Categoy::with('category')->get();
        return view('Sub_category.index',compact('sub_categories'));
 
    }

    public function create(){
        $categories=Category::all();
        return view('sub_categories.create',compact('categories'));

    }

    public function store(Request $request){
        try{
             $form=$request->validate([
                "name" => 'required|string|unique:sub_categories,name',
                "category_id" => 'required|integer|exists:categories,id',
               "image"=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             ]);
              $image=$request->file('image');
              $imageName=time(). '.' .$image->getClientOriginalExtension();//function 
              $image->move(public_path('images/sub_categories'),$imageName);

              Sub_Categoy::create([
                "name"=>$form['name'],
                "category_id"=>$form['category_id'],
                "image"=>'sub_categories/' .$imageName
              ]);
              return redirect()->route('sub_categories.index')->with('success','Sous-catégorie ajoutée avec succès !');

                  
            } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        // afficher une sous_categories
    }
        public function show($id){
            $sub_category=Sub_Categoy::with('category')->findOrFail($id);
            return view('sub_categories.show',compact('sub_category'));

        }

        public function edit($id){
            $sub_category=Sub_Categoy::findOrFail($id);
            $categories=Category::all();
            return view('sub_categories.edit',compact('sub_category','categories'));

        }

        public function update(Request $request ,$id){
            try{
                $sub_category=Sub_Categoy::findOrFail($id);
                $form = $request->validate([
                    "name" => 'required|string|unique:sub_categories,name,' . $id,
                    "category_id" => 'required|integer|exists:categories,id',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
         // Mise à jour de l'image si une nouvelle est fournie

         if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName = 'sub_categories/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sub_categories'), $imageName);
            $sub_category->image=$imageName;
         }

         $sub_category->name=$form['name'];
         $sub_category->category_id=$form['category_id'];
         $sub_category->save();
         return redirect()->route('sub_categories.index')->with('success', 'Sous-catégorie mise à jour avec succès !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());

            }
        }

    //supprime sous_category
    public function destroy($id){
        try{
            $sub_category=Sub_Categoy::findOrFail($id);
            $sub_category->delete();
            return redirect()->route('sub_categories.index')->with('success', 'Sous-catégorie supprimée avec succès !');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    }
    

