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


    <link href="css/vendor.min.css?v=1.0.0" rel="stylesheet" />
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/media-screen.css" rel="stylesheet" />
</head>
<body>
    {{View::make('header')}}
    @yield('content')

<script src="js/vendor.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        function displayImage() {
            var input = document.getElementById('image');
            var preview = document.getElementById('previewImage');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
            }
        }
    </script>
</body>
</html>
