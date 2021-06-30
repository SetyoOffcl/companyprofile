<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTags;
use Str;
use App\Models\Tags;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Blog::with('tags.tag');
            return DataTables::of($data)
                    ->addColumn('action', function($item){
                        return '
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        
                                        <a href="' . route('admin.blog.edit',$item->id) . '" 
                                        class="dropdown-item text-warning">Edit</a>
                                        <button 
                                            type="button" 
                                            name="delete" 
                                            id="'.$item->id.'" 
                                            class="dropdown-item 
                                            text-danger delete">
                                            Hapus
                                        </button>
                                        </div>
                                    </div>
                                ';
                    })
                    ->editColumn('image', function($q){
                        return $q->image ? '<img src="'. Storage::url($q->image) .'" width="100px;">' : '';
                    })
                    ->editColumn('tags', function($q){
                        return $q->tags->map(function($jumlah) {
                            return $jumlah->tag->name;
                        })->implode('<br>');
                    })
                    ->rawColumns(['image','action','tags'])
                    ->make(true);
        }
        return view('pages.admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = BlogCategory::all();

        return view('pages.admin.blog.create')->with([
            'tags' => $tags,
            'category' => $category
        ]);
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
            'image' => 'required|image',
            'title' => 'required|unique:tb_blog,title',
            'desc' => 'required',
            'category' => 'required',
            'tag' => 'required',
        ]);
        $items = $request->only('title','desc','category');

        $items['slug'] = Str::slug($request->title);

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

        $blog = Blog::create($items);

        foreach ($request->tag as $key) {
            $tags[] = new BlogTags([
                'blog_id' => $blog->id,
                'tags_id' => $key
            ]);
        }
        $blog->tags()->saveMany($tags);

        return redirect()->route('admin.blog.index');
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
        $items = Blog::with('tags')->findOrFail($id);
        $tags = Tags::all();
        $category = BlogCategory::all();

        $itemstags[] = 0;
        foreach ($items->tags as $key) {
            $itemstags[] = $key->tags_id;
        }

        return view('pages.admin.blog.edit')->with([
            'tags' => $tags,
            'category' => $category,
            'items' => $items,
            'itemstags' => $itemstags
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
        
        $request->validate([
            'title' => 'required|unique:tb_blog,title,' . $id,
            'desc' => 'required',
            'category' => 'required',
            'tag' => 'required',
        ]);
        $items = $request->only('title','desc','category');

        $items['slug'] = Str::slug($request->title);

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

        $blog = Blog::with('tags')->find($id);
        $blog->update($items);
        // return $blog;
        BlogTags::where('blog_id',$blog->id)->delete();

        foreach ($request->tag as $key) {
            $tags[] = new BlogTags([
                'blog_id' => $blog->id,
                'tags_id' => $key
            ]);
        }
        $blog->tags()->saveMany($tags);
        // return $blog;
        
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
