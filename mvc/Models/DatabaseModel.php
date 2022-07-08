<?php

namespace Models;

abstract class DatabaseModel
{
    protected $attributes = [];
	protected DatabaseInterface $database;

    public function __construct(DatabaseInterface $database, $attributes = [])
    {
		$this->database = $database;
        $this->hydrate($attributes);
    }

    public function getDatabase()
    {
		return $this->database;
    }

	public function getList($sql)
	{
		$result = $this->getDatabase()->select($sql);
        $models = [];

        while ($item = $this->getDatabase()->fetch($result)) {
			array_push($models, (object) $item);
		}

		return $models;
	}

	public function getFirst($sql)
	{
		$result = $this->getDatabase()->select($sql);
		$row = $this->getDatabase()->fetch($result);

		return (object) $row;
	}

    public function hydrate($attributes)
    {
        $this->attributes = $attributes;
    }

    // TODO: implement Necessary Methods For Dynamic Attribute Here
	public function __get($name) {
		return $this->attributes[$name] ?? null;
	}
	
	public function __set($name, $value) {
		return $this->attributes[$name] = $value;
	}

    public abstract function buildSchema();
}