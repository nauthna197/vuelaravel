<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get(){
        $category = Category::all();
        return response()->json($category);
    }
}
