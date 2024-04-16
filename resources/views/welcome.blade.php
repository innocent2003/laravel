<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media</title>
</head>
<body>
  <button><a href="/add1">Them du lieu</a></button>
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
<td><a href="/comment/{{$data->id}}">Comment</a></td>

</tr>

@endforeach
  </table>

</body>
</html>
