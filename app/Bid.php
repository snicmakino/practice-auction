<?php

namespace App;

class Bid
{
    private string $name;
    private string $price;

    /**
     * Bid constructor.
     * @param string $name
     * @param string $price
     */
    public function __construct(string $name, string $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName() . ' ' . $this->getPrice();
    }
}