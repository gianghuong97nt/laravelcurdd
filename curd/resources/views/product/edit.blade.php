@extends('layouts.app')

@section('title')
    Sửa danh mục sản phẩm {{$id}}
@endsection

@section('content')
    <form name="submit_category" method="post" action="{{url('/product/'.$id)}}">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label>Danh mục sản phẩm</label>
            <select name="cat_id" style="min-width: 300px">
                <option value="">None</option>
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}" <?php echo ($product->cat_id == $cat->id) ? 'selected': '' ?>>{{$cat->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>
        @csrf

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection