<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->kind_of_blogs = $data['kind_of_blogs'];
        $blog->slug = $data['slug']; // Tên danh mục slug
        $blog->description = $data['description'];
        $blog->status = $data['status'];
        $blog->content = $data['content'];


        $get_image = request('image');

        if ($get_image) {
            $path = 'uploads/blogs/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $blog->image = $new_image;
        }

        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Thêm danh mục game thành công');
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
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $blog = Blog::find($id);
        $blog->title = $data['title'];
        $blog->kind_of_blogs = $data['kind_of_blogs'];
        $blog->slug = $data['slug']; // Tên danh mục slug
        $blog->description = $data['description'];
        $blog->status = $data['status'];
        $blog->content = $data['content'];


        $get_image = request('image');

        if ($get_image) {
            $path = 'uploads/blogs/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $blog->image = $new_image;
        }

        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Thêm danh mục game thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        $path_unlink = 'uploads/blogs/' . $blog->image; // bỏ hình ảnh
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $blog->find($id)->delete();
        return redirect()->back();
    }
}
