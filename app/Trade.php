<?php

namespace App;

use Exception;

class Trade
{
    private string $itemId;
    private int $firstPrice;
    private BidHistory $bidHistory;

    /**
     * Trade constructor.
     * @param string $itemId
     * @param int $firstPrice
     */
    public function __construct(string $itemId, int $firstPrice)
    {
        $this->itemId = $itemId;
        $this->firstPrice = $firstPrice;
        $this->bidHistory = new BidHistory();
    }

    /**
     * @param string $bidderName
     * @param int $bidPrice
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
        return $latestBid->__toString();
    }

    public function history(): string
    {
        return (string)$this->bidHistory;
    }
}
