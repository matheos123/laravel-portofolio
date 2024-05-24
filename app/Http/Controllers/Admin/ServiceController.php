<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $serviceDataTable)
    {
        //
        return $serviceDataTable->render('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required','max:200'],
            'description'=>['required','max:500']
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();
        toastr()->success('Service created successfully');
        return redirect()->route('admin.service.index');

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
    public function edit($id)
    {
        //
        $service = Service::findOrFail($id);
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
            //
            $request->validate([
                'name'=>['required','max:200'],
                'description'=>['required','max:500']
            ]);
    
            $service = Service::findOrFail($id);
            $service->name = $request->name;
            $service->description = $request->description;
            $service->save();
            // toastr()->success('Updated successfully',"Congrats");
            return redirect()->route('admin.service.index');
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $service = Service::findOrFail($id);
        $service->delete();
    }
}
