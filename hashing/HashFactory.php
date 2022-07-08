<?php

class HashFactory
{
  private $factory = [];

  public function register($name, HashStrategy $strategy)
  {
    $this->factory[$name] = $strategy;
  }

  public function make($name)
  {
    if (isset($this->factory[$name]))
      return $this->factory[$name];

    throw new Exception("Strategy Not Supported.");
  }
}
