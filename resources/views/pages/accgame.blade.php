@extends('layout')
@section('content')
    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
        <div class="container">
            <nav aria-label="breadcrumb" style="display:none">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="Trang chủ">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('danhmuccon', [$category->slug]) }}"
                            title="{{ $category->title }}">{{ $category->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $nick->ms }}</li>
                </ol>
            </nav>
            <div class="c-shop-product-details-4">
                <div class="row">
                    <div class="col-md-4 m-b-20">
                        <div class="c-product-header">
                            <!--<h4 class="c-font-uppercase c-font-bold">Liên minh huyền thoại - Việt Nam</h4>-->
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">#{{ $nick->ms }}</h3>
                                <span class="c-font-red c-font-bold">{{ $category->title }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 visible-sm visible-xs visible-sm">
                        <div class="text-center m-t-20">
                            <img class="img-responsive img-thumbnail" src="/storage/images/ILTS15nlZf_1650210905.jpg"
                                alt="png-image">
                        </div>
                        <div class="c-product-meta">
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                            <div class="row">
                                @php
                                    $attribute = json_decode($nick->attribute, true);
                                @endphp
                                @foreach ($attribute as $attr)
                                    <div class="col-sm-4 col-xs-6 c-product-variant">
                                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">
                                            {{ $attr }}</p>
                                    </div>
                                @endforeach


                            </div>
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-meta">
                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">
                            {{-- <div class="position0">
                      5,999,994 CARD
                   </div> --}}
                            <div class="position1" style="margin: 0 400px 0  " >
                                {{ number_format($nick->price, 0, ',', '.') }}đ
                            </div>
                        </div>
                        <div style="display: none">
                        </div>
                        <script type="text/javascript">
                            $(".c-product-price").append($(".position0"));
                            $(".c-product-price").append($(".position1"));
                        </script>
                    </div>
                    <div class="col-md-4 text-right">
                        <div class="c-product-header">
                            <div class="c-content-title-1">
                                <button type="button"
                                    class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal"
                                    rel="/buyacc/518323">Mua ngay</button>
                                {{-- <button type="button"
                                    class="btn c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal"
                                    rel="/hire-purchase/518323">Trả góp</button> --}}
                                <a type="button"
                                    class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20"
                                    href="/recharge">ATM - Ví điện tử</a>
                                <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20"
                                    href="/nap-the" style="margin: 10px 165px">Nạp thẻ cào</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-product-meta visible-md visible-lg">
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                    <div class="row">
                        @php
                            $attribute = json_decode($nick->attribute, true);
                        @endphp
                        @foreach ($attribute as $attr2)
                            <div class="col-sm-3 col-xs-6 c-product-variant">
                                <p style="color: red"
                                    class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">
                                    {{ $attr2 }}</p>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <style>
                            .mota_game {
                                text-transform: uppercase;
                                margin: 0 15px;
                                color: chocolate;
                                font-weight: bold;
                                font-size: 25px;
                            }

                            .mota_game_game {
                                text-transform: uppercase;
                                color: red;
                                margin: 0 15px;
                                font-weight: bold;
                                font-size: 20px;
                            }
                        </style>
                        <p class="mota_game_game">Mô tả nick game:<span class="mota_game">{{ $nick->description }}</span>
                        </p>


                    </div>
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="container m-t-20 content_post">
            
            @foreach ($gallery as $key => $gal)
                <p>
                    <a rel="gallery1" data-fancybox="images" href="{{ asset('/uploads/gallery/' . $gal->image) }}">
                        <img class="img-responsive img-thumbnail" alt="{{ $gal->title }}"
                            src="{{ asset('/uploads/gallery/' . $gal->image) }}" alt="png-image" style="width:900px;height:1000px;">
                    </a>
                </p>
            @endforeach




            <div class="buy-footer" style="text-align: center">
                <button type="button"
                    class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal"
                    rel="/buyacc/518323">Mua ngay</button>
            </div>
        </div>
        {{-- <div class="container m-t-20 ">
            <div class="game-item-view" style="margin-top: 40px">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">Tài khoản liên quan</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="row row-flex  item-list">
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/acc/443449">
                                    <img src="img/3RcdbTs582_1650188706.jpg" alt="png-image">
                                    <span class="ms">MS: 518480</span>
                                </a>
                            </div>
                            <div class="description">
                                Nakroth Siêu Việt, Slimz Thỏ Ngọc
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Rank: <b>Vàng</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Tướng: <b>30</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Trang Phục: <b>7</b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ngọc 90: <b>Có</b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="price_item">
                                            180,000đ
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class="view">
                                            <a href="/acc/443449">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div> --}}
        <div class="tab-vertical tutorial_area">
            <div class="panel-group" id="accordion">
            </div>
        </div>
    </div>
    </div>
@endsection
