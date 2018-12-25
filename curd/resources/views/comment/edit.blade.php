@extends('layouts.app')

@section('title')
    Sửa danh mục bài viết {{$id}}
@endsection

@section('content')
    <form name="submit_category" method="post" action="{{url('/comment/'.$id)}}">
        <div class="form-group">
            <label>Nội dung</label>
            <input type="text" name="name" class="form-control" value="{{$comment->content}}">
        </div>
        <div class="form-group">
            <label>Sản phẩm</label>
            <select name="product_id" style="min-width: 300px">
                <option value="">None</option>
                @foreach($products as $product)
                    <option value="{{$product->id}}" <?php echo ($comment->product_id == $product->id) ? 'selected':'' ?> >{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        @csrf

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection