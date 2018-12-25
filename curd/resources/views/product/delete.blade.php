@extends('layouts.app')

@section('title')
    Xóa sản phẩm {{$id}}
@endsection

@section('content')
    <form name="destroy-category" action="{{url('/product/destroy/'.$id)}}" method="post">
        <button type="submit" class="btn btn-primary">Xóa</button>
        @csrf
    </form>
    @endsection
