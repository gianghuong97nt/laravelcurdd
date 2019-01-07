@extends('layouts.app')

@section('title')
    Danh sách danh mục bài viết
@endsection

@section('content')
    @if (count($cartContent))
    <h2>
        Giỏ hàng
    </h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Giá thành</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartContent as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price,0,",",".") }}</td>
                <td>{{ $item->quantity }}</td>
                <td>@php
                        $total_item = $item->quantity * $item->price;
                        echo $total_item;
                    @endphp VNĐ </td>
                <th>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ url('cart/'.$item->id.'/remove') }}">Xóa</a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="container">
            <h2 style="color: orange">Giỏ hàng</h2>
            <p>Giỏ hàng của bạn đang rỗng</p>
            <br>
        </div>
    @endif
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
        <th>Thêm vào giỏ hàng</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td scope="row">{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->cat_id}}</td>
            <td></td>
            <td>{{$product->price}}</td>
            <td>{{$product->created_at}}</td>
            <td>
                <a href="{{ url('product/'.$product->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                <a href="{{ url('product/'.$product->id.'/delete') }}" class="btn btn-danger">Xóa</a>
            </td>
            <td>
                <form name="submit-product" action="{{ url('/cart/'.$product['id'].'/addtocart') }}" method="post">
                    @csrf
                    <input type="text" value="1" name="quantity" style="max-width: 35px">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-danger">Thêm vào giỏ hàng</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@endsection