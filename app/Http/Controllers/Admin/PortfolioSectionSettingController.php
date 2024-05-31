<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSectionSetting as ModelsPortfolioSectionSetting;
use Illuminate\Http\Request;
use App\Models\PortfolioSectionSetting;
class PortfolioSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $portfolio = PortfolioSectionSetting::first();
        return view('admin.portfolio-setting.index',compact('portfolio'));
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=>['required','max:200'],
            'subtitle'=>['required','max:500']
        ]);

        ModelsPortfolioSectionSetting::updateOrCreate(
            ['id'=> $id],
            [
                'title'=> $request->title,
                'subtitle'=> $request->subtitle,
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
