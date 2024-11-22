@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật Blog game</div>

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('blog.index') }}" class="btn btn-success">Liệt kê Blog game</a>
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">Thêm Blog game</a>
                    <form action="{{ route('blog.update', [$blog->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên Blog game</label>
                            <input type="text" class="form-control" value="{{ $blog->title }}" required
                                placeholder="..." onkeyup="ChangeToSlug();" id="slug" name="title">
                        </div>
                        <div class="form-group">
                            <label for="email">Slug</label>
                            <input type="text" class="form-control" value="{{ $blog->slug }}" required
                                id="convert_slug" placeholder="..." name="slug">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Mô tả Blog của game đó</label>
                            <textarea class="form-control" id="desc_blog" name="description" placeholder="...">{{ $blog->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Nội dung Blog</label>
                            <textarea class="form-control" id="content_blog" name="content" placeholder="...">{{ $blog->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="" height="150px"
                                width="300px">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="status">
                                @if ($blog->status == 1)
                                    <option selected value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option selected value="0">Không hiển thị</option>
                                @endif
                            </select>

                            <label for="exampleFormControlSelect1">Loại tin</label>
                            <select class="form-control" name="kind_of_blogs">
                                @if ($blog->kind_of_blogs == 'blogs')
                                    <option selected value="blogs">Blogs</option>
                                    <option value="huongdan">Hướng dẫn</option>
                                @else
                                    <option value="blogs">Blogs</option>
                                    <option selected value="huongdan">Hướng dẫn sử dụng</option>
                                @endif
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
