<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('addMedia')}}" method="post"enctype='multipart/form-data'>
    @csrf
    Tên sản phẩm <input type="text" name="dataname"/><br>
    Ảnh sản phẩm <input type="file" name="image"><br>
    Video chăm sóc <input type="file" name="video" id=""><br>
    Mô tả chi tiết <input type="text" name="description"><br>
    <button type="submit">Save</button>
</form>
<a href="/">Thoat</a>
</body>
</html>
