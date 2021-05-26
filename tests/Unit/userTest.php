<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Collection;

class userTest extends TestCase
{
    public function test_a_has_many_orders()
    {
        $user = new User;

        $this->assertInstanceOf(Collection::class, $user->orders);
    }

    public function test_a_has_many_maintenances()
    {
        $user = new User;

        $this->assertInstanceOf(Collection::class, $user->maintenances);
    }
}
