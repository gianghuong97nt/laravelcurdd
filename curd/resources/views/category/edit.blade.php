@extends('layouts.app')

@section('title')
    Sửa danh mục bài viết {{$id}}
@endsection

@section('content')
    <form name="submit_category" method="post" action="{{url('/category/'.$id)}}">
        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" value="{{$cat->name}}">
        </div>
        @csrf

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection