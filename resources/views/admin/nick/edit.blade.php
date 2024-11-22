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
                <div class="card-header">Cập nhật Nick game</div>

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
                    <a href="{{ route('nick.index') }}" class="btn btn-success">Liệt kê Nick game</a>
                    <a href="{{ route('nick.create') }}" class="btn btn-primary">Thêm Nick game</a>
                    <form action="{{ route('nick.update', [$nick->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="email">Tên Nick game</label>
                            <input type="text" class="form-control" value="{{ $nick->title }}" required
                                placeholder="..." name="title">
                        </div>

                        <div class="form-group">
                            <label for="email">Giá tiền</label>
                            <input type="text" class="form-control" value="{{ $nick->price }}" required
                                placeholder="..." name="price">
                        </div>


                        <div class="form-group">
                            <label for="pwd">Mô tả</label>
                            <textarea class="form-control" name="description" placeholder="...">{{ $nick->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{ asset('uploads/nick/' . $nick->image) }}" alt="" height="150px"
                                width="300px">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="status">
                                @if ($nick->status == 1)
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thuộc game</label>
                            <select class="form-control " name="category_id">
                                <option value="0">----Chọn game cần thêm phụ kiện-----</option>
                                @foreach ($category as $key => $cate)
                                    <option value="{{ $cate->id }}"
                                        {{ $cate->id == $nick->category_id ? 'selected' : '' }}>{{ $cate->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Phụ kiện</label>
                            <textarea class="form-control" name="attribute" placeholder="...">{{ $nick->attribute }}</textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Cập nhật nick game</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
