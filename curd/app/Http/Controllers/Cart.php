<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductModel;


class Cart extends Controller
{
    //

    public function __construct()
    {
        $this->cart = \Cart::session($this->userId);
    }
    private $userId = 1;
    private $cart;
    public function addtocart(Request $request, $id) {
        $input = $request->all();
        $product = ProductModel::find($id);

        $this->cart->add(array(
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $input['quantity'],
            'attributes' => array()
        ));
        return redirect('/product');
    }
    public function remove($id) {
        $this->cart->remove($id);
        return redirect('/product');
    }
}
