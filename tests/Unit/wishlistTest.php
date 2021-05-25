<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class wishlistTest extends TestCase
{
    public function test_a_belongs_to_many_products()
    {
        $wishlist = new Wishlist;

        $this->assertInstanceOf(Collection::class, $wishlist->products);
    }

    public function test_a_belongs_to_user()
    {
        $wishlist = new Wishlist;

        //$this->assertInstanceOf(User::class, $wishlist->user);
        $this->assertEquals(1, $wishlist->user->count());
    }
}
