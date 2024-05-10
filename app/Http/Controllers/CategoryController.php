<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $categories = Category::all();
        // return $categories; check database
        return view('categories.index_categories',
            compact('categories' )
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.form_categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi eror jika d save ga da isinya
        $request->validate([
            'name' => 'required|min:5|max:20',//name harus diisi
            'slug' => 'required',
            'icon' => 'required'
        ]);

        //check validation data
        // dd($request->all());
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Category::find($id);  //select * from categories where id = $id
        return view('categories.detail_categories',[
            'data' => $cat
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('categories.edit_categories',compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:5|max:20',//name harus diisi
            'slug' => 'required',
            'icon' => 'required'
        ]);

        $category->name = $request -> name;
        $category-> slug =$request -> slug;
        $category-> icon = $request -> icon;

        $category-> update();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}