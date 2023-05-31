<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('admin.categories.index', ['cats' => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->name);
        $request->validate([
            'name' => ['required']
        ]);

        Category::create([
            'name' => $request['name'],
            //slug dung - phan cach
            'slug' => Str::of(Str::lower($request['name']))->slug('-')
        ]
        );
        session()->flash('cat-inserted', 'Add new category successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $cat)
    {
        return view('admin.categories.edit', ['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $cat)
    {
        $cat->name = request('name');
        $cat->slug = Str::of(Str::lower(request('name')))->slug('-');
        $cat->save();
        session()->flash('cat-updated', 'Update Category Successfully'.$cat->id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $cat)
    {
         $cat->delete();
        session()->flash('cat-deleted', 'Delete Category Successfully'.$cat->id);
        return back();
    }
}