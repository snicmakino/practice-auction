<?php

namespace App;

class User
{
    private int $id;
    private string $name;

    /**
     * User constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function sellItem(string $name, int $price): Item
    {
        return new Item($name, $price, $this->id);
    }
}