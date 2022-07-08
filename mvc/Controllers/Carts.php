<?php

namespace Controllers;

use Models\Cart;
use Models\Product;

class Carts extends Base
{
    protected $carts;
    protected $products;

    public function __construct()
    {
        $this->carts = new Cart($this->database());
        $this->products = new Product($this->database());
    }

    public function index()
    {
        $carts = $this->carts->getProducts(get_cart_identifier());

        $totalPrice = $this->carts->calculateTotalPrice($carts);

        return render('cart', compact('carts', 'totalPrice'));
    }

    public function add()
    {
        $product = $this->products->find(
            resolve_request_parameter('product_id')
        );

        $cartIdentifier = get_cart_identifier();

        $this->carts->purchase($cartIdentifier, $product);

        set_alert("Product Added To Cart");

        return redirect('carts', 'index');
    }

    public function remove()
    {
        $product = $this->products->find(
            resolve_request_parameter('product_id')
        );

        $cartIdentifier = get_cart_identifier();

        $this->carts->remove($cartIdentifier, $product);

        set_alert("Product Removed From Cart");

        return redirect('carts', 'index');
    }
}