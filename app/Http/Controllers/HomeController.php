<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        $cakes = DB::table('cakes')->orderBy('updated_at', 'desc')->take(8);
        $cake_category = $request->cake_category;
        if ($cake_category) {
            $cakes->where('category', 'like', "%{$cake_category}%");
        }
        $cakes = $cakes->get();
        $allCakes = Cake::all();
        $category = Category::all();
        return view('default.home', compact('cakes', 'cake_category', 'category', 'allCakes'));
    }
    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->usertype == 0) {
                $cakes = DB::table('cakes')->orderBy('updated_at', 'desc')->take(8);
                $cake_category = $request->cake_category;
                if ($cake_category) {
                    $cakes->where('category', 'like', "%{$cake_category}%");
                }
                $cakes = $cakes->get();
                $allCakes = Cake::all();
                $category = Category::all();
                return view('user.home', compact('cakes', 'cake_category', 'category', 'allCakes'));
            } else {
                return view('admin.home');
            }
        }
        return view('default.home');
    }
}
