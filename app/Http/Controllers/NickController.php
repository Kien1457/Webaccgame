<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\Category;
use App\Models\Nick;
use Illuminate\Http\Request;

class NickController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nicks = Nick::with('category')->withCount('gallery')->orderBy('id', 'DESC')->paginate(10); 
        return view('admin.nick.index',compact('nicks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.nick.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $attribute = [];
        foreach ($data['attribute'] as $key => $attri) {
            foreach ($data['name_attribute'] as $key2 => $name_attri) {
                if ($key == $key2) {
                    $attribute[] = $name_attri . ': ' . $attri;
                }
            }
        }

        $nick = new Nick();
        $nick->title = $data['title'];
        $nick->ms = random_int(100000, 999999);
        $nick->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE);
        // $nick->attribute = serialize($attribute);
        $nick->description = $data['description'];
        $nick->category_id = $data['category_id'];
        $nick->price = $data['price'];
        $nick->status = $data['status'];

        // Thêm hình ảnh
        $get_image = $request->image;
        $path = 'uploads/nick/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);


        $nick->image = $new_image;


        $nick->save();
        return redirect()->route('nick.index')->with('status', 'Thêm nick game thành công');
    }

    public function choose_category(Request $request)
    {
        $data = $request->all();
        $access = Accessories::where('category_id', $data['category_id'])->where('status', 1)->get();
        $output = "";
        foreach ($access as $key => $acce) {
            $output .= ' <div class="form-group">
                                <label for="exampleFormControlSelect1">' . $acce->title . '</label>
                                <input type="hidden" value="' . $acce->title . '" name="name_attribute[]">
                                <input type="text" class="form-control" required placeholder="..." name="attribute[]">
                            </div>
           ';
        }
        echo $output;
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
        $nick = Nick::find($id);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.nick.edit',compact('nick','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();


        $nick = Nick::find($id);
        $nick->title = $data['title'];
        $nick->ms = $nick->ms;
        $nick->attribute = $data['attribute'];
        // $nick->attribute = serialize($attribute);
        $nick->description = $data['description'];
        $nick->category_id = $data['category_id'];
        $nick->price = $data['price'];
        $nick->status = $data['status'];

        // Thêm hình ảnh

        $get_image = $request->image;
        if($get_image){
            $path = 'uploads/nick/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
    
    
            $nick->image = $new_image;
        }

        $nick->save();
        return redirect()->route('nick.index')->with('status', 'Cập nhật nick game thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nick = Nick::find($id);

        $path_unlink = 'uploads/nick/' . $nick->image; // bỏ hình ảnh
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $nick->find($id)->delete();
        return redirect()->back();
    }
}
