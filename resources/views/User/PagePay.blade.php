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
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="m-5 fs-4">
            <form action="/order" method="post" class="d-grid gap-3">
            @csrf
            <input type="hidden" name="data_id" value="{{$data->id}}">
                <div class="border rounded px-4 py-3">
                    <div class="">Phương thức thanh toán</div>
                    <div class="mt-2 ms-3">
                        <div class="d-flex align-items-center gap-3">
                            <input type="radio" id="directPayment" name="purchase">
                            <label for="directPayment">Thanh toán trực tiếp</label>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <input type="radio" id="onlinePayment" name="paymentMethod">
                            <label for="onlinePayment">Thanh toán online</label>
                        </div>
                    </div>
                </div>
                <div class="border rounded px-4 py-3">
                    <div class="">Nhập địa chỉ</div>
                    <input type="text" name="address" class="w-100 py-1 rounded px-2 ms-3" placeholder="Nhập địa chỉ của bạn">
                </div>
                <div class="mt-5">
                    <button type="submit" class="w-100 py-2 border rounded">Mua</button>
                </div>
            </form>
        </main>
    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script>
        function selectPaymentMethod() {
            let paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');

            paymentRadios.forEach(function(radio) {
                if (radio.checked) {
                    paymentRadios.forEach(function(otherRadio) {
                        if (otherRadio !== radio) {
                            otherRadio.checked = false;
                        }
                    });
                }
            });
        }

        let paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');
        paymentRadios.forEach(function(radio) {
            radio.addEventListener('change', selectPaymentMethod);
        });
    </script>
</body>

</html>
