<?php


namespace App;


class Item
{
    private string $id;
    private string $name;
    private int $firstPrice;
    private int $sellerId;
    private Trade $trade;

    /**
     * Item constructor.
     * @param string $name
     * @param int $firstPrice
     * @param int $userId
     */
    public function __construct(string $name, int $firstPrice, int $userId)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->firstPrice = $firstPrice;
        $this->sellerId = $userId;
        $this->trade = new Trade($this->id, $firstPrice);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function firstPrice(): int
    {
        return $this->firstPrice;
    }

    /**
     * @return int
     */
    public function userId(): int
    {
        return $this->sellerId;
    }

    public function trade(): Trade
    {
        return $this->trade;
    }

    public function itemId(): string
    {
        return $this->itemId();
    }
}