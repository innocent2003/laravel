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
        <main class="my-5">
            <!-- Form thông tin của sản phẩm được comment -->
            <div class="row">
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <img src="./images/avatauser.png" alt="ảnh nông sản" style="width: 80%; object-fit: contain;">
                </div>
                <div class="col-12 col-md-8">
                    <form action="" class=" d-flex justify-content-end">
                        <button type="submit" class="px-5 py-1 rounded bg-light-50 border-0 fs-4">Mua</button>
                    </form>
                    <div class="">
                        <h5 class="mb-0">
                            Tên nông sản:
                            <span style="color: gray">Nông sản A</span>
                        </h5>
                    </div>
                    <div class="">
                        <h5 class="mb-0">
                            Thông tin về sản phẩm:
                            <span style="color: gray">Đây là một loại sản phẩm chất lượng, cung cấp nhiều chất cần
                                thiết....</span>
                        </h5>
                    </div>
                    <div class="">
                        <h5 class="mb-0">
                            Nơi sản xuất:
                            <span style="color: gray">Nông trại A</span>
                        </h5>
                    </div>

                </div>
                <div class="my-5">
                    <div class="">
                        <h5 class="mb-0">
                            Giấy chứng nhận kiểm định
                        </h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <img src="./images/avatauser.png" alt="" width="150px" height="200px"
                                style="object-fit: contain;">
                        </div>
                    </div>
                    <div class="">
                        <h5 class="mb-0">
                            Video chăm sóc:
                        </h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <video src=""></video>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form bình luận -->

            <div class="form-comments">
                <h5>Danh sách bình luận</h5>
                <div class=" px-5 py-3">
                    <div class="d-flex aligh-items-center row border rounded bg-white py-2">
                        <div class="col-1 d-flex justify-content-center">
                            <img src="./images/avatauser.png" alt="ảnh đại diện" class="" width="80px">
                        </div>
                        <!-- Form bình luận -->
                        <form action="" class="col-11 d-grid gap-2">
                            <input type="text" placeholder="Nhập đánh giá về sản phẩm"
                                class="border-0 border-bottom px-2 py-1" style="outline: none;">
                            <div class="d-flex justify-content-end gap-3">
                                <button type="submit" class=" py-1 px-4 rounded">Gửi</button>
                                <label for="file-images" class="border d-flex align-items-center px-2 rounded">Tải
                                    ảnh</label>
                                <input type="file" class="d-none" id="file-images">
                            </div>
                        </form>
                    </div>
                    <!-- Danh sách bình luận -->
                    <div class="">
                        <!-- Bình luận -->
                        <div class="row mt-5">
                            <div class="col-1 d-flex justify-content-center">
                                <img src="./images/avatauser.png" alt="ảnh đại diện" class="" width="60px">
                            </div>
                            <div class="col-8 d-grid">
                                <p>Chất lượng sản pahảm tốt!</p>
                                <div class="d-flex justify-content-end align-items-center gap-4">
                                    <span class="d-flex justify-content-end align-items-center gap-2">
                                        <svg id="iconHeart" style="cursor: pointer;"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                        </svg>
                                        Like
                                    </span>
                                    <span onclick="handleOpen(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                            <path
                                                d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293z" />
                                        </svg>
                                        Trả lời
                                    </span>
                                </div>
                            </div>
                            <form action="" class="reply m-auto mt-2 w-75 d-grid gap-2 d-none">
                                <input type="text" placeholder="Nhập đánh giá về sản phẩm"
                                    class="border-0 border-bottom px-2 py-1" style="outline: none;">
                                <div class="">
                                    <button type="submit" class=" float-end py-1 px-4 rounded">Gửi</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function handleOpen(event) {
            const form = event.target.parentNode.parentNode.parentNode.querySelector('.reply');
            form.classList.toggle('d-none');
        }
    </script>
</body>

</html>
