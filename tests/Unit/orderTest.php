<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class orderTest extends TestCase
{
    public function test_a_belongs_to_user()
    {
        $order = new Order;

        $this->assertInstanceOf(Collection::class, $order->user);
    }
}
