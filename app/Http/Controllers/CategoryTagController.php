<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryTagController extends Controller
{
    public function index()
    {
        return view('categories-tags.category-tag'); 
    }
}
