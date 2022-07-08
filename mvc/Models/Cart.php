<?php

namespace Models;

use Exception;

class Cart extends DatabaseModel
{
    public function getProducts($cartIdentifier)
    {
        $query = "SELECT C.*, P.title, P.price, (P.price * C.product_count) AS total_price
            FROM Carts AS C
            JOIN Product as P
            WHERE C.product_id=P.id
            AND C.cart_identifier=$cartIdentifier;
        ";
        
        $result = $this->getDatabase()->select($query);
        $items = [];

        while ($item = $this->getDatabase()->fetch($result)) {
			array_push($items, (object) $item);
		}

        return $items;
    }

    public function calculateTotalPrice($carts)
    {
        $column = array_column($carts, 'total_price');
        $sum = array_sum($column);

        return $sum;
    }

    public function purchase($cartIdentifier, $product)
    {
        $count = $this->counts($cartIdentifier, $product);

        if ($count >= $product->maximum_count)
            throw new Exception("Maximum Count Reached");

        if ($count >= 1)
            $this->update($cartIdentifier, $product, $count+1);
        else
            $this->insert($cartIdentifier, $product, $count+1);
    }

    private function counts($cartIdentifier, $product)
    {
        $product_id = $product->id;

        $query = "SELECT product_count as count FROM Carts 
            WHERE cart_identifier = $cartIdentifier
            AND product_id = $product_id;
        ";

        return $this->getFirst($query)->count ?? 0;
    }

    private function insert($cartIdentifier, $product, $count)
    {
        $product_id = $product->id;
        $query = "INSERT INTO Carts(cart_identifier, product_id, product_count)
            VALUES ('$cartIdentifier', '$product_id', '$count');
        ";

        $this->getDatabase()->execute($query);
    }

    private function update($cartIdentifier, $product, $count)
    {
        $product_id = $product->id;
        $query = "UPDATE Carts SET product_count = $count
            WHERE cart_identifier=$cartIdentifier and product_id=$product_id;
        ";

        $this->getDatabase()->execute($query);
    }

    public function remove($cartIdentifier, $product)
    {
        $product_id = $product->id;
        $query = "DELETE FROM Carts
            WHERE cart_identifier = $cartIdentifier
            AND product_id = $product_id;
        ";

        $this->getDatabase()->execute($query);
    }

    public function buildSchema()
    {
        $query = "CREATE TABLE Carts (
			id INTEGER PRIMARY KEY,
			cart_identifier VARCHAR(1024) NOT NULL,
			product_id INT(11) NOT NULL,
			product_count INT(11) NOT NULL
		)";
		
		$this->getDatabase()->execute($query);
    }
}