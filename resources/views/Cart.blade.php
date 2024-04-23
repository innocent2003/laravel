<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
{{$data->name}}
<img src="{{$data->image}}" alt="">
<form action="/order" method="post">
    @csrf
    <input type="hidden" name="data_id" value="{{$data->id}}">
    <button type="submit">Dat Hang</button>
</form>
</body>
</html>
