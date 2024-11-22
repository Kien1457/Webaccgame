@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liệt kê Nick game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('nick.create') }}" class="btn btn-success">Thêm nick game</a>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên nick</th>
                                <th>Thư viện ảnh acc game</th>
                                <th>Mã số</th>
                                <th>Mô tả</th>
                                <th>Hiển thị</th>
                                <th>Hình ảnh</th>
                                <th>Thuộc nick</th>
                                <th>Thuộc tính</th>
                                <th>Giá</th>
                                <th>Quản lý</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nicks as $key => $nick)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $nick->title }}</td>
                                    <td><a href="{{ route('gallery.edit', [$nick->id]) }}"
                                            class="btn btn-primary btn-sm">Thêm thư viện ảnh</a>
                                        @if ($nick->gallery_count == 0)
                                            <span class="badge badge-danger">{{ $nick->gallery_count }} ảnh</span>
                                        @else
                                            <span class="badge badge-dark">{{ $nick->gallery_count }} ảnh</span>
                                        @endif

                                    </td>
                                    <td>#{{ $nick->ms }}</td>
                                    <td>{{ $nick->description }}</td>
                                    <td>
                                        @if ($nick->status == 0)
                                            Không hiển thị
                                        @else
                                            Hiển thị
                                        @endif
                                    </td>
                                    <td><img src="{{ asset('uploads/nick/' . $nick->image) }}" alt="" height="150px"
                                            width="300px"></td>

                                    <td>{{ $nick->category->title }}</td>
                                    <td>
                                        @php
                                            $attribute = json_decode($nick->attribute, true);
                                        @endphp
                                        @foreach ($attribute as $attr)
                                            <span class="badge badge-dark">{{ $attr }}</span>
                                        @endforeach
                                    </td>
                                    <td> {{ number_format($nick->price, 0, ',', '.') }}đ</td>
                                    <td>
                                        <a href="{{ route('nick.edit', $nick->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('nick.destroy', [$nick->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa nick game này không?');"
                                                class="btn btn-danger">Xóa</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $nicks->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
