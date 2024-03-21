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
    <input type="text" name="name"/>
    <input type="file" name="image">
    <input type="file" name="video" id="">
    <input type="text" name="description">
    <button type="submit">Save</button>
</form>
<a href="/">Thoat</a>
</body>
</html>
