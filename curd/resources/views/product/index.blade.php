@extends('layouts.app')

@section('title')
    Danh sách danh mục bài viết
@endsection

@section('content')
    <?php if(!isset($_SESSION))
    {
        session_start();
    }  ?>
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
        <?php

        $total = 0;
        foreach ($_SESSION['cart_item'] as $key_car => $val_cart_item) : ?>
        <tr>
            <td><?php echo $val_cart_item['id'] ?></td>
            <td><?php echo $val_cart_item['name'] ?></td>
            <td><?php echo $val_cart_item['price'] ?></td>
            <td><?php echo $val_cart_item['quantity'] ?></td>
            <td><?php
                $total_item =  ($val_cart_item['price'] * $val_cart_item['quantity']);
                echo number_format($total_item,0,",",".");
                ?> VNĐ</td>
            <td>
                <form name="remove<?php echo $val_cart_item['id'] ?>" action="process.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $val_cart_item['id'] ?>">
                    <input type="hidden" name="action" value="remove">
                    <input type="submit" name="submit" class="btn btn-sm btn-outline-secondary" value="Xóa" />
                </form>

            </td>
        </tr>
        <?php
        $total += $total_item;
        endforeach; ?>
        </tbody>
    </table>
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
                <form name="submit-product" action="{{ url('product') }}" method="post">
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