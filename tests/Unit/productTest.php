<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Collection;

class productTest extends TestCase
{
    public function test_a_belongs_to_many_wishlist()
    {
        $product = new Product;

        $this->assertInstanceOf(Collection::class, $product->wishlists);
    }
}
