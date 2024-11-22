<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Nick;
use App\Models\Slider;
use App\Models\Videos;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('category', 'slider', 'blogs_huongdan'));
    }

    public function dichvu()
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.services', compact('slider', 'blogs_huongdan'));
    }

    public function acc($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $nicks = Nick::where('category_id', $category->id)->where('status', 1)->paginate(16);
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.acc', compact('slug', 'slider', 'blogs_huongdan', 'nicks', 'category'));
    }

    public function detail_acc($ms)
    {
        $nick_game = Nick::where('ms', $ms)->first();
        $nick = Nick::find($nick_game->id);
        $gallery = Gallery::where('nick_id', $nick->id)->orderBy('id', 'DESC')->get();
        $category = Category::where('id', $nick->category_id)->first();
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.accgame', compact('slider', 'blogs_huongdan', 'nick', 'category', 'gallery'));
    }

    public function danhmuc_game($slug)
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $category = Category::where('slug', $slug)->first();
        return view('pages.category', compact('slider', 'blogs_huongdan', 'category'));
    }



    public function danhmuccon($slug)
    {
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.sub_category', compact('slug', 'slider', 'blogs_huongdan'));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'blogs')->paginate(15);
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.blogs', compact('slider', 'blogs', 'blogs_huongdan'));
    }

    public function video_highlight()
    {
        $videos = Videos::orderBy('id', 'DESC')->where('status', 1)->paginate(15);
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.videos', compact('slider', 'videos', 'blogs_huongdan'));
    }

    public function show_video(Request $request)
    {
        $data = $request->all();
        $video = Videos::find($data['id']);
        $output['video_title'] = $video->title;
        $output['video_description'] = $video->description;
        $output['video_link'] = $video->link;
        echo json_encode($output);
    }

    public function blogs_detail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.blog_detail', compact('slider', 'blog', 'blogs_huongdan'));
    }

    public function search(Request $request) {
        $keywords = $request->keywords_submit;
        $blogs_huongdan = Blog::orderBy('id', 'DESC')->where('kind_of_blogs', 'huongdan')->get();
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        $category = Category::orderBy('id', 'DESC')->get();
        $search_ms = Nick::table('tbl_nicks')->where('ms','like','%'.$keywords.'%')->get();
        return view('pages.search', compact('category', 'slider', 'blogs_huongdan','search_ms'));
    }
}
