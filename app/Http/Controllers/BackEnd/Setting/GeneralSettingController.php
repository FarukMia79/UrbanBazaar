<?php

namespace App\Http\Controllers\BackEnd\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\GeneralSetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalSetting = GeneralSetting::get();
        return response()->json($generalSetting);
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
    public function show($id)
    {
        $generalSetting = GeneralSetting::findOrFail($id);
        return response()->json($generalSetting);
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
        $request->validate([
            'site_name' => 'required|max:255',
            'white_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'dark_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);

        $setting = GeneralSetting::findOrFail($id);
        $setting->site_name = $request->site_name;
        $setting->status = (int) $request->status;

        $manager = new ImageManager(new Driver());
        $uploadPath = public_path('uploads/settings/');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // White Logo Upload
        if ($request->hasFile('white_logo')) {
            if ($setting->white_logo && file_exists(public_path($setting->white_logo))) {
                unlink(public_path($setting->white_logo));
            }
            $file = $request->file('white_logo');
            $name = time() . '_white.' . $file->getClientOriginalExtension();
            $image = $manager->read($file);
            $image->cover(500, 108);
            $image->save($uploadPath . $name);
            $setting->white_logo = 'uploads/settings/' . $name;
        }

        // Dark Logo Upload
        if ($request->hasFile('dark_logo')) {
            if ($setting->dark_logo && file_exists(public_path($setting->dark_logo))) {
                unlink(public_path($setting->dark_logo));
            }
            $file = $request->file('dark_logo');
            $name = time() . '_dark.' . $file->getClientOriginalExtension();
            $image = $manager->read($file);
            $image->cover(500, 108);
            $image->save($uploadPath . $name);
            $setting->dark_logo = 'uploads/settings/' . $name;
        }

        // Favicon Upload
        if ($request->hasFile('favicon')) {
            if ($setting->favicon && file_exists(public_path($setting->favicon))) {
                unlink(public_path($setting->favicon));
            }
            $file = $request->file('favicon');
            $name = time() . '_favicon.' . $file->getClientOriginalExtension();
            $image = $manager->read($file);
            $image->cover(32, 32);
            $image->save($uploadPath . $name);
            $setting->favicon = 'uploads/settings/' . $name;
        }

        $setting->save();

        return response()->json(['message' => 'General Settings Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
