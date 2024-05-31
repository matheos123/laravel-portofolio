<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;
use App\Models\PortofolioItem;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.portofolio-category.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio-category.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required','max:200'],
        ]);
        // dd($request ->all());

        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.category.index');

    }   

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $category = Category::findOrFail($id);

        return view('admin.portofolio-category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=>['required','max:200'],
        ]);
        // dd($request ->all());

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $category = Category::findOrFail($id);
        $hasItem = PortofolioItem::where('category_id',$category->id)->count();
        if($hasItem == 0){
                    $category->delete();
                    return true;
        }
        return response(['status' =>'error']);
    }
}
