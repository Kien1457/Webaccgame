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
                <div class="card-header">Thêm slider</div>

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
                    <a href="{{ route('slider.index') }}" class="btn btn-success">Liệt kê slider</a>
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên Slider game</label>
                            <input type="text" class="form-control" required
                                placeholder="..." name="title">
                        </div>
                        
                        <div class="form-group">
                            <label for="pwd">Mô tả Slider của game đó</label>
                            <textarea class="form-control" name="description" placeholder="..."></textarea>
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