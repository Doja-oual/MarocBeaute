<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepositorieInterface;
use App\Http\Requests\ProductRequest;
use App\Models\Tag;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;


class ProductController extends Controller
{


    protected $ProductRepositorieInterface;

    public function __construct(ProductRepositorieInterface $ProductRepositorieInterface){
        $this->ProductRepositorieInterface=$ProductRepositorieInterface;
    }
   
    protected function getCategories()
{
    try {
       
        $categories = \App\Models\Category::all();
        
        
        if ($categories->isEmpty()) {
            return collect();
        }
        
        return $categories;
    } catch(Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
}
    public function index()
    {
        $categories = $this->getCategories();
        $products=$this->ProductRepositorieInterface->getAll();
        if(count($products)>0){
            return view('produits.index',compact('products')); 
        }else{
            return view('produits.index')->with('message', 'Products not found');
   
        }
    }

    public function create(){
        $tags =\App\Models\Tag::all();
        $sub_categories = \App\Models\Sub_Category::all();
        return view('produits.create', compact('sub_categories','tags'));
    }

    public function store(ProductRequest $request){
        try{
            $form = $request->validated(); 
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $form['image'] = $imageName;
    
            if($form['qte'] == 0){
                $form['in_stock'] = false;
            } else {
                if($form['in_stock'] == "true"){
                    $form['in_stock'] = true;
                } else {
                    $form['in_stock'] = false;
                }
            }
            $form['status'] = $request->input('status', 'draft');
            
            $product = $this->ProductRepositorieInterface->create($form);
            // dd($request->all());
            if ($request->has('tags') && is_array($request->tags)) {
                $product->tags()->sync($request->tags);
            }
            return redirect()->route('produits.index')
                ->with('success', 'Product "' . $product->title . '" created successfully');
        } catch(Exception $e){
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


     public function edit($id){
        $tags = Tag::all();
        $product=Product::findOrFail($id);
        return view('produits.edit',compact('product','tags'));
     }

     public function update(Request $request, $id)
     {
         try {
             $form = $request->validate([
                 'title' => 'required|string',
                 'price' => 'required|numeric|min:0',
                 'discounted_price' => 'nullable|numeric|min:0',
                 'reference' => 'required|string|unique:products,reference,'.$id.',id',
                 'description' => 'required|string',
                 'image' => 'required',
                 'qte' => 'required|integer|min:0',
                 'id_sub_catg' => 'required|integer|exists:sub_categories,id',
                 'in_stock' => 'required',
             ]);
             
             $product = Product::find($id);
             
             if($product->image == $request->image) {
                 $imageName = $product->image;
             } else {
                 $image = $request->file('image');
                 $imageName = time() . '.' . $image->getClientOriginalExtension();
                 $image->move(public_path('images/products'), $imageName);
             }
             
             $form['image'] = $imageName;
             
             if($form['qte'] == 0) {
                 $form['in_stock'] = false;
             } else {
                 if($form['in_stock'] == "true") {
                     $form['in_stock'] = true;
                 } else {
                     $form['in_stock'] = false;
                 }
             }
             $form['status'] = $request->input('status', 'draft');
             $this->ProductRepositorieInterface->update($id, $form);
             if ($request->has('tags')) {
                $product->tags()->sync($request->tags);
            }
             
             return redirect()->route('produits.index')
                 ->with('success', 'Product updated successfully');
         } catch(Exception $e) {
             return redirect()->back()
                 ->withInput()
                 ->with('error', $e->getMessage());
         }
     }
    
     public function destroy($id)
     {
         try {
             $this->ProductRepositorieInterface->delete($id);
             return redirect()->route('produits.index')
                 ->with('success', 'Product deleted successfully');
         } catch(Exception $e) {
             return redirect()->route('produits.index')
                 ->with('error', $e->getMessage());
         }
     }

}

