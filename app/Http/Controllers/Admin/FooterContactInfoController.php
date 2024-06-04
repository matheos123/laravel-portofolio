<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContactInfo;
use Illuminate\Http\Request;

class FooterContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfo = FooterContactInfo::first();
        return view('admin.footer-contact.index',compact('contactInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'address'=>['max:500'],
            'phone'=>['max:500'],
            'email'=>['email','max:200']
        ]);

        FooterContactInfo::updateOrCreate(
            ['id'=> $id],
            [
              'address'=>$request->address,
              'phone'=>$request->phone,
              'email'=>$request->email,
            ]
        );
        toastr()->success("Updated Successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
