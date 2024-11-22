<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Nick;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $get_image = $request->image;
        $nick_id = $request->nick_id;
        $nick = Nick::find($nick_id);

        if ($get_image) {
            foreach ($get_image as $key => $img) {
                $path = 'uploads/gallery/';
                $get_name_image = $img->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $img->getClientOriginalExtension();
                $img->move($path, $new_image);


                $gallery = new Gallery();
                $gallery->title = $nick->title;
                $gallery->nick_id = $nick->id;
                $gallery->image = $new_image;
                $gallery->save();
            }
        }
        return redirect()->back();
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
        $gallery = Gallery::where('nick_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);
        $path = 'uploads/gallery/' . $gallery->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $gallery->delete();
        return redirect()->back();
    }
}
