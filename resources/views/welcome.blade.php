<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media</title>
</head>
<body>
  <button><a href="/add1">Them du lieu</a></button>
  @if(Session::has('user'))
  <button><a href="/logout">Dang xuat</a></button>
  @else
  <button><a href="/login">Dang nhap</a></button>

  @endif
  <table>
    <tr>
    <th>id</th>
    <th>name</th>
    <th>Image</th>
    <th>Video</th>
    <th>Description</th>

    </tr>

  @foreach($data as $data)
<tr>
<td>{{$data->id}}</td>
<td>{{$data->name}}</td>
<td><img src="{{asset('storage/photos/'.$data->image)}}" alt=""></td>
<td><video controls>
    <source src="{{asset('storage/photos/'.$data->video)}}" type="video/mp4">
</video></td>
<td>{{$data->description}}</td>

<td>@if(Session::has('user'))
    <a href="/comment/{{$data->id}}">Comment</a>|| <a href="/cart/{{$data->id}}">Mua hàng</a>
@endif
</td>

</tr>

@endforeach
  </table>

</body>
</html>
