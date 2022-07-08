<?php

namespace Models;

use Exception;

class Product extends DatabaseModel
{
    public function all()
    {
        $query = "SELECT * FROM Product";
		return $this->getList($query);
    }

    public function find($id)
    {
        $query = "SELECT * FROM Product WHERE id = $id;";
		$row = $this->getFirst($query);
		
		if (is_null($row))
			throw new Exception('Model Not Found');
		
		return $row;
    }

    public function create($title, $price, $maximumCount)
    {
        $query = "INSERT INTO Product(title, price, maximum_count)
			VALUES('$title', '$price', '$maximumCount');";

		$this->getDatabase()->execute($query);
		
		$model = new self($this->getDatabase(), [
			'id' => $this->getDatabase()->insert_id,
			'title' => $title,
			'price' => $price,
			'maximum_count' => $maximumCount,
		]);
		
		return $model;		
    }

    public function buildSchema()
    {
        $query = "CREATE TABLE Product (
			id INTEGER PRIMARY KEY,
			title VARCHAR(1024) NOT NULL,
			price INTEGER NOT NULL,
			maximum_count INTEGER NOT NULL
		)";
		
		$this->getDatabase()->execute($query);
    }
}