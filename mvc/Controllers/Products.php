<?php

namespace Controllers;

use Models\Product;

class Products extends Base
{
    protected $products;

    public function __construct()
    {
        $this->products = new Product($this->database());
    }

    public function index()
    {
        $products = $this->products->all();

        return render('products', compact('products'));
    }

    public function form()
    {
        return render('form');
    }

    public function create()
    {
        $this->products->create(
            resolve_request_parameter('title'),
            resolve_request_parameter('price'),
            resolve_request_parameter('maximum_count')
        );

        set_alert('Product Created Successfully');

        return redirect('products', 'index');
    }
}