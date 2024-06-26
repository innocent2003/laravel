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
        <div class="row fs-3 my-5">
            <aside class="col-12  col-lg-2  border-end">
                <a href="" class="text-black">Logo</a>
                <ul class="">
                    <li class="link py-2">
                        <a href="" class="text-black">
                            Trang chủ
                        </a>
                    </li>
                    <li class="link py-2">
                        <a href="" class="text-black">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="black"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_4_664)">
                                    <path
                                        d="M16.6667 18H7.5C6.67157 18 6 17.3284 6 16.5V3.5C6 2.67157 6.67157 2 7.5 2H20.5C21.3284 2 22 2.67157 22 3.5V12.6667M16.6667 18L22 12.6667M16.6667 18V14.1667C16.6667 13.3382 17.3382 12.6667 18.1667 12.6667H22M20.6667 22H11.5C10.6716 22 10 21.3284 10 20.5V18H15.8787C16.2765 18 16.658 17.842 16.9393 17.5607L21.5607 12.9393C21.842 12.658 22 12.2765 22 11.8787V6H24.5C25.3284 6 26 6.67157 26 7.5V16.6667M20.6667 22L26 16.6667M20.6667 22V18.1667C20.6667 17.3382 21.3382 16.6667 22.1667 16.6667H26M9 6H18M9 9H14.625"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_4_664">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Bài đăng
                        </a>
                    </li>
                </ul>
            </aside>
            <main class=" col-12 col-lg-10 ">
                <div class="">
                    <div class="">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4_1946)">
                                <path
                                    d="M26.6668 14.6666H10.4402L17.8935 7.21325L16.0002 5.33325L5.3335 15.9999L16.0002 26.6666L17.8802 24.7866L10.4402 17.3333H26.6668V14.6666Z"
                                    fill="#323232" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4_1946">
                                    <rect width="32" height="32" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Phê duyệt
                    </div>
                    <div class="ms-3">
                        <form action="">
                            <div class="">
                                <div>Tên sản phẩm</div>
                                <input type="text" class="w-75 rounded">
                            </div>
                            <div class="">
                                <div>Mô tả</div>
                                <textarea name="description" id="description" rows="5" class="w-75 rounded"></textarea>
                            </div>
                            <div class="row w-75">
                                <div class="col-12 col-lg-7">
                                    <div>Ảnh</div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <img src="./images/anh-trai-cay-troll-ca-chua-nhan-kiwi.jpg" alt=""
                                            width="100" height="100">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div>Video</div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <video src="" width="100" height="100"></video>
                                    </div>
                                </div>
                            </div>
                            <div class="w-75 d-flex justify-content-end">
                                <button type="submit" class="me-2 px-1 rounded bg-success text-white">Xác thực</button>
                                <button class="px-1 rounded">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
</body>

</html>
