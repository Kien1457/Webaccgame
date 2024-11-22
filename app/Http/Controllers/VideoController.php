<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Videos::orderBy('id', 'DESC')->paginate(5);
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $videos = new Videos();
        $videos->title = $data['title'];

        $videos->slug = $data['slug']; // Tên danh mục slug
        $videos->description = $data['description'];
        $videos->status = $data['status'];
        $videos->link = $data['link'];


        $get_image = request('image');

        if ($get_image) {
            $path = 'uploads/video/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $videos->image = $new_image;
        }

        $videos->save();
        return redirect()->route('video.index')->with('status', 'Thêm Video game thành công');
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
        $videos = Videos::find($id);
        return view('admin.video.edit', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $videos = Videos::find($id);
        $videos->title = $data['title'];

        $videos->slug = $data['slug']; // Tên danh mục slug
        $videos->description = $data['description'];
        $videos->status = $data['status'];
        $videos->link = $data['link'];


        $get_image = request('image');

        if ($get_image) {
            $path = 'uploads/video/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $videos->image = $new_image;
        }

        $videos->save();
        return redirect()->route('video.index')->with('status', 'Thêm Video game thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $videos = Videos::find($id);

        $path_unlink = 'uploads/slider/' . $videos->image; // bỏ hình ảnh
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $videos->find($id)->delete();
        return redirect()->back();
    }
}
