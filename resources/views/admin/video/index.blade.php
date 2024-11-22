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
                <div class="card-header">Liệt kê Slider game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('video.create') }}" class="btn btn-success">Thêm slider game</a>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Video</th>
                                <th>Mô tả Video</th>
                                <th>Hiển thị</th>
                                <th>Hình ảnh</th>
                                <th>Đường link</th>
                                <th>Quản lý</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $key => $video)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>
                                        @if ($video->status == 0)
                                            Không hiển thị
                                        @else
                                            Hiển thị
                                        @endif
                                    </td>
                                    <td><img src="{{ asset('uploads/video/' . $video->image) }}" alt=""
                                            height="150px" width="300px"></td>
                                    <td><span height="100" width="150">{!! $video->link !!}</span></td>

                                    <td>
                                        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('video.destroy', [$video->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa Slider game này không?');"
                                                class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $videos->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
