<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, maximum-scale=1.0, initial-scale=1.0, shrink-to-fit=no, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <base href="" />
    <meta name="google-site-verification" content="" />

    <link href="{{ asset('style/vendor.min.css?v=1.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('style/layout.css') }}" rel="stylesheet" />
    <link href="{{ asset('style/media-screen.css') }}" rel="stylesheet" />

</head>

<body>
<?php
use App\Http\Controllers\CartController;
$total=0;
if(Session::has('user'))
{
  $total= CartController::cartItem();
}
?>
    <div class="container-fluid web-page padding0">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Logo</a>
                    <form class="d-flex position-relative w-50" role="search">
                        <input class="form-control me-2" type="text" placeholder="Search">
                        <button class="border-0 position-absolute bg-transparent" style="right: 16px; top: 8px;"
                            type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </form>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle d-flex align-items-center gap-2" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            @if(Session::has('user'))
                            {{$total}}
                            @else
                            0
                            @endif
                        </button>
                        <ul class="dropdown-menu">
                        @if(Session::has('user'))
                            <li><a class="dropdown-item" href="/logout">Đăng xuất</a></li>
                            <li><a class="dropdown-item" href="/PageApprove">Duyet Bai</a></li>
                            <li><a class="dropdown-item" href="/cartList">Hàng đã mua</a></li>
                            <li><a class="dropdown-item" href="/add1">Đăng bài</a></li>

                            @else
                            <li><a class="dropdown-item" href="/login">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="/register">Đăng ký</a></li>

                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <main class="m-5">
            <div class="d-flex gap-5 flex-wrap">
            @foreach($data as $item)
  @if($item->is_active == 'active')
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/photos/'.$item->image)}}" class="card-img-top" alt="ảnh">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->dataname}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        @if(Session::has('user'))
                        <a href="/comment/{{$item->id}}" class="btn btn-primary">Binh luan</a>
                        <a href="/PagePay/{{$item->id}}" class="btn btn-primary">Mua Hang</a>

                        @else
                        <a href="/login" class="btn btn-primary">Đăng nhập</a>
                        @endif
                    </div>
                </div>
                @endif
  @endforeach

            </div>
            <div class="my-5 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
