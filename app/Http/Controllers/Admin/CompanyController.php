<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function about()
    {
        $items = Company::select('about','about_image')->firstOrCreate();
        return view('pages.admin.about.index')->with([
            'items' => $items
        ]);
    }

    public function aboutstore(Request $request)
    {
        $items = Company::first();
        if($request->about_image){
            $file = $request->file('about_image'); 
            $image_data = getimagesize($file);
            $image_width = $image_data[0];
            $image_height = $image_data[1];
            
            $height = $image_width / 720;
            $resizedImage = Image::make($file)->resize(720,$image_height / $height)->stream(); 
            if($image_width < $image_height){
            $height = $image_width / 1280;
            $resizedImage = Image::make($file)->resize(1280,$image_height / $height)->stream(); 
            }
            
            $filename = $file->hashName();
            Storage::disk('public')->put('image/' . $filename, $resizedImage->__toString());
            $items->about_image = 'image/' . $filename;
        }

        if ($request->about) {
            $items->about = $request->about;
        }
        $items->save();
        return back();
    }
    public function counts()
    {
        $items = Company::select('client','project','support','employee')->firstOrCreate();
        return view('pages.admin.counts.index')->with([
            'items' => $items
        ]);
    }
    public function countsstore(Request $request)
    {
        $items = $request->only('client','project','support','employee');
        $data = Company::first();
        $data->update($items);
        return back();
    }
}
