<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
{{$product->name}} <br>
<img src="{{$product->image}}" alt="">
@foreach($comments as $comment)
<div>
{{$comment->comment}}
</div>
@endforeach
<form action="/postComment" method="post">
    @csrf
   Comment <input type="text" name="comment" id="">
   <input type="hidden" name="data_id" value="{{$product->id}}">
   <button type="submit">Submit</button>
</form>
</body>
</html>
