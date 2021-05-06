<?php

namespace App;

use Exception;

class BidHistory
{
    private array $bids;

    /**
     * BidHistory constructor.
     */
    public function __construct()
    {
        $this->bids = [];
    }


    /**
     * @throws Exception
     */
    public function add(Bid $bid)
    {
        $latestBid = $this->latestBid();

        if ($latestBid != null && $bid->getPrice() <= $latestBid->getPrice()) {
            throw new Exception("現在価格より低い金額で入札は出来ません。");
        }
        $this->bids[] = $bid;
    }

    public function latestBid(): ?Bid
    {
        if (count($this->bids) == 0) {
            return null;
        }
        $latestBid = $this->bids[array_key_last($this->bids)];
        assert($latestBid instanceof Bid);
        return $latestBid;
    }

    public
    function size(): int
    {
        return count($this->bids);
    }
}