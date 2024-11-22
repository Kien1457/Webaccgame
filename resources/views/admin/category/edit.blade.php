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
                <div class="card-header">Cập nhật danh mục game</div>

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
                    <a href="{{ route('category.index') }}" class="btn btn-success">Liệt kê danh mục game</a>
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm danh mục game</a>
                    <form action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên danh mục game</label>
                            <input type="text" class="form-control" required onkeyup="ChangeToSlug();" id="slug"
                                value="{{ $category->title }}" placeholder="..." name="title">
                        </div>
                        <div class="form-group">
                            <label for="email">Slug</label>
                            <input type="text" class="form-control" required value="{{ $category->slug }} "
                                id="convert_slug" placeholder="..." name="slug">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mô tả của game đó</label>
                            <textarea class="form-control" name="description" required placeholder="...">{{ $category->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{ asset('uploads/category/' . $category->image) }}" alt="" height="150px"
                                width="300px">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" required name="status">
                                @if ($category->status == 1)
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
