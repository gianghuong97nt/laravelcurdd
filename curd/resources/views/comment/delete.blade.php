@extends('layouts.app')

@section('title')
    Xóa bình luận {{$id}}
@endsection

@section('content')
    <form name="destroy-category" action="{{url('/comment/destroy/'.$id)}}" method="post">
        <button type="submit" class="btn btn-primary">Xóa</button>
        @csrf
    </form>
    @endsection
