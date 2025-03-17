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
        return view('category.index', ['categories' => $categories]);
    }

    public function getCategory_Subcategories()
    {
        $categories = Category::with('sub_categories')->get();
        return view('category.subcategories', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        try {
            $form = $request->validate([
                'name' => 'required|string|unique:categories,name',
            ]);

            $category = Category::create($form);

            return view('category.index', [
                'categories' => Category::all(),
                'success' => 'Catégorie ajoutée avec succès !'
            ]);
        } catch (Exception $e) {
            return view('category.error', ['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return view('category.index', [
                'categories' => Category::all(),
                'success' => 'Catégorie supprimée avec succès.'
            ]);
        } catch (Exception $e) {
            return view('category.error', ['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $form = $request->validate([
                'name' => 'required|string|unique:categories,name,' . $id . ',id',
            ]);

            $category = Category::findOrFail($id);
            $category->update($form);

            return view('category.index', [
                'categories' => Category::all(),
                'success' => 'Catégorie mise à jour avec succès !'
            ]);
        } catch (Exception $e) {
            return view('category.error', ['error' => $e->getMessage()]);
        }
    }
}
