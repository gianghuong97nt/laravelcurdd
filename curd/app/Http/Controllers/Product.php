<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;


class Product extends Controller
{

    //
    public function index(){
        session_start();
        $products = ProductModel::all();
        $cats = CategoryModel::all();

        $data = array();
        $data['products'] = $products;

        if (isset($_POST) && !empty($_POST)) {

                        if ( isset($_POST['quantity']) && isset($_POST['id']) ) {
                            $product_id = $_POST['id'];
                            $product = ProductModel::find($product_id);

                            if ( isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item']) ) {
                                /**
                                 * !empty($_SESSION['cart_item'] == true
                                 * tức là lúc này giỏ hàng có dữ liệu
                                 */

                                if (isset($_SESSION['cart_item'][$product_id])) {
                                    /**
                                     * Sảm phẩm đã tồn tại trong giỏ hàng
                                     */
                                    $exist_cart_item = $_SESSION['cart_item'][$product_id];
                                    $exist_quantity = $exist_cart_item['quantity'];
                                    $cart_item = array();
                                    $data['id'] = $product['id'];
                                    $data['name'] = $product['name'];
                                    $data['price'] = $product['price'];
                                    $data['quantity'] =  $exist_quantity + $_POST['quantity'];
                                    $_SESSION['cart_item'][$product_id] = $cart_item;
                                } else {
                                    /**
                                     * Sản phẩm chưa tồn tại trong giỏ hàng
                                     */
                                    $cart_item = array();
                                    $data['id'] = $product['id'];
                                    $data['product_name'] = $product['product_name'];
                                    $data['product_image'] = $product['product_image'];
                                    $data['price'] = $product['price'];
                                    $data['quantity'] = $_POST['quantity'];
                                    $_SESSION['cart_item'][$product_id] = $cart_item;
                                }

                            } else {
                                /**
                                 * !empty($_SESSION['cart_item'] == false
                                 * tức là lúc này giỏ hàng không dữ liệu
                                 */
                                $_SESSION['cart_item'] = array();
                                $cart_item = array();
                            }
            }

        }

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
