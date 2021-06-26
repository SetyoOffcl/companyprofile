<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPricing;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pricing::orderBy('id','desc')->get();
        return view('pages.admin.pricing.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'is_default' => 'required|in:1,0',
        ]);
        $items = $request->only('title','price','is_default');
        if($request->image){
            $file = $request->file('image'); 
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
            $items['image'] = 'image/' . $filename;
        }

        Pricing::create($items);
        return redirect()->route('admin.pricing.index');
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
    public function edit($id)
    {
        $items = Pricing::findOrFail($id);
        return view('pages.admin.pricing.edit')->with([
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = Pricing::findOrFail($id);
        $data = $request->only('title','price','is_default');
        if($request->image){
            $file = $request->file('image'); 
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
            $data['image'] = 'image/' . $filename;
        }
        $items->update($data);
        return redirect()->route('admin.pricing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Pricing::findOrFail($id);
        $items->delete();
        return back();
    }
    public function detailpricing($id)
    {
        $items = Pricing::with('detail')->findOrfail($id);
        return view('pages.admin.pricing.detail')->with([
            'items' => $items
        ]);
    }
    public function detailpricingstore(Request $request, $id)
    {
        $items = $request->only('is_default','name');
        $items['pricing_id'] = $id;
        DetailPricing::create($items);
        return back();
    }
    public function detailpricingdestroy($id)
    {
        DetailPricing::findOrFail($id)->delete();
        return back();
    }
}
