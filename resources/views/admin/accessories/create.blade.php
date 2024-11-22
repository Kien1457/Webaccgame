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
                <div class="card-header">Thêm phụ kiện game</div>

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
                    <a href="{{ route('accessories.index') }}" class="btn btn-success">Liệt kê phụ kiện game</a>
                    <form action="{{ route('accessories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên phụ kiện game</label>
                            <input type="text" class="form-control" required placeholder="..." name="title">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thuộc game</label>
                            <select class="form-control" name="category_id">
                                @foreach ($category as $key => $cate )
                                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm phụ kiện </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
