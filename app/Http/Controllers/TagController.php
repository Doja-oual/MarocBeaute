<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Exception;

class TagController extends Controller
{
    public function index()
    {
       
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        // Afficher la vue pour créer un nouveau tag
        return view('tags.create');
    }

    public function store(Request $request)
    {
        try {
            // Validation des données
            $form = $request->validate([
                'nom' => 'required|string|unique:tags,nom', // Nom du tag unique
            ]);

            // Créer le tag
            Tag::create($form);

            return redirect()->route('tags.index')->with('success', 'Tag ajouté avec succès !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // Trouver le tag à éditer
            $tag = Tag::findOrFail($id);
            return view('tags.edit', ['tag' => $tag]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validation des données
            $form = $request->validate([
                'nom' => 'required|string|unique:tags,nom,' . $id . ',id', // Nom du tag unique
            ]);

            // Trouver et mettre à jour le tag
            $tag = Tag::findOrFail($id);
            $tag->update($form);

            return redirect()->route('tags.index')->with('success', 'Tag mis à jour avec succès !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Trouver et supprimer le tag
            $tag = Tag::findOrFail($id);
            $tag->delete();

            return redirect()->route('tags.index')->with('success', 'Tag supprimé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
