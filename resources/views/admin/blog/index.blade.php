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
                <div class="card-header">Liệt kê Blog game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('blog.create') }}" class="btn btn-success">Thêm Blog game</a>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Blog</th>
                                <th>Slug Blog</th>
                                <th>Mô tả</th>
                                <th>Hiển thị</th>
                                <th>Hình ảnh</th>
                                <th>Loại bài viết</th>
                                <th>Quản lý</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $blog)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->slug }}</td>
                                    <td>{!! $blog->description !!}</td>
                                    <td>
                                        @if ($blog->status == 0)
                                            Không hiển thị
                                        @else
                                            Hiển thị
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt=""
                                            height="150px" width="300px">
                                    </td>

                                    <td>
                                        @if ($blog->kind_of_blogs == 'blogs')
                                            Blogs
                                        @else
                                            Hướng dẫn sử dụng
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('blog.destroy', [$blog->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa Blogs này không?');"
                                                class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
