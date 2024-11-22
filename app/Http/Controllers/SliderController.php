<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy('id', 'DESC')->paginate(2);
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data = $request->validate(
            [
                'title' => 'required|unique:slider|max:255',

                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required',
            ],
            [
                'title.unique' => 'Tên danh mục game đã có, yêu cầu điền tên khác',
                'title.required' => 'Tên danh mục game phải có',

                'description.required' => 'Mô tả game phải có',
                'image.required' => 'Hình ảnh game phải có',
            ]
        );



        $slider = new Slider();
        $slider->title = $data['title']; 

        $slider->description = $data['description']; 


        // Thêm hình ảnh
        $get_image = $request->image;
        $path = 'uploads/slider/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);


        $slider->image = $new_image;
        $slider->status = $data['status'];

        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Thêm slider game thành công');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $data = $request->validate(
            [
                'title' => 'required|max:255',

                'description' => 'required|max:255',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required',
            ],
            [

                'title.required' => 'Tên danh mục game phải có',

                'description.required' => 'Mô tả game phải có',

            ]
        );



        $slider = Slider::find($id);
        $slider->title = $data['title']; 

        $slider->description = $data['description']; 


        // Thêm hình ảnh
        $get_image = $request->image;
        if ($get_image) {
            $path_unlink = 'uploads/slider/' . $slider->image; // bỏ hình ảnh
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            $path = 'uploads/slider/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $slider->image = $new_image;
        }


        $slider->status = $data['status'];

        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Cập nhật slider game thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        $path_unlink = 'uploads/slider/' . $slider->image; // bỏ hình ảnh
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $slider->find($id)->delete();
        return redirect()->back();
    }
}
