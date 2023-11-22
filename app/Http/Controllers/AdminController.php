<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function cake(Request $request)
    {

        $cakes = DB::table('cakes')->orderBy('updated_at', 'desc');
        $category = $request->category;
        if ($category) {
            $cakes->where('category', 'like', "%{$category}%");
        }
        // Paginate the results
        $cakes = $cakes->paginate(5);

        // Append parameters to pagination links
        $cakes->appends(['category' => $category]);
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
        $folder_name = $request->category;

        // Create the directory if it doesn't exist
        Storage::makeDirectory('public/images/cake/' . $folder_name);

        // Move the uploaded image to the specified directory
        $photo->move(public_path('images/cake/' . $folder_name), $photoname);

        // Save the image path to the database
        $cake->image = 'images/cake/' . $folder_name . '/' . $photoname;
        $cake->save();


        return response()->json([
            'success' => "Cake added!"
        ]);
    }
    public function editStock(Request $request)
    {
        $id = $request->id;
        $cake = Cake::find($id);
        return response()->json([
            'cake' => $cake
        ]);
    }
    public function addStock(Request $request)
    {
        $id = $request->cake_id;
        $stock = $request->stock;
        $cake = Cake::find($id);
        $cake->stock = $stock;
        $cake->save();
        return response()->json([
            'success' => 'Stock updated'
        ]);
    }
}
