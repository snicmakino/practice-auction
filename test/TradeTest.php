<?php

use App\User;
use PHPUnit\Framework\TestCase;

class TradeTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User(1, '太郎');
    }

    public function test_出品のみで入札なし()
    {
        $item = $this->user->sellItem("商品A", 100);
        $trade = $item->trade();
        $this->assertSame($trade->result(), "入札なしでした。");
    }

    public function test_出品と入札結果()
    {
        $item = $this->user->sellItem("商品A", 100);
        $trade = $item->trade();
        $trade->bid("太郎", 200);
        $trade->bid("次郎", 300);
        $this->assertSame($trade->result(), "次郎 300");
    }

    public function test_現在価格より低い金額で入札することが出来ない()
    {
        $item = $this->user->sellItem("商品A", 100);
        $trade = $item->trade();
        $trade->bid("太郎", 200);
        try {
            $trade->bid("次郎", 100);
        } catch (Exception $exception) {
            $this->assertSame($exception->getMessage(), "現在価格より低い金額で入札は出来ません。");
        }
    }

    public function test_入札履歴を閲覧することができる()
    {
        $item = $this->user->sellItem("商品A", 100);
        $trade = $item->trade();
        $trade->bid("太郎", 200);
        $trade->bid("次郎", 300);
        $trade->bid("たけし", 500);
        $this->assertSame($trade->history(), "太郎 200,次郎 300,たけし 500");
    }
}
