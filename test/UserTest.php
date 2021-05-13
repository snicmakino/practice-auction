<?php

use PHPUnit\Framework\TestCase;
use App\User;

/**
 * ユーザーのテスト
 */
class UserTest extends TestCase
{
    public function test_ユーザーは商品を出品することができる()
    {
        $user = new User(1, "太郎");
        $item  = $user->sellItem('商品名', 100);
        $this->assertSame($item->userId(), 1);
        $this->assertSame($item->name(), '商品名');
        $this->assertSame($item->firstPrice(), 100);
    }
}
