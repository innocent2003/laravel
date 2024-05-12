<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media</title>
</head>
<body>
<?php
use App\Http\Controllers\CartController;
$total=0;
if(Session::has('user'))
{
  $total= CartController::cartItem();
}
?>
  <button><a href="/add1">Them du lieu</a></button>
  @if(Session::has('user'))
  <button><a href="/logout">Dang xuat</a></button>
  <Button><a href="/cartList">So luong mua hang la {{$total}}</a></Button>
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
    <th>Check Status</th>
    </tr>

  @foreach($data as $item)
  @if($item->is_active == 'active')
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->dataname}}</td>
      <td><img src="{{asset('storage/photos/'.$item->image)}}" alt=""></td>
      <td>
        <video controls>
            <source src="{{asset('storage/photos/'.$item->video)}}" type="video/mp4">
        </video>
      </td>
      <td>{{$item->description}}</td>
      <td>
        @if(Session::has('user'))
          <a href="/comment/{{$item->id}}">Comment</a>|| <a href="/cart/{{$item->id}}">Mua hàng</a>
        @endif
      </td>
    </tr>
  @endif
  @endforeach
  </table>

  <!-- Pagination Links -->
  {{ $data->links() }}

</body>
</html>
