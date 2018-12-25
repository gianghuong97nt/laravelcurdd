@extends('layouts.app')

@section('title')
    Danh sách danh mục bài viết
@endsection

@section('content')
<h2>
    <a href="{{url('/product/create')}}" class="btn btn-success">Thêm sản phẩm</a>
</h2>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Id danh mục</th>
        <th scope="col">Tên danh mục</th>
        <th scope="col">Giá</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td scope="row">{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->cat_id}}</td>
            {{--<td>{{$cat->name}}</td>--}}
            <td>{{$product->price}}</td>
            <td>{{$product->created_at}}</td>
            <td>
                <a href="{{ url('product/'.$product->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                <a href="{{ url('product/'.$product->id.'/delete') }}" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@endsection