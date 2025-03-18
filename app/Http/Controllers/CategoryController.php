<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.category', ['categories' => $categories]);
    }

    public function getCategory_Subcategories()
    {
        $categories = Category::with('sub_categories')->get();
        return view('categories.subcategories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        try {
            $form = $request->validate([
                'name' => 'required|string|unique:categories,name',
                'description' => 'nullable|string',
            ]);

            $category = Category::create($form);

            return redirect()->route('categories.category')->with('success', 'Catégorie ajoutée avec succès !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            return view('categories.edit', ['category' => $category]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $form = $request->validate([
                'name' => 'required|string|unique:categories,name,' . $id . ',id',
                'description' => 'nullable|string',
            ]);

            $category = Category::findOrFail($id);
            $category->update($form);

            return redirect()->route('categories.category')->with('success', 'Catégorie mise à jour avec succès !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.category')->with('success', 'Catégorie supprimée avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}