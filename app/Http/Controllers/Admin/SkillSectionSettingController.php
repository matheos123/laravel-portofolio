<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;

class SkillSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $skillSetting = SkillSectionSetting::first();
        return view('admin.skill-setting.index',compact('skillSetting'));
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
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'title'=>['required','max:200'],
            'subtitle'=>['required','max:1000'],
            'image'=>['image','max:5000']
        ]);
        $skill =   SkillSectionSetting::first();
        $imagePath  = handleUpload('image',$skill);
        SkillSectionSetting::updateOrCreate(
            ['id'=> $id],
            [
                'title'=> $request->title,
                'subtitle'=> $request->subtitle,
                'image'=> (!empty($imagePath) ? $imagePath : $skill->image), 
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
