<?php

use PHPUnit\Framework\TestCase;
use App\Auction;

class MainTest extends TestCase
{
    public function testShuppin()
    {
        $auction = new Auction("商品A", 100);
        $this->assertSame($auction->result(), "入札なしでした。");
    }

    public function testShuppinAndBid()
    {
        $auction = new Auction("商品A", 100);
        $auction->bid("太郎", 200);
        $auction->bid("次郎", 300);
        $this->assertSame($auction->result(), "次郎 300");
    }

    public function test_現在価格より低い金額で入札することが出来ない()
    {
        $auction = new Auction("商品A", 100);
        $auction->bid("太郎", 200);
        try {
            $auction->bid("次郎", 100);
        } catch (Exception $exception) {
            $this->assertSame($exception->getMessage(), "現在価格より低い金額で入札は出来ません。");
        }
    }

    public function test_入札履歴を閲覧することができる()
    {
        $auction = new Auction("商品A", 100);
        $auction->bid("太郎", 200);
        $auction->bid("次郎", 300);
        $auction->bid("たけし", 500);
        $this->assertSame($auction->history(), "太郎 200,次郎 300,たけし 500");
    }
}
