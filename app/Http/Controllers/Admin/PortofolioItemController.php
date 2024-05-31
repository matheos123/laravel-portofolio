<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortofolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortofolioItem;
use Illuminate\Http\Request;

class PortofolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortofolioItemDataTable $dataTable)

    {
        //
       return $dataTable->render('admin.portofolio-item.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin.portofolio-item.create',compact('categories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'image'=>['required','image','max:5000'],
            'title'=>['required','max:200'],
            'description'=>['required'],
            'category_id'=>['required','numeric'],
            'client'=>['max:200'],
            'website'=>['url']
        ]);

        $imagePath = handleUpload('image');
        $portofolioItem = new PortofolioItem();
        $portofolioItem->image = $imagePath;
        $portofolioItem->title = $request->title;
        $portofolioItem->description = $request->description;
        $portofolioItem->category_id = $request->category_id;
        $portofolioItem->client = $request->client;
        $portofolioItem->website = $request->website;


        $portofolioItem->save();

        // //toastr
        return redirect()->route('admin.portofolio-item.index')->with('success', 'Portfolio item created successfully.');
        
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
        $categories = Category::all();
        $portofolioItem = PortofolioItem::findOrFail($id);
        return view('admin.portofolio-item.edit',compact('categories','portofolioItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric'],
            'client' => ['max:200'],
            'website' => ['url']
        ]);

        $portofolioItem = PortofolioItem::findOrFail($id);

        $imagePath = handleUpload('image',$portofolioItem);
        $portofolioItem->image = (!empty($imagePath) ? $imagePath : $portofolioItem->image);
        $portofolioItem->title = $request->title;
        $portofolioItem->description = $request->description;
        $portofolioItem->category_id = $request->category_id;
        $portofolioItem->client = $request->client;
        $portofolioItem->website = $request->website;
        $portofolioItem->save();

        return redirect()->route('admin.portofolio-item.index')->with('success', 'Portfolio item updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
    $portofolioItem= PortofolioItem::findOrFail($id);
    // deleteFileIfExist($portofolioItem->image);
    $portofolioItem->delete();
    
        //
    }
}
