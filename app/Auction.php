<?php

namespace App;

use Exception;

class Auction
{
    private string $itemName;
    private int $firstPrice;

    private BidHistory $bidHistory;

    /**
     * Auction constructor.
     * @param string $itemName
     * @param int $firstPrice
     */
    public function __construct(string $itemName, int $firstPrice)
    {
        $this->itemName = $itemName;
        $this->firstPrice = $firstPrice;
        $this->bidHistory = new BidHistory();
    }

    /**
     * @param string $bidderName
     * @param $bidPrice
     * @throws Exception
     */
    public function bid(string $bidderName, int $bidPrice)
    {
        if ($bidPrice <= $this->firstPrice) {
            throw new Exception("現在価格より低い金額で入札は出来ません。");
        }
        $this->bidHistory->add(new Bid($bidderName, $bidPrice));
    }

    /**
     * @return string
     */
    public function result(): string
    {
        if ($this->bidHistory->size() == 0) {
            return "入札なしでした。";
        }

        $latestBid = $this->bidHistory->latestBid();
        return $latestBid->getName() . " " . $latestBid->getPrice();
    }

    public function history()
    {
        // TODO 履歴を書く
    }
}
