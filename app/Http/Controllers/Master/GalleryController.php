<?php

namespace App\Http\Controllers\Master;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;

class GalleryController extends Controller
{
    public function index()
    {
        $model = Gallery::all();
        return view('admin/gallery/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Gallery();
        return view('admin/gallery/form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'image' => 'required|image'
        ]);
        //$path = $request->image->storeAs('gallery', md5(str_random(12)).'.'.$request->image->extension(), 'images');
        //$path = $request->image->store('gallery', 'images');
        $path = base_path('images/gallery/');
        $file = Image::make($request->file('image'))->resize(715, 400)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        $model = new Gallery();
        $model->title = $request->title;
        $model->image = 'gallery/'.$file->basename;
        $model->deskripsi = $request->deskripsi;
        $model->save();

        return redirect()->route('admin.gallery.manage');
    }

    public function show($id)
    {
        $model = Gallery::findOrFail($id);
        return view('admin/gallery/detail',[
            'model'=>$model
        ]);
    }

    public function destroy($id)
    {
        $model = Gallery::findOrFail($id);
        Storage::disk('images')->delete($model->image);
        $model->delete();
        return redirect()->back();
    }
}
