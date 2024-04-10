<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
{{$data->id}} <br>
{{$data->name}}
<form action="/postComment" method="post">
    @csrf
   Comment <input type="text" name="comment" id="">
   <input type="hidden" name="data_id" value="{{$data->id}}">
   <button type="submit">Submit</button>
</form>
</body>
</html>
