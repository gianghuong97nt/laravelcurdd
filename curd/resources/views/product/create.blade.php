@extends('layouts.app')

@section('title')
    Thêm mới danh mục bài viết
@endsection

@section('content')
    <form name="submit_category" method="post" action="{{url('/product')}}">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" placeholder="Mời bạn  nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="cat_id" style="min-width: 300px">
                <option value="">None</option>
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" name="price" class="form-control" placeholder="Mời bạn  nhập giá sản phẩm">
        </div>
        <button type="submit" class="btn btn-success">Thêm bài sản phẩm</button>
        @csrf
    </form>
    @endsection