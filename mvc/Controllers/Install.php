<?php

namespace Controllers;

use Models\Cart;
use Models\Product;

class Install extends Base
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
        $this->products->buildSchema();

        $this->carts->buildSchema();

        set_alert('Application Installed Successfully');

        return redirect('products', 'index');
    }
}