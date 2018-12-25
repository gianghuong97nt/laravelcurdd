@extends('layouts.app')

@section('title')
    Thêm mới danh mục bài viết
@endsection

@section('content')
    <form name="submit_category" method="post" action="{{url('/category')}}">
        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" placeholder="Mời bạn  nhập tên danh mục">
        </div>
        <button type="submit" class="btn btn-success">Thêm bài danh mục</button>
        @csrf
    </form>
    @endsection