<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductModel;
use App\Models\Comment as CommentModel;


class Comment extends Controller
{
    public function index(){
        $comments = CommentModel::all();
        $products = ProductModel::all();

        $data = array();
        $data['comments'] = $comments;
        //$data['products'] = $products;

        foreach ($products as $product){
            $data['product']  = $product;
        }

        return view('comment.index', $data);
    }

    public function create(){
        $products = ProductModel::all();
        $data = array();
        $data['products'] = $products;
        return view('comment.create', $data);
    }

    public function edit($id){
        $comment = CommentModel::find($id);

        $products = ProductModel::all();

        $data = array();
        $data['id'] = $id;
        $data['comment'] = $comment;
        $data['products'] = $products;
        return view('comment.edit', $data);
    }

    public function store(Request $request){
        $input = $request->all();

        $comment = new CommentModel();

        $comment->content = $input['content'];
        $comment->product_id = $input['product_id'];

        $comment->save();
        return redirect('/comment');
    }


    public function destroy($id){
        $comment = CommentModel::find($id);

        $comment->delete();
        return redirect('/comment');
    }
    public function delete($id){
        $data = array();
        $data['id'] = $id;
        return view('comment.delete',$data );
    }
}
