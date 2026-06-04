<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        // Raw SQL
        // $categories = DB::select("SELECT * FROM categories");
        // return view("categories.list", compact('categories'));

        // qury builder
        // $categories = DB::table("categories")->get();
        // return view("categories.list", compact('categories'));

        // Eloquent ORM
        $categories = Category::all();
        return view("categories.list", compact('categories'));
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(Request $request)
    {
        Category::create([
            "name" => $request->name,
            "desc" => $request->desc
        ]);

        return redirect("categories");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update($id)
    {
        $categories = Category::find($id);
        $categories-> update([
            'name' => request()->name,
            'desc' => request()->desc
        ]);

        return redirect("categories");
    }

    public function destroy($id)
    {
        $categories = Category::find($id)->delete();
        return redirect("categories");
    }
}
