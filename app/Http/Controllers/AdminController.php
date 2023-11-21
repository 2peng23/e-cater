<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function cake()
    {
        $cakes = Cake::latest()->paginate(5);
        $category = Category::latest()->get();
        return view('admin.cake', compact('category', 'cakes'));
    }
    // create cake category
    public function createCategory(Request $request)
    {
        $name = $request->category_name;
        $existing = Category::where('category_name', $name)->first();
        if ($existing) {
            return response()->json([
                'error' => 'Category already exsisted!'
            ]);
        }
        $category = new Category();
        $category->category_name = $name;
        $category->save();
        return response()->json([
            'success' => 'Category added!'
        ]);
    }
    public function addCake(Request $request)
    {
        $cake = new Cake();
        $cake->category = $request->category;
        $cake->price = $request->price;
        // image
        $photo = $request->image;
        $photoname = $photo->getClientOriginalName();
        $request->image->move('images', $photoname);
        $cake->image = $photoname;
        $cake->save();
        return response()->json([
            'success' => "Cake added!"
        ]);
    }
}
