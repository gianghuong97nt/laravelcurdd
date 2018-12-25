@extends('layouts.app')

@section('title')
    Danh sách bình luận
@endsection

@section('content')
<h2>
    <a href="{{url('/comment/create')}}" class="btn btn-success">Thêm bình luận</a>
</h2>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Id sản phẩm</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td scope="row">{{$comment->id}}</td>
            <td>{{$comment->content}}</td>
            <td>{{$comment->product_id}}</td>
            @if($comment->product_id == $product->id)
                  <td>{{$product->name}}</td>
            @endif
            <td>
                <a href="{{ url('comment/'.$comment->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                <a href="{{ url('comment/'.$comment->id.'/delete') }}" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@endsection