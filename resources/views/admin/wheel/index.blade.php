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
                <div class="card-header">Vòng quay may mắn</div>
                <style>
                    .wheel_box {
                        position: relative;
                    }

                    img.marker_style {
                        position: absolute;
                        top: 37%;
                        left: 15%;
                        opacity: 0.6;
                    }

                    img.marker_style:hover {
                        opacity: 2;
                        transition: 1s all ease;
                    }
                </style>
                <div class="card-body">
                    <div class="wheel_box">
                        <img class="wheel_style" src="{{ asset('frontend/img/vq-lien-quan.png') }}" alt=""
                            width="600px" height="600px">
                        <a onclick="return Spin_Wheel()" id="marker_click" style="cursor: pointer;">
                            <img  class="marker_style"
                            src="{{ asset('frontend/img/1725287431223334.png') }}">
                        </a>
                    </div>


                    {{-- {{ $category->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
