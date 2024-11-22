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
                <div class="card-header">Thêm Video game</div>

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
                    <a href="{{ route('video.index') }}" class="btn btn-success">Liệt kê Video game</a>
                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên Video game</label>
                            <input type="text" class="form-control" required placeholder="..." onkeyup="ChangeToSlug();"
                                id="slug" name="title">
                        </div>

                        <div class="form-group">
                            <label for="email">Đường link</label>
                            <input type="text" class="form-control" required placeholder="Link ...."
                                name="link">
                        </div>

                        <div class="form-group">
                            <label for="email">Slug</label>
                            <input type="text" class="form-control" required id="convert_slug" placeholder="..."
                                name="slug">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Mô tả Video của game đó</label>
                            <textarea class="form-control" id="desc_video" name="description" placeholder="..."></textarea>
                        </div>


                        <div class="form-group">
                            <label for="email">Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>

                           
                        </div>


                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
