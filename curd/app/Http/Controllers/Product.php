<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;


class Product extends Controller
{

    public function __construct()
    {
        $this->cart = \Cart::session($this->userId);
    }
    private $userId = 1;
    private $cart;
    //
    public function index(){
        $products = ProductModel::all();

        $data = array();
        $data['products'] = $products;
        $data['cartContent'] = $this->cart->getContent();


        return view('product.index', $data);
    }

    public function create(){
        $cats = CategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        return view('product.create', $data);
    }

    public function addtocart($id){

        $product = ProductModel::find($id);
        $data = array();

        $data['id'] = $id;
        $data['cart_item'] = $product;

        return view('product.index', $data);
    }

    public function store(Request $request){
        $input = $request->all();

        $product = new ProductModel();
        $product->name = $input['name'];
        $product->cat_id = $input['cat_id'];
        $product->price = $input['price'];
        $product->save();

        return redirect('/product');
    }
    public function edit($id){
        $product = ProductModel::find($id);
        $cats = CategoryModel::all();

        $data = array();
        $data['id'] = $id;
        $data['product'] = $product;
        $data['cats'] = $cats;
        return view('product.edit', $data);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $product = new ProductModel();

        $product->name = $input['name'];
        $product->cat_id = $input['cat_id'];
        $product->price = $input['price'];

        $product->save();
        return redirect('/product');

    }

    public function destroy($id){
        $product = ProductModel::find($id);

        $product->delete();
        return redirect('/product');
    }

    public function delete($id){

        $data = array();
        $data['id'] = $id;
        return view('product.delete', $data);
    }
}
