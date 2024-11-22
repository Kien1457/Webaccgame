<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin WebTrader</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin WebTrader
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('navbar')
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script type="text/javascript">
        let table = new DataTable('#myTable');
    </script>

    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('desc_blog');
        CKEDITOR.replace('content_blog');
    </script>





    <script type="text/javascript">
        function ChangeToSlug() {
            var slug;
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>

    <script type="text/javascript">
        $(".choose_category").change(function() {
            var category_id = $(this).val();
            // alert(category_id);
            if (category_id == '0') {
                alert('Vui lòng chọn danh mục game')
            } else {
                $.ajax({
                    url: "{{ route('choose_category') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $("#show_attribute").html(data);
                    }

                })
            }
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type="text/javascript">
        function shuffle(array) {
            var currentIndex = array.length,
                randomIndex;


            while (0 !== currentIndex) {

                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex--;


                [array[currentIndex], array[randomIndex]] = [
                    array[randomIndex],
                    array[currentIndex],
                ];
            }

            return array;
        }

        function Spin_Wheel() {

            document.getElementById("marker_click").setAttribute('onclick', 'return false');
            var path_wheel = "{{ URL::asset('backend/wheel/wheelmusic.mp3') }}";
            var path_applause = "{{ URL::asset('backend/wheel/applause.mp3') }}";
            var wheel_music = new Audio(path_wheel);
            var applause_music = new Audio(path_applause);
            wheel_music.play();

            const wheel = document.querySelector('.wheel_style');


            let SelectedItem = "";

            let Acclqfulltuong = shuffle([2157, 2517, 2877]);
            let Randomlq100k = shuffle([2106, 2466, 2826]);
            let Cong100kvaoTaiKhoan = shuffle([2055, 2415, 2775]);
            let Cong50kvaoTaiKhoan = shuffle([2004, 2364, 2724]);
            let Nohu2trieu = shuffle([1953, 2313, 2673]);
            let Acctren50Tuong = shuffle([1902, 2262, 2622]);
            let RandomLQ50k = shuffle([1851, 2211, 2571]);
            let Acclqngaunhien = shuffle([1800, 2160, 2520]);


            let Random = shuffle([
                Acclqfulltuong[0],
                Randomlq100k[0],
                Cong100kvaoTaiKhoan[0],
                Cong50kvaoTaiKhoan[0],
                Nohu2trieu[0],
                Acctren50Tuong[0],
                RandomLQ50k[0],
                Acclqngaunhien[0],
            ]);

            console.log(Random[0]);

            if (Acclqfulltuong.includes(Random[0])) SelectedItem = "Acc liên quân FULL SKIN, TƯỚNG";
            if (Randomlq100k.includes(Random[0])) SelectedItem = "RanDom liên quân 100k";
            if (Cong100kvaoTaiKhoan.includes(Random[0])) SelectedItem = "Cộng 100k vào tài khoản";
            if (Cong50kvaoTaiKhoan.includes(Random[0])) SelectedItem = "Cộng 50k vào tài khoản";
            if (Nohu2trieu.includes(Random[0])) SelectedItem = "Nổ hủ 2 triệu";
            if (Acctren50Tuong.includes(Random[0])) SelectedItem = "Acc trên 50 tướng";
            if (RandomLQ50k.includes(Random[0])) SelectedItem = "RanDom liên quân 50k";
            if (Acclqngaunhien.includes(Random[0])) SelectedItem = "Acc liên quân ngẫu nhiên";


            wheel.style.transition = "all 5s ease";
            wheel.style.transform = `rotate(${Random[0]}deg)`;




            setTimeout(function() {
                applause_music.play();
                swal("Chúc mừng bạn", "đã trúng " + SelectedItem + ".", "success");
            }, 5500);


            setTimeout(function() {
                wheel_music.pause();
                wheel.style.setProperty("transition", "initial");
                wheel.style.transform = "rotate(360deg)";
                document.getElementById("marker_click").setAttribute('onclick', 'return Spin_Wheel()');
            }, 6000);
        }
    </script>

</body>

</html>
