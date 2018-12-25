@extends('layouts.app')

@section('title')
    Thêm mới bình luận
@endsection

@section('content')
    <form name="submit_category" method="post" action="{{url('/comment')}}">
        <div class="form-group">
            <label>Content</label>
            <input type="text" name="content" class="form-control" placeholder="Mời bạn  nhập  bình luận">
        </div>
        <div class="form-group">
            <label>Sản phẩm</label>
            <select name="product_id" style="min-width: 300px">
                <option value="">None</option>
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm bình luận</button>
        @csrf
    </form>
    @endsection