@extends('layouts.app')

@section('title')
    Danh sách danh mục bài viết
@endsection

@section('content')

<h2>
    <a href="{{url('/category/create')}}" class="btn btn-success">Thêm danh mục bài viết</a>
</h2>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cats as $cat)
        <tr>
            <td scope="row">{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->created_at}}</td>
            <td>
                <a href="{{ url('category/'.$cat->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                <a href="{{ url('category/'.$cat->id.'/delete') }}" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

@endsection