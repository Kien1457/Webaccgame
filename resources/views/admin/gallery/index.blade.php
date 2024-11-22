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
                <div class="card-header">Thêm Gallery Nick game</div>

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
                  
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="nick_id" value="{{Request::segment(2)}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Chọn Hình ảnh</label>
                            <input type="file" class="form-control-file" required multiple name="image[]">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm gallery game</button>
                    </form>

                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên gallery</th>

                                <th>Hình ảnh</th>
                                <th>Quản lý</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $key => $gal)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $gal->title }}</td>

                                   
                                    <td><img src="{{ asset('uploads/gallery/' . $gal->image) }}" alt=""
                                            height="150px" width="300px"></td>

                                    <td>
                                        <form action="{{ route('gallery.destroy', [$gal->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa gallery game này không?');"
                                                class="btn btn-danger">Xóa</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
